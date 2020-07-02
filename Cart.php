<?php 
  include("share/connect.php");

  session_start();
  $totalPrice = 0;
  if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID'];
    //$userID = 1;

  }
  else {
    $userID = 'unknown';
  }
  if(isset($_POST['buy_btn'])){
    $city = $_POST['address'];
    $address = $_POST['address_text'];
    $address_more = $_POST['address_details'];

    $query = "SELECT * FROM cart where UserID = '$userID'";
    $result = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($result)){
      $itemID = $row['ItemID'];
      $query = "SELECT * FROM item where ItemID = '$itemID' ";
      $item_result = mysqli_query($con, $query);
      $item = mysqli_fetch_array($item_result);
      $storeID = $item['StoreID'];
      $totalPrice = ($item['Price'] * $row['Quantity']);
      $itemID = $item['ItemID'];
      $quantity = $row['Quantity'];
      $insert_query = "INSERT into purchaseditem (StoreID, ItemID, UserID, Date, Quantity, TotalPrice, StatusID, OrderID) VALUES ('$storeID', '$itemID', '$userID', curdate(), '$quantity', '$totalPrice', 3, Null)";
      mysqli_query($con, $insert_query);

      $insert_query = "INSERT into solditem (StoreID, UserID, ItemID, Date, Quantity, TotalPrice, StatusID, OrderID, City, Address, AddressMore) VALUES ('$storeID', '$userID', '$itemID', curdate(), '$quantity', '$totalPrice', 3, Null, '$city', '$address', '$address_more')";
      mysqli_query($con, $insert_query);

      $delete_query = "DELETE FROM cart WHERE ItemID = '$itemID' && UserID = $userID";
	    mysqli_query($con, $delete_query);
    }
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
    include("share/headerWP.php");
  ?>


  <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;margin-top: 80px;">
    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">

        <?php 
          if($userID == 'unknown'){
           //display error message
            echo "<script> console.log('no store'); </script>" ;
          }
          else{
            echo "<script> console.log('store'); </script>" ;

            $query = "SELECT * FROM cart where UserID = '$userID'";
            $result = mysqli_query($con, $query);
            $i = 0;
            $inCart = false;
            while($row = mysqli_fetch_array($result)){
              $i++;
              $inCart = true;
              echo "<script> console.log('item'); </script>" ;
              $itemID = $row['ItemID'];
              $query = "SELECT * FROM item where ItemID = '$itemID' ";
              $item_result = mysqli_query($con, $query);
              $item = mysqli_fetch_array($item_result);
              $totalPrice += ($item['Price'] * $row['Quantity']);
        ?>

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="shadow-sm float-left"  data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">
            <div class="float-left" style="width: 30%;height: 100%;">
              <div style="height: 85%;">
                <img onclick="goToItem(<?php echo $row['ItemID']; ?>)" class="border rounded-circle float-left" style="margin-left:10%;" src="assets/item_image/<?php 
                  if($item['Image'] == ''){
                    echo 'default.png';
                  }else {
                    echo $item['Image'];}?>">
              </div>
              <div style= "height: 15%;margin-top: -15px;">
                <img class="" src="assets/img/icons8-wish-list-100.png"  onclick="addToWishList(<?php echo $row['ItemID'].',' .$userID; ?>)" style="height: 100%;margin-left: 30px;"/>
              </div>
            </div>

            <div class="float-right" style="width: 70%;height: 100%;">
              <div class="float-right" style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                  <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-<?php echo $i ?>" href="#collapse-<?php echo $i ?>" role="button" style="width: 100%;height: 100%;"></a>

                  <div class="collapse" id="collapse-<?php echo $i ?>" style="background-color: #f8f8f8;width: 150px;">
                    <div class="btn-group-vertical shadow-sm" role="group" style="width: 100%;background-color: #f8f8f8;"><button class='btn text-left' type='button' onclick="deleteFromCart(<?php echo $row['ItemID'].',' .$userID; ?>)">Delete</button>
                                   
                    </div>
                  </div>
              </div>

              <div class="mt-5" style="height: 85%;">
                <p style="font-size: 30px;margin-top: 5px;width: 100%;font-family: Roboto, sans-serif;color: #2a2a2a;"> <?php  echo $item['ItemName']; ?> </p>
                <p style="font-family: Roboto, sans-serif;margin-top: -15px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">Price: <?php  echo $item['Price']; ?> </p>
                <p style="font-family: Roboto, sans-serif;margin-top: -15px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">Quantity: <?php  echo $row['Quantity']; ?> </p>
                <p style="font-family: Roboto, sans-serif;margin-top: -15px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">Total: <?php  echo ($item['Price'] * $row['Quantity']); ?> </p>
                <p style="font-family: Roboto, sans-serif;margin-top: -5px;margin-buttom: -5px;padding-bottom: 1px; color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">4.5/5</p>
                <!-- <p style="font-family: Roboto, sans-serif;margin-top: -5px;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;height: 30%;"><?php 
                // if($item['Description'] == ''){
                //   echo 'No description :)';
                // }else{
                //   echo $item['Description'];
                // }
                ?></p> -->
                      
              </div>
              
            </div>
          </div>
        </div>
      

                <?php
            }
          }
            ?>


        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
          <div class="shadow-sm " data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="height: 150px;background-color: #fffcf5;">
            <p class="mt-5 text-center"style="font-size: 30px; font-family: Roboto, sans-serif;color: #2a2a2a; margin-top: 50px;"><?php
             if ($inCart){ 
               ?>Total Price: <b><?php  echo $totalPrice; ?></b>
               <?php } else { ?>Nothings in Your Cart Yet </p>
          </div>
        </div>
        <?php } ?>


      </div>
    </div>
  </div>
   

  
  <form data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" action="" method="post">

    <div class="contact-clean" style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.5);">
      <div class="mx-auto buy_form" >

        <h2 class="text-left" style="padding-left: 5%;">Address</h2>
        <select class="form-control" name="address" style="margin-bottom: 16px;" required>
          <option hidden disabled selected value> -- select a city -- </option>
          <option value="1">Riyadh</option>
          <option value="2" >Dammam</option>
          <option value="3">Jeddah</option>
          <option value="4">Khobar</option>
          <option value="5">Dhahran</option>
          <option value="6">Abha</option>
        </select>
        <div class="form-group">
          <input class="form-control" type="text" name="address_text" placeholder="Address" required>
        </div>
        <div class="form-group">
          <textarea class="form-control" name="address_details" placeholder="More address information" rows="5"></textarea>
        </div>

      </div>
    </div>

    <div class=" contact-clean" data-aos="fade-up" data-aos-once="true" style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.5);padding-top: 0;height: 400px;">
      <div class="mx-auto buy_form">
        <h2 class="text-left" style="padding-left: 5%;">Payment</h2>

        <select class="form-control" style="margin-bottom: 16px;" required>
          <option hidden disabled selected value> -- select a piment way -- </option>
          <option value="6">Credit Card</option>
          <option value="5">Cash</option>
        </select>

        <div class="form-group">
          <input id="holderName" class="form-control" type="text" name="Card Holder Name" placeholder="Card Holder Name" required onblur="validatePiment()">
          <p class="err hide" id="holderNameError">Only Letters.</p>
        </div>

        <div class="form-group">
          <input class="form-control" type="number" name="Card Number" placeholder="Card Number" required>
        </div>

        <div class="form-group" style="height: 20px;">
          <input class="form-control float-left" type="number" name="CVV" placeholder="CVV" style="width: 40%;" required>
          <input id="expireDate"class="form-control float-right" type="text" name="Expire Date" placeholder="Expire Date" style="width: 40%;" required onblur="validatePiment()"><br><br>
          <p class="err hide float-right" id="expireDateError">the date should be in this form 00/00</p>
        </div>

      </div>
    </div>

    <div class="text-center float-right" style="height: 145px;width: 90%;background-color: rgba(255,249,219,0.5);margin-right: 5%;margin-top: 0;">

      <div class="btn-group" role="group" style="margin-top: 0px;">
        <button class="btn btn-primary border-dark shadow" data-bs-hover-animate="pulse" type="submit" name="buy_btn" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a;">Complete Purchase</button>
      </div>
    </div>

  </form>



  <?php include("share/footer.php"); ?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>