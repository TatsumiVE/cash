<?php
require("../database.php");
$query=$conn->prepare("INSERT INTO cash (user_id,cid,detail,amount,cash_status,createDate,updateDate,isactive)  VALUES (?,?,?,?,0,?,NOW(),1)");
$user_id=$_SESSION['user']['id'];
$category_id=$_POST['category'];
$description= filter_input(INPUT_POST,'description', FILTER_SANITIZE_EMAIL);
$amount= filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT);
$date=$_POST['date'];


$query->bind_param("iisis", $user_id,$category_id,$description,$amount,$date);
$query->execute();
$query->close();
header("location:/?date=$date");