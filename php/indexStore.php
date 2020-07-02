<?php header('Access-Control-Allow-Origin: *'); 
require "Connect.php";

$mysqli = "select * from store";
$result = mysqli_query($conn, $mysqli);
$store = array(
    'StoreID'=> array(),
    'StoreName'=> array(),
    'StoreDesc'=> array(),
    'logo' => array()
);

while($row = mysqli_fetch_array($result)){
    $store['StoreName'][] = $row['StoreName'];
    $store['StoreID'][] = $row['StoreID'];
    $store['StoreDesc'][] = $row['Description'];
    $store['logo'][] = $row['logo'];
    
}
//echo  $store['StoreName'][0];
//echo   $store['StoreID'][0];
//echo  $store['StoreDesc'][0];
//echo  $store['logo'][0];
$conn->close();

echo '
    <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;">
            <div class="container" style="width: 100%;">
                <div class="row" style="width: 100%;">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50"
                            style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">
                            <div class="float-left" style="width: 40%;height: 100%;"><img
                                    class="border rounded-circle float-left" style="margin-left: 10%;"
                                    src="https://digimall.today/assets/store_logo/'.$store["logo"][0].'" onclick="goToStore1(' .$store["StoreID"][0].' )">
                                <div class="text-center" style="width: 30%;height: 15%;"><img
                                        src="assets/img/icons8-rating-circled-64.png"
                                        style="width: 32px;height: 32px;"><label>4.5</label></div>
                            </div>
                            <div class="float-right" style="width: 60%;height: 100%;">
                                <div class="float-right"
                                    style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                                    <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$store['StoreID'][0].'"
                                        href="#collapse-'.$store['StoreID'][0].'" role="button" style="width: 100%;height: 100%;"></a>
                                    <div class="collapse" id="collapse-'.$store['StoreID'][0].'"
                                        style="background-color: #f8f8f8;width: 150px;margin-left: -106px;">
                                        <div class="btn-group-vertical shadow-sm" role="group"
                                            style="width: 100%;background-color: #f8f8f8;"><button class="btn text-left"
                                                type="button">Not Interested</button><a class="btn text-left" role="button"
                                                onclick="reportStore('.$store['StoreID'][0].')">Report</a></div>
                                    </div>
                                </div>
                                <p
                                    style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;" onclick="goToStore1(' .$store["StoreID"][0].' )">
                                    '.$store["StoreName"][0].'</p>
                                <p
                                    style="width: 90%;font-family: Roboto, sans-serif;margin-top: -3%;color: #2a2a2a;height: 60%;/*text-overflow: ellipsis;*/overflow: auto;">
                                    '.$store["StoreDesc"][0].'</p>
                            </div>
                        </div>
                    </div>

';








for($i = 1; $i < count($store['StoreName']); $i++){
    
    
    if($i % 2 == 0){
    echo '
    <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;">
            <div class="container" style="width: 100%;">
                <div class="row" style="width: 100%;">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50"
                            style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">
                            <div class="float-left" style="width: 40%;height: 100%;"><img
                                    class="border rounded-circle float-left" style="margin-left: 10%;"
                                    src="https://digimall.today/assets/store_logo/'.$store["logo"][$i].'" onclick="goToStore1(' .$store["StoreID"][$i].')">
                                <div class="text-center" style="width: 30%;height: 15%;"><img
                                        src="assets/img/icons8-rating-circled-64.png"
                                        style="width: 32px;height: 32px;"><label>4.5</label></div>
                            </div>
                            <div class="float-right" style="width: 60%;height: 100%;">
                                <div class="float-right"
                                    style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                                    <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$store['StoreID'][$i].'"
                                        href="#collapse-'.$store['StoreID'][$i].'" role="button" style="width: 100%;height: 100%;"></a>
                                    <div class="collapse" id="collapse-'.$store['StoreID'][$i].'"
                                        style="background-color: #f8f8f8;width: 150px;margin-left: -106px;">
                                        <div class="btn-group-vertical shadow-sm" role="group"
                                            style="width: 100%;background-color: #f8f8f8;"><button class="btn text-left"
                                                type="button">Not Interested</button><a class="btn text-left" role="button"
                                                 onclick="reportStore('.$store['StoreID'][$i].')">Report</a></div>
                                    </div>
                                </div>
                                <p
                                    style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;" onclick="goToStore1(' .$store["StoreID"][$i].')">
                                    '.$store["StoreName"][$i].'</p>
                                <p
                                    style="width: 90%;font-family: Roboto, sans-serif;margin-top: -3%;color: #2a2a2a;height: 60%;/*text-overflow: ellipsis;*/overflow: auto;">
                                    '.$store["StoreDesc"][$i].'</p>
                            </div>
                        </div>
                    </div>';
    }
    if($i % 2 == 1){
                    echo '<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150"
                            style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">
                            <div class="float-left" style="width: 40%;height: 100%;"><img
                                    class="border rounded-circle float-left" style="margin-left: 10%;"
                                    src="https://digimall.today/assets/store_logo/'.$store["logo"][$i].'" onclick="goToStore1(' .$store["StoreID"][$i].')">
                                <div class="text-center" style="width: 30%;height: 15%;"><img
                                        src="assets/img/icons8-rating-circled-64.png"
                                        style="width: 32px;height: 32px;"><label>4.5</label></div>
                            </div>
                            <div class="float-right" style="width: 60%;height: 100%;">
                                <div class="float-right"
                                    style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                                    <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$store['StoreID'][$i].'"
                                        href="#collapse-'.$store['StoreID'][$i].'" role="button" style="width: 100%;height: 100%;"></a>
                                    <div class="collapse" id="collapse-'.$store['StoreID'][$i].'"
                                        style="background-color: #f8f8f8;width: 150px;margin-left: -106px;">
                                        <div class="btn-group-vertical shadow-sm" role="group"
                                            style="width: 100%;background-color: #f8f8f8;"><button class="btn text-left"
                                                type="button">Not Interested</button><a class="btn text-left" role="button"
                                                onclick="reportStore('.$store['StoreID'][$i].')">Report</a></div>
                                    </div>
                                </div>
                                <p
                                    style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;" onclick="goToStore1(' .$store["StoreID"][$i].')">
                                    '.$store["StoreName"][$i].'</p>
                                <p
                                    style="width: 90%;font-family: Roboto, sans-serif;margin-top: -3%;color: #2a2a2a;height: 60%;/*text-overflow: ellipsis;*/overflow: auto;">
                                    '.$store["StoreDesc"][$i].'<br></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
    }
    }



?>