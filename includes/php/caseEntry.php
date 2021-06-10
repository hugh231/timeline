<?php
	


	

	echo '<script>
		
		var options_loaded = false;
		$(document).ready(function(){

		    $(".sel_field").on("keyup click", function(){
	        
				if(options_loaded == true) return;
		        $.ajax({
		            url: "GetClient_account4.php",
		            type: "post",
		            dataType: "json",
		            success:function(response){

		                var len = response.length;

		                $("#sel_user").empty();
		                for( var i = 0; i<len; i++){
		                    var id = response[i]["id"];
							var name2 = response[i]["username"];
		                    var name = response[i]["name"];
							var mat = response[i]["Matter"];
                    
		                    $("#sel_user").append("<option value="+id+">"+name+" -- "+mat+"</option>");
						

		                }
						 options_loaded = true;
		            }
		        });
		    });

		});


	</script>';










	echo "<table class='table table-striped table-bordered'>";
	echo "<tbody>";
	
	echo "<tr style='font-weight:bold'>";
	echo "<td>";
	echo "McLean Santoro Lawyers";
	echo "</td>";
	echo "<td>";
	echo "Case Data Entry";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "Client ID <span style='font-size:10px'>(Press tab to enter)</span>";
	echo "<form class='form-horizontal' id='form1' name='form1' method='post' action='telephoneEntry_processing.php' data-enctype='multipart/form-data'>";
	echo "</td>";
	echo "<td>";
	echo "<select  name='clientID' style='width:460px' class='form-control sel_field' id='sel_user' >
            <option value='0'> - Make A Selection -</option>
        </select>";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "Date";
	echo "</td>";
	echo "<td>";
	echo "<input name='dater' id='datepicker2' form='form1' required='required' autocomplete='off'></input>";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>";
	echo "From";
	echo "</td>";
	echo "<td>";
	echo "<textarea rows='2' cols='50' name='text1' form='form1' required='required' ></textarea>";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>";
	echo "To";
	echo "</td>";
	echo "<td>";
	echo "<textarea rows='2' cols='50' name='text2' form='form1' required='required' ></textarea>";
	echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>";
	echo "Body";
	echo "</td>";
	echo "<td>";
	echo "<textarea rows='20' cols='80' name='body' form='form1' required='required' ></textarea>";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>";
	echo "Duration";
	echo "</td>";
	echo "<td>";
    echo "<select  name='duration' style=' width:180px' class='form-control' data-toggle='dropdown'>
            <option value='0'> - Make A Selection - </option>
			<option value='6'>6 minutes</option>
			<option value='12'>12 minutes</option>
			<option value='18'>18 minutes</option>
			<option value='24'>24 minutes</option>
			<option value='30'>30 minutes</option>
			<option value='36'>36 minutes</option>
			<option value='42'>42 minutes</option>
			<option value='48'>48 minutes</option>
			<option value='54'>54 minutes</option>
			<option value='60'>60 minutes</option>
        </select>";
	echo "</td>";
	echo "</tr>";
	
	
	
	
	echo "</tbody>";
	echo "</table>";

	
	echo "<input class='btn' name='submit' type='submit' value='Submit' style='float:left; width:70px;'/>";
	echo "<input class='btn' type ='reset' name='reset' value ='Reset' style='float:left; margin-left:130px; width:70px;'/>";
	echo "<br/><br/></form>";	


	
?>