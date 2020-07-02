<?php 
  include("share/connect.php");

  session_start();

  if(isset($_SESSION['StoreID'])){
    $userID = $_SESSION['UserID'];
    $storeID = $_SESSION['StoreID'];
  }
  else {
    $userID = 'unknown';
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
  $userType = 0 ;
  if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID'];
    $query = "SELECT * FROM user where UserID = '$userID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $userType = $row['UserType'];
    if($userType == 1){
      include("share/headerWPC.php");
    }else{
      include("share/headerP.php");
    }
  }else{
     include("share/headerL.php");
   } ?>


  <?php 
  if ($userType == 1 || $userType == 2){
  $query = "SELECT UserID FROM ownedstore where StoreID = '$storeID'";
  $result = mysqli_query($con, $query);
  $row = mysqli_fetch_array($result);
   ?>
  <div class=" shadow-sm float-right" style="width: 90%;background-color: #ffffff;margin-right: 5%;margin-top: 20px;">
    <form action="" method="post">
      <?php if($userType == 2 && $row['UserID'] == $userID){ ?>
      
      <button class="btn btn-primary border-dark mx-5" type="button" onclick="addItem(<?php echo $storeID; ?>)" name="addItem_btn" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a; ">Add Item</button>
      <button class="btn btn-primary border-dark mx-5" type="button" onclick="goToSoldItem(<?php echo $storeID; ?>)" name="addItem_btn" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a; ">Sold Item</button>
      <?php }else { ?>
        <button class="btn btn-primary border-dark mx-5" type="button" onclick="veiwOtherProfile(<?php echo $storeID; ?>)" name="addItem_btn" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a; px-5">View Vendor Profile</button>
        <button class="btn btn-primary border-dark mx-5" type="button" onclick="reportStore(<?php echo $storeID; ?>)" name="addItem_btn" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a; ">Report Store</button>
      <?php } ?>
    </form>
  </div>
  <?php } ?>
  
  
  <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">
        <?php 
          if($storeID == 'unknown'){
            //display error message
            echo "<script> console.log('no store'); </script>" ;
          }
          else{
            echo "<script> console.log('store'); </script>" ;

            $query = "SELECT * FROM item where StoreID = '$storeID'";
            $result = mysqli_query($con, $query);
            $i = 0;

            while($row = mysqli_fetch_array($result)){ 
              $i++;

              if(!($row > 0) ){ ?>
              
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="shadow-sm " data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="height: 150px;background-color: #fffcf5;">
                    <p class="mt-5 text-center"style="font-size: 30px; font-family: Roboto, sans-serif;color: #2a2a2a; margin-top: 50px;">No Item In This Store </p>
                    </div>
                  </div>
            
            <?php }
              echo "<script> console.log('item'); </script>" ;

        ?>
              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="shadow-sm float-left"  data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">
                  <div class="float-left" style="width: 40%;height: 100%;">
                    <div style="height: 85%;">
                      <img onclick="goToItem(<?php echo $row['ItemID']; ?>)" class="border rounded-circle float-left" style="margin-left:10%;" src="assets/item_image/<?php 
                        if($row['Image'] == ''){
                            echo 'default.png';
                        }else {
                        echo $row['Image'];}?>">
                    </div>
                    <?php if($userType == 1){ ?>
                      <div style= "height: 15%;margin-top: -15px;">
                        <img class="" src="assets/img/icons8-wish-list-100.png" onclick="addToWishList(<?php echo $row['ItemID'].',' .$userID; ?>)" style="height: 100%;margin-left: 30px;"/>
                      </div>
                    <?php } ?>
                  </div>

                  <div class="float-right" style="width: 60%;height: 100%;">
                    <div style="height: 85%;">
                      <p style="font-size: 30px;margin-top: 5px;width: 100%;font-family: Roboto, sans-serif;color: #2a2a2a;"> <?php  echo $row['ItemName']; ?> </p>
                      <p style="font-family: Roboto, sans-serif;margin-top: -15px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;"><?php  echo $row['Price'],  " SR"; ?> </p>
                      <p style="font-family: Roboto, sans-serif;margin-top: -5px;margin-buttom: -5px;padding-bottom: 1px; color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">4.5/5</p>
                      <p style="font-family: Roboto, sans-serif;margin-top: -5px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;height: 30%;"><?php 
                        if($row['Description'] == ''){
                          echo 'No description :)';
                        }else{
                          echo $row['Description'];
                        }
                        ?></p>
                      
                    </div>
                    <?php if($userType == 1){ ?>
                      <div style="height: 15%;margin-top: -15px;">
                        <snap id="quantityError-<?php echo $i ?>" class="err hide"> please put a number first </snap>
                        <img class="float-right" src="assets/img/icons8-favorite-cart-100.png" onclick="addToCart(<?php echo $row['ItemID'].',' .$userID . ', ' . $i; ?>)" style="height: 100%;margin-right: 30px;"/>
                        <input id="quantity-<?php echo $i ?>" class="float-right" type="number" style="width: 50px;margin-right: 10px;">
                      </div>
                    <?php } ?>
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


    <div class="button-align" style="height: 5vw;width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.5);">
    </div>

    <?php include("share/footer.php"); ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>