<?php
function conn()
{

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "my_db";

try {
 $dbh = new PDO("mysql: host=$hostname;dbname=$db",$username,$password);
 return $dbh;
} 
catch (PDOException $e)
{
  
echo $e-> getMessage();

}

}



function select($table, $where)
{

try {
   $dbh = conn();
   $a = array();
   $w ="";

foreach ($where as $key => $value) {
    
    $w.=" and  $key = :$key";
    $a[":$key"] =  $value;


}

$stmt = $dbh -> prepare("Select * from $table where 1=1 $w");
$stmt -> execute($a);
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
if(count($rows) <= 0)
{
    $respose["status"] = "Warning";
    $respose["message"] = "No data found";

}
else
{
    $respose["status"] = "Success";
    $respose["message"] = "Dataselect Select From Database";

}

$respose ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $respose["status"] = "Success";
    $respose["message"] =  $e-> getMessage();
    $respose["data"] = null;
}
return $respose;
$dbh = null;

}







function selectJoins($table1, $table2, $columnTable1, $columnTable2, $where)
{

try {
   $dbh = conn();
   $a = array();
   $w ="";

foreach ($where as $key => $value) {
    
    $w.=" and  $key = :$key";
    $a[":$key"] =  $value;


}

$stmt = $dbh -> prepare("Select * from $table1, $table2 where $table1.$columnTable1 = $table2.$columnTable2 and 1=1 $w");
$stmt -> execute($a);
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
if(count($rows) <= 0)
{
    $respose["status"] = "Warning";
    $respose["message"] = "No data found";

}
else
{
    $respose["status"] = "Success";
    $respose["message"] = "Dataselect Select From Database";

}

$respose ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $respose["status"] = "Success";
    $respose["message"] =  $e-> getMessage();
    $respose["data"] = null;
}
return $respose;
$dbh = null;

}








function selectPriceFilter($table, $where, $start, $end)
{

try {
   $dbh = conn();
   $a = array();
   $w ="";

foreach ($where as $key => $value) {
    
    $w.=" and  $key = :$key";
    $a[":$key"] =  $value;


}

$stmt = $dbh -> prepare("Select * from $table where 1=1 $w and Product_Price BETWEEN $start and $end");
$stmt -> execute($a);
$rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
if(count($rows) <= 0)
{
    $respose["status"] = "Warning";
    $respose["message"] = "No data found";

}
else
{
    $respose["status"] = "Success";
    $respose["message"] = "Dataselect Select From Database";

}

$respose ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $respose["status"] = "Success";
    $respose["message"] =  $e-> getMessage();
    $respose["data"] = null;
}
return $respose;
$dbh = null;

}











function insert($table, $columns)
{
try {
    
    $dbh = conn();
    $a = array();
    $c ="";  
    $v ="";



    foreach ($columns  as $key => $value) {
    
        $c.="$key,";
        $v.=":$key,";
        $a[":$key"] = $value;
    
    
    }

$c =rtrim($c,",");
$v =rtrim($v,",");

$stmt = $dbh -> prepare("INSERT INTO $table ($c) VALUES ($v)");
$stmt -> execute($a);
$rows = $stmt -> rowCount();
$respose['status'] = "Success";
$respose["message"] = "<sapn style='color:green'> $rows Inserted into database</sapn>";
$dbh = null;

} 

catch (PDOException $ex)
{  
    $respose["status"] = "<sapn style='color:red'>Error !</sapn>";
    $respose["message"] = "<sapn style='color:red'>" .$ex-> getMessage(). "</sapn>";
    $respose['data'] = null;
   
}


return $respose;
$dbh = null;

}




function update($table, $columns, $where)
{

    try {

       $dbh = conn();
       $a =  array();    
       $c ="";  
       $w ="";


       foreach ($where as $key => $value) {
    
        $w.=" and  $key = :$key";
        $a[":$key"] =  $value;
    
    
    } 


       foreach ($columns  as $key => $value) {
    
        $c.="$key = :$key,";     
        $a[":$key"] = $value;
    
  
    }

$c =rtrim($c,",");


$stmt = $dbh -> prepare("UPDATE $table SET $c WHERE 1=1 $w");
$stmt -> execute($a);
$rows = $stmt -> rowCount();

if($rows <= 0)
{
    $respose["status"] = "Warning";
    $respose["message"] = "No data Updated";

}
else
{
    $respose["status"] = "Success";
    $respose["message"] = "$rows Updated in database";

}



    } 
    
    catch (PDOException $e)
    { 
        $respose["status"] = "<sapn style='color:red'>Error !</sapn>";
        $respose["message"] = "<sapn style='color:red'>" .$e-> getMessage(). "</sapn>";
        $respose['data'] = null;
    
    }
    return $respose;
    $dbh = null;


}














function delete($table, $where)
{



    if(count($where) <= 0)
    {
        $respose["status"] = "Warning";
        $respose["message"] = " Delete failed: At least one condition is required";
    
    }
    else
    {


        try {
            $dbh = conn();
            $a = array();
            $w ="";


            foreach ($where as $key => $value) {
    
                $w.=" and  $key = :$key";
                $a[":$key"] =  $value;
            
            
            }

            
    $stmt = $dbh -> prepare("DELETE from $table where 1=1 $w");
    $stmt -> execute($a);
    $affected_rows = $stmt -> rowCount();

    if($affected_rows <= 0)
    {
        $respose["status"] = "Warning";
        $respose["message"] = " No Row Deleted ";

    }
    else
    {
        $respose["status"] = "Success";
        $respose["message"] = $affected_rows."row (s) Deleted From Database"; 
    }

    }



    catch (PDOException $e)
    {
    
        $respose["status"] = "error";
        $respose["message"] =  "Delete Failed" .$e-> getMessage();
                
    }

}
return $respose;
$dbh = null;

}








?>