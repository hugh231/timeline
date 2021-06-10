<?php
	
ini_set("display_errors", "off");
session_start();


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




		$query = "CREATE TABLE IF NOT EXISTS casex (caseID INT(5) ZEROFILL PRIMARY KEY AUTO_INCREMENT, description VARCHAR(255) NOT NULL)";
		if (!mysqli_query($link,$query))
		{
		echo "table query failed: " .mysqli_error($link);
		}
		else
			{
			echo "<p style='text-align:left; padding-left:105px;'></p>";



			$insert = "INSERT INTO casex (description)VALUES('$description')";
			if (mysqli_query($link,$insert))
				{

				echo "<p style='text-align:left; padding-left:105px'>The case has been stored  </p>"; 
				echo "<br ><br >";

				}
				else
				{
				echo "<p style='text-align:left; padding-left:105px'>table query failed: " .mysqli_error($link)."</p>";
				}

			}
		$query = "SELECT MAX(caseID) AS hinum FROM casex";
	    $result=mysqli_query($link, $query) or die( "unable to find record");

		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$hinum = $row['hinum'];
			$_SESSION['caseID'] = $hinum;
		}	


mysqli_close($link);

header('Location:index3.php');	
?>