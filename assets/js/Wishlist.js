

function goToAddItem(){
    window.open("AddItem.php","_self");
}
function goToProfile(){
    window.location="profile.php";
}
function goToCart(){
    window.location="Cart.php";
}

function logOut(){
    
    $.ajax({
        url: "https://digimall.today/Session/destroySession.php",
        method: "POST",
        data:{},
        success: function(data){
            console.log("hi hi hi ");
            window.location="index.php";
        }
    });
}

function goToChat(){
    window.open("Chat.html","_self");
}

function goToContactUs(){
    window.open("ContactUs.php","_self");
}

function goToCreateStore(){
    window.open("CreateStore.php","_self");
}

function goToHome(){
    window.open("index.php","_self");
}

function goToItem(itemID){
    $.ajax({
        url: "https://digimall.today/Session/setItemID.php",
        method: "POST",
        data:{ItemID:itemID},
        success: function(data){
           window.location="Item.php";
        }
    });
}

function goToLogin(){
    window.open("login.php","_self");
}


function goToReport(){
    window.open("ReportAdmin.php","_self");
}

function goToSignUp(){
    window.open("SignUp.php","_self");
}

function goToSoldItem(storeID){
    $.ajax({
        url: "https://digimall.today/Session/setStoreID.php",
        method: "POST",
        data:{StoreID:storeID},
        success: function(data){
           window.location="SoldItems.php";
        }
    });
}

function goToStore(storeID){
    $.ajax({
        url: "https://digimall.today/Session/setStoreID.php",
        method: "POST",
        data:{StoreID:storeID},
        success: function(data){
           window.location="store.php";
        }
    });
}
function goToUserList(){
    window.open("Customer.php","_self");

}
function goToAddSatff(){
    window.open("AddStaff.php","_self");

}
function goToWishlist(){
    window.open("Wishlist.php","_self");
}

function goToStaffList(){
    window.open("staff.php","_self");
}

function goToAddStore(){
    window.open("CreateStoreAdminAndStaff.php","_self");
}

function goToAddItem1(){
    window.open("AddItemAdminAndStaff.php","_self");
}

function goTodeleteItem(){
    window.open("DeleteItemAdminAndStaff.php","_self");

}
//window.open("staff.php","_self");


////***************Faisal script */////////////
function changeItemStatus( toStatus , id){
    $.ajax({
        url: "https://digimall.today/php/changeItemStatus.php",
        method: "POST",
        data:{id:id, toStatus: toStatus},
        success: function(data){

            window.location="PurchasedItems.php";
        }
    });
}

function changeItemStatus1( toStatus , id){
    alert('in');
    $.ajax({
        url: "https://digimall.today/php/changeItemStatus1.php",
        method: "POST",
        data:{id:id, toStatus: toStatus},
        success: function(data){
    alert('ssu');

            window.location="SoldItems.php";
        }
    });
}

function createStore(id){
    window.location="CreateStore.php";
}

function goToPurchasedItem(id){
    window.location="PurchasedItems.php";
}

function goToOwnedStore(id){
    window.location="ownedStore.php";
}
function goToSitting(){
    window.location="Settings.php";
}
function addItem(id){
    window.location="AddItem.php";
}

function deleteFromCart(itemID, userID){
    $.ajax({
        url: "https://digimall.today/php/deleteFromCart.php",
        method: "POST",
        data:{itemID:itemID, userID: userID},
        success: function(data){
            console.log("hi all");
            window.location="Cart.php";
        }
    });
}

function addToCart(itemID, userID, i){

    var quantity = document.getElementById('quantity-' + i).value;
    var errorID = 'quantityError-' + i; 
    if(quantity == '' || quantity == 0){
        document.getElementById(errorID).classList.remove("hide");
    } else {
        document.getElementById(errorID).classList.add("hide");
        $.ajax({
            url: "https://digimall.today/php/addToCart.php",
            method: "POST",
            data:{itemID:itemID, userID: userID, quantity:quantity},
            success: function(data){
                alert("Item added to your cart");
                $('#quantity-' + i).val('');

            }
        });
    }
}

function addToWishList(itemID, userID){

    $.ajax({
        url: "https://digimall.today/php/addToWishList.php",
        method: "POST",
        data:{itemID:itemID, userID: userID},
        success: function(data){
            alert("Item added to your wish list");
            
        }
    });
}



function validatePiment(){
    var holderName = $('#holderName').val();
    var expireDate = $('#expireDate').val();


    var dateExp = /^([0-31]{2})+\/([0-12]{2})$/;
    var nameExp = new RegExp(/^[a-zA-Z ]{2,80}$/);
    nameTest = nameExp.test(holderName);
    dateTest = dateExp.test(expireDate);

    
    if (!nameTest && holderName != "") {
        document.getElementById("holderNameError").classList.remove("hide");
    } else {
        document.getElementById("holderNameError").classList.add("hide")
    }
    if (!dateTest && expireDate != "") {
        document.getElementById("expireDateError").classList.remove("hide");
    } else {
        document.getElementById("expireDateError").classList.add("hide")
    }

}

function reportStore(storeID){
    $.ajax({
        url: "https://digimall.today/Session/setToStoreID.php",
        method: "POST",
        data:{ToStoreID:storeID},
        success: function(data){
           window.location="ReportStore.php";
        }
    });

}

function reportVendor(toUserID){
    $.ajax({
        url: "https://digimall.today/Session/setToUserID.php",
        method: "POST",
        data:{ToUserID:toUserID},
        success: function(data){
           window.location="ReportUser.php";
        }
    });
}
function veiwOtherProfile(otherProfile){
    $.ajax({
        url: "https://digimall.today/Session/setOtherProfileID.php",
        method: "POST",
        data:{otherProfile:otherProfile},
        success: function(data){
           window.location="profile.php";
        }
    });
}

function veiwOtherProfileC(otherProfile){
    $.ajax({
        url: "https://digimall.today/Session/setOtherProfileIDC.php",
        method: "POST",
        data:{otherProfile:otherProfile},
        success: function(data){
           window.location="profile.php";
        }
    });
}
function assignToStaff(staffID, reportID){
    $.ajax({
        url: "https://digimall.today/php/setStaffToReport.php",
        method: "POST",
        data:{StaffID:staffID, ReportID:reportID},
        success: function(data){
           window.location="ReportAdmin.php"; ////////
        }
    });
}

function changeReportStatus(reportID){
    $.ajax({
        url: "https://digimall.today/php/changeReportStatus.php",
        method: "POST",
        data:{ReportID:reportID},
        success: function(data){
           window.location="ReportAdmin.php"; ////////
        }
    });
}

function deleteFromWishlist(itemID, userID){
    $.ajax({
        url: "https://digimall.today/php/deleteFromWishlist.php",
        method: "POST",
        data:{ItemID:itemID, UserID: userID},
        success: function(data){
           window.location="Wishlist.php"; ////////
        }
    });
}



function blockUser(userID, i){
    $.ajax({
        url: "https://digimall.today/php/blockUser.php",
        method: "POST",
        data:{UserID: userID, I: i},
        success: function(data){
           window.location="Customer.php"; ////////
        }
    });
}

function deleteStaff(staffID){
    
    $.ajax({
        url: "https://digimall.today/php/deleteStaff.php",
        method: "POST",
        data:{UserID: staffID},
        success: function(data){
           
           window.location="staff.php"; ////////
        }
    });
}