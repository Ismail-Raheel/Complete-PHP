<?php
session_start();
if(!isset($_SESSION['uname'])){
    header('Location:login.php');
}

include('conn.php');
$id= $_GET['id'];
$sql="SELECT * FROM `products` where p_id = $id";
$re=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($re);

if (isset($_POST['cart'])){
  
    $pid = $_POST['p_id'];
    $qty = $_POST['qty'];
    $tprice = $_POST['tprice'];
    $uid = $_SESSION['lid'];
   
    
    $sql1="INSERT INTO `cart`(`p_id`, `u_id`, `p_qty`, `c_total`) VALUES ('$pid','$uid','$qty','$tprice')";
    $result = mysqli_query($conn,$sql1);

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
    
    <form method="post">
        <input type="hidden" name="p_id" value="<?php echo $row['p_id']?>">
        <p><?php echo $row['p_name']?></p>

        <input type="number" id="q" name="qty" value="1" min="1" onchange="update()">
        <input type="number" id="p" name="price" disabled value="<?php echo $row['p_price']?>">
        <input type="number" id="tp" name="tprice" readonly>
        <input type="submit" value="Add" name="cart">
    </form>
  
     <a href="logout.php"> Logout </a>  
</body>
<script>
    function update(){
        var price = document.getElementById('p').value;
        var qty= document.getElementById('q').value;
        var tp= +price * +qty;
        document.getElementById('tp').value=tp;
       
    }
    update();
</script>
</html>