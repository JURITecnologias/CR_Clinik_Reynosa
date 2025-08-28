<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
?>

<?php if ($page !== 'login.php' && $page !== 'sign-up.php' && $page !== 'forgot-password.php' && $page !== 'change-password.php' && $page !== 'error-404.php' && $page !== 'error-500.php' && $page !== 'coming-soon.php' && $page !== 'under-maintenance.php' && $page !== 'lock-screen.php') {   ?>
    <?php include_once __DIR__ . '/topbar.php';?>

    <?php include_once __DIR__ . '/sidebar.php';?>
<?php }?>