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
    <title> <?= $title ?> | Dreams EMR - Responsive Bootstrap 5 Medical Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="DreamsEMR is a flexible, powerful, modern, and responsive Bootstrap 5 admin template with endless potential.">
    <meta name="keywords" content="DreamsEMR admin template, admin template, dashboard template, responsive admin template, medical admin template, web app">
    <meta name="author" content="dreamstechnologies">