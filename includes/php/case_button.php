<?php

session_start();
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die(mysqli_error($link));


$query = "SELECT * FROM casex";
//Run the mysql query
$result=mysqli_query($link, $query) or die( "unable to find record");

$right = 320;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$caseID = $row['caseID'];
	$description = $row['description'];
	
	
	$first_letter = $description[0];

	
echo "<form method='post' action='index2.php'><input type='hidden' name='caseID' value='$caseID' /><button data-toggle='tooltip' type='submit' data-placement='bottom' title='$description' class='button-modal' style='color:white; background:grey; padding:0px; margin:3px; border-radius:50%; top:7px; right:".$right."px;  width:30px; height:30px; font-size:10px' type='submit'>$first_letter</button></form> ";

$right = ($right+40);
//$right2 = ($right+40);
//echo "<span style='right:".$right2.">Case: </span>";

}

?>