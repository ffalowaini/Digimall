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
    
   
 
    <form action="SearchResult.php" method="post">
        <nav class="navbar navbar-light navbar-expand-md fixed-top shadow-sm navigation-clean-search">
            <div class="container">

                <a class="navbar-brand" href="index.php" style="width: 136px;height: 40px;font-family: Pacifico, cursive;font-size: 30px;margin-bottom: 8px;" onclick="goToHome()">DigiMall</a>

                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">

                
                    <div class="form-inline mr-auto">
                        <div class="form-group" style="margin-left: 30px;">
                            <label for="search-field">
                                <i class="fa fa-search" style="margin-left: -29px;"></i>
                            </label>

                            <input class="form-control search-field" type="search" data-bs-hover-animate="pulse" id="search-field" name="search" placeholder="Looking for what?" required style="padding-left: 6px;" >
                            <button class="btn btn-primary border-dark shadow-sm" role="button" type="Submit" data-bs-hover-animate="pulse" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a;border-radius: 0px 5px 5px 0px;">Search</a>
                        </div>
                    </div>


                    <div class="d-none btn-group" role="group">
                        <button class="btn btn-primary border-dark" type="button" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a;" onclick="goToLogin()">Login</button>

                        <button class="btn btn-primary border-dark" type="button" style="color: #2a2a2a;background-color: rgba(255,249,219,0.5);" onclick="goToSignUp()">Sign up</button>
                    </div>






                    <div class="d-none" data-bs-hover-animate="pulse" style="width: 100px;height: 35px;" onclick="goToWishlist(<?php echo $userID ?>)">
                        <img class="float-left" src="assets/img/icons8-wish-list-100.png" style="width: 35px;height: 35px;">
                        <p class="float-right" style="font-size: 14px;font-family: Roboto, sans-serif;width: 60px;padding-top: 8px;">Wish List</p>
                    </div>







                    <div class="d-none margins" data-bs-hover-animate="pulse" id="cart" style="width: 100px;height: 35px;" onclick="goToCart()" href="">
                        <img class="float-left" src="assets/img/icons8-favorite-cart-100.png" style="width: 35px;height: 35px;">
                        <p class="float-right" style="font-size: 14px;font-family: Roboto, sans-serif;width: 59px;padding-top: 8px;">Cart</p>
                    </div>


                    <div class=" margins" data-bs-hover-animate="pulse" style="width: 100px;height: 35px;" onclick="goToProfile()">
                        <img class="float-left" src="assets/img/icons8-male-user-100%20(1).png" style="height: 35px;">
                        <p class="float-right" style="font-size: 14px;font-family: Roboto, sans-serif;width: 58px;padding-top: 8px;">Profile</p>
                    </div>

                    <div class="d-none margins" data-bs-hover-animate="pulse" style="width: 100px;height: 35px;" onclick="logOut()">
                        <img class="float-left" src="assets/img/icons8-logout-rounded-down-64.png" style="height: 35px;">
                        <p class="float-right" style="font-size: 14px;font-family: Roboto, sans-serif;width: 58px;padding-top: 8px; color: #E74C3C">Log out</p>
                    </div>


                </div>
            </div>
        </nav>

    </form>




    <div id="php_div"></div>


    <div class="text-center float-right"
        style="height: 100px;width: 90%;background-color: rgba(255,249,219,0.5);margin-right: 5%;margin-top: 0;">
        <div class="btn-group" role="group" style="margin-top: 36px;"><button class="btn btn-primary border-dark"
                type="button" style="background-color: rgba(255,249,219,0.5);color: #2a2a2a;">Back</button><button
                class="btn btn-primary border-dark" type="button"
                style="color: #2a2a2a;background-color: rgba(255,249,219,0.5);">Next</button></div>
    </div>

 
    <script>
        $.ajax({
            url: "https://digimall.today/Session/indexSession.php",
            method: "POST",
            session: {},
            success: function (session) {
                $.ajax({
                    url: "https://digimall.today/php/ReportAdmin.php",
                    type: "POST",
                    data: { session: session },
                    success: function (data) {
                        document.getElementById("php_div").innerHTML = data;
                    }
                })
            }
        })

       


    </script>




<div class="footer-basic">
    <footer>
      <div class="social">
        <a data-aos="fade-up" data-aos-duration="350" href="#">
          <i class="icon ion-social-instagram"></i>
        </a>
        <a data-aos="fade-up" data-aos-duration="350" data-aos-delay="150" href="#">
          <i class="icon ion-social-snapchat"></i>
        </a>
        <a data-aos="fade-up" data-aos-duration="350" data-aos-delay="300" href="#">
          <i class="icon ion-social-twitter"></i>
        </a>
        <a data-aos="fade-up" data-aos-duration="350" data-aos-delay="450" href="#">
          <i class="icon ion-social-facebook"></i>
        </a>
      </div>
  
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