<?php
$link = $_SERVER[ 'PHP_SELF' ];
$link_array = explode( '/', $link );
$page = end( $link_array );
?> 

<?php
if ($page === 'layout-mini.php') {
    echo '<body class="mini-sidebar">';  
} else {
    echo '<body>';
}
?>