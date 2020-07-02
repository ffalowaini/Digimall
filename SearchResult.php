<?php
include("share/connect.php");

$category;
$type;
$search_field;

if (isset($_POST['search'])) {
  $search_field = $_POST['search'];

  echo $search_field;
}

$STORE_TYPE = 12;
$ITEM_TYPE = 13;

$FOOD_CATEGORT = 1;
$TECH_CATEGORT = 2;
$HOUSE_CATEGORT = 3;

if (isset($_POST['apply_btn'])) {
  if (isset($_POST['category'])) {
    $category = $_POST['category'];
    echo $category;
  } else {
  }
  if (isset($_POST['type'])) {
    $type = $_POST['type'];
    echo $type;
  } else {
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
   // session_start();
   include("share/headerSP.php");
   ?>
  


  <div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;">
    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">

        <?php
        if (isset($type) && isset($category)) {
          $query = "SELECT distinct store.StoreID FROM store left join item on item.StoreID = store.StoreID where (item.ItemName  LIKE '%" . $search_field . "%' or store.StoreName LIKE '%" . $search_field . "%') and CategoryID = $category";
          if ($type == $ITEM_TYPE) {
            $query = "SELECT distinct item.ItemID FROM item where (item.ItemName  LIKE '%" . $search_field . "%') and CategoryID = $category";
          } else {
            $query = "SELECT distinct store.StoreID FROM store left join storecategory on storecategory.StoreID = store.StoreID where (store.StoreName LIKE '%" . $search_field . "%') and (storecategory.CategoryID = $category)";
          }
        } else if (isset($category)) {
          $query = "SELECT distinct store.StoreID FROM (store left join item on item.StoreID = store.StoreID) left join storecategory on storecategory.StoreID = store.StoreID where (item.ItemName  LIKE '%" . $search_field . "%' or store.StoreName LIKE '%" . $search_field . "%') and (item.CategoryID = $category or storecategory.CategoryID = $category)";
        } else if (isset($type)) {
          if ($type == $ITEM_TYPE) {
            $query = "SELECT distinct item.ItemID FROM item where (item.ItemName  LIKE '%" . $search_field . "%')";
          } else {
            $query = "SELECT distinct store.StoreID FROM store where (store.StoreName LIKE '%" . $search_field . "%')";
          }
        } else {
          $query = "SELECT distinct store.StoreID FROM store left join item on item.StoreID = store.StoreID where (item.ItemName  LIKE '%" . $search_field . "%' or store.StoreName LIKE '%" . $search_field . "%')";
        }

        $result = mysqli_query($con, $query);
        $IDs = array();
        while ($row = mysqli_fetch_array($result)) {
          if (isset($type)) {
            if ($type == $ITEM_TYPE) {
              $IDs[] = $row['ItemID'];
            } else {
              $IDs[] = $row['StoreID'];
            }
          } else {
            $IDs[] = $row['StoreID'];
          }
        }
        for ($i = 0; $i < count($IDs); $i++) {
          if (isset($type)) {
            if ($type == $ITEM_TYPE) {
              $query = "SELECT * FROM item where ItemID = '$IDs[$i]' ";
            } else {
              $query = "SELECT * FROM store where StoreID = '$IDs[$i]' ";
            }
          } else {
            $query = "SELECT * FROM store where StoreID = '$IDs[$i]' ";
          }

          $result = mysqli_query($con, $query);
          $row = mysqli_fetch_array($result);

        ?>
          <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
            <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50" style="width: 100%;height: 250px;margin-top: 60px;background-color: #fffcf5;">

              <div class="float-left" style="width: 40%;height: 100%;">
              <img class="border rounded-circle float-left" style="margin-left: 10%;" <?php 
              if (isset($type)){
                if($type == $ITEM_TYPE){
                   echo  "src = 'assets/item_image/".$row["Image"]. "' ";
                    echo " onclick='goToItem(" . $row['ItemID'] . ") '";
                }else{
                  echo  "src = 'assets/store_logo/".$row["logo"]. "' ";
                  echo " onclick='goToStore(" . $row['StoreID']  .")'";
                }
              }else {
                
                echo  "src = 'assets/store_logo/".$row["logo"]. "' ";
                echo " onclick='goToStore(" . $row['StoreID'] . ")'";
              } ?>>

                <div class="text-center" style="width: 30%;height: 15%;">
                  <img src="assets/img/icons8-rating-circled-64.png" style="width: 32px;height: 32px;">
                  <label>4.5</label>
                </div>
              </div>

              <div class="float-right" style="width: 60%;height: 100%;">
                <?php 
                if(isset($_SESSION['UserID'])){
                  $query = "SELECT * FROM user where UserID = '$userID'";
                  $result = mysqli_query($con, $query);
                  $row = mysqli_fetch_array($result);
                  $userType = $row['UserType'];
                  $store_user = false;
                  if($userType == 1){ 
                    if (isset($type)){
                      if($type == $ITEM_TYPE){
                      }else{
                        $store_user = true;
                        }
                      }else {
                        $store_user = true;
                    } }
                if($store_user){ ?>
                  <div class="float-right" style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">

                    <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-<?php echo $i; ?>" href="#collapse-<?php echo $i; ?>" role="button" style="width: 100%;height: 100%;"></a>

                    <div class="collapse" id="collapse-<?php echo $i; ?>" style="background-color: #f8f8f8;width: 150px;margin-left: -106px;">
                      <div class="btn-group-vertical shadow-sm" role="group" style="width: 100%;background-color: #f8f8f8;">
                        <!-- <button class="btn text-left" type="button">Not Interested</button> -->
                        <button class="btn text-left" type="button" onclick="reportStore(<?php echo $row['StoreID']; ?>)">Report Store</button>
                      </div>
                    </div>
                  </div>
                <?php } 
                }
                ?>

                <p style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;">
                  <?php if (isset($type)) {
                    if ($type == $ITEM_TYPE) {
                      echo $row['ItemName'];;
                    } else {
                      echo $row['StoreName'];
                    }
                  } else {
                    echo $row['StoreName'];
                  }
                  ?></p>

                <p style="width: 90%;font-family: Roboto, sans-serif;margin-top: -3%;color: #2a2a2a;height: 60%;/*text-overflow: ellipsis;*/overflow: auto;">No describtion yet<br></p>
              </div>
            </div>
          </div>
        <?php
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