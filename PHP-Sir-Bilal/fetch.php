


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table border="2px">
    <tr>
        <th>NAME</th>
        <th>Email</th>
        <th>DOB</th>
        <th>Image</th>
    </tr>
    <?php
    include('conn.php');
    $selectquery = "SELECT * from vvv";

    $query = mysqli_query($conn,$selectquery);
    
    $nums = mysqli_num_rows($query);
    

    
    while ($row = mysqli_fetch_array($query)){

    
 ?>
 
    <tr>
        <td><?php echo $row["u_name"]  ?></td>
        <td><?php echo $row["u_email"]  ?></td>
        <td><?php echo $row["u_dob"]  ?></td>
        <td><img src="<?php echo 'uploads/'.$row["p_img"] ?>" alt="" srcset="" width="50px" height="50px"></td>
        
    </tr>
   <?php
    }
    
   ?>
   </table>
</body>
</html>