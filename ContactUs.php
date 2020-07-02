<?php

include("share/connect.php");

if (isset($_POST['title']) && isset($_POST['message']) && isset($_POST['email'])) {
    $msg = $_POST['message'];
    $title = $_POST['title'];
    $email = $_POST['email'];

    $query = "INSERT into report (title,email,message,TYPE) values ('$title','$email','$msg','2')";
    $result = mysqli_query($con, $query);

} else {
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
        include("share/headerL.php");
    ?>

    <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div class="contact-clean" style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.5);">
                        <form action="ContactUs.php" method="POST">
                            <label class="text-capitalize text-left d-block">&nbsp;Email:*</label>
                            <input name="email" class="border rounded-0 shadow-sm" type="email" required="">
                            <label class="text-capitalize text-left d-block">Title:*</label>
                            <input name="title" class="border rounded-0 shadow-sm" type="text" required="">
                            <label class="text-capitalize text-left d-block">Message:*</label>
                            <textarea name="message" class="border rounded-0 shadow-sm" style="width: 100%;height: 100px;margin-bottom:15px"></textarea>

                            <button id="send" class="btn" type="Submit" style="background-color: #2a2a2a;color: #f8f8f8;">Send </button>
                            <button id="back" class="btn" type="button" style="background-color: #2a2a2a;color: #f8f8f8;">Back </button>


                        </form>
                        <div class="sign-in-button button-margin"></div>
                    </div>
                </div>
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