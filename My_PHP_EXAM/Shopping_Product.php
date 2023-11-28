




<?php






$Error="";
$Success="";
$uploaded="";

require('Connection.php');


if(isset($_POST['Add_Product']))
{

$P_Name = $_POST['P_name'];
$P_Price = $_POST['P_price'];

$P_Image = $_FILES['P_image']['name'];
$P_Image_Tmp = $_FILES['P_image']['tmp_name'];
$P_Image_Folder = 'Image/'.$P_Image;

if(isset($_FILES['P_image']) && $_FILES['P_image']['error'] == 0)
{

$Allowedformet = array(
'jpg' => 'image/jpg',
'JPG' => 'image/JPG',
'JPEG' => 'image/JPEG',
'jpeg' => 'image/jpeg',
'GIF' => 'image/GIF',
'gif' => 'image/gif',
'png' => 'image/png',
'PNG' => 'image/PNG'

);


$FILE_Name = $_FILES['P_image']['name'];
$FILE_Type = $_FILES['P_image']['type'];
$FILE_Size = $_FILES['P_image']['size'];
$FILE_Ext = pathinfo($FILE_Name,PATHINFO_EXTENSION);

if(!array_key_exists($FILE_Ext,$Allowedformet))
{
$Error("Error : Please Select A Valid File Type (JPEG  JPG  GIF PNG)");
}

$MaxSize = 5*1024*1024;

if($FILE_Size > $MaxSize)
{
 $Error("Error : File Size Cannot Exceed 5 MBs");
}

if($Error ="" || in_array($FILE_Type,$Allowedformet))
{


if(file_exists("Image/".$FILE_Name))
{
    
    $message[]  = "$FILE_Name Already Exists in Folder || Could not add the product";  
 
}
else
{   
    move_uploaded_file($P_Image_Tmp,$P_Image_Folder);
    $message[] = 'Product add succesfully';


}



}






}


else
{
 $Error  = "You Must Select File First";  
}






$sql = "INSERT INTO products_ismail (Product_Name,Product_Price,Product_Picture) 
values('$P_Name',$P_Price,'$P_Image')";





if($Connection -> query($sql) == true)
{

    // echo "<h2 style='color:green'>Insert Record successfully</h2>";
}
else
{
    
    echo "<h2 style='color:red'>There's is some Error insertion</h2>";
}



}



?>

<?php
if(isset($_GET['delete']))
{

$PID = $_GET['delete'];
$State = $Connection -> prepare("DELETE FROM products_ismail where Product_Id = ?");
$State -> bind_param("i",$PID);
$State -> execute();

if($State)
{
   $message[] = 'product has been deleted';
}
else
{
   $message[] = 'product could not be deleted';
}

}







     
if(isset($_POST['update_product']))
{


   $update_p_id = $_POST['update_p_id'];
   $update_p_name = $_POST['update_p_name'];
   $update_p_price = $_POST['update_p_price'];
   $update_p_image = $_FILES['update_p_image']['name'];
   $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
   $update_p_image_folder = 'Image/'.$update_p_image; 

    $State = $Connection -> prepare("UPDATE products_ismail SET Product_Name = ?,Product_Price = ?,Product_Picture = ? Where Product_Id = ?");
    $State -> bind_param("sisi",$update_p_name,$update_p_price,$update_p_image,$update_p_id);
    $State -> execute();


    if($State){
       move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
       $message[] = 'product updated succesfully';
       
    }else{
       $message[] = 'product could not be updated';
     
    }



};



?>







<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>
 




<div class="container">

<section>
<form action="Shopping_Product.php" class="add-product-form" method="POST" enctype="multipart/form-data">
<h3>Add A New Product</h3>
<input type="text" name="P_name" placeholder="Enter The Product Name" class="box" required>
<input type="number" name="P_price" min="0" placeholder="Enter The Product Price" class="box" required>
<input type="file" name="P_image"  accept="image/png, image/jpg, image/jpeg, image/gif" class="box" required>
<input type="submit" value="Add The Product" name="Add_Product" class="btn">
</form>
</section>




<section class="display-product-table">

   <table>

      <thead>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Product Price</th>
         <th>Operations</th>
      </thead>

      <tbody>
<?php 


$sql = "SELECT Product_Id,Product_Name,Product_Price,Product_Picture from products_ismail";

$Result = $Connection -> query($sql); 



if($Result -> num_rows > 0)
{
while($ac = $Result -> fetch_assoc())
{



?>    

         <tr>
            <td><img src="Image/<?php echo $ac['Product_Picture'];?>"height="100" alt=""></td>
            <td><?php echo $ac['Product_Name']?></td>
            <td><?php echo $ac['Product_Price']?></td>
            <td>
               <a href="Shopping_Product.php?delete=<?php echo $ac['Product_Id']?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="Shopping_Product.php?edit=<?php echo $ac['Product_Id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

<?php 
} 
}
else
{
   echo "<div class='empty'>no product added</div>";
}
?>       
        </tbody>
   </table>
</section>


<section class="edit-form-container">

   <?php
      

   if(isset($_GET['edit']))
      
   {
   $PID = $_GET['edit'];
   $State = $Connection -> prepare("SELECT * FROM products_ismail Where Product_Id = ?");
   $State -> bind_param("i",$PID);
   $State -> execute();
   $RES = $State -> get_result();
   $Record = $RES -> fetch_assoc();
      
     
   ?>

   <form action="Shopping_Product.php" method="post" enctype="multipart/form-data">
      <img src="Image/<?php echo $Record['Product_Picture']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $Record['Product_Id']?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $Record['Product_Name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $Record['Product_Price']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the prodcut" name="update_product" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>
<?php


   echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
     
};
?>


</section>

</div>








</body>
<script src="Script.js"></script>
</html>