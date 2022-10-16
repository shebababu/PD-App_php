<?php include('gconfig.php'); ?>
<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('header.php'); 
?>
<?php require('database.php'); ?>
<?php
    // if($_SESSION['google_access_token'] == '') {
    //     header("Location: login.php");
    // }
    if(isset($_GET["code"])){
        $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
    // print_r($token);die;
    if(!isset($token['error'])){
    //Set the access token used for requests
    $google_client->setAccessToken($token['access_token']);
    //Store "access_token" value in $_SESSION variable for future use.
    $_SESSION['token'] = $token;
    $_SESSION['google_access_token'] = $token['access_token'];
    //Create Object of Google Service OAuth 2 class
    $google_service = new Google_Service_Oauth2($google_client);
    //Get user profile data from google
    $data = $google_service->userinfo->get();
    //Below you can find Get profile data and store into $_SESSION variable
    if(!empty($data['given_name']))
    {
    $_SESSION['user_login_type'] = 'google';
    $_SESSION['user_name'] = $data['given_name'];
    }
    // if(!empty($data['family_name']))
    // {
    // $_SESSION['user_last_name'] = $data['family_name'];
    // }
    if(!empty($data['email']))
    {
    $_SESSION['user_email'] = $data['email'];
    }
    // if(!empty($data['gender']))
    // {
    // $_SESSION['user_gender'] = $data['gender'];
    // }
    if(!empty($data['picture']))
    {
    $_SESSION['user_image'] = $data['picture'];
    }
    }
    }
?>
<div class="col-md-9 main_div">
    <div class="sub_div">
        <div class="panel panel-default plr10 ptb10">
        
            <br><br>
            <h3> Patient's Page</h3>
            <p>Welcome user <?php echo ucfirst($_SESSION['user_name']);?></p>
            <!-- <h5 class="card-title"><?php echo 'mobin.koshy7@gmail.com';?></h5> -->
            <p class="card-text">Your Email is: mobin.koshy7@gmail.com </p>
        </div>
        
    </div>
</div>
