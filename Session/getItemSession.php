<?php header('Access-Control-Allow-Origin: *');
session_start();
$item = $_SESSION["ItemID"];
echo $item;

?>