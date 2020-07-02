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
  
  include("share/headerP.php");

  ?>

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
                    url: "https://digimall.today/php/getCustomer.php",
                    type: "POST",
                    data: {},
                    success: function (data) {
                        document.getElementById("php_div").innerHTML = data;
                      //  setTimeout(function(){window.location = "staff.php";}, 3000);
                    }
                })
            
        



    </script>




<?php
  
  include("share/footer.php");

  ?>



    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>