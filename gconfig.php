<?php
 ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';
 
//Make object of Google API Client for call Google API
$google_client = new Google_Client();
 
//Set the OAuth 2.0 Client ID
$google_client->setClientId('451311549466-pq4v5ut0pht1nrr3d24e9fs8ar2ehakj.apps.googleusercontent.com');
 
//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');
 
//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/web/patient.php');
 
//
$google_client->addScope('email');
 
$google_client->addScope('profile');
 
//start session on web page
session_start();
 
?>