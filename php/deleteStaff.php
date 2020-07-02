<?php

  include("../share/connect.php");

 //if(isset($_POST['UserID'])){
	$userID = $_POST['UserID'];

	$delete_query = "UPDATE user SET userType = 5 WHERE UserID = '$userID';";
	
	mysqli_query($con, $delete_query);

	$update_query = "UPDATE report SET StaffID = null WHERE StaffID = '$userID'";
	mysqli_query($con, $update_query);
	
	//	echo "done";		
 //}
	//else{
//echo 'error';
//	}

 
// UPDATE report SET StaffID = null WHERE UserID = '$userID'
 ?>