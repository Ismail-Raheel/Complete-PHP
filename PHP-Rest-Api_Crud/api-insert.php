<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization, X-Requested-With');         // ye security perpose ke liye hai




// X-Requested-With
// yani is page ko insert karne keliey jobhi request aiho wo ajax se iho  


include("config.php");


$data = json_decode(file_get_contents("php://input"),TRUE);   //  yaha data json fomet me mile ga usko hum array ki form me convert karahe hai

$name = $data['sname'];     // or usko yaha read karliya
$age = $data['sage'];
$city = $data['scity'];



$sql = "INSERT INTO students (student_name, age, city) VALUES ('$name',{$age},'{$city}')";

if(mysqli_query($conn,$sql)){

    echo json_encode(array('message' => 'Student Record Inserted..', 'status' => true));
}
else
{
    echo json_encode(array('message' => 'Student Record Not Insert...', 'status' => false));
}



?>