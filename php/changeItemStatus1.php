<?php 
include("../share/connect.php");
if(isset($_POST["id"]) && isset($_POST['toStatus'])){
$id = $_POST["id"]; 
$toStatus = $_POST['toStatus']; 
$update_query = "UPDATE solditem SET StatusID = '$toStatus' where OrderID = '$id'"; 

$result = mysqli_query($con, $update_query); 
echo "done";
} else{ 
echo 'error'; 
} 
?>