<?php
session_start();
$_SESSION['cus_userid'] = $_GET['userId'];
$_SESSION['cus_username']=$_GET['userName'];
header('Location: dashboard.php'); 
exit();
?>

