<html lang="en-US" class="svg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Raytown Territory Card Printout</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php
	$width = isset( $_REQUEST['width'] );
	$height = isset( $_REQUEST['height'] );
	if( $width && $height ) { // Show Print Layout
		include( 'printlayout.php ');
	} else { // Show Home Page
		?>

		<div class="homeContainer">
		<h1>Print Image to Size</h1>
			<form action="" type="post">
				<h3>Paper Size</h3>
				<input type="text" name="width" placeholder="width">
				<span>x</span>
				<input type="text" name="height" placeholder="height">
				<h3 style="margin-top:40px;">Desired Image Size</h3>
				<input type="text" name="dwidth" placeholder="width">
				<span>x</span>
				<input type="text" name="dheight" placeholder="height">
				<input type="submit" value="Get All Images">
			</form>
		</div>


		<?php
	}
	?>
</body></html>
