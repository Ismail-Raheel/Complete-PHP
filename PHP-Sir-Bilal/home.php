










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
    <?php
session_start();
if(isset($_SESSION['uname'])){
?>


<a href="logout.php">logout </a>  
     <?php
}
else {
?>    

<a href="login.php"> sign in </a>  

     <?php
}
?>   
</body>
</html>