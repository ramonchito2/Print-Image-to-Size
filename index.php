<html lang="en-US" class="svg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <title>Custom Print Layout</title>
	<link rel="stylesheet" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="script.js"></script>
</head>
<?php
$psize  = isset( $_REQUEST['psize'] ) ? $_REQUEST['psize'] : 0;
$csize  = isset( $_REQUEST['csize'] ) ? $_REQUEST['csize'] : 0;
$otm    = isset( $_REQUEST['otm']);
$bstyle = ($psize || $csize || $otm) ? $otm ? ' class="printlayout otm"' : ' class="printlayout cpl"' : null;
?>
<body<?= $bstyle; ?>>
<?php
	if( $psize || $csize || $otm): // Show Print Layout
		include( 'printlayout.php ');
	else: ?>

		<section class="homeContainer">
			<div id="cpl" class="show">
				<h1>Custom Print Layout</h1>
				<form action="" type="post">
					<input id="psize" type="text" name="psize" placeholder="8.5 x 11" list="papersize" />
					<label for="psize" style="margin-bottom:40px;">Paper Size</label>
					<datalist name="papersize" id="papersize">
						<option value="7 x 10">Executive</option>
						<option value="8 x 13">Folio</option>
						<option value="5 x 8">Index</option>
						<option value="11 x 17">Ledger</option>
						<option value="8 1/2 x 14">Legal</option>
						<option value="8 1/2 x 11" selected="selected">Letter</option>
						<option value="4 x 6">Photo</option>
						<option value="5 1/2 x 8 1/2">Half</option>
						<option value="11 x 17">Tabloid</option>
					</datalist>
					<input id="csize" type="text" name="csize" placeholder="8 x 10" list="customsize" />
					<label for="csize">Desired Size</label>
					<datalist name="customsize" id="customsize">
						<option value="7 x 10">Executive</option>
						<option value="8 x 13">Folio</option>
						<option value="5 x 8">Index</option>
						<option value="11 x 17">Ledger</option>
						<option value="8 1/2 x 14">Legal</option>
						<option value="8 1/2 x 11" selected="selected">Letter</option>
						<option value="4 x 6">Photo</option>
						<option value="5 1/2 x 8 1/2">Half</option>
						<option value="11 x 17">Tabloid</option>
					</datalist>
					<input type="submit" value="Create Print Layout" />
				</form>
			</div>

			<div id="otm">
				<h1>Which Territories?</h1>
				<form action="" type="post">
					<h3 style="text-align: center;">Input OTM territories you want to print<span>( Make sure you are signed into your account first )</h3>
					<input type="text" name="otm" placeholder="e.g: 1-10,15,19,20-24"/>
					<input type="submit" value="Submit" />
				</form>
			</div>

			<div class="onoffswitch">
			    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked />
			    <label class="onoffswitch-label" for="myonoffswitch">
			        <span class="onoffswitch-inner"></span>
			        <span class="onoffswitch-switch"></span>
			    </label>
			</div>
		</section>

	<?php endif; ?>

</body></html>
