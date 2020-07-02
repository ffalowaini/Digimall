<?php 
require "Connect.php";
session_start();
$userID = $_SESSION['UserID'];

$mysql = "SELECT UserType from user where UserID = '$userID'";
$result = mysqli_query($conn, $mysql);
$row = mysqli_fetch_array($result);
$userType = $row['UserType'];

$report = array(
    'reportID' => array(),
    'title' => array(),
    'email' => array(),
    'FromUserID' => array(),
    'message' => array(),
    'type' => array(),
    'ToStoreID' => array(),
    'ToUserID' => array(),
    'StaffID' => array(),
    'ReportStatus' => array(),
    'ReportSendType' => array(),
    'Assaigned' => array()
);

//Admin Report 
if($userType == 3){    
$mysql = "SELECT * from report";
$result1 = mysqli_query($conn, $mysql);



while($row = mysqli_fetch_array($result1)){
//Bring the name of the user who send from user table(FromUserID)
if($row['ReportSendType'] == 2 || $row['ReportSendType'] == 1){
$mysql = 'select Username from user where UserID = '.$row['FromUserID'].'';
$result = mysqli_query($conn,$mysql);
$user = mysqli_fetch_array($result);
$fromUserName = $user["Username"];
}

//Bring the type of the report from reportType table(type)
$mysql = 'select Name from reporttype where ID = '.$row['type'].'';
$result = mysqli_query($conn,$mysql);
$reportType = mysqli_fetch_array($result);
$type = $reportType["Name"];

//Bring the name of the store from store table(ToStoreID)
if($row['ReportSendType'] == 1){
$mysql = 'select  StoreName from store where StoreID = '.$row['ToStoreID'].'';
$result = mysqli_query($conn,$mysql);
$store = mysqli_fetch_array($result);
$toStoreName = $store["StoreName"];
}


//Bring the name of the user from user table(ToUserID)
if($row['ReportSendType'] == 2){
$mysql = 'select Username from user where UserID = '.$row['ToUserID'].'';
$result = mysqli_query($conn,$mysql);
$user = mysqli_fetch_array($result);
$toUserName = $user["Username"];
}

if($row['Assigned'] == 1){
//Bring the name of the staff from user table(StaffID)
$mysql = 'select Username from user where UserID = '.$row['StaffID'].'';
$result = mysqli_query($conn,$mysql);
$staff = mysqli_fetch_array($result);
$staffName = $staff["Username"];
}

//Bring the status of the report from reportStatusType table(ReportStatus)
$mysql = 'select Name from reportstatustype where ID = '.$row['ReportStatus'].'';
$result = mysqli_query($conn,$mysql);
$reportStatusType = mysqli_fetch_array($result);
$statustype = $reportStatusType["Name"];



//ToStore
    if($row['ReportSendType'] == 1){
        $report['reportID'][] = $row["ReportID"];
        $report['title'][] = '';
        $report['email'][] = '';

    $report['FromUserID'][] = $fromUserName;
    $report['message'][] = $row['message'];
    $report['type'][] = $type;
    $report['ToStoreID'][] = $toStoreName;
    $report['ToUserID'][] = '';
  if($row['Assigned'] == 1){
    $report['StaffID'][] = $staffName;
  }else{
    $report['StaffID'][] = '';
  }
    $report['ReportStatus'][] = $statustype;
    $report['ReportSendType'][] = $row['ReportSendType'];
    $report['Assaigned'][] = $row['Assigned'];
    } 
    //ToUser
    if($row['ReportSendType'] == 2){
        $report['reportID'][] = $row["ReportID"];
        $report['title'][] = '';
        $report['email'][] = '';

        $report['FromUserID'][] = $fromUserName;
        $report['message'][] = $row['message'];
        $report['type'][] = $type;
        $report['ToStoreID'][] = '';
        $report['ToUserID'][] = $toUserName;
        if($row['Assigned'] == 1){
            $report['StaffID'][] = $staffName;
          }else{
            $report['StaffID'][] = '';
          }
        $report['ReportStatus'][] = $statustype;
        $report['ReportSendType'][] = $row['ReportSendType'];
        $report['Assaigned'][] = $row['Assigned'];

}
    //Contact Us
    if($row['ReportSendType'] == 3){
        $report['reportID'][] = $row["ReportID"];
        $report['title'][] = $row["title"];
        $report['FromUserID'][] = '';
        $report['email'][] = $row["email"];
        $report['message'][] = $row['message'];
        $report['type'][] = $type;
        $report['ToStoreID'][] = '';
       $report['ToUserID'][] = '';
    if($row['Assigned'] == 1){
        $report['StaffID'][] = $staffName;
      }else{
        $report['StaffID'][] = '';
      }
        $report['ReportStatus'][] = $statustype;
        $report['ReportSendType'][] = $row['ReportSendType'];
        $report['Assaigned'][] = $row['Assigned'];

    }
}
}















//Staff Report
 if($userType == 4){
    $mysql = "select * from report where StaffID = '$userID' and ReportStatus = 1";
    $result1 = mysqli_query($conn, $mysql);



while($row = mysqli_fetch_array($result1)){


//Bring the name of the user who send from user table(FromUserID)
if($row['ReportSendType'] == 2 || $row['ReportSendType'] == 1){
$mysql = 'select Username from user where UserID = '.$row['FromUserID'].'';
$result = mysqli_query($conn,$mysql);
$user = mysqli_fetch_array($result);
$fromUserName = $user["Username"];
}

//Bring the type of the report from reportType table(type)
$mysql = 'select Name from reporttype where ID = '.$row['type'].'';
$result = mysqli_query($conn,$mysql);
$reportType = mysqli_fetch_array($result);
$type = $reportType["Name"];

//Bring the name of the store from store table(ToStoreID)
if($row['ReportSendType'] == 1){
$mysql = 'select  StoreName from store where StoreID = '.$row['ToStoreID'].'';
$result = mysqli_query($conn,$mysql);
$store = mysqli_fetch_array($result);
$toStoreName = $store["StoreName"];
}


//Bring the name of the user from user table(ToUserID)
if($row['ReportSendType'] == 2){
$mysql = 'select Username from user where UserID = '.$row['ToUserID'].'';
$result = mysqli_query($conn,$mysql);
$user = mysqli_fetch_array($result);
$toUserName = $user["Username"];
}

//Bring the name of the staff from user table(StaffID)
if ($row['Assigned'] == 1){
$mysql = 'select Username from user where UserID = '.$row['StaffID'].'';
$result = mysqli_query($conn,$mysql);
$staff = mysqli_fetch_array($result);
$staffName = $staff["Username"];
}

//Bring the status of the report from reportStatusType table(ReportStatus)
$mysql = 'select Name from reportstatustype where ID = '.$row['ReportStatus'].'';
$result = mysqli_query($conn,$mysql);
$reportStatusType = mysqli_fetch_array($result);
$statustype = $reportStatusType["Name"];



//ToStore
    if($row['ReportSendType'] == 1){
        $report['reportID'][] = $row["ReportID"];
        $report['title'][] = '';
        $report['email'][] = '';
    $report['FromUserID'][] = $fromUserName;
    $report['message'][] = $row['message'];
    $report['type'][] = $type;
    $report['ToStoreID'][] = $toStoreName;
    $report['ToUserID'][] = '';
    $report['StaffID'][] = $staffName;
    $report['ReportStatus'][] = $statustype;
    $report['ReportSendType'][] = $row['ReportSendType'];
    $report['Assaigned'][] = $row['Assigned'];

    } 
    //ToUser
    if($row['ReportSendType'] == 2){
        $report['reportID'][] = $row["ReportID"];
        $report['title'][] = '';
        $report['email'][] = '';
        $report['FromUserID'][] = $fromUserName;
        $report['message'][] = $row['message'];
        $report['type'][] = $type;
        $report['ToStoreID'][] = '';
        $report['ToUserID'][] = $toUserName;
        $report['StaffID'][] = $staffName;
        $report['ReportStatus'][] = $statustype;
        $report['ReportSendType'][] = $row['ReportSendType'];
        $report['Assaigned'][] = $row['Assigned'];

}
    
    if($row['ReportSendType'] == 3){
        $report['reportID'][] = $row["ReportID"];
        $report['FromUserID'][] = '';
        $report['title'][] = $row["title"];
        $report['email'][] = $row["email"];
        $report['message'][] = $row['message'];
        $report['type'][] = $type;
        $report['ToStoreID'][] ='';
        $report['ToUserID'][] = '';
        $report['StaffID'][] = $staffName;
        $report['ReportStatus'][] = $statustype;
        $report['ReportSendType'][] = $row['ReportSendType'];
        $report['Assaigned'][] = $row['Assigned'];


    }
}
    
}
echo '

<div class="mx-auto" style="width: 90%;background-color: rgba(255,249,219,0.7);margin-right: 5%;margin-top: 80px;">
    <div class="container" style="width: 100%;">
        <div class="row" style="width: 100%;">
';

for($i =0 ; $i< count($report["message"]); $i++){
    

    if($userType == 3){
        
    //ToStore (6 paragraphs)
    if($report["ReportSendType"][$i] == 1){
        echo '
        <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div style="width: 100%;height: 80%;">
                        
                            <p
                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">From :
                            '.$report['FromUserID'][$i].'</p>
                            
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">To: 
                                '.$report['ToStoreID'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                '.$report['message'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                '.$report['type'][$i].'</p>  ';
                                
                                
                                if($report['Assaigned'][$i] == 1) { echo '
                                    <p
                                        style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Staff:
                                        '.$report['StaffID'][$i].'</p>'; } echo '
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                '.$report['ReportStatus'][$i].'</p>
                        </div>
                        <div class="" style="width: 100%;height: 20%; margin-left: 2%;">
                            Assign to staff:
                            <select class="" name="address" style="margin-bottom: 0px;" required onchange= "assignToStaff(this.value, ' . $report['reportID'][$i].')">
                                <option hidden disabled selected value> -- select a staff -- </option>';

                                $myslq = "SELECT UserID, Username from user where UserType = 4";
                                $reuslt = mysqli_query($conn, $myslq);
                                $staff = array(
                                    'id' => array(),
                                    'username' => array()
                                );
                                
                                
                                while($row = mysqli_fetch_array($reuslt)){
                                    $staff['id'][] = $row["UserID"];
                                    $staff['username'][] = $row["Username"];
                                    
                                }
                                for($j = 0; $j < count($staff['username']); $j++){
                                   echo '<option value="' .$staff['id'][$j].'">.'.$staff['username'][$j].'.</option>';
                                }
                               echo '
                              </select> 
                        </div>
                    </div>
                </div>
        ';
    
    
    
    }
    //ToUser (6 paragraphs)
    if($report["ReportSendType"][$i] == 2){
        echo '
        <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div style="width: 100%;height: 80%;">

                        <p
                        style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">From :
                        '.$report['FromUserID'][$i].'</p>
                            
                        <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">To:
                                 '.$report['ToUserID'][$i].'</p>
                            
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                '.$report['message'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                '.$report['type'][$i].'</p>
                            '; if($report['Assaigned'][$i] == 1) { echo '
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Staff:
                                '.$report['StaffID'][$i].'</p>'; } echo '
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                '.$report['ReportStatus'][$i].'</p>
                        </div>
                        <div class="" style="width: 100%;height: 20%; margin-left: 2%;">
                            Assign to staff:
                            <select class="" name="address" style="margin-bottom: 0px;" required onchange= "assignToStaff(this.value, '.$report['reportID'][$i].')">
                                <option hidden disabled selected value> -- select a staff -- </option>';

                                $myslq = "select UserID,Username from user where UserType = 4";
                                $reuslt = mysqli_query($conn, $myslq);
                                $staff = array(
                                    'id' => array(),
                                    'username' => array()
                                );
                                while($row = mysqli_fetch_array($reuslt)){
                                    $staff['id'][] = $row["UserID"];
                                    $staff['username'][] = $row["Username"];
                                    
                                }
                                
                                for($j = 0; $j < count($staff['username']); $j++){
                                   echo '<option value="'.$staff['id'][$j].'">.'.$staff['username'][$j].'.</option>';
                                }
                               echo '
                              </select> 
                        </div>
                    </div>
                </div>
        ';
    
    
    
    }
    //Contact Us (6 paragraphs)
    if($report["ReportSendType"][$i] == 3){
        echo '
        <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div style="width: 100%;height: 80%;">
                            
                            
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Title:
                                '.$report['title'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Email:
                                '.$report['email'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                '.$report['message'][$i].'</p>
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                '.$report['type'][$i].'</p>
                            '; if($report['Assaigned'][$i] == 1) { echo '
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Staff:
                                '.$report['StaffID'][$i].'</p>'; } echo '
                            <p
                                style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                '.$report['ReportStatus'][$i].'</p>
                        </div>
                        <div class="" style="width: 100%;height: 20%; margin-left: 2%;">
                            Assign to staff:
                            <select class="" name="address" style="margin-bottom: 0px;" required onchange= "assignToStaff(this.value, '.$report['reportID'][$i].')">
                                <option hidden disabled selected value> -- select a staff -- </option>';

                                $myslq = "select UserID,Username from user where UserType = 4";
                                $reuslt = mysqli_query($conn, $myslq);
                                $staff = array(
                                    'id' => array(),
                                    'username' => array()
                                );
                                
                                while($row = mysqli_fetch_array($reuslt)){
                                    $staff['id'][] = $row["UserID"];
                                    $staff['username'][] = $row["Username"];
                                }
                                
                                for($j = 0; $j < count($staff['username']); $j++){
                                   echo '<option value="'.$staff['id'][$j].'">.'.$staff['username'][$j].'.</option>';
                                }
                               echo '
                              </select> 
                        </div>
                    </div>
                </div>
        ';
    }
    }


    if($userType == 4){
        
        //ToStore (6 paragraphs)
        if($report["ReportSendType"][$i] == 1){
            echo '
            <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div class="mx-auto" style="width: 100%;height: 80%;">


                            <div class="float-right"
                                style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 2%;margin-right: 8%;">
                                <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$i.'"
                                    href="#collapse-'.$i.'" role="button" style="width: 100%;height: 100%;"></a>
                                <div class="collapse" id="collapse-'.$i.'" style="background-color: #f8f8f8;width: 150px;">
                                    <div role="group" class="btn-group-vertical shadow-sm"
                                        style="width: 100%;background-color: #f8f8f8;">
                                        <button class="btn text-left"type="button" onclick="changeReportStatus('.$report['reportID'][$i].')">Done</button>
                                    </div>
                                </div>
                            </div>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">From:
                                    '.$report['FromUserID'][$i].'</p>
                                <p
                                        style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">To: 
                                        '.$report['ToStoreID'][$i].'</p>
                                    
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                    '.$report['message'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                    '.$report['type'][$i].'</p>
                                '; if($report['Assaigned'][$i] == 1) { echo '
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Staff:
                                    '.$report['StaffID'][$i].'</p>'; } echo '
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                    '.$report['ReportStatus'][$i].'</p>
                            </div>
                        </div>
                    </div>
            ';
        
        
        
        }
        //ToUser (6 paragraphs)
        if($report["ReportSendType"][$i] == 2){
            echo '
            <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div class="mx-auto" style="width: 100%;height: 80%;">


                            <div class="float-right"
                                style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 2%;margin-right: 8%;">
                                <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$i.'"
                                    href="#collapse-'.$i.'" role="button" style="width: 100%;height: 100%;"></a>
                                <div class="collapse" id="collapse-'.$i.'" style="background-color: #f8f8f8;width: 150px;">
                                    <div role="group" class="btn-group-vertical shadow-sm"
                                        style="width: 100%;background-color: #f8f8f8;">
                                        <button class="btn text-left"type="button" onclick="changeReportStatus('.$report['reportID'][$i].')">Done</button>
                                    </div>
                                </div>
                            </div>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">From:
                                    '.$report['FromUserID'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">To:
                                    '.$report['ToUserID'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                    '.$report['message'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                    '.$report['type'][$i].'</p>
                                <p
                                    '; if($report['Assaigned'][$i] == 1) { echo '
                                        <p
                                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Staff:
                                            '.$report['StaffID'][$i].'</p>'; } echo '
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                    '.$report['ReportStatus'][$i].'</p>
                            </div>
                        </div>
                    </div>
            ';
        
        
        
        }
        //Contact Us (6 paragraphs)
        if($report["ReportSendType"][$i] == 3){
            echo '
            <div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div class="mx-auto" style="width: 100%;height: 80%;">


                            <div class="float-right"
                                style="background-image: url(&quot;assets/img/icons8-more-48.png&quot;);width: 24px;height: 24px;background-size: contain;margin-top: 2%;margin-right: 8%;">
                                <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-'.$i.'"
                                    href="#collapse-'.$i.'" role="button" style="width: 100%;height: 100%;"></a>
                                <div class="collapse" id="collapse-'.$i.'" style="background-color: #f8f8f8;width: 150px;">
                                    <div role="group" class="btn-group-vertical shadow-sm"
                                        style="width: 100%;background-color: #f8f8f8;">
                                        <button class="btn text-left"type="button" onclick="changeReportStatus('.$report['reportID'][$i].')">Done</button>
                                    </div>
                                </div>
                            </div>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Title:
                                    '.$report['title'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Email:
                                    '.$report['email'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Message:
                                    '.$report['message'][$i].'</p>
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Type:
                                    '.$report['type'][$i].'</p>
                                    '; if($report['Assaigned'][$i] == 1) { echo '
                                        <p
                                            style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Assigned Sttaf:
                                            '.$report['StaffID'][$i].'</p>'; } echo '
                                <p
                                    style="font-size: 20px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">Report Status:
                                    '.$report['ReportStatus'][$i].'</p>
                            </div>
                        </div>
                    </div>
            ';
        }
        }

}
echo '</div>
</div>
</div>'

























/* 
<div
                    class="col-sm-12 col-md-12 col-lg-12 col-xl-12 offset-1 offset-sm-0 offset-md-0 offset-lg-0 offset-xl-0">
                    <div class="shadow-sm float-left"
                        style="width: 100%;height: 400px;margin-top: 60px;background-color: #fffcf5;">
                        <div style="width: 100%;height: 100%;">
                            <div class="float-right"
                                style="background-image: url('icons8-more-48.png');width: 24px;height: 24px;background-size: contain;margin-top: 5%;margin-right: 8%;">
                                <a class="btn" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1"
                                    href="#collapse-1" role="button" style="width: 100%;height: 100%;"></a>
                                <div class="collapse" id="collapse-1" style="background-color: #f8f8f8;width: 150px;">
                                    <div role="group" class="btn-group-vertical shadow-sm"
                                        style="width: 100%;background-color: #f8f8f8;"><button class="btn text-left"
                                            type="button">Delete</button></div>
                                </div>
                            </div>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                            <p
                                style="font-size: 30px;font-family: Roboto, sans-serif;font-weight: normal;font-style: normal;color: #2a2a2a;width: 100%;margin-top: 2%;margin-left: 2%;">
                                KFUPM</p>
                        </div>
                    </div>
                </div>

*/



?>