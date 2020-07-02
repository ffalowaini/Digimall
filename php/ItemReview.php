<?php header('Access-Control-Allow-Origin: *'); 

require "Connect.php";

$itemName = $_POST["itemName"];
$itemArray = array(
    "name"=> array(),
    "review"=> array()
);

$selectItemId = "select ItemID from item where ItemName = '$itemName'";
$result = mysqli_query($conn,$selectItemId);
$row = mysqli_fetch_array($result);
$itemID = $row["ItemID"];



$selectUserID = "select UserID from reviewproduct where itemID='$itemID'";
$result = mysqli_query($conn,$selectUserID);

$userIDArray = array();

while($row = mysqli_fetch_array($result)){

array_push($userIDArray, $row[0]);
}


echo '<div class="col">';
for($i = 0; $i < count($userIDArray); $i++){
$selectUser = "select Username from user where UserID='$userIDArray[$i]'";
$result = mysqli_query($conn,$selectUser);
$row1 = mysqli_fetch_array($result);
$userName = $row1["Username"];

$selectReivew = "select Review from reviewproduct where UserID = '$userIDArray[$i]' and ItemID = '$itemID'";
$result = mysqli_query($conn,$selectReivew);
$row2 = mysqli_fetch_array($result);
$review = $row2["Review"];




echo '
<div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="background-color: #fffcf5;width: 100%;margin-top: 40px;">
 <p id='.$userName.'> Name: '.$userName.'</p>
 <p id='.$review.'>Review: '.$review.'</p>
</div>';

}
echo '</div>';




?>