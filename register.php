<?php
  if(isset($_SESSION['user'])){
    header('location: /');
    exit();
  }

require('database.php');
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  if (strlen($username) > 0 && strlen($email) && filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) > 0 && strlen($confirm)) {
    if ($password === $confirm) {
      $query = sprintf("SELECT * FROM user WHERE email='%s'", mysqli_real_escape_string($conn, $email));
      $result = mysqli_query($conn, $query);

      // var_dump($result);

      if ($result->num_rows > 0) {
        $error = "Email is already exist";
      } else {
        $sql = sprintf(
          "INSERT INTO user (username,email,password,createDate,updateDate) VALUE('%s','%s','%s',Now(),Now())",
          mysqli_real_escape_string($conn, $username),
          mysqli_real_escape_string($conn, $email),
          mysqli_real_escape_string($conn, password_hash($password, PASSWORD_BCRYPT)),
        );
        if (mysqli_query($conn, $sql)) {
          header("Location: /login");
          exit();
        }
      }
    }
  } else {
    $error = "Input field is required";
  }
}
?>


<?php require("navbar.php") ?>
<section class="vh-100 bg-image bg-primary" style="overflow: auto; background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3" style="margin-top:110px;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="POST">

                <div class="form-outline mb-4">
                  <input type="text" name="username" id="username" class="form-control form-control-lg" required/>
                  <label class="form-label" for="username">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" required/>
                  <label class="form-label" for="email">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" required/>
                  <label class="form-label" for="password">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="confirm" id="confirm" class="form-control form-control-lg" required/>
                  <label class="form-label" for="confirm">Repeat your password</label>
                </div>


                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white">Register</button>
                </div>


              </form>

              <?php
              if (!empty($error)) : ?>
                <div class="text-center text-danger"><?= $error ?></div>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
</body>

</html>