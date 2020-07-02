
<?php
  session_start();
  include("share/connect.php");
  if(isset($_SESSION['StoreID'])){
    $storeID = $_SESSION['StoreID'];
  }else {
    $storeID = 'unknown';  //just for testting
  }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>DigiMall_AllPages</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Ionicons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pacifico">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,500,900">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body style="background-color: #fffcf5;">
    <?php
        include("share/headerP.php");
    ?>

  
  <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;margin-top: 80px;">
    <div class="container">
      <div class="row" style="width: 100%;">

        <?php 
          if($storeID == 'unknown'){
            //display error message
            echo "<script> console.log('no id '); </script>" ;
          }
          else{
            echo "<script> console.log('id'); </script>" ;

            $query = "SELECT * FROM solditem where StoreID = '$storeID' && (StatusID = 1 || StatusID = 3)";
            $result = mysqli_query($con, $query);
            $i = 0;
            while($row = mysqli_fetch_array($result)){ 
              $i++;
              $itemStaus = $row['StatusID'];
              $itemID = $row['ItemID'];
              $query = "SELECT * FROM item where ItemID = '$itemID'";
              $itemResult = mysqli_query($con, $query);
              $itemRow = mysqli_fetch_array($itemResult);
        ?>
          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
            <div class="shadow-sm " data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="height: 180px;margin-top: 60px;background-color: #fffcf5;">

              <div class="float-left" style="width: 20%;height: 100%;">
                <img class="border rounded-circle float-left" style="margin-left: 10%;" src="assets/item_image/<?php 
                    if($itemRow['Image'] == ''){
                        echo 'default.png';
                    }else {
                    echo $itemRow['Image'];}?>" onclick="goToItem(<?php echo $itemID; ?>)">

                <div class="text-center" style="width: 100%;height: 15%;margin-left: 0;">
                  <div class="ItemStatus">
                    <p style="margin-bottom: 0;">Status :</p>
                    
                    <?php 
                    if($itemStaus == 1)
                    {echo "<p style='color: Green;'>Accepted</p>";}
                    else if($itemStaus == 3)
                    {echo "<p style='color: orange;'>Pending</p>";}
                    ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="float-right" style="width: 80%;height: 100%;">
              
                <div class="float-right" style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                  <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-<?php echo $i ?>" href="#collapse-<?php echo $i ?>" role="button" style="width: 100%;height: 100%;"></a>

                  <div class="collapse" id="collapse-<?php echo $i ?>" style="background-color: #f8f8f8;width: 150px;">
                    <div class="btn-group-vertical shadow-sm" role="group" style="width: 100%;background-color: #f8f8f8;">
                        <button class='btn text-left' type='button' onclick="veiwOtherProfileC(<?php echo $row['UserID']; ?> )">Veiw Customer Profile</button>
                        <button class='btn text-left' type='button' onclick="reportVendor(<?php echo $row['UserID']; ?> )">Report Customer</button>
                        
                      <?php 
                      if($itemStaus == 1)
                      {echo "<button class='btn text-left' type='button' onclick=" . 'changeItemStatus1(4,' .$row['OrderID']. ")>Delivered</button>";}
                      else if($itemStaus == 3)
                      {echo "<button class='btn text-left' type='button' onclick='" . 'changeItemStatus1(1, ' .$row['OrderID']. ")'>Accepte</button>
                        <button class='btn text-left' type='button' onclick='" . 'changeItemStatus1(2, ' .$row['OrderID']. ")'>Reject</button>";}
                      ?>
                      
                    </div>
                  </div>
                </div>
                
                <p class="TitleSmall" style="font-size: 30px;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;margin-top: 20px;">
                <?php 
                echo $itemRow['ItemName']; ?>
                </p>

                <p class="DescHide" style="font-family: Roboto, sans-serif;margin-top: -2%;color: #2a2a2a;height: 45%;/*text-overflow: ellipsis;*/overflow: auto;">
                <?php 
                if($itemRow['Description'] == ''){
                  echo 'No description :)';
                }else{
                  echo $itemRow['Description'];
                }
                ?>
                <br></p>

              </div>
            </div>
          </div>

        
          <?php
            }
          }
          ?>

      </div>
    </div>
  </div>
      

  <div class="text-center float-right" style="height: 145px;width: 90%;background-color: rgba(255,249,219,0.5);margin-right: 5%;margin-top: 0;">
    <div class="btn-group" role="group" style="margin-top: 36px;"><button class="btn btn-primary border-dark" type="button" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a;">Back</button><button class="btn btn-primary border-dark" type="button" style="color: #2a2a2a;background-color: rgba(255,249,219,0.5);">Next</button></div>
  </div>

  <?php include("share/footer.php"); ?>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>