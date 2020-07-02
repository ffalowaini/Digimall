<?php header('Access-Control-Allow-Origin: *'); 
require "Connect.php";

$itemID = $_POST["item"];

$select = "select * from item where ItemID = '$itemID'";
$result = mysqli_query($conn, $select);
$item = mysqli_fetch_array($result);
echo json_encode($item);

?>