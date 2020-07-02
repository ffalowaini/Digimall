<?php
  include("share/connect.php");

  session_start();
  

  if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID'];
    $userID = 2 ;

  } else {
    $userID = 2 ;
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




  <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7); margin-top: 80px;">
    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">

        <?php
          if($userID == 'unknown'){
            //display error message
            echo "<script> console.log('no search word'); </script>" ;
          }
          else{

            
            $query = "SELECT StoreID FROM ownedstore where UserID = $userID";
            
            $result = mysqli_query($con, $query);
            $storesIDs = array();
            while($row = mysqli_fetch_array($result)){
              $storesIDs[] = $row['StoreID']; 
            }
            for($i = 0 ; $i < count($storesIDs) ; $i++){
              $query = "SELECT * FROM store where StoreID = '$storesIDs[$i]' ";
              $result = mysqli_query($con, $query);
              $row = mysqli_fetch_array($result)
        ?>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">

              <div class="float-left" style="width: 40%;height: 100%;">
                <img class="border rounded-circle float-left" style="margin-left: 10%;" src="assets/store_logo/<?php echo $row['logo']?>" onclick="goToStore(<?php echo $storesIDs[$i]; ?>)">
                <div class="text-center" style="width: 30%;height: 15%;">
                  <img src="assets/img/icons8-rating-circled-64.png" style="width: 32px;height: 32px;">
                  <label>4.5</label>
                </div>
              </div>

              <div class="float-right" style="width: 60%;height: 100%;">

                <div class="float-right" style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">

                  <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button" style="width: 100%;height: 100%;"></a>

                  <div class="collapse" id="collapse-1" style="background-color: #f8f8f8;width: 150px;margin-left: -106px;">
                    <div class="btn-group-vertical shadow-sm" role="group" style="width: 100%;background-color: #f8f8f8;">
                    
                      <!-- <button class="btn text-left" type="button">Not Interested</button>
                      <a class="btn text-left" role="button" href="Report.html">Report</a> -->
                    </div>
                  </div>
                </div>

                <p style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;"><?php  echo $row['StoreName']; ?></p>

                <p style="width: 90%;font-family: Roboto, sans-serif;margin-top: -3%;color: #2a2a2a;height: 60%;/*text-overflow: ellipsis;*/overflow: auto;"><?php echo $row['Description']; ?> </p>
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

    <div class="text-center float-right" style="height: 100px;width: 90%;background-color: rgba(255,249,219,0.5);margin-right: 5%;margin-top: 0;">
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