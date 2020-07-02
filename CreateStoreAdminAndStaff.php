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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
</head>

<body>
    <?php
    include("share/headerP.php");
    include("share/connect.php");


    ?>


    <!--DIV of creating store STARTS-->
    <div class="contact-clean" style="width: 90%;margin: auto;background-color: rgba(255,249,219,0.7);margin-top: 80px;">

        <!--form of sending the data to the database STARTS-->
        <form method="post">
            <h2 class="text-left">Store Info</h2>

            <!--Store owners ID-->
            <div class="form-group" style="margin-bottom: 15px">

                <select class="form-control" id="selectID" type="select" name="id" placeholder="Select ID" required>
                    <?php
                    $query = "SELECT * from user where UserType = 2";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<option value = ".$row['UserID'].">".$row['UserID']." - ".$row['Fname']." ".$row['Lname'];
                    }
                    
                    ?>
                </select>
                <p id="name-missing" style="color: red; font-weight: bold;"></p>
            </div>

            <!--Naming store DIV group-->
            <div class="form-group">
                <input class="form-control" id="name" type="text" name="name" placeholder="Name">
                <p id="name-missing" style="color: red; font-weight: bold;"></p>
            </div>

            <!--Description DIV group-->
            <div class="form-group">
                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="14"></textarea>
                <p id="desc-missing" style="color: red; font-weight: bold;"></p>
            </div>

            <!--Location DIV group-->
            <div class="form-group">
                <input class="form-control" id="location" type="text" name="location" placeholder="Location">
                <p id="location-missing" style="color: red; font-weight: bold;"></p>
            </div>
            <!--Theme DIV group
            <div class="form-group">
                <label>Theme Color:&nbsp;</label>
                <input type="color" style="width: 100%;height: 24px;"></div>
            -->


            <!--The categoty DIV group-->
            <div class="form-group">
                <label>Catagories:&nbsp;</label>
                <div class="form-check" style="margin-left: 20px;">
                    <input name="Category" value="Food" class="form-check-input" type="checkbox" id="formCheck-4">
                    <label class="form-check-label" for="formCheck-4">Food</label></div>
                <div class="form-check" style="margin-left: 20px;">
                    <input name="Category" value="Phone" class="form-check-input" type="checkbox" id="formCheck-4">
                    <label class="form-check-label" for="formCheck-4">Phone</label></div>
                <div class="form-check" style="margin-left: 20px;">
                    <input name="Category" value="Laptop" class="form-check-input" type="checkbox" id="formCheck-4">
                    <label class="form-check-label" for="formCheck-4">Laptop</label></div>
                <div class="form-check" style="margin-left: 20px;">
                    <input name="Category" value="Network" class="form-check-input" type="checkbox" id="formCheck-4">
                    <label class="form-check-label" for="formCheck-4">Network</label></div>
                <div class="form-check" style="margin-left: 20px;">
                    <input name="Category" value="office" class="form-check-input" type="checkbox" id="formCheck-4">
                    <label class="form-check-label" for="formCheck-4">office</label></div>
                <p id="check-missing" style="color: red; font-weight: bold;"></p>
            </div>

            <!--The logo of chossing file group-->
            <div class="form-group">
                <label>Logo:&nbsp;</label>
                <input type="file" id="image" name="image" data-bs-hover-animate="pulse"></div>
            <p id="picture-missing" style="color: red; font-weight: bold;"></p>
            <!--Submit DIV group-->
            <div class="form-group">
                <input id="submitBtn" class="btn border rounded border-dark shadow" data-bs-hover-animate="pulse" type="submit" style="background-color: rgba(252,239,176,0.5);" value="Create" onclick="onSubmit()">
            </div>
            <p id="after-created"></p>
        </form>
        <!--form of sending the data to the database ENDS-->
    </div>
    <!--DIV of creating store ENDS-->

    <script>
        $(document).ready(function() {
            $('#submitBtn').click(function() {



            });



        });

        function onSubmit() {


            //Check name
            if (document.getElementById("name").value == "")
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("name-missing").innerHTML = "Name is missing";

                })
            else {
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("name-missing").innerHTML = "";

                })
            }

            //Check Desc
            if (document.getElementById("description").value == "")
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("desc-missing").innerHTML = "Description is missing";

                })
            else {
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("desc-missing").innerHTML = "";

                })
            }
            //Check Loacation
            if (document.getElementById("location").value == "")
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("location-missing").innerHTML = "Loaction is missing";

                })
            else {
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("location-missing").innerHTML = "";

                })
            }

            //Adding check to array 
            var data_check = [];
            var checkbox = document.getElementsByName("Category");
            for (var i = 0; i < checkbox.length; i++) {
                if (checkbox[i].checked) data_check[i] = checkbox[i].value;
            }

            //check Checking
            if (data_check.length == 0) document.getElementById("check-missing").innerHTML = "Choose at least one Category";
            else document.getElementById("check-missing").innerHTML = "";

            //check picture
            if (document.getElementById("image").value == "")
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("picture-missing").innerHTML = "Picture is missing";

                })
            else {
                $("#submitBtn").click(function(e) {
                    e.preventDefault();
                    document.getElementById("picture-missing").innerHTML = "";

                })
            }

            document.getElementById("after-created").innerHTML = ""
            //Sending to PHP
            if (document.getElementById("name").value != "" && document.getElementById("description").value != "" &&
                document.getElementById("location").value != "" && data_check.length > 0 && document.getElementById("image").value != "") {

               /* $.ajax({

                    url: "http://localhost/digimall/Session/indexSession.php",
                    method: "POST",
                    session: {},
                    success: function(session) {*/
                        var file_data = $('#image').prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('file', file_data);
                        form_data.append('ID', document.getElementById("selectID").value);
                        form_data.append('name', document.getElementById("name").value);
                        form_data.append('desc', document.getElementById("description").value);
                        form_data.append('location', document.getElementById("location").value);
                       // form_data.append('session', session);
                        form_data.append('data_check', JSON.stringify(data_check));

                        for (var key of form_data.entries()) {
                            console.log(key[0] + ', ' + key[1]);
                        }

                        $.ajax({

                            url: "php/insertCreateStoreAdminAndStaff.php",
                            method: "POST",
                            data: form_data,
                            processData: false,
                            contentType: false,
                            success: function(data) {

                                document.getElementById("after-created").innerHTML = data;
                                if (data == "<strong>Store has been created.") {
                                    alert("Store has been created.");
                                    setTimeout(function() {
                                        window.location = "index.php";
                                    }, 3000);
                                }
                            }
                        });

                    /*}
                });
*/
            }


        }
    </script>




    <div class="footer-basic">
        <footer>
            <div class="social"><a data-aos="fade-up" data-aos-duration="350" href="#"><i class="icon ion-social-instagram"></i></a><a data-aos="fade-up" data-aos-duration="350" data-aos-delay="150" href="#"><i class="icon ion-social-snapchat"></i></a><a data-aos="fade-up" data-aos-duration="350" data-aos-delay="300" href="#"><i class="icon ion-social-twitter"></i></a><a data-aos="fade-up" data-aos-duration="350" data-aos-delay="450" href="#"><i class="icon ion-social-facebook"></i></a></div>
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
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="assets/js/Wishlist.js"></script>
</body>

</html>