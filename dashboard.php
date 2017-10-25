<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('location:http://people.aero.und.edu/~spokharel/513/1/'); 
	}
?>

WELCOME <?php echo $_SESSION['username'] ?><br/>
<a href="logout.php">Logout<br/></a>
This is Dashboard
