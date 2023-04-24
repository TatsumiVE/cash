<?php
$balance=0;
$income=0;
$expense=0;
date_default_timezone_set('Asia/Yangon');
$currentDate=$currentDate = date('Y-m-d');
require("database.php");

if(!isset($_SESSION['user']['id'])){
  header("location:/login");
  exit;
}else{
$query=$conn->prepare("SELECT cash.*,category_name FROM cash LEFT JOIN category ON cash.cid=category.cid where cash.user_id=? AND cash.createDate=? AND cash.isactive=1");
$user_id=$_SESSION['user']['id'];

if(isset($_POST['date'])){
  $searchDate=$_POST['date'];
}elseif(isset($_GET['date'])){
  $searchDate=$_GET['date'];
}else{
  $searchDate=$currentDate;
}

$query->bind_param("is", $user_id,$searchDate);
$query->execute();
$result = $query->get_result();
$index=1;

}
require("navbar.php");

?>
    <div class="container-fluid">
      <div class="d-flex flex-row justify-content-between m-3">
      <h4>Date : <?= $searchDate?></h4> 
      <form action="/" method="POST" class="d-block">
      <div>
            <label for="date" class="fs-5 fw-bold">Search Date :</label>
            <input type="date" id="date" name="date" value="<?=$searchDate?>" required>
          
          
          <button type="submit" class="bg-primary text-center text-light border-0 outline-0" style="width:4rem;height:2rem">Search</button>
</div>
      </form>
  
      </div>
   

<?php   if($result->num_rows >0):?>
    <table class="table m-2 text-center">
      <thead class="table-primary">
        <tr>
           <th scope="col">#</th>
          <th scope="col">Date</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Cash_In</th>
          <th scope="col">Cash_Out</th>
          <th scope="col">Balance</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
    
      <?php while($rows=mysqli_fetch_assoc($result)):?>
        
        <tr>
          <th scope="row"><?=$index?></th>
          <td> <?= $rows['createDate']?></td>
          <td> <?= $rows['category_name']?></td>
          <td> <?= $rows['detail']?></td>
         <td><?= $rows['cash_status']===1? number_format($rows['amount']) : '-'?><?php $rows['cash_status']===1? $income+=$rows['amount']  : '' ?></td> 
         <td><?= $rows['cash_status']===0? number_format($rows['amount']) : '-'?><?php $rows['cash_status']===0? $expense+=$rows['amount']  : '' ?></td> 
         <td>
          <?php
         $balance+= $rows['cash_status']===1? $rows['amount']: -$rows['amount'];
         echo number_format($balance);
         ?>
         </td> 
          <td><a href="/edit?id=<?=$rows['sid']?>&status=<?=$rows['cash_status']?>"  class="text-light btn btn-info" >Edit</a></td>
          <td><a  href="/delete?id=<?=$rows['sid']?>" class="text-light btn btn-danger" onclick="return confirm('You sure want Delet Action')">Delete</a></button> </td>
        </tr>
        <?php $index++; ?>
        <?php endwhile;?>
        <tfoot>
          <td colspan="4" class="text-center">Total</td>
          <td><?=number_format($income)?></td>
          <td><?=number_format($expense)?></td>
          <td><?=number_format($balance)?></td>
          <td></td>
          <td></td>
          
        </tfoot>
        <?php else:?>
          <div class="m-5 text-center  text-primary">
          <h1>Data is not record in <?=$searchDate?></h1>
          
          </div>
         
          <?php endif;?>
      </tbody>
</table>
<div class="row position-absolute bottom-0 end-0">
<a href="/income" class="text-light">
<button type="button"  class="btn btn-primary btn-lg btn-floating m-1"  style="width: 5rem; height: 5rem">
 Cash IN
</button>
</a>
<a href="/expense" class="text-light">
<button type="button" class="btn btn-danger btn-floating m-1" data-mdb-ripple-color="dark"  style="width: 5rem; height: 5rem">
Cash Out
</button>
</a>
  

    </div>

</body>
</html>
