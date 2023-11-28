<?php
include('../pages/samples/conn.php');
$id = $_GET['id'];
$sql="DELETE FROM `add_to_cart` WHERE atc_id = $id";
mysqli_query($conn,$sql);
header("Location: index.php");
?>