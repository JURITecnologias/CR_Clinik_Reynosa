<?php
$filename = basename($_SERVER['PHP_SELF'], '.php');

$acronyms = ['ui', 'ai', 'js', 'api', 'css', 'html', 'php', 'seo'];

if ($filename === 'index') {
    $title = 'Admin Dashboard';
} else {
    $parts = explode('-', str_replace('ui-', '', strtolower($filename)));

    $hasIcon = false;
    $hasChart = false;
    $cleaned_parts = [];

    foreach ($parts as $part) {
        if ($part === 'icon') {
            $hasIcon = true;
            continue;
        }
        if ($part === 'chart') {
            $hasChart = true;
            continue;
        }
        if ($part === 'all') {
            continue; 
        }
        $cleaned_parts[] = $part;
    }

    $formatted_parts = array_map(function ($word) use ($acronyms) {
        return in_array($word, $acronyms) ? strtoupper($word) : ucfirst($word);
    }, $cleaned_parts);

    if ($hasIcon) {
        $formatted_parts[] = 'Icons';
    }

    if ($hasChart) {
        $formatted_parts[] = 'Charts';
    }

    $title = implode(' ', $formatted_parts);
}
?>

	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?= $title ?> | CR Clinik - Sistema de Registro Medico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CR Clinik es un sistema de registro medico completo y fácil de usar, diseñado para ayudar a las clínicas y consultorios a gestionar sus operaciones diarias de manera eficiente.">
    <meta name="keywords" content="CR Clinik , sistema de registro medico, EMR, gestión de clínicas, gestión de consultorios, software médico, historia clínica electrónica, citas médicas, facturación médica">
    <meta name="author" content="crclinik.com">