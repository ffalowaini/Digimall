<?php

  include("../share/connect.php");

 if(isset($_POST["StaffID"]) && isset($_POST['ReportID'])){
	$staffID = $_POST["StaffID"];
	$reportID = $_POST['ReportID'];

	$update_query = "UPDATE report SET StaffID = '$staffID', Assigned = 1  WHERE ReportID = '$reportID'";
	$result = mysqli_query($con, $update_query);

	
	echo "done";		
 }
	else{
echo 'error';
	}

 

 ?>