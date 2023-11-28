<?php
session_start();

if (isset($_POST['sub'])){

include('conn.php');
$uname=$_POST['uname'];
$pass = $_POST['upass'];
$sql = "SELECT * FROM login WHERE `l_name` = '$uname' AND `l_pass` = '$pass'";
$result = mysqli_query($conn,$sql);
$rr = mysqli_fetch_array($result);
$rows= mysqli_num_rows($result);

if ($rows){


    $_SESSION['uname'] = $uname;
    $_SESSION['lid'] = $rr['l_id'];
    header('Location:home.php');
}
else{
    print_r($rows);
    echo "<script>
    alert('Invalid credentials');
</script>";
}
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <form method="post">
        <input type="text" name="uname">
        <input type="password" name="upass">
        <input type="submit" name="sub">
    </form>
</body>
</html>