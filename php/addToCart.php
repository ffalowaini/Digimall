<?php

  include("../share/connect.php");

 if(isset($_POST["itemID"]) && isset($_POST['userID']) && isset($_POST['quantity'])){
	$itemID = $_POST["itemID"];
  $userID = $_POST['userID'];
  $quantity = $_POST['quantity'];

  $query = "SELECT * FROM cart WHERE ItemID = '$itemID'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
  if($row > 0){
    $quantity += $row['Quantity'];
    $query = "UPDATE cart set Quantity = '$quantity' where ItemID='$itemID'";
  }else {
  $query = "INSERT INTO cart (UserID, ItemID, Status, Quantity) VALUES  ('$userID', '$itemID', 0, '$quantity')";
  }
	$result = mysqli_query($con, $query);
		echo "done";		
 }
	else{
echo 'error';
	}

 

 ?>