<?php
session_start();
if(!isset($_SESSION['uname'])){
    header('Location:login.php');

}



if (isset($_POST['a'])){
    include('conn.php');
    $name = $_POST['n'];
    $email = $_POST['e'];
    $dob = $_POST['d'];
    $in = $_FILES['i']['name'];
    $it=$_FILES['i']['tmp_name'];
   
    
    $sql="INSERT INTO `vvv`( `u_name`, `u_email`, `u_dob`,`p_img`) VALUES ('$name','$email','$dob','$it')";
    $result = mysqli_query($conn,$sql);
    move_uploaded_file($it,'uploads/'.$in);
    if ($result){
        echo "<script>alert('insert succeeded');</script>";
    }
    else   {
        echo "<script>alert('insert not succeeded');</script>";
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
    
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="n">
        <input type="text" name="e">
        <input type="date" name="d">
        <input type="file" name="i">
        <input type="submit" value="Add" name="a">
    </form>

     <a href="logout.php"> Logout </a>  
</body>
</html>