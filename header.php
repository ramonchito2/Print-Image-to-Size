<html lang="en-US" class="svg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Custom Print Layout</title>
	<link rel="stylesheet" href="./assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>

<body>

<?php
if( isset($_REQUEST['print']) ):
	$hclass = ' class="alt"';
	$ccard = ' unfocus';
	$pcard = '';
else:
	$hclass = '';
	$ccard = '';
	$pcard = ' unfocus';
endif; ?>

<header<?= $hclass; ?>>
	<div>
		<img id="menu" src="./assets/icons/menu_white.png">
		<a href="./"><h1>Territory Card Inserts</h1></a>	
	</div>
</header>