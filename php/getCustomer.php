<?php header('Access-Control-Allow-Origin: *'); 
require "Connect.php";


$select = "select * from user where UserType = 1 || UserType = 2";
$result = mysqli_query($conn, $select);
$user = array(
    'UserID' => array(),
    'fName' => array(),
    'lName' => array(),
    'PhoneNumber' => array(),
    'Username' => array(),
    'UserType' => array(),
    'Blocked' => array()
);

while($row = mysqli_fetch_array($result)){
    $user['UserID'][] = $row['UserID'];
   $user['UserName'][] = $row['Username'];
   $user['fName'][] = $row['Fname'];
   $user['lName'][] = $row['Lname'];
   $user['PhoneNumber'][] = $row['PhoneNumber'];
   $user['UserType'][] = $row['UserType'];
   $user['Blocked'][] = $row['Blocked'];
}


echo '

<div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;margin-top: 80px;">
    <div class="container" style="width: 100%;">
        <div class="row" style="width: 100%;">
';

for($i = 0; $i < count($user['UserID']); $i++){

if($user['Blocked'][$i] == 0){
    echo '
    <div
            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
            <div class="shadow-sm float-left"
                style="width: 100%;height: 320px;margin-top: 60px;background-color: #fffcf5;">
                <div class="mx-auto" style="width: 100%;height: 80%;">


                    <div class="float-right"
                        style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 2%;margin-right: 8%;">
                        <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$i.'"
                            href="#collapse-'.$i.'" role="button" style="width: 100%;height: 100%;"></a>
                        <div class="collapse" id="collapse-'.$i.'" style="background-color: #f8f8f8;width: 150px;">
                            <div role="group" class="btn-group-vertical shadow-sm"
                                style="width: 100%;background-color: #f8f8f8;">
                                <button class="btn text-left"type="button" onclick="blockUser('. $user['UserID'][$i] . ', 1)">Block</button>
                            </div>
                        </div>
                    </div>
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Username</b>:
                            '.$user['UserName'][$i].'</p>
                        <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>First Name</b>: 
                                    '.$user['fName'][$i].'</p>
                            
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Last Name</b>:
                                '.$user['lName'][$i].'</p>
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>User Type</b>:
                                '.$user['UserType'][$i].'</p>
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Phone Number</b>:
                            '.$user['PhoneNumber'][$i].'</p>
                            <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Blcoked</b>:
                            No</p>
                    </div>
                </div>
            </div>
    ';
                           } else {

                                echo '
    <div
            class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
            <div class="shadow-sm float-left"
                style="width: 100%;height: 320px;margin-top: 60px;background-color: #fffcf5;">
                <div class="mx-auto" style="width: 100%;height: 80%;">


                    <div class="float-right"
                        style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 2%;margin-right: 8%;">
                        <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$i.'"
                            href="#collapse-'.$i.'" role="button" style="width: 100%;height: 100%;"></a>
                        <div class="collapse" id="collapse-'.$i.'" style="background-color: #f8f8f8;width: 150px;">
                            <div role="group" class="btn-group-vertical shadow-sm"
                                style="width: 100%;background-color: #f8f8f8;">
                                <button class="btn text-left"type="button" onclick="blockUser('. $user['UserID'][$i] . ', 0)">UnBlock</button>
                            </div>
                        </div>
                    </div>
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Username</b>:
                            '.$user['UserName'][$i].'</p>
                        <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>First Name</b>: 
                                    '.$user['fName'][$i].'</p>
                            
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>User Type</b>:
                                '.$user['lName'][$i].'</p>
                                <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Last Name</b>:
                                '.$user['UserType'][$i].'</p>
                        <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Phone Number</b>:
                            '.$user['PhoneNumber'][$i].'</p>
                            <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;"><b>Blocked</b>:
                            Yes</p>
                    </div>
                </div>
            </div>
    ';
                            }
                            
}
echo '</div>
</div>
</div>';

$conn->close();

?>