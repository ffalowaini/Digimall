<?php header('Access-Control-Allow-Origin: *');
session_start();
if(isset($_SESSION["UserID"])){
$user_session = $_SESSION['UserID'];
echo $user_session;
}
?>