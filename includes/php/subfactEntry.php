<?php
	
session_start();	

$caseID = $_POST['clientID2'];
$_SESSION['caseID'] = $caseID;	

$server="localhost";
$user = $_SESSION['username'];
$passw = $_SESSION['password'];
$database = "timeline";
$link= @mysqli_connect($server,$user,$passw,$database)
or die("Database Error " .mysqli_error($link));

$sql3= "SELECT * FROM casex WHERE caseID = $caseID";

$result3 = mysqli_query($link,$sql3);


while($row = mysqli_fetch_array($result3) ){
	
    $name = $row['description'];
	
}
	echo '<script>
		
		var options_loaded = false;
		$(document).ready(function(){

		    $(".sel_field68").on("keyup click", function(){
	        
				if(options_loaded == true) return;
		        $.ajax({
		            url: "GetClient_account4.php",
		            type: "post",
		            dataType: "json",
		            success:function(response){

		                var len = response.length;

		                $("#sel_user68").empty();
		                for( var i = 0; i<len; i++){
		                    var id2 = response[i]["id2"];
							
		                    var name2 = response[i]["name2"];
							
                    
		                    $("#sel_user68").append("<option value="+id2+">"+name2+"</option>");
						

		                }
						 options_loaded = true;
		            }
		        });
		    });

		});


	</script>';


	






	echo "<table class='table table-striped table-bordered' style='width:650px'>";
	echo "<tbody>";
	
	echo "<tr style='font-weight:bold'>";
	echo "<td>";
	echo "Case: $name";
	echo "</td>";
	echo "<td>";
	echo "Subfact Data Entry";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "Fact <span style='font-size:10px'>(Press tab to enter)</span>";
	echo "<form class='form-horizontal' id='form1' name='form1' method='post' action='subfactEntry_processing.php' data-enctype='multipart/form-data'>";
	echo "</td>";
	echo "<td>";
	echo "<select  name='fact' style='width:460px' class='form-control sel_field68' id='sel_user68' >
            <option value='0'> - Make A Selection -</option>
        </select>";
	echo "</td>";
	echo "</tr>";
	
	
	
	echo "<tr>";
	echo "<td>";
	echo "Subfact";
	echo "</td>";
	echo "<td>";
	echo "<textarea rows='4' cols='60' name='subfact' form='form1' required='required'></textarea>";
	echo "</td>";
	echo "</tr>";

	
	echo "<tr>";
	echo "<td>";
	echo "Time (optional)";
	echo "</td>";
	echo "<td>";
	echo " <input type='time' id='appt' name='time' value='00:00:00'>";
	echo "</td>";
	echo "</tr>";
	
	echo "</tbody>";
	echo "</table>";

	
	echo "<input class='btn' name='submit' type='submit' value='Submit' style='float:left; width:70px;'/>";
	echo "<input class='btn' type ='reset' name='reset' value ='Reset' style='float:left; margin-left:130px; width:70px;'/>";
	echo "<br/><br/></form>";	


	
?>