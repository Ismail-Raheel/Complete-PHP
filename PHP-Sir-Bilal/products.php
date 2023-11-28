<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
</head>
<body>
<div class="row row-cols-1 row-cols-md-3 g-4">
<?php
session_start();
if(!isset($_SESSION['uname'])){
    header('Location:login.php');
}
include('conn.php');
        $fetch="SELECT * FROM `products`";
        $re=mysqli_query($conn,$fetch);
        while($row=mysqli_fetch_array($re)){
        ?>
  <div class="col">
    <div class="card">
   
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['p_name']?></h5>
        <p class="card-text"><?php echo $row['p_price']?></p>
        <a href="cart.php?id=<?php echo $row['p_id']?>" class="btn btn-primary">Add To Cart</a>
      </div>
    </div>
  </div>
  <?php
        }
        ?>
</div>

</body>
</html>