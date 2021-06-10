<?php
	
ini_set("display_errors", "off");
session_start();

$caseID = $_SESSION['caseID'];
$factID = $_POST['fact'];

$time = $_POST['time'];
$subfact = $_POST['subfact'];
$subfact = preg_replace("/[^A-Za-z0-9,.-@$ ]/", '', $subfact);


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


		$query = "CREATE TABLE IF NOT EXISTS subfact (subfactID INT(5) ZEROFILL PRIMARY KEY AUTO_INCREMENT, caseID INT(5) ZEROFILL, factID INT(5) ZEROFILL NOT NULL, timer TIME DEFAULT '00:00:00', subfact VARCHAR(455) NOT NULL)";
		if (!mysqli_query($link,$query))
		{
		echo "table query failed: " .mysqli_error($link);
		}
		else
			{
			echo "<p style='text-align:left; padding-left:105px;'></p>";



			$insert = "INSERT INTO subfact (caseID, factID, timer, subfact)VALUES('$caseID', '$factID', '$time', '$subfact')";
			if (mysqli_query($link,$insert))
				{

				echo "<p style='text-align:left; padding-left:105px'>The subfact has been stored  </p>"; 
				echo "<br ><br >";

				}
				else
				{
				echo "<p style='text-align:left; padding-left:105px'>table query2 failed: " .mysqli_error($link)."</p>";
				}


				


			}
		

mysqli_close($link);
$_SESSION['caseID'] = $caseID;
header('Location:index3.php');	
?>