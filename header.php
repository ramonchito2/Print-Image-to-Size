<html lang="en-US" class="svg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Custom Print Layout</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<?php
$psize  = isset( $_REQUEST['psize'] );
$csize  = isset( $_REQUEST['csize'] );
$otm    = isset( $_REQUEST['otm'] );
$newids = isset( $_REQUEST['newids'] ) ? $_REQUEST['newids'] : null;
$bstyle = ($psize || $csize || $otm) ? $otm ? ' class="printlayout otm"' : ' class="printlayout cpl"' : null;
?>

<body<?= $bstyle; ?>>