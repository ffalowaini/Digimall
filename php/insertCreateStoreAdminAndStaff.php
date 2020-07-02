<?php header('Access-Control-Allow-Origin: *');
include("Connect.php");
//I need the user id to connect it with the storeID in ownedStore table

if (isset($_POST["name"]) && isset($_POST["desc"]) && isset($_POST["location"]) && isset($_POST["data_check"])) {

    $ID = $_POST["ID"];
    $name = $_POST["name"];
    $desc = $_POST["desc"];
    $location = $_POST["location"];
    $category = json_decode($_POST["data_check"]);
    $image = $_FILES['file']['name'];


    $target = $_SERVER['DOCUMENT_ROOT'] ."https://digimall.today/digimall/assets/store_logo/".basename($image);
    
    move_uploaded_file($_FILES['file']['tmp_name'], $target);
    //check duplicate name

    $mysql_qry = "select StoreName from store where StoreName = '$name'";
    $result = mysqli_query($conn, $mysql_qry);
    $row = mysqli_fetch_array($result);

    if ($row > 0) {
        echo "<strong>The Name of the Store has been used by another store, Choose another Name.";
    } else {
        $mySql = "INSERT INTO store (StoreName, logo,Description) VALUES ('$name','$image','$desc');";
        
        if ($result = mysqli_query($conn, $mySql)) {
            $mysql_qry = "select storeID from store where StoreName = '$name'";
            $result = mysqli_query($conn, $mysql_qry);
            $row = mysqli_fetch_array($result);
            $SID = $row["storeID"];
            $mySql = "INSERT INTO ownedstore (UserID, StoreID) VALUES ('$ID','$SID');";
            if (mysqli_query($conn, $mySql)) {
                $mySql = "INSERT INTO storelocation VALUES ('$SID', '$location');";
                if ($result = mysqli_query($conn, $mySql))
                    foreach ($category as $value) {
                        $mysql_qry = "select CategoryID from category where CategoryName = '$value'";
                        $result = mysqli_query($conn, $mysql_qry);
                        $row = mysqli_fetch_array($result);
                        $CID = $row["CategoryID"];
                        $mySql = "INSERT INTO storecategory VALUES ('$SID','$CID' )";
                        $result = mysqli_query($conn, $mySql);
                    }
                echo "<strong>Store has been created.";
            }
        }
    }
}
$conn->close();
