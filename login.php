<?php
session_start();
include("share/connect.php");
if (isset($_SESSION['UserID'])) {

  header("location:index.php");
}
if (isset($_POST['submit'])) {


  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "SELECT * FROM user WHERE Username='$username' and Password='$password'";
  
  $ret = mysqli_query($con, $query);
  $num = mysqli_fetch_array($ret);

  if ($num > 0) {
    if($num['Blocked'] == 1){
      echo "<script> alert('Sorry, You are Blocked');</script>";  
    }else if($num['UserType'] == 5){
        echo "<script> alert('Sorry, You are deleted');</script>";  
    }else{
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['UserID'] = $num['UserID'];
    header("location:index.php");
    }
  } else {
    echo "<style>#loginError {display:grid; color:red;}</style>";  
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
  <style>
    .Hidden{
      display: none;
    }
  </style>
</head>

<body style="background-color: #fffcf5;">

  <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);padding-top: 130px;padding-bottom:150px;">
    <div class="container" style="width: 100%;">
      <div class="row" style="width: 100%;">
        <div class="col">
          <div>
            <form class="mt-3 text-align-input" method="post" action="">
              <div class="shadow-sm" style="margin:auto;width:400px; background-color:white; height: 400px; margin-bottom:50px;padding-top:50px">
                <a href="index.php" style="font-family: Pacifico, cursive;font-size: 45px;margin-top:0px; color:#222222" onclick="goToHome()">DigiMall</a>

                <fieldset class="text-align-input" style="padding-top:30px">
                  <div>
                    <label class="text-capitalize text-center d-block form_text_center">&nbsp;Username:</label>
                    <input name="username" class="border rounded-0 shadow-sm" type="text">
                  </div>
                  <div>
                    <label class="text-center d-block form_text_center">Password:</label>
                    <input name="password" class="border rounded-0 shadow-sm" type="password">
                  </div>
                  <div id="loginError" class="mt-1 err hide">
                    <snap id="loginError" class="Hidden">Login failed: Invalid username or password.</snap>

                  </div>
                </fieldset>
                <div class="sign-in-button button-margin mt-3">
                  <button type="submit" class="btn btn-primary border rounded border-dark" name="submit" value="submit" style="background-color: rgba(255,249,219,0.5);color: #222222;opacity: 1;"><em>Sign in</em></button>
                  <p>Don't have an account? <a href="SignUp.php">Sign up</a></p>
                </div>
              </div>
            </form>
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
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

  <script src="assets/js/Wishlist.js"></script>
</body>

</html>