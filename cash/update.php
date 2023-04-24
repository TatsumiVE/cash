<?php
require("../database.php");
$query=$conn->prepare("UPDATE cash SET cid=?, detail=?,amount=?,createDate=? WHERE sid=? AND user_id=?");
$category_id=$_POST['category'];
$description=$_POST['description'];
$amount=$_POST['amount'];
$date=$_POST['date'];
$sid=$_GET['id'];
$user_id=$_SESSION['user']['id'];
// echo $category_id." ".$description." ".$amount." ".$date." ".$sid;
$query->bind_param("isisii",$category_id,$description,$amount,$date,$sid,$user_id);
$query->execute();
$query->close();
header("location:/?date=$date");
exit;