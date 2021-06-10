<?php
	
session_start();	
	
$caseID = $_SESSION['caseID'];
	
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));


	
$sql2 = "SELECT * FROM fact WHERE caseID = $caseID";

$result2 = mysqli_query($link,$sql2);

$users_arr = array();

while($row = mysqli_fetch_array($result2) ){
	
    $userid2 = $row['factID'];
	$caseID = $row['caseID'];
    $name2 = $row['description'];
	
    $users_arr[] = array("id2" => $userid2, "name2" => $name2);
}


echo json_encode($users_arr);

?>