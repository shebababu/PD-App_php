<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('gconfig.php');

//Destroy entire session data.
session_destroy();
//redirect page to index.php
header('location:login.php');
?>