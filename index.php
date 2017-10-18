
<?php
	print_r($_POST);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gamestore | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="public/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/template.min.css">

  </head>
  <body class="hold-transition login-page">
	<div class="row">
		<div class="login-box">
			<div class="row">
				<div class="login-logo">
					<a href=""><b>Game</b>store </a>
				</div><!-- /.login-logo -->
			</div>
		</div><!-- /.login-box -->
		<div class="row">
			<div class="col-xs-1"></div><!-- /.col -->
			<div class="col-xs-2">
				<div class="login-box-body">
					<div class="login-logo">
						<a href=""><b>Admin</b>Login</a>
					</div><!-- /.login-logo -->
					<p class="login-box-msg">Please enter your password</p>
        				<form id="adminLogin" method="post" action = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi">
						<div class="form-group has-feedback">
            						<input type="hidden" class="form-control" name = "username" value="admin">
          					</div>
          					<div class="form-group has-feedback">
            						<input type="password" class="form-control" name = "password" placeholder="Password" required>
          					</div>
						<input type="hidden" class="form-control" name = "action" value="admin_login">
          					<div class="row">
            						<div class="col-xs-2">
            						</div><!-- /.col -->
            						<div class="col-xs-8">
              							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            						</div><!-- /.col -->
            						<div class="col-xs-2">
            						</div><!-- /.col -->
          					</div>
					</form><br>

      				</div><!-- /.login-box-body Admin-->			
			</div><!-- /.col -->
			<div class="col-xs-1"></div><!-- /.col -->
			<div class="col-xs-3">
				<div class="login-box-body">
					<div class="login-logo">
						<a href=""><b>Customer</b>Login</a>
					</div><!-- /.login-logo -->
        				<p class="login-box-msg">Sign in to start your session</p>
        				<form id="customerLogin" method="post" action = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi">
						<div class="form-group has-feedback">
            						<input type="text" class="form-control" name = "userName"  placeholder="Username" required>
          					</div>
          					<div class="form-group has-feedback">
            						<input type="password" class="form-control" name = "password" placeholder="Password" required>
          					</div>
						<input type="hidden" class="form-control" name = "action" value="customer_login">
          					<div class="row">
            						<div class="col-xs-2">
            						</div><!-- /.col -->
            						<div class="col-xs-8">
              							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            						</div><!-- /.col -->
            						<div class="col-xs-2">
            						</div><!-- /.col -->
          					</div>
					</form><br>
        				<a href="cus_signup.php">New Customer? Sign Up!!</a>

      				</div><!-- /.login-box-body Customer -->
			</div><!-- /.col -->
			<div class="col-xs-1"></div><!-- /.col -->
			<div class="col-xs-2">
				<div class="register-box">
      					<div class="register-box-body">
						<div class="register-logo">
        						<a href=""><b>Developer</b>Signup</a>
      						</div>
        					<p class="login-box-msg">Register a new Developer</p>
        					<form id="developerSignup" method="post" action = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi" >
          					<div class="form-group has-feedback">
            						<input type="text" class="form-control" name = "fullName"  placeholder="Enter your Full name" required>
						</div>
						<input type="hidden" class="form-control" name = "action" value="developer_register">
          					<div class="row">
            						<div class="col-xs-1"></div><!-- /.col -->
            						<div class="col-xs-5">
              							<button type="signup" class="btn btn-primary btn-block btn-flat">SignUp</button>
            						</div><!-- /.col -->
            						<div class="col-xs-1"> </div><!-- /.col -->
           						<div class="col-xs-5">
              							<button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
            						</div><!-- /.col -->
          					</div>
        					</form>
      					</div><!-- /.form-box -->
    				</div><!-- /.register-box Developer-->
			</div><!-- /.col -->
			<div class="col-xs-1"></div><!-- /.col -->
		</div>
	</div>



  </body>
</html>
