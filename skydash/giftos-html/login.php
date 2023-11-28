<?php
session_start();
include('../pages/samples/conn.php');
if(isset($_POST['log'])){
    $e=$_POST['email'];
    $p=$_POST['pass'];
    $sql="SELECT * FROM `user_register` WHERE u_email = '$e' AND u_pass = '$p'";
    $result = mysqli_query($conn,$sql);
    $rows= mysqli_num_rows($result);
    $fetch = mysqli_fetch_array($result);
    if($rows){
        $_SESSION['id']= $fetch['u_id'];
        header("Location: index.php");
        // echo "<script>alert(".$_SESSION['id'].")</script>";
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
<input type="email" name="email">
<input type="password" name="pass">
<input type="submit" name="log">
    </form>
</body>
</html>