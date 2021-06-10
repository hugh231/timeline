<?php
	
ini_set("display_errors", "off");
session_start();

$caseID = $_POST['caseID'];
$date = explode('-', $_POST['dater']);
$date = $date[2].'-'.$date[1].'-'.$date[0];
$description = $_POST['description'];
$description = preg_replace("/[^A-Za-z0-9,.-@$ ]/", '', $description);


$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));


	


	$query = "CREATE DATABASE IF NOT EXISTS timeline";
	if (!mysqli_query($link,$query))
	{
	echo "<p style='text-align:left; padding-left:105px'>Could not create the database: " .mysqli_error($link)."</p>";
	}
	else
	{
		echo "<p style='text-align:left; padding-left:105px;'></p>";
		
	}




		$query = "CREATE TABLE IF NOT EXISTS fact (factID INT(5) ZEROFILL PRIMARY KEY AUTO_INCREMENT, caseID INT(5) ZEROFILL, dater DATE NOT NULL, description VARCHAR(255) NOT NULL)";
		if (!mysqli_query($link,$query))
		{
		echo "table query failed: " .mysqli_error($link);
		}
		else
			{
			echo "<p style='text-align:left; padding-left:105px;'></p>";



			$insert = "INSERT INTO fact (caseID, dater, description)VALUES('$caseID', '$date', '$description')";
			if (mysqli_query($link,$insert))
				{

				echo "<p style='text-align:left; padding-left:105px'>The fact has been stored  </p>"; 
				echo "<br ><br >";

				}
				else
				{
				echo "<p style='text-align:left; padding-left:105px'>table query failed: " .mysqli_error($link)."</p>";
				}


				


			}
		





mysqli_close($link);
$_SESSION['caseID'] = $caseID;
header('Location:index3.php');	
?>