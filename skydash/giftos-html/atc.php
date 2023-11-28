<?php
session_start();
include('../pages/samples/conn.php');
$id = $_GET['id'];
$sqlc="SELECT * FROM `products` WHERE p_id = $id";
$r=mysqli_query($conn,$sqlc);
$row=mysqli_fetch_array($r);
$uid=$_SESSION['id'];
$sql="INSERT INTO `add_to_cart`( `c_id`, `p_id`,u_id) VALUES ('$row[3]','$id','$uid')";
mysqli_query($conn,$sql);
header('Location: index.php');
?>