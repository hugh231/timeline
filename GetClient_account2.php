<?php
	
session_start();	
	
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));


$sql = "SELECT * FROM client WHERE prac_name LIKE '%$user%' ORDER BY SUBSTRING_INDEX(client_name, ' ', -1)";

$result = mysqli_query($link,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
	$Prefix = $row['Prefix'];
    $userid = $row['clientID'];
    $name = $row['client_name'];
	$mobile = $row['client_mobile'];
	$name = explode(' ', $name);
	$count = count($name);

	if ($count == 1 AND $Prefix == 'COR') {
		$arr = array($name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 2 AND $Prefix == 'COR') {
		$arr = array($name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 3 AND $Prefix == 'COR') {
		$arr = array($name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 4 AND $Prefix == 'COR') {
		$arr = array($name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 5 AND $Prefix == 'COR') {
		$arr = array($name[4], $name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 6 AND $Prefix == 'COR') {
		$arr = array($name[5], $name[4], $name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 7 AND $Prefix == 'COR') {
		$arr = array($name[6], $name[5], $name[4], $name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 8 AND $Prefix == 'COR') {
		$arr = array($name[7], $name[6], $name[5], $name[4], $name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	else if ($count == 9 AND $Prefix == 'COR') {
		$arr = array($name[8], $name[7], $name[6], $name[5], $name[4], $name[3], $name[2], $name[1], $name[0]);
		$name = implode(' ', $arr);
		
	}
	
	else if ($count == 6 AND $Prefix == 'PSN') {
		$arr = array($name[5], $name[0]);
		$name = implode(', ', $arr);
		
	}
	else if ($count == 5 AND $Prefix == 'PSN') {
		$arr = array($name[4], $name[0]);
		$name = implode(', ', $arr);
		
	}
	else if ($count == 4 AND $Prefix == 'PSN') {
		$arr = array($name[3], $name[0]);
		$name = implode(', ', $arr);
	}
	else if ($count == 3 AND $Prefix == 'PSN') {
		$arr = array($name[2], $name[0]);
		$name = implode(', ', $arr);
	}
	else if ($count == 2 AND $Prefix == 'PSN') {
		$arr = array($name[1], $name[0]);
		$name = implode(', ', $arr);
		
	}
	else if ($count == 1 AND $Prefix == 'PSN') {
		$arr = array($name[0]);
		$name = implode(', ', $arr);
		
	}


	

	$matter = $row['client_matter_description'];

    $users_arr[] = array("id" => $userid, "name" => $name, "Matter" => $matter);
}


echo json_encode($users_arr);

?>