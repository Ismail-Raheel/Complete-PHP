<?php

$Student_Id = $_POST["id"];


$conn = mysqli_connect("localhost","root","","test") or die("Connection Failed");

$sql = "SELECT * from students where id = {$Student_Id}";


$result = mysqli_query($conn,$sql) or die("Sql Query Failed");
$ouput = "";

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_assoc($result)){      
        $ouput .= "<tr>
        <td>First Name</td>
        <td><input type='text' id='edit-fname' value='{$row["first_name"]}'></td>    
        <td><input type='text' id='edit-id' hidden value='{$row["id"]}'></td>  
        </tr>  

        <tr>
            <td>Last Name</td>
            <td><input type='text' id='edit-lname' value='{$row["last_name"]}'></td>     
        </tr>  

        <tr>
            <td></td>
            <td><input type='submit' id='edit-submit' value='Save'></td>     
        </tr> ";

    }
    mysqli_close($conn);

    echo  $ouput;
}
else{
    echo "<h2>No Record Found .</h2>";
}



?>