<?php
ini_set("display_errors", "off");
//Connet to the database
session_start();

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1339)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
	echo "<h4 style='color:orange'>!! Your session has timed-out.  Please log back in <span style='vertical-align:text-top'>-</span><span>></span></h4>";
}
else if (!isset($_SESSION['username'])) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
	echo "<p style='color:#DCDCDC'>You are logged out </p>";
}
else if (isset($_SESSION['LAST_ACTIVITY']) && isset($_SESSION['username']))
{
    
}	
	
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


if(isset($_SESSION['username'])) {
$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));

$query = "SELECT * FROM practice";

$result=mysqli_query($link, $query);


		
	
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
{	

	
		$practiceID = $row['practiceID'];
		$practice_name = $row['practice_name'];
		$practice_address = $row['practice_address'];
		$practice_address2 = $row['practice_address2'];
		$description = $row['description'];
		$practice_email = $row['practice_email'];
		$practice_phone = $row['practice_phone'];
		$abn = $row['abn'];

		
		echo "$practice_name";
		
	}

	

echo "</tbody>";
echo "</table>";
echo "</form>";

mysqli_close($link);
}

?>
