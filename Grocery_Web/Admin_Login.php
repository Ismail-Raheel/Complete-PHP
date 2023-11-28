<?php
require('crud.php');


if(isset($_POST['login']))
{

$Email = $_POST['email'];
$password = $_POST['password'];

$response = select("admin_account",array("Admin_Email" => $Email, "Admin_Password" => $password));


if($response['status'] == "Success")
{

  echo"<script>alert('Welcome Admin')</script>";
	echo"<script>window.location='Dashboard.php';</script>";

}


else
{

	echo"<script>alert('Incorrect Email OR  Password!')</script>";
  echo"<script>window.location='Admin_Login.php'</script>";

}



}


?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/costic/pages/prebuilt-pages/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Aug 2022 11:51:35 GMT -->
<head>



  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="vendors/iconic-fonts/flat-icons/flaticon.css">
    <link href="admin/vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="admin/assets/css/jquery-ui.min.css" rel="stylesheet">
  <!-- Costic styles -->
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">

</head>



  <!-- Preloader -->
  <div id="preloader-wrap">
    <div class="spinner spinner-8">
      <div class="ms-circle1 ms-child"></div>
      <div class="ms-circle2 ms-child"></div>
      <div class="ms-circle3 ms-child"></div>
      <div class="ms-circle4 ms-child"></div>
      <div class="ms-circle5 ms-child"></div>
      <div class="ms-circle6 ms-child"></div>
      <div class="ms-circle7 ms-child"></div>
      <div class="ms-circle8 ms-child"></div>
      <div class="ms-circle9 ms-child"></div>
      <div class="ms-circle10 ms-child"></div>
      <div class="ms-circle11 ms-child"></div>
      <div class="ms-circle12 ms-child"></div>
    </div>
  </div>



  <!-- Main Content -->
  <main class="body-content">
    <!-- Navigation Bar -->
  
    <!-- Body Content Wrapper -->
    <div class="ms-content-wrapper ms-auth">
      <div class="ms-auth-container">
        <div class="ms-auth-col">
          <div class="ms-auth-bg"></div>
        </div>
        <div class="ms-auth-col">
          <div class="ms-auth-form">
            <form class="needs-validation" action="Admin_Login.php" method="POST" novalidate="">
              <h3>Login to Account</h3>
              <p>Please enter your email and password to continue</p>
              <div class="mb-3">
                <label for="validationCustom08">Email Address</label>
                <div class="input-group">
                  <input type="email" name="email" class="form-control" id="validationCustom08" placeholder="Email Address" required="">
                  <div class="invalid-feedback">Please provide a valid email.</div>
                </div>
              </div>
              <div class="mb-2">
                <label for="validationCustom09">Password</label>
                <div class="input-group">
                  <input type="password" name="password" class="form-control" id="validationCustom09" placeholder="Password" required="">
                  <div class="invalid-feedback">Please provide a password.</div>
                </div>
              </div>
              <div class="form-group">
                <label class="ms-checkbox-wrap">
                  <input class="form-check-input" type="checkbox" value=""> <i class="ms-checkbox-check"></i>
                </label> <span> Remember Password </span>
                <label class="d-block mt-3"><a href="#" class="btn-link" data-toggle="modal" data-target="#modal-12">Forgot Password?</a>
                </label>
              </div>
              <button class="btn btn-primary mt-4 d-block w-100" name="login" type="submit">Sign In</button> 
              <p class="mb-0 mt-3 text-center">Don't have an account? <a class="btn-link" href="default-register.html">Create Account</a> 
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Forgot Password Modal -->
    <div class="modal fade" id="modal-12" tabindex="-1" role="dialog" aria-labelledby="modal-12">
      <div class="modal-dialog modal-dialog-centered modal-min" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
            </button> <i class="flaticon-secure-shield d-block"></i>
            <h1>Forgot Password?</h1>
            <p>Enter your email to recover your password</p>
            <form method="post">
              <div class="ms-form-group has-icon">
                <input type="text" placeholder="Email Address" class="form-control" name="forgot-password" value=""> <i class="material-icons">email</i>
              </div>
              <button type="submit" class="btn btn-primary shadow-none">Reset Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>



  <script src="admin/assets/js/jquery-3.5.0.min.js"></script>
  <script src="admin/assets/js/popper.min.js"></script>
  <script src="admin/assets/js/bootstrap.min.js"></script>
  <script src="admin/assets/js/perfect-scrollbar.js"> </script>
  <script src="admin/assets/js/jquery-ui.min.js"> </script>


  <!-- Costic core JavaScript -->
  <script src="admin/assets/js/framework.js"></script>

  <!-- Settings -->
  <script src="admin/assets/js/settings.js"></script>

</body>


<!-- Mirrored from metropolitanhost.com/themes/themeforest/html/costic/pages/prebuilt-pages/lock-screen.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Aug 2022 11:51:35 GMT -->
</html>
