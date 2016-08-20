<html lang="en-US" class="svg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Raytown Territory Card Printout</title>
</head>
<body>
	<style>
	body {
	    background: #fafafa;
	}
	.page-body {
	    background: #ffffff;
	    width: 8.5in;
	    height: 11in;
	    margin: auto;
	    box-shadow: 0px 0px 10px 6px rgba(0, 0, 0, 0.04);
	    margin-bottom: 40px;
	    display: flex;
	    justify-content: center;
	    align-items: center;
	}

	.page-container {
	    width: 8in;
	    height: 10in;
	    border: 3px dashed #d4d4d4;
	    margin: auto;
	    box-sizing: border-box;
	    position: absolute;
	}

	.page-inner {
	    width: 100%;
	    height: 100%;
	    text-align: center;
	}

	.page-container span {
	    position: absolute;
	    top: 50%;
	    left: 50%;
	    transform: translate(-50%,-50%);
	    font-size: 100px;
	    color: #eaeaea;
	    display: none;
	}

	img {
		width: 100%;
		height: auto;
		max-height: 100%;
	}

	@media print {
	    .page-body {
	        margin-bottom: 10px;
	        box-shadow: none;
	        background: white;
	    }
	}
	</style>

	<?php
		$dir  = '/territories/cards/';
		$pdf1 = $dir . 'FullMapCardTest.png';
		$pdf2 = $dir . 'test2.jpeg';
		$pdf3 = $dir . 'test3.jpeg';
		$pdf4 = $dir . 'test4.jpeg';
		$pdf5 = $dir . 'test5.jpg';
	?>
	<div class="page-body">
		<div class="page-container">
			<div class="page-inner"><img src="<?= $pdf1; ?>" width="100%" height="auto"></div>
			<span>01</span>
		</div>
	</div>
	<div class="page-body">
		<div class="page-container">
			<div class="page-inner"><img src="<?= $pdf2; ?>" width="100%" height="auto"></div>
			<span>02</span>
		</div>
	</div>
</body></html>
