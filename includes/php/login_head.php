<?php
		
		  
		  if ( isset( $_SESSION['username'] ) AND isset( $_SESSION['password'])) {
		      $user = $_SESSION['username'];
			  
			  
			  $server="localhost";
			  $user = $_SESSION['username'];
			  $passw = $_SESSION['password'];
			  $database = "timeline";
			  $link= @mysqli_connect($server,$user,$passw,$database)
			  or die("Database Error " .mysqli_error($link));
			  
			  $query = "SELECT * FROM practitioner WHERE username ='$user'";

			  $result=mysqli_query($link, $query);
			  
			  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
			  {	
				  $first_name = $row['first_name'];
				  $last_name = $row['last_name'];
			  }
			  
			  
			  echo "<p class='text-modal' style='margin-right:120px; color:#F0F0F0'>Practitioner: $first_name $last_name</p>";
			  echo "<form method='post' action='includes/login/logout.php'><button class='button-modal-input' style='width:74px; right:8px; top:7px; background:orange' type='submit' >Logout</button></form>";

		  } else {

		  

		  include('includes/html/modal.html');
		  
		  }
		  
?>