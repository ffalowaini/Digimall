<?php
$dbname = "digimall";
$username = "root";
$password = "";
$server_name = "localhost";



$conn = mysqli_connect($server_name, $username,$password, $dbname);

if($conn){
	//echo "Connect";
}
else {
	//echo "failed";
}










?>