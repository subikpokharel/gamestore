<?php
	session_start();
	if(!isset($_SESSION['admin_username'])){
		header('location:http://people.aero.und.edu/~spokharel/513/1/'); 
	}else{
		$user = $_SESSION['admin_username'];
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gamestore | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="public/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/template.min.css">
  <!-- Reference to Jquery script -->
    <script scr ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

</head>
<body class="hold-transition skin-blue ">
	<div class="container">
		<div class="row">
			<div class="col-sm-3"style="font-size:25px; margin-top:10px;">    			
				<a href="" class="logo">
      					<span class="logo-lg"><b>Gamestore </b> Admin</span>
    				</a>
			</div>
			<div class="col-sm-3 pull-right">
				<nav class="navbar navbar-static-top pull-right">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="">
								<span class="hidden-xs">Welcome  <?php  echo ucfirst($user);?></span>
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="logout.php">
								<span class="hidden-xs">Logout</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
  		</div>
		
		<div class="row "style="font-size:18px;">
			<div class="row">
				<div class="col-xs-1"></div>  
				<div class="col-xs-2">   
					 <a href="listGame.php">
                				</i> <span>List All Games</span>
					</a>
				</div> 
				<div class="col-xs-2">   
					 <a href="enterGame.php">
                				<span>Enter games</span>
					</a>
				</div>
				
				<div class="col-xs-2">   
					<a href="deleteDeveloper.php">
                				<span>Delete Developer</span>
					</a>
				</div>
				<div class="col-xs-2">   
					<a href="updatePrice.php">
                				<span class="menu">Update Game Price</span> 
					</a>
				</div>
				<div class="col-xs-3">   
					<a href="addDeveloper.php">
                				<span>Add Developer to a game</span>
					</a>
				</div>
			</div>
	  
		</div>
	  
	
