<?php


$server="localhost";
$user = $_POST['username'];
$user = preg_replace("/[^A-Za-z0-9_ ]/", '', $user);
$passw=$_POST['password'];
$database = "timeline";
$key = "$2a$07$9372859384936485327593647$";
$password = crypt($passw, $key);

echo $password;
$link= @mysqli_connect($server,$user,$password,$database)
or die("Your username or password are incorrect.  You do not have authority to enter this part of the website. Go back " .@mysqli_error($link));
echo $password;

if (($user=="") || ($passw=="")) {
	
	header("Location: login2.php");
  
}
else
	{   
	session_start();
	$PHPSESSID = session_id();
	$_SESSION['username'] = $user;
	$_SESSION['password'] = $password;
	$_SESSION['caseID'] = sprintf('%05d', 00001);
	header('Location: index3.php');
	
}
mysqli_close($link);
?>
