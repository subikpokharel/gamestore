<?php
session_start();
$_SESSION['admin_userid'] = $_GET['userId'];
$_SESSION['admin_username']=$_GET['userName'];
header('Location: listGame.php'); 
exit();
?>



