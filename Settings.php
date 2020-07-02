<?php
session_start();

include("share/connect.php");

$userID = $_SESSION['UserID'];

$query = "SELECT * from user where UserID = '$userID'";
$result = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($result);

$firstName = $result['Fname'];
$lastName = $result['Lname'];
$password = $result['Password'];
$email = $result['Email'];
$phoneNumber = $result['PhoneNumber'];
$username = $result['Username'];

if (isset( $_POST['firstName']) && $_POST['firstName'] != "") {
    echo "/<br>/<br>/<br>/<br>/<br>/<br>/<br>";
    $firstName = $_POST['firstName'];
    $query = "UPDATE user set Fname = '$firstName' where UserID = $userID";
    $result = mysqli_query($con, $query);
}
if (isset( $_POST['lastName']) && $_POST['lastName'] != "") {
    $lastName = $_POST['lastName'];
    $query = "UPDATE user set Lname = '$lastName' where UserID = $userID";
    $result = mysqli_query($con, $query);
}
if (isset( $_POST['password']) && $_POST['password'] != "") {
    $password = $_POST['password'];
    $query = "UPDATE user set Password = '$password' where UserID = $userID";
    $result = mysqli_query($con, $query);
}
if (isset( $_POST['email']) && $_POST['email'] != "") {
    $email = $_POST['email'];
    $query = "UPDATE user set Email = '$email' where UserID = $userID";
    $result = mysqli_query($con, $query);
}
if (isset( $_POST['phoneNumber']) && $_POST['phoneNumber'] != "") {
    $phoneNumber = $_POST['phoneNumber'];
    $query = "UPDATE user set PhoneNumber = '$phoneNumber' where UserID = $userID";
    $result = mysqli_query($con, $query);
}
if (isset( $_POST['username']) && $_POST['username'] != "") {
    $username = $_POST['username'];
    $query = "UPDATE user set Username = '$username' where UserID = $userID";
    $result = mysqli_query($con, $query);
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
        include("share/headerP.php");

    ?>
    <div style="width: 90%;margin-left: 5%;background-color: rgba(255,249,219,0.7);margin-top: 80px;">
        <div class="container" style="width: 100%;">
            <div class="row" style="width: 100%;">
                <div class="col">
                    <div>
                        <form action="" class="text-align-input" method="POST">
                            <div class="shadow-sm" style="margin-left:35%;width:30%; background-color:white; height: 470px; margin-bottom:50px;">
                            <div><label class="text-capitalize text-center d-block form_text_center" style="margin-top:50px;padding-top:30px;">First name:*</label>
                                <input id="fname" name="firstName" class="border rounded-0 shadow-sm" type="text" onblur="validate()" placeholder=<?php echo $firstName; ?>>
                                <p class="err Hidden" id="fnameError">Only Letters. [2-30]</p>
                            </div>
                            <div><label class="text-capitalize text-center d-block form_text_center">Last name:*</label>
                                <input id="lname" name="lastName" class="border rounded-0 shadow-sm" type="text" onblur="validate()" placeholder=<?php echo $lastName; ?>>
                                <p class="err Hidden" id="lnameError">Only Letters. [2-30]</p>
                            </div>
                            <div><label class="text-center d-block form_text_center">Password:*</label>
                                <input id="pass" name="password" class="border rounded-0 shadow-sm" type="password" onblur="validate()" placeholder="**********">
                                <p class="err Hidden" id="passError">At least one numeric digit, one uppercase and one lowercase letter. [6-20]</p>
                            </div>
                            <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Email:*</label>
                                <input name="email" class="border rounded-0 shadow-sm" type="email" onblur="validate()" placeholder=<?php echo $email; ?>>
                                <p class="Hidden" id="emailError">This Email Already exists, Use another one.</p>
                            </div>

                            <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Phone Number:*</label>
                                <input id="phone" name="phoneNumber" class="border rounded-0 shadow-sm" type="text" onblur="validate()" placeholder=<?php echo $phoneNumber; ?>>
                                <p class="err Hidden" id="phoneError">Not a valid Phone.</p>
                            </div>

                            <div><label class="text-capitalize text-center d-block form_text_center">&nbsp;Username:*</label>
                                <input id="username" name="username" class="border rounded-0 shadow-sm" type="text" onblur="validate()" placeholder=<?php echo $username; ?>>
                                <p class="Hidden" id="usernameError">This username Already exists, Use another one.</p>
                                <p class="err Hidden" id="usernameErrorLength">Not a valid Length, [3-20] digits needed.</p>
                                <p class="err Hidden" id="usernameInvalidInput">Only Letters and Numbers.</p>
                            </div>

                            <button class="btn btn-primary border rounded border-dark" type="Submit" style="background-color: rgba(255,249,219,0.5);color: #222222;opacity: 1; margin-top:15px; margin-bottom:15px;" onclick=""><em>Update</em></button>

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

                                    var pass = document.getElementById("pass").value;
                                    var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
                                    passTest = passw.test(pass);

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

                                    if (!passTest && pass != "") {
                                        document.getElementById("passError").classList.remove("Hidden");
                                    } else {
                                        document.getElementById("passError").classList.add("Hidden")
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


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include("share/footer.php");?>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>