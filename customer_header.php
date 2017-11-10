<?php
	session_start();
	if(!isset($_SESSION['cus_username'])){
		header('location:http://people.aero.und.edu/~spokharel/513/1/'); 
	}else{
		$user = $_SESSION['cus_username'];
		$userId = $_SESSION['cus_userid'];
	}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gamestore | Customer</title>
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
				<a href="http://people.aero.und.edu/~spokharel/513/1/dashboard.php" class="logo">
      					<span class="logo-lg"><b>Gamestore </b> Customer</span>
    				</a>
			</div>
			<div class="col-sm-5 pull-right">
				<nav class="navbar navbar-static-top pull-right">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="http://people.aero.und.edu/~spokharel/513/1/dashboard.php">
								<span class="hidden-sm ">Welcome  <?php  echo ucfirst($user);?></span>
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="http://people.aero.und.edu/~spokharel/513/1/viewOrders.php">
								<span class="hidden-xs ">View Previous Orders</span>
							</a>
						</li>
						<li class="dropdown user user-menu">
							<a href="logout.php">
								<span class="hidden-xs btn btn-danger btn-block btn-flat">Logout</span>
							</a>
						</li>

					</ul>
				</nav>
			</div>
  		</div>
		
		
	  
	
