<?php

require("../database.php");
  
  if(isset($_SESSION['user'])){
    header('location: /');
    exit();
  }


  $errors = [];
  if(isset($_POST['email'])&&($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(strlen($email) > 0 && filter_var($email, FILTER_VALIDATE_EMAIL)
      && strlen($password) > 0 
    ){
      $query = sprintf("SELECT * FROM user WHERE email = '%s'",mysqli_real_escape_string($conn, $email));

      $result = mysqli_query($conn, $query);
      if(!$result){
        $errors['body']= "Errors when select the data.";
      }else{
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)){
          if(password_verify( $password,$row['password'])){
              
            login([
              'id' => $row['user_id'],
              'email' => $email,
              'name' => $row['username'],

            ]);
            header('location: /');
          
            exit();
          }else{
            $errors['body']= "Enter valid email and password.";
          }
        }else{
            $errors['body']= "Enter valid email and password.";
          }
      }
    }else{
      $errors['body'] = "Input field is required";
    }
  }
 

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
  rel="stylesheet"
/>
  </head>
  <body>
  <?php require("../navbar.php");?>

  <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <form  method="post">
            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" required />
              <label class="form-label" for="typeEmailX-2">Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" required/>
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            </form>
            <?php if(!empty($errors)) :?>
              <div class="text-center">
                <?= $errors['body'] ?>
              </div>
              <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"
></script>
  </body>
</html>