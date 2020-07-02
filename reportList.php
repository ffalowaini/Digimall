<?php 
  include("share/connect.php");

  session_start();
  $totalPrice = 0;
  if(isset($_SESSION['UserID'])){
    $userID = $_SESSION['UserID'];
    $userID = 1;
    $query = "SELECT * FROM user where UserID = '$userID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $fName = $row['Fname'];
    $lName = $row['Lname'];
    $email = $row['Email'];
    $phoneNumber = $row['PhoneNumber'];
    $userType = $row['UserType'];
  }
  else {
    $userID = 1;
    $query = "SELECT * FROM user where UserID = '$userID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $fName = $row['Fname'];
    $lName = $row['Lname'];
    $email = $row['Email'];
    $phoneNumber = $row['PhoneNumber'];
    $userType = $row['UserType'];
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

    <div class="row justify-content-center" style="padding-top: 10px;">
      <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <img class="img-fluid border rounded-circle border-dark" src="assets/img/person-icon.png" style="width: 60%;margin: 1px;">
      </div>

      <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="margin-left: 20px;">
        <h2 style="margin: 40px 0px ;"><?php  echo $fName, $lName; ?></h2>
        <p class="font-20"><?php  echo $email; ?>.&nbsp;<br><?php  echo $phoneNumber; ?></p>
      </div>
      <div style="height: 5px;background-color: #000000;width: 100%;"></div>
      <div style="height: 5px;background-color: #807c7c;width: 100%;"></div>
    </div>



    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">

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
   

  
 



  <?php include("share/footer.php"); ?>


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>