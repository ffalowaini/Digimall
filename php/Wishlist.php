<?php header('Access-Control-Allow-Origin: *'); 
require "Connect.php";

$User_ID = $_POST['session'];

$mysql = "select ItemID from wishlist where UserID = '$User_ID'";
$result = mysqli_query($conn, $mysql);
$wishitem = array(
    'ItemID' => array()
);

while($row = mysqli_fetch_array($result)){
   $wishitem['ItemID'][] = $row['ItemID'];
}


$item = array(
    'name'=> array(),
    'price' => array(),
    'image' => array(),
    'desc'=> array()
);

for($i = 0; $i < count($wishitem['ItemID']); $i++){
   // echo $wishitem['ItemID'][$i];
    $mysql = 'SELECT ItemName,Price,Image,Description from item where ItemID = '.$wishitem["ItemID"][$i].'';
    $result = mysqli_query($conn, $mysql);
    $row = mysqli_fetch_array($result);
    $item['name'][] = $row["ItemName"];
    $item['price'][] = $row["Price"];
    $item['image'][] = $row["Image"];
    $item['desc'][] = $row["Description"];

}
$id = 1;
echo '<div class="float-right"
        style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;     margin-top: 80px;">';

for($i = 0; $i < count($item['name']); $i++){

    echo '
    
        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50"
                        style="width: 100%;height: 180px;margin-top: 60px;background-color: #fffcf5;">
                        <div class="float-left" style="width: 20%;height: 100%;"><img
                                class="border rounded-circle float-left" style="margin-left: 10%;"
                                src="assets/item_image/'.$item['image'][$i].'" onclick="goToItem('. $wishitem["ItemID"][$i] . ')">
                            <div class="text-center" style="width: 30%;height: 15%;"><img
                                    src="assets/img/icons8-rating-circled-64.png"
                                    style="width: 32px;height: 32px;"><label>4.5</label></div>
                        </div>
                        <div class="float-right" style="width: 80%;height: 100%;">
                            <div class="float-right"
                                style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                                <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$id.'"
                                    href="#collapse-'.$id.'" role="button" style="width: 100%;height: 100%;"></a>
                                <div class="collapse" id="collapse-'.$id.'" style="background-color: #f8f8f8;width: 150px;">
                                    <div class="btn-group-vertical shadow-sm" role="group"
                                        style="width: 100%;background-color: #f8f8f8;"><button class="btn text-left"
                                            type="button" onclick="deleteFromWishlist('.$wishitem["ItemID"][$i].', '.$User_ID.')">Delete</button></div>
                                </div>
                            </div>
                            <p
                                style="font-size: 30px;margin-top: 4%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;">
                                '.$item['name'][$i].'</p>
                            <p
                                style="font-family: Roboto, sans-serif;margin-top: -2%;color: #2a2a2a;height: 45%;/*text-overflow: ellipsis;*/overflow: auto;">
                                '.$item['desc'][$i].'</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
    
    ';
    ++$id;
    
}
echo '    </div>';

$conn->close();
?>