<?php 
  include("share/connect.php");

  session_start();

  if(isset($_SESSION['StoreID'])){
    $storeID = $_SESSION['StoreID'];
    $query = "SELECT * FROM store where StoreID = '$storeID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $storeName = $row['StoreName'];
    
    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $description = $_POST['description'];
      $Category = $_POST['Category'];


      $target = "https://digimall.today/assets/item_image/". basename($_FILES['image']['name']);

      $image = $_FILES['image']['name'];

      $query = "INSERT INTO item (StoreID, CategoryID ,  ItemName, Price, Image, Description ,Quantity) 
              VALUES ('$storeID', '$Category' , '$name', '$price', '$image', '$description', '$quantity')";
              
      $ret = mysqli_query($con, $query);
      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script> console.log('added'); </script>" ;

      }else {
        echo "<script> console.log('not'); </script>" ;

      }
      $num=mysqli_fetch_array($ret);
      header('location:store.php'); 
    } 
  }
  else {
    $storeID = 101; //just for testting
    ////test //////
    $query = "SELECT * FROM store where StoreID = '$storeID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $storeName = $row['StoreName'];
    $storeDescription = $row['Description'];
    $storeLogo = $row['logo'];

    if(isset($_POST['submit']))
    {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $quantity = $_POST['quantity'];
      $description = $_POST['description'];


      ///////////////***************add image ****************************8//////////////// */
      $target = "assets/item_image/". basename($_FILES['image']['name']);

      $image = $_FILES['image']['name'];

      $query = "INSERT INTO item (ItemID, StoreID, ItemName, Price, Image, Quantity, Description) VALUES (NULL, '$storeID', '$name', '$price', '$image', '$quantity', '$description')";
      $ret = mysqli_query($con, $query);

      if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "<script> console.log('added2'); </script>" ;

      }else {
        echo "<script> console.log('not2'); </script>" ;

      }
      echo "    <script src='assets/js/jquery.min.js'></script> ";
      echo    "<script src='assets/js/Wishlist.js'> goToStore(". $storeID . "); </script>";   ////////////////**************************8////////////////////////////// */




      //$num=mysqli_fetch_array($ret); 
      //header('location:Store.php');
    }
    ///end test /////
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

<body>
<?php

include("share/headerP.php");
?>


      <div style="width: 90%;margin: auto;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
          <div class="row" style="padding-top: 20px;">
              <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                  <div style="width: 100%;">
                    
                  </div>
              </div>

              <div class="col col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                  <h1 style="margin: 40px 0px ;"><?php  echo $storeName; ?></h1>
                  <p> <?php  echo "This our store"; ?> <br><br></p>
              </div>
          </div>
          <div style="height: 5px;background-color: #000000;width: 100%;"></div>
          <div style="height: 5px;background-color: #807c7c;width: 100%;"></div>
      </div>

    <div class="contact-clean" style="width: 90%;margin: auto;background-color: rgba(255,249,219,0.7);">
        <form method="post" action="" enctype="multipart/form-data" > <!-- enctype to pass the image file -->
            <h2 class="text-left">Item Info</h2>
            <div class="form-group">
              <input class="form-control" type="text" name="name" placeholder="Name" required>
            </div>

            <div class="form-group" style="margin-bottom: 15px">

        <select class="form-control" id="Category" type="select" name="Category" placeholder="Category" required>
          <?php
          $query = "SELECT * from category";
          $result = mysqli_query($con, $query);

          while ($row = mysqli_fetch_array($result)) {
            echo "<option value = " . $row['CategoryID'] . ">" . $row['CategoryID'] . " - " . $row['CategoryName'];
          }

          ?>
        </select>
      </div>


            <div class="form-group">
              <textarea class="form-control" name="description" placeholder="Description" rows="14"></textarea>
            </div>

            <div class="form-group">
              <input class="form-control" type="number" name="price" placeholder="Price" step=".01" required>
            </div>

            <div class="form-group">
              <input class="form-control" type="number" name="quantity" placeholder="Quantity" required>
            </div>

            <!-- <div class="form-group">
              <label>Catagories:&nbsp;</label>
                <div class="form-check" style="margin-left: 20px;">
                  <input class="form-check-input" type="checkbox" id="formCheck-4">
                  <label class="form-check-label" for="formCheck-4">Electronic</label>
                </div>
                <div class="form-check" style="margin-left: 20px;">
                  <input class="form-check-input" type="checkbox" id="formCheck-4">
                  <label class="form-check-label" for="formCheck-4">Food</label>
                </div>
                <div class="form-check" style="margin-left: 20px;">
                <input class="form-check-input" type="checkbox" id="formCheck-4">
                <label class="form-check-label" for="formCheck-4">Sweet</label>
                </div>
                <div class="form-check" style="margin-left: 20px;">
                <input class="form-check-input" type="checkbox" id="formCheck-4">
                <label class="form-check-label" for="formCheck-4">Clothes</label>
                </div>
            </div> -->

            <div class="form-group">
              <label>Image:&nbsp;</label>
              <input type="hidden" name="size" value="1000000">   <!-- this to restrict the image size -->
              <input type="file" data-bs-hover-animate="pulse" name="image" required>
            </div>

            <div class="form-group">
              <button class="btn border rounded border-dark shadow" data-bs-hover-animate="pulse" type="submit" name="submit" style="background-color: rgba(252,239,176,0.5);">Add</button>
            </div>
        </form>
    </div>
    <?php include("share/footer.php"); ?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>