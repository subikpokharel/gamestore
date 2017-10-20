
<?php
	//print_r($_POST);
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
	<!-- Reference to Jquery script -->
	<script scr ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

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
        				<form id="Login" method="post" name="login_admin">
						<div id ="adminError" class="alert alert-danger" style="display:none">Password Mismatch!!</div>
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
        				<form id="Login1" method="post" name="login_customer">
						<div id ="customerError" class="alert alert-danger" style="display:none">Username or Password did not match!!</div>
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
        					<form id="developerSignup" method="post" name="dev_form" >
						<div id ="developerError" class="alert alert-danger" style="display:none">Signup Failed. You name already exists in the database!!</div>
						<div id ="developerSuccess" class="alert alert-success" style="display:none">Signup Success. Congratulation!!</div>
          					<div class="form-group has-feedback">
            						<input type="text" class="form-control" name = "fullName"  placeholder="Enter your Full name" required>
						</div>
						<input type="hidden" class="form-control" name = "action" value="developer_register">
          					<div class="row">
            						<div class="col-xs-1"></div><!-- /.col -->
            						<div class="col-xs-5">
              							<button type="submit" class="btn btn-primary btn-block btn-flat" onclick="submitForm()" >SignUp</button>
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

<script type="text/javascript">

$("#developerSignup").submit(function(e) {
    var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi";
    $.ajax({
           type: "POST",
           url: url,
           data: $("#developerSignup").serialize(), // serializes the form's elements.
           success:function(data)
           {    var arr = JSON.parse( data );
		
                if(arr[0].status=='success'){
                        $('#developerSuccess').show(); 
			$('#developerSuccess').fadeOut(5000);   
			document.dev_form.reset();       
                }else{
                        $('#developerError').show();    
			$('#developerError').fadeOut(5000);             
                }
           }
		
         });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
$("#Login").submit(function(e) {
    var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi";
    $.ajax({
           type: "POST",
           url: url,
           data: $("#Login").serialize(), // serializes the form's elements.
           success:function(data)
           {    var arr = JSON.parse( data );
		//alert(data);
                if(arr[0].status=='success'){
			 if(arr[0].person=='admin'){
				location.href = 'admin.php'; 
			}else{
				location.href = 'dashboard.php'; 
			}   
                }else{
			if(arr[0].person=='admin'){
				$('#adminError').show();    
				$('#adminError').fadeOut(5000);  
				document.login_admin.reset();   
			}else{
				$('#customerError').show();    
				$('#customerError').fadeOut(5000); 
				document.login_customer.reset();       
			}   
                                 
                }
           }
		
         });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});


$("#Login1").submit(function(e) {
    var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi";
    $.ajax({
           type: "POST",
           url: url,
           data: $("#Login1").serialize(), // serializes the form's elements.
           success:function(data)
           {    var arr = JSON.parse( data );
		//alert(data);
                if(arr[0].status=='success'){
			 if(arr[0].person=='admin'){
				location.href = 'admin.php'; 
			}else{
				location.href = 'dashboard.php'; 
			}   
                }else{
			if(arr[0].person=='admin'){
				$('#adminError').show();    
				$('#adminError').fadeOut(5000);  
				document.login_admin.reset();   
			}else{
				$('#customerError').show();    
				$('#customerError').fadeOut(5000); 
				document.login_customer.reset();       
			}   
                                 
                }
           }
		
         });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});
/*$("#Login").submit(function(e) {
    var url = "http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi";
    $.ajax({
           type: "POST",
           url: url,
           data: $("#Login").serialize(), // serializes the form's elements.
           success:function(data)
           {    var arr = JSON.parse( data );
		//alert(data);
                if(arr[0].status=='success'){
			 if(arr[0].person=='admin'){
				location.href = 'admin.php'; 
			}else{
				location.href = 'dashboard.php'; 
			}   
                }else{
			if(arr[0].person=='admin'){
				$('#adminError').show();    
				$('#adminError').fadeOut(5000);  
				document.login_admin.reset();   
			}else{
				$('#customerError').show();    
				$('#customerError').fadeOut(5000); 
				document.login_customer.reset();       
			}   
                                 
                }
           }
		
         });
    e.preventDefault(); // avoid to execute the actual submit of the form.
});*/
</script> 

  </body>
</html>
