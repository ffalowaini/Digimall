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

    <!--Header Navbar STARTS-->


    
    <?php
      include("share/connect.php");
      session_start();

    if(isset($_SESSION['UserID'])){
        echo "<script>     console.log('set');      </script>";
        $userID = $_SESSION['UserID'];
        $query = "SELECT * FROM user where UserID = '$userID'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $userType = $row['UserType'];
        if($userType == 1){
          include("share/headerWP.php");
        }else{
          include("share/headerP.php");
        }
      }else{
        echo "<script>     console.log('not set');      </script>";

        include("share/headerL.php");

      }
    ?>

    <!--The DIV block which contain one row and two columns STARTS-->














    <div id="php_div" style="margin-top: 60px;"></div>
    <p id="p1"></p>

    <script>


        $.ajax({
            url: "https://digimall.today/Session/indexSession.php",
            method: "POST",
            session: {},
            success: function (session) {
               
                $.ajax({
                    url: "https://digimall.today/php/indexStore.php",
                    method: "POST",
                    data: {},
                    success: function (data) {

                        document.getElementById("php_div").innerHTML = data;

                    }



                })

            }



        })



        function goToStore1(storeID) {
            $.ajax({
                    url: "https://digimall.today/Session/setIndexSession.php",
                    method: "POST",
                    data: {StoreID:storeID},
                    success: function () {
                        window.location = 'store.php';
                        

                    }



                })

        }
    </script>

<div class="button-align" style="height: 5vw;width: 87.5%;margin-left: 5%;background-color: rgba(255,249,219,0.5);"></div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a data-aos="fade-up" data-aos-duration="350" href="#"><i class="icon ion-social-instagram"></i></a><a data-aos="fade-up" data-aos-duration="350" data-aos-delay="150" href="#"><i class="icon ion-social-snapchat"></i></a><a data-aos="fade-up"
                    data-aos-duration="350" data-aos-delay="300" href="#"><i class="icon ion-social-twitter"></i></a><a data-aos="fade-up" data-aos-duration="350" data-aos-delay="450" href="#"><i class="icon ion-social-facebook"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
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