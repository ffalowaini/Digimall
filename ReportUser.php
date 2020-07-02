<?php
include("share/connect.php");

session_start();

if (isset($_SESSION['UserID']) && isset($_SESSION['ToUserID'])) {

    $userID = $_SESSION['UserID'];
    $toUserID = $_SESSION['ToUserID'];
}else{
    //This is for testing. You shouldn't be able to reach here Traveler.
    $userID = 1;
    $toUserID = 2;
}


if (isset($_POST['message'])) {
    echo $toUserID;

    $msg = $_POST['message'];

    $query = "INSERT INTO report (FromUserID, message, type,  ToUserID,  ReportStatus, ReportSendType, Assigned) VALUES ('$userID', '$msg', '1',  '$toUserID', '1', '2', '0')";
    $result = mysqli_query($con, $query);
    mysqli_error($con);
    echo "<script> alert('Report has been sent.'); </script>";
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
    if (isset($_SESSION['UserID'])) {
        $userID = $_SESSION['UserID'];
        $query = "SELECT * FROM user where UserID = '$userID'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_array($result);
        $userType = $row['UserType'];
        if($userType == 1){
            include("share/headerWP.php");
        } else {
            include("share/headerP.php");
        }
    } ?>

    <div class="contact-clean" style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.5); margin-top: 100px">
        <form action="" method="POST">
            <h2 class="text-left" style="margin-left: 5%;">Report</h2>

            <div class="form-group">
                <textarea class="form-control" name="message" placeholder="Message" rows="14" required></textarea>
            </div>
            <div class="form-group">
                <button id="submitReport" class="btn" type="Submit" style="background-color: #2a2a2a;color: #f8f8f8;">send </button>
            </div>
        </form>
    </div>
    <div style="height: 5vw;width: 87.5%;margin-left: 5%;background-color: rgba(255,249,219,0.5);"></div>

    <?php include("share/footer.php"); ?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>