<?php
	session_start() ;
	if(isset( $_SESSION['username'] ) AND isset($_SESSION['password'])) {

		
		session_destroy();
		session_unset();
		
	}
	
	header("Location: ../../admin_index.php");

	
	
?>
