
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


                    <div class=" btn-group" role="group">
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


                    <div class="d-none margins" data-bs-hover-animate="pulse" style="width: 100px;height: 35px;" onclick="goToProfile()">
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

