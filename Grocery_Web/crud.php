<?php
function conn()
{

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $db = "grocee";

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
    $response["status"] = "Warning";
    $response["message"] = "No data found";

}
else
{
    $response["status"] = "Success";
    $response["message"] = "Dataselect Select From Database";

}

$response ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $response["status"] = "Success";
    $response["message"] =  $e-> getMessage();
    $response["data"] = null;
}
return $response;
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
    $response["status"] = "Warning";
    $response["message"] = "No data found";

}
else
{
    $response["status"] = "Success";
    $response["message"] = "Dataselect Select From Database";

}

$response ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $response["status"] = "Success";
    $response["message"] =  $e-> getMessage();
    $response["data"] = null;
}
return $response;
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
    $response["status"] = "Warning";
    $response["message"] = "No data found";

}
else
{
    $response["status"] = "Success";
    $response["message"] = "Dataselect Select From Database";

}

$response ["data"] = $rows;


} 

catch (PDOException $e)
{
    
    $response["status"] = "Success";
    $response["message"] =  $e-> getMessage();
    $response["data"] = null;
}
return $response;
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
$response['status'] = "Success";
$response["message"] = "<sapn style='color:green'> $rows Inserted into database</sapn>";
$dbh = null;

} 

catch (PDOException $ex)
{  
    $response["status"] = "<sapn style='color:red'>Error !</sapn>";
    $response["message"] = "<sapn style='color:red'>" .$ex-> getMessage(). "</sapn>";
    $response['data'] = null;
   
}


return $response;
$dbh = null;

}



function Update($table,$column,$where)
{


try {
 
  $dbh = conn();
  $a = array();
  $w ="";
  $c ="";
 
  foreach($where as $key => $value)
  {
  $w.="and $key like :$key";
  $a[":$key"]= $value;
  }

  foreach($column as $key => $value)
  {
  $c.="$key = :$key,";
  $a[":$key"]= $value;
  }
 

 $c = rtrim($c,",");

 $stmt = $dbh -> prepare("UPDATE $table SET $c Where 1=1 $w");
 $stmt -> execute($a);
 $AddedRow = $stmt -> rowCount();
 
 
 if($AddedRow <= 0)
 {

 $response['status'] ="<span style='color:blue'>Warning !</span>";
 $response['message'] ="<span style='color:blue'>No data updated</span>";
 
 } 
 
 else
 {

 $response['status'] ="Success";
 $response['message'] = $AddedRow ."row (s) updated in databse";

 
 }

 $response ['data'] = $AddedRow;

 

}



catch (PDOException $ex)
{
  $response['status'] ="<span style='color:red'>Error</span>";
  $response['message'] = "Updatation Failed".$ex -> getMessage();
  $response['data'] = null;
}

return $response;
$dbh = null;

}















function delete($table, $where)
{



    if(count($where) <= 0)
    {
        $response["status"] = "Warning";
        $response["message"] = " Delete failed: At least one condition is required";
    
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
        $response["status"] = "Warning";
        $response["message"] = " No Row Deleted ";

    }
    else
    {
        $response["status"] = "Success";
        $response["message"] = $affected_rows."row (s) Deleted From Database"; 
    }

    }



    catch (PDOException $e)
    {
    
        $response["status"] = "error";
        $response["message"] =  "Delete Failed" .$e-> getMessage();
                
    }

}
return $response;
$dbh = null;

}








?>