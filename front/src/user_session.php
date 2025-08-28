<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    header("location: login.php");
    exit;
}
return ($_SESSION['user_login']) ? $_SESSION['user_login'] : null;