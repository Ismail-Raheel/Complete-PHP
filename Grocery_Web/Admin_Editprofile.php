<?php


require('crud.php');



$Error ="";
$Success ="";
$uploaded ="";

$response = select("admin_account",array());

// if(isset($_GET['pid']))
// {
// $id = $_GET['pid'];

// $response = select("discount_product",array('Discount_Product_Id' => $id));

// }


if(isset($_POST['Edit_btn']))
{



    $S_Date = $_POST['S_Date'];
    $E_Date = $_POST['E_Date'];
    $N_Price = $_POST['N_Price'];
    $P_Id = $_POST['P_Id'];
    $D_Id = $_POST['D_Id'];


$response = Update("discount_product",array("Start_Date" => $S_Date, "End_Date" => $E_Date,"Selling_Price" => $N_Price,"Product_Id" => $P_Id),array("Discount_Product_Id" => $D_Id));



if($response['status'] == "Success")
{
  echo"<script>alert('Record Successfully Updated !')</script>";
  echo"<script>window.location='Discount_Product_List.php';</script>";
}




 

}




?>




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











<!-- Body Content Wrapper -->
<div class="ms-content-wrapper ms-auth">

  <div class="ms-auth-container">
    <div class="ms-auth-col">
      <div class="ms-auth-bg"></div>
    </div>
    <div class="ms-auth-col">
      <div class="ms-auth-form">

      <?php  foreach($response["data"] as $row)
                    {
                    ?>
        <form class="needs-validation">

        
<img src="<?= $row['Admin_Image'] ?>" alt="">

          <h3>Update Account </h3>
          <p>Please enter personal information to continue</p>
          <div class="form-row">
            <div class="col-md-12 ">
              <label for="validationCustom01">Full Name</label>
              <div class="input-group">
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="<?= $row['Admin_Name'] ?>" required="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom02"> Email</label>
              <div class="input-group">
                <input type="email" class="form-control" id="validationCustom02"  value="<?= $row['Admin_Email'] ?>" required="">
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-12">
              <label for="validationCustom03">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="validationCustom03" value="<?= $row['Admin_Password'] ?>" placeholder="Email Address" required="">
                <div class="invalid-feedback">
                  Please provide a valid email.
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom01">Select Image</label>
              <div class="input-group">
                <input type="file" class="form-control" id="validationCustom01" placeholder="First name" value="John" required="">
                <div class="valid-feedback">
                  Looks good!
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

        <?php  

                    }
                    ?>

      </div>
    </div>
  </div>

</div>

</main>



<?php

include('Admin_Footer.php')
?>
