<?php

$conn = mysqli_connect("localhost","root","","test1") or die("Connection Failed");
$sql = "SELECT * FROM students where id = {$_POST['id']}";
$result = mysqli_query($conn,$sql)  or die("Connection Failed");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($output);

// echo "<pre>";
// print_r($output);
// echo "</pre>";








?>