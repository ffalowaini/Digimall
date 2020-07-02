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
    <script src="assets/js/jquery.min.js"></script>
</head>

<body style="background-color: #fffcf5;">
    
    <?php
      include("share/connect.php");

      session_start();

    if(isset($_SESSION['UserID'])){
        $userID = $_SESSION['UserID'];
        $query = "SELECT * FROM user where UserID = '$userID'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $userType = $row['UserType'];
        if($row['UserType'] == 1){
          include("share/headerWCP.php");
        }else{
          include("share/headerP.php");
        }
      }else{
        include("share/headerL.php");
      }
    ?>

    <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50"
                        style="width: 100%;height: 300px;margin-top: 60px;background-color: #fffcf5;">
                        <div class="float-left image-align" style="width: 40%;height: 100%;"><img
                                id="item-picture" class="border rounded-circle float-left" style="margin-left: 30%;">
                        </div>
                        <div class="float-right" style="width: 60%;height: 100%;">
                            <p id="item-name"
                                style="font-size: 30px;margin-top: 10%;width: 100%;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;">
                            </p>
                            <p id="item-price"
                                style="font-family: Roboto, sans-serif;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">
                            </p>
                            <p id="item-rating"
                                style="font-family: Roboto, sans-serif;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">
                            </p>
                            <p id="item-quantity"
                                style="font-family: Roboto, sans-serif;color: #2a2a2a;/*text-overflow: ellipsis;*/overflow: auto;">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div class="shadow-sm float-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="50"
                        style="background-color: #fffcf5;width: 100%;">
                        <p id="item-desc">Description</p>
                    </div>
                </div>
            </div>
            <div id="php-div" class="row" style="width: 100%;margin-top: 20px;">

            </div>
        </div>
    </div>

    <script>
        //var item = "Games";
        $.ajax({
            url: "Session/getItemSession.php",
            method: "POST",
            item: {},
            success: function (item) {
                $.ajax({
                    url: "php/item.php",
                    method: "POST",
                    data: { item: item },
                    success: function (data) {
                        var itemInfo = $.parseJSON(data);
                        document.getElementById("item-name").innerHTML = itemInfo[2]; // 2 = ITEM NAME
                        document.getElementById("item-price").innerHTML = itemInfo[3] + " SR"; // 3 = ITEM PRICE
                        document.getElementById("item-quantity").innerHTML = itemInfo[5]; // 5 = ITEM Quantity
                        document.getElementById("item-desc").innerHTML = itemInfo[6]; // 6 = ITEM DESC
                        var image = document.getElementById("item-picture");
                        //src="assets/img/KFUPM.png";
                        //image.src = 'php/images/'+item[4];  
                        image.setAttribute('src', 'assets/item_image/' + itemInfo[4])//4 = ITEM IMAGE
                        $.ajax({


                            url: "php/ItemReview.php",
                            method: "POST",
                            data: { itemName: itemInfo[2] },
                            success: function (data) {
                                document.getElementById("php-div").innerHTML = data;

                            }
                        });



                    }
                });

            }

        });




    </script>


    <div class="button-align" style="height: 5vw;width: 87.5%;margin-left: 5%;background-color: rgba(255,249,219,0.5);">
    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a data-aos="fade-up" data-aos-duration="350" href="#"><i
                        class="icon ion-social-instagram"></i></a><a data-aos="fade-up" data-aos-duration="350"
                    data-aos-delay="150" href="#"><i class="icon ion-social-snapchat"></i></a><a data-aos="fade-up"
                    data-aos-duration="350" data-aos-delay="300" href="#"><i class="icon ion-social-twitter"></i></a><a
                    data-aos="fade-up" data-aos-duration="350" data-aos-delay="450" href="#"><i
                        class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="index.php">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">DigiMall © 2020</p>
        </footer>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>