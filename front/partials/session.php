<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');


// Initialize the session
session_start();
// // Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    if(basename($_SERVER['PHP_SELF']) != 'login.php'){
        header("location: login.php");
        exit;
    }
   
}
?>