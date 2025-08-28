<?php

session_start();

$_SESSION['loggedin'] = false;
unset($_SESSION['user_login']);
?>
<script>
    sessionStorage.clear();
    window.location.href = 'login.php';
</script>