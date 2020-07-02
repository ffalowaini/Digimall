<?php 
  include("share/connect.php");

  session_start();
  $other = false;
  $typeName = '';
  if(isset($_SESSION['OtherProfileID'])){
    echo "<script> console.log('set set');    </script>";
    $userID = $_SESSION['OtherProfileID'];
    $query = "SELECT * FROM user where UserID = '$userID'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $fName = $row['Fname'];
    $lName = $row['Lname'];
    $email = $row['Email'];
    $phoneNumber = $row['PhoneNumber'];
    $userType = $row['UserType'];
    
    if($userType == 1){
      $typeName= 'Customer';
    }else if($userType == 2){
      $typeName= 'Vendor';
    }else if($userType == 3){
      $typeName= 'Admin';
    }else if($userType == 4){
      $typeName= 'Staff';
    }
    $other = true;
    unset($_SESSION['OtherProfileID']);
  }else{
    echo "<script> console.log('not set');    </script>";

    if(isset($_SESSION['UserID'])){
      $userID = $_SESSION['UserID'];
      $query = "SELECT * FROM user where UserID = '$userID'";
      $result = mysqli_query($con, $query);
      $row = mysqli_fetch_array($result);
      $fName = $row['Fname'];
      $lName = $row['Lname'];
      $email = $row['Email'];
      $phoneNumber = $row['PhoneNumber'];
      $userType = $row['UserType'];
      if($userType == 1){
        $typeName= 'Customer';
      }else if($userType == 2){
        $typeName= 'Vendor';
      }else if($userType == 3){
        $typeName= 'Admin';
      }else if($userType == 4){
        $typeName= 'Staff';
      }
    }
    else {
      $userID = 'unknown';  //just for testting
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

<body>
<?php
  
  if($other){
    include("share/headerWP.php");
  }else if(isset($_SESSION['UserID'])){
    $userID1 = $_SESSION['UserID'];
    $query = "SELECT * FROM user where UserID = '$userID1'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $userType1 = $row['UserType'];
    if($userType1 == 1){
      include("share/headerWLout.php");
    }else{
      include("share/headerLout.php");
    }
  } ?>


  <div style="width: 90%;margin: auto;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
    <div class="row justify-content-center" style="padding-top: 10px;">
      <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <img class="img-fluid border rounded-circle border-dark" src="assets/img/person-icon.png" style="width: 60%;margin: 1px;">
      </div>

      <div class="col col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" style="margin-left: 20px;">
        <h2 style="margin: 40px 0px ;"><?php  echo $fName . ' ' . $lName; ?></h2>
        <p class="font-20"><?php  echo $typeName; ?>.&nbsp;<br><?php  echo $email; ?><br><?php  echo $phoneNumber; ?></p>
      </div>
    </div>
    <div class="row justify-content-center">

      <?php if(!$other){ ?>
        <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
          <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToSitting()">
          <!-- M develop it -->
            <img src="assets/img/icons8-settings-128.png" style="width: 80px;"><label class="text-left font-weight-bolder" style="margin-left: 15px;">Setting</label>
          </div>
        </div>
      <?php } ?>

      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" >
        <!-- onclick="goToChat()"  not implemented-->
          <img src="assets/img/icons8-chat-96.png" style="width: 80px;"><label class="text-left font-weight-bolder" style="margin-left: 20px;">Chat</label>
        </div>
      </div>

            
      <?php if($userType == 2 && !$other){ ?>
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="createStore(<?php echo $userID; ?>)">
          <img src="assets/img/icons8-online-store-100.png" style="width: 80px;"><label class="text-left font-weight-bolder">New Store</label>
        </div>
      </div>
      <?php } ?>

      <?php if($userType == 1 && !$other){ ?>
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToPurchasedItem(<?php echo $userID; ?>)">
          <img src="assets/img/icons8-purchase-order-96.png" style="width: 80px;"><label class="font-weight-bolder text-center " style="">Purchased Item</label>
        </div>
      </div>
      <?php } ?>

      <?php if($userType == 3 || $userType == 4 || $other == true){ ?> <!-- other mean view profile for other user, he can report him --> 
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" 
        <?php if($other){
          echo "onclick='reportVendor(" . $userID . ")'";
        } else {
          echo "onclick='goToReport()'";
        }
        ?>>
          <img src="assets/img/icons8-business-report-100.png" style="width: 80px;"><label class="text-left font-weight-bolder" style="margin-left: 15px;">Report</label>
        </div>
      </div>
      <?php } ?>

      <?php if(($userType == 3 || $userType == 4) && !$other){ ?>
        <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToAddStore()">
          <img src="assets/img/icons8-new-view-80.png" style="width: 80px;"><label class="text-left font-weight-bolder">Add new Store</label>
        </div>
      </div>

      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToAddItem1()">
          <img src="assets/img/icons8-add-column-100.png" style="width: 80px;"><label class="text-left font-weight-bolder">Add new Item</label>
        </div>
      </div>

      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goTodeleteItem()">
          <img src="assets/img/icons8-delete-bin-80.png" style="width: 80px;"><label class="text-left font-weight-bolder">delete Item</label>
        </div>
      </div>

      <?php } ?>

      

      <?php if($userType == 2 && !$other){ ?>
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToOwnedStore(<?php echo $userID; ?>)">
          <img src="assets/img/icons8-store-setting-100.png" style="width: 80px;"><label class="text-left font-weight-bolder">My Stores</label>
        </div>
      </div>
      <?php } ?>

    </div>

    <?php if($userType == 3 && !$other){ ?>
    <div class="row justify-content-center" >
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToStaffList()">
          <img src="assets/img/icons8-list-64.png" style="width: 80px;"><label class="text-left font-weight-bolder">Staff List</label>
        </div>
      </div>
    
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToAddSatff()">
          <img src="assets/img/icons8-add-user-male-100.png" style="width: 80px;"><label class="text-left font-weight-bolder">Add new Staff</label>
        </div>
      </div>
      
      <div class="col col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6">
        <div data-bs-hover-animate="pulse" style="margin: 40px auto;width: 80px;" onclick="goToUserList()">
          <img src="assets/img/icons8-list-100.png" style="width: 80px;"><label class="text-left font-weight-bolder">User List</label>
        </div>
      </div>
      </div>
      <?php } ?>

  </div>


  <?php include("share/footer.php"); ?>



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>