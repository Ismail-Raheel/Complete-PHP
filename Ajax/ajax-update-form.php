<?php
$student_id = $_POST["id"];
$firstname = $_POST["first_name"];
$lastname = $_POST["last_name"];

$conn = mysqli_connect("localhost","root","","test") or die("Connect Failed");

$sql = "UPDATE students SET first_name ='{$firstname}', last_name = '{$lastname}' where id = {$student_id}";


if(mysqli_query($conn,$sql)){ 
    echo 1;
}
else{
    echo 0;
}


?>