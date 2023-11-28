<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$data = json_decode(file_get_contents("php://input"),TRUE);

$Student_Id = $data['sid'];

include("config.php");

$sql = "SELECT * from students where id = {$Student_Id}";
$result = mysqli_query($conn,$sql) or die ("Connection Failed.");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}
else
{
    echo json_encode(array('message' => 'No Record found.', 'status' => false));
}



?>
