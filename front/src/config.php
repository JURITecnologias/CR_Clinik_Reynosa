<?php
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$legacyLocal = in_array($host, ['localhost', '127.0.0.1'], true);
$apiPath = $legacyLocal ? '/backend/api-consulmdregister/public/api' : '/bkend/public/api';

return [
    'api_base_url' => getenv('CLINIK_API_BASE_URL') ?: $scheme . '://' . $host . $apiPath,
];
