<?php

  include("../share/connect.php");

 if(isset($_POST["ReportID"])){
	$reportID = $_POST["ReportID"];

	$update_query = "UPDATE report SET ReportStatus = 2 where ReportID = '$reportID'";
	$result = mysqli_query($con, $update_query);

	
		echo "done";		
 }
	else{
echo 'error';
	}

 

 ?>