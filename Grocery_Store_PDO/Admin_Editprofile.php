<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="vendors/iconic-fonts/font-awesome/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="vendors/iconic-fonts/flat-icons/flaticon.css">
  <link rel="stylesheet" href="vendors/iconic-fonts/cryptocoins/cryptocoins.css">
  <link rel="stylesheet" href="vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css">
  <!-- Bootstrap core CSS -->
  <link href="admin/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery UI -->
  <link href="admin/assets/css/jquery-ui.min.css" rel="stylesheet">
  <!-- Page Specific CSS (Slick Slider.css) -->
  <link href="admin/assets/css/slick.css" rel="stylesheet">
  <link href="admin/assets/css/datatables.min.css" rel="stylesheet">
  <!-- Costic styles -->
  <link href="admin/assets/css/style.css" rel="stylesheet">
  <!-- Favicon -->
  <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">







  <main class="body-content">



<!-- Body Content Wrapper -->
<div class="ms-content-wrapper ms-auth">

  <div class="ms-auth-container">
    <div class="ms-auth-col">
      <div class="ms-auth-bg"></div>
    </div>
    <div class="ms-auth-col">
      <div class="ms-auth-form">
        <form class="needs-validation" novalidate="">
          <h3>Update Account </h3>
          <p>Please enter personal information to continue</p>
          <div class="form-row">
            <div class="col-md-6 ">
              <label for="validationCustom01">First name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="John" required="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="col-md-6 ">
              <label for="validationCustom02">Last name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Doe" required="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12 ">
              <label for="validationCustom03">Email Address</label>
              <div class="input-group">
                <input type="email" class="form-control" id="validationCustom03" placeholder="Email Address" required="">
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
            </div>
            <div class="col-md-12 ">
              <label for="validationCustom04">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="validationCustom04" placeholder="Password" required="">
                <div class="invalid-feedback">
                  Please provide a password.
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check pl-0">
              <label class="ms-checkbox-wrap">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required="">
                <i class="ms-checkbox-check"></i>
              </label>
              <span> Agree to terms and conditions </span>
            </div>
          </div>
          <button class="btn btn-primary mt-4 d-block w-100" type="submit">Update Account</button>
          
          <p class="mb-0 mt-3 text-center">Back To  <a class="btn-link" href="Dashboard.php">Dashboard</a> </p>
        </form>

      </div>
    </div>
  </div>

</div>

</main>



<?php

include('Admin_Footer.php')
?>
