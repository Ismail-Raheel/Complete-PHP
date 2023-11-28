<?php

$F_Name = $_POST["first_name"];
$L_Name = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "INSERT INTO students(first_name,last_name) VALUES ('{$F_Name}','{$L_Name}')";

if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}

?>