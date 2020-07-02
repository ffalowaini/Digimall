<?php
include("../share/connect.php");
session_start();

$otherID = $_POST["otherProfile"];
$_SESSION['OtherProfileID'] = $otherID;
echo "hi";
?>