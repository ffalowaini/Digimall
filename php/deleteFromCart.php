<?php

  include("../share/connect.php");

 if(isset($_POST["itemID"]) && isset($_POST['userID'])){
	$itemID = $_POST["itemID"];
	$userID = $_POST['userID'];

	$delete_query = "DELETE FROM cart WHERE ItemID = '$itemID' && UserID = $userID";
	$result = mysqli_query($con, $delete_query);

	
		echo "done";		
 }
	else{
echo 'error';
	}

 

 ?>