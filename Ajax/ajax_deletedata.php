<?php

$Student_Id = $_POST["id"];


$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "DELETE from students where id = {$Student_Id}";

if(mysqli_query($conn,$sql)){
    echo 1;
}
else{
    echo 0;
}

?>