<?php
session_start();
$_SESSION['userid'] = $_GET['userId'];
$_SESSION['username']=$_GET['userName'];
header('Location: dashboard.php'); 
exit();
?>

