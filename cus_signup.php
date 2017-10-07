
<?php
		print_r($_POST);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gamestore | Customer Signup</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="public/bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="public/template.min.css">
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href=""><b>Customer</b>Signup</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new Customer</p>

        <form action="http://people.aero.und.edu/~spokharel/cgi-bin/513/1/Customer.cgi" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name = "fullName"  placeholder="Full name" required>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name = "userName"  placeholder="Username" required>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name = "password" placeholder="Password" required>
          </div>
          <div class="row">
            <div class="col-xs-1"></div><!-- /.col -->
            <div class="col-xs-5">
              <button type="register" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
            <div class="col-xs-1"> </div><!-- /.col -->
            <div class="col-xs-5">
              <button type="reset" class="btn btn-danger btn-block btn-flat">Reset</button>
            </div><!-- /.col -->
          </div>
        </form><br>
        <a href="http://people.aero.und.edu/~spokharel/513/1/" class="text-center">Back to Login page</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

  </body>
</html>
