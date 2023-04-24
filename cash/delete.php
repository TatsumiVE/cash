<?php
require("../database.php");
$query=$conn->prepare("UPDATE cash SET isactive= 0 WHERE sid=? AND user_id=?");
$id=$_GET['id'];
$user_id=$_SESSION['user']['id'];
echo $id;
$query->bind_param("ii", $id,$user_id);
$query->execute();
$query->close();
header("location:/");
exit();