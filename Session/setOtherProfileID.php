<?php
include("../share/connect.php");
session_start();

$storeID = $_POST["otherProfile"];
$query = "SELECT UserID FROM ownedStore where StoreID = '$storeID'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$_SESSION['OtherProfileID'] = $row['UserID'];
echo "hi";
?>
