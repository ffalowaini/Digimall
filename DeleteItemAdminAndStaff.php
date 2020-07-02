<?php
include("share/connect.php");

session_start();

if (isset($_POST["items"])) {
  $item = $_POST["items"];
  $query = "DELETE from item where itemID = '$item'";
  $result = mysqli_query($con,$query);
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

  <div class="contact-clean" style="width: 90%;margin: auto;background-color: rgba(255,249,219,0.7); margin-top:50px">
    <form method="post" action="" enctype="multipart/form-data">
      <!-- enctype to pass the image file -->
      <h2 class="text-left">Item Info</h2>

      <!--Store owners ID-->
      <div class="form-group" style="margin-bottom: 15px">

        <select class="form-control" id="StoreID" type="select" name="StoreID" placeholder="Select ID" onchange="getItems()" required>
          <?php
          $query = "SELECT * from store";
          $result = mysqli_query($con, $query);

          while ($row = mysqli_fetch_array($result)) {
            echo "<option value = " . $row['StoreID'] . ">" . $row['StoreID'] . " - " . $row['StoreName'];
          }

          ?>
        </select>

        <p id="name-missing" style="color: red; font-weight: bold;"></p>
      </div>


      <!--Store CategoryID-->
      <div class="form-group" style="margin-bottom: 15px">

        <select class="form-control" id="items" type="select" name="items" placeholder="items" required>
          
        </select>
      </div>


      <script>
        function getItems() {

          $.ajax({

            url: "php/getItem.php",
            method: "POST",
            data: {storeID: document.getElementById("StoreID").value},
            success: function(data) {
              document.getElementById("items").innerHTML = data;
            }
          });

        }
      </script>

      <div class="form-group">
        <button class="btn border rounded border-dark shadow" data-bs-hover-animate="pulse" type="submit" name="submit" style="background-color: rgba(252,239,176,0.5);">Delete</button>
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