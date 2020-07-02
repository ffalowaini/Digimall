<?php
include("../share/connect.php");

$storeID = $_POST['storeID'];

$query = "SELECT * from item where StoreID = '$storeID'";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
    echo "<option value = " . $row['ItemID'] . ">" . $row['ItemID'] . " - " . $row['ItemName'];
}
