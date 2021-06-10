<?php
	
session_start();	
	
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));


$sql = "SELECT clientID, client_name, client_matter_description, prac_name FROM client WHERE prac_name LIKE '%$user%' ORDER BY SUBSTRING_INDEX(client_name, ' ', -1)";

$result = mysqli_query($link,$sql);

$users_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $userid = $row['clientID'];
    $name = $row['client_name'];
	$name = explode(' ', $name);
	$count = count($name);
	if ($count == 5) {
		$arr = array($name[4], $name[0]);
		$name = implode(', ', $arr);
		
	}
	else if ($count == 4) {
		$arr = array($name[3], $name[0]);
		$name = implode(', ', $arr);
	}
	else if ($count == 3) {
		$arr = array($name[2], $name[0]);
		$name = implode(', ', $arr);
	}
	else if ($count == 2) {
		$arr = array($name[1], $name[0]);
		$name = implode(', ', $arr);
		
	}

	$matter = $row['client_matter_description'];

    $users_arr[] = array("id" => $userid, "name" => $name, "Matter" => $matter);
}


echo json_encode($users_arr);

?>