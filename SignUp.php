<?php
include("share/connect.php");

$conn = $con;


if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phoneNumber']) && isset($_POST['username']) && isset($_POST['userType'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $username = $_POST['username'];
    $userType = $_POST['userType'];

    $exists = false;


    if ($conn) {

        $sql = "SELECT * from user where Email = '$email'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);
        if ($result >= 1) {
            echo "<style>#emailError{
                color: red;
                display:grid;
                }</style>";
            $exists = true;
        }


        $sql = "SELECT * from user where username = '$username'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_num_rows($result);
        if ($result >= 1) {
            echo "<style>#usernameError{
                color: red;
                display:grid;
                }</style>";
            $exists = true;
        }

        if (!$exists) {

            $sql = "INSERT INTO user (Fname, Lname, Password, Email, PhoneNumber, Username , UserType)
        VALUES ('$firstName', '$lastName', '$password', '$email', '$phoneNumber', '$username', '$userType');";
            $result = mysqli_query($conn, $sql);
        }
        $query = "SELECT UserID FROM user WHERE Username='$username'";
        $ret = mysqli_query($conn, $query);
        $num = mysqli_fetch_array($ret);
        mysqli_close($conn);
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['UserID'] = $num['UserID'];
        
        header("location:login.php");
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
    <script src="assets/js/Wishlist.js"></script>
    <style>
        .Hidden {
            display: none;
        }

        .err {
            color: red;
        }
    </style>
</head>

<body style="background-color: #fffcf5;">

    <?php
    //include("share/headerL.php");
    ?>


    <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);padding-top: 50px;text-align:center;">

        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div>
                        <form action="SignUp.php" class="text-align-input" method="POST">
                            <div class="shadow-sm" style="margin:auto;width:400px; background-color:white; height: 700px; margin-bottom:50px;padding-top:50px">
                                <a href="index.php" style="font-family: Pacifico, cursive;font-size: 45px;margin-top:0px; color:#222222" onclick="goToHome()">DigiMall</a>

                                <div><label class="text-capitalize text-center d-block form_text_center" style="margin-top:0px;padding-top:30px">First name:*</label>
                                    <input id="fname" name="firstName" class="border rounded-0 shadow-sm" type="text" required="" onblur="validate()">
                                    <p class="err Hidden" id="fnameError">Only Letters. [2-30]</p>
                                </div>
                                <div><label class="text-capitalize text-center d-block form_text_center">Last name:*</label>
                                    <input id="lname" name="lastName" class="border rounded-0 shadow-sm" type="text" required="" onblur="validate()">
                                    <p class="err Hidden" id="lnameError">Only Letters. [2-30]</p>
                                </div>
                                <div><label class="text-center d-block form_text_center">Password:*</label>
                                    <input id="pass" name="password" class="border rounded-0 shadow-sm" type="password" required="" >
                                    
                                </div>
                                <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Email:*</label>
                                    <input name="email" class="border rounded-0 shadow-sm" type="email" required="" onblur="validate()">
                                    <p class="Hidden" id="emailError">This Email Already exists, Use another one.</p>
                                </div>

                                <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Phone Number:*</label>
                                    <input id="phone" name="phoneNumber" class="border rounded-0 shadow-sm" type="text" required="" onblur="validate()">
                                    <p class="err Hidden" id="phoneError">Not a valid Phone.</p>
                                </div>

                                <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Username:*</label>
                                    <input id="username" name="username" class="border rounded-0 shadow-sm" type="text" required="" onblur="validate()">
                                    <p class="Hidden" id="usernameError">This username Already exists, Use another one.</p>
                                    <p class="err Hidden" id="usernameErrorLength">Not a valid Length, [3-20] digits needed.</p>
                                    <p class="err Hidden" id="usernameInvalidInput">Only Letters and Numbers.</p>
                                </div>

                                <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;User Type:*</label>

                                    <select id="typeSelection" name="userType" class="border rounded-0 shadow-sm" type="text" required="" style="width : 180px; margin-bottom: 50px;">
                                        <option value="1">Customer</option>
                                        <option value="2">Vendor</option>
                                    </select></div>

                                <button class="btn btn-primary border rounded border-dark" type="Submit" style="background-color: rgba(255,249,219,0.5);color: #222222;opacity: 1;" onclick=""><em>Sign Up</em></button>
                                <div class="sign-in-button button-margin">
                                    <p>Do you have an existing account? <a href="login.php">Sign In</a></p>
                                </div>
                                <script>
                                    function validate() {
                                        var fname = document.getElementById("fname");
                                        fname = fname.value;

                                        var lname = document.getElementById("lname");
                                        lname = lname.value;
                                        var nameExp = new RegExp(/^[a-zA-Z ]{2,30}$/);

                                        fnameTest = nameExp.test(fname);
                                        lnameTest = nameExp.test(lname);

                                        

                                        var phone = document.getElementById("phone").value;
                                        var phoneExp = /^[0-9]{10}$/;
                                        phoneTest = phoneExp.test(phone);

                                        var username = document.getElementById("username").value;
                                        var usernameLength = username.length;
                                        usernameLengthTest = usernameLength > 2 && usernameLength < 21;

                                        var usernameTest = /^[a-zA-Z0-9]+$/;
                                        usernameTest = usernameTest.test(username);

                                        if (!fnameTest && fname != "") {
                                            document.getElementById("fnameError").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("fnameError").classList.add("Hidden")
                                        }

                                        if (!lnameTest && lname != "") {
                                            document.getElementById("lnameError").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("lnameError").classList.add("Hidden")
                                        }

                                        

                                        if (!phoneTest && phone != "") {
                                            document.getElementById("phoneError").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("phoneError").classList.add("Hidden")
                                        }

                                        if (!phoneTest && phone != "") {
                                            document.getElementById("phoneError").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("phoneError").classList.add("Hidden")
                                        }

                                        if (!usernameLengthTest && username != "") {
                                            document.getElementById("usernameErrorLength").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("usernameErrorLength").classList.add("Hidden")
                                        }

                                        if (!usernameTest && username != "") {
                                            document.getElementById("usernameInvalidInput").classList.remove("Hidden");
                                        } else {
                                            document.getElementById("usernameInvalidInput").classList.add("Hidden")
                                        }
                                    }
                                </script>

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
</body>

</html>