<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true ){
    echo '<script>window.location.href = "index.php";</script>';
}
return ($_SESSION['user_login']) ? $_SESSION['user_login'] : null;