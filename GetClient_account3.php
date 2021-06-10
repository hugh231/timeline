<?php
	
session_start();	
	
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));


$sql = "SELECT * FROM casex";

$result = mysqli_query($link,$sql);

$users_arr = array();

while($row = mysqli_fetch_array($result) ){
	
    $caseID = $row['caseID'];
    $name = $row['description'];




    $users_arr[] = array("id" => $caseID, "name" => $name);
}





echo json_encode($users_arr);

?>