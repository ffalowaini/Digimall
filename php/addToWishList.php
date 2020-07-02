<?php

  include("../share/connect.php");

 if(isset($_POST["itemID"]) && isset($_POST['userID'])){
	$itemID = $_POST["itemID"];
  $userID = $_POST['userID'];

  $query = "SELECT * FROM wishlist WHERE ItemID = '$itemID'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  if($row > 0){
    
  }else {
  $query = "INSERT INTO wishlist (UserID, ItemID) VALUES  ('$userID', '$itemID')";
  mysqli_query($con, $query);
  } 
		echo "done";		
 }
	else{
echo 'error';
	}

 

 ?>