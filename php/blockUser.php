<?php

  include("../share/connect.php");

 if(isset($_POST["UserID"]) && isset($_POST['I'])){
	$userID = $_POST["UserID"];
	$i = $_POST['I'];

	$update_query = "UPDATE user SET Blocked = '$i' where UserID = '$userID'";
	$result = mysqli_query($con, $update_query);

	
//		echo "done";		
 }
	else{
//echo 'error';
	}

 

 ?>