<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "products_ismail";

$Connection = new mysqli($serverName,$userName,$password,$dbName);

if($Connection -> connect_error)
{
echo"<h3 style='color:red'> Conection failed </h3>";
}

else
{
    
// echo "<h3 style='color:green'>  Connected successfully!  </h3>";


}


?>