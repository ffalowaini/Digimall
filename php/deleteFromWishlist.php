<?php

  include("../share/connect.php");

 if(isset($_POST["ItemID"]) && isset($_POST['UserID'])){
	$itemID = $_POST["ItemID"];
	$userID = $_POST['UserID'];

	$delete_query = "DELETE FROM wishlist WHERE ItemID = '$itemID' && UserID = $userID";
	$result = mysqli_query($con, $delete_query);

	
	//	echo "done";		
 }
	else{
//echo 'error';
	}

 

 ?>