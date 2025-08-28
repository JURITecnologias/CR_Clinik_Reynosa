<?php
session_start();

$_SESSION["loggedin"]=true;
// Función para obtener información del usuario desde el backend y almacenarla en la sesión
function fetchAndStoreUserProfile($apiUrl, $token = null) {
    $ch = curl_init($apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($token) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Basic $token"
        ]);
    }
    $response = curl_exec($ch);
    curl_close($ch);

    if ($response) {
        $userData = json_decode($response, true);
        if ($userData) {
            $_SESSION['user_login'] = $userData;
        }
    }
}

$token = isset($_GET['t']) ? $_GET['t'] : null;

$config = include(__DIR__ . '/config.php');
$apiBaseUrl = $config['api_base_url'];
fetchAndStoreUserProfile($apiBaseUrl . '/profile', $token);

echo $token;

//Redirige al index
header("Location: index.php");
exit;