<?php
include('header.php'); ?>

	<header>
		<h1>Territory Card Inserts</h1>
	</header>

	<section class="homeContainer">
		<div id="create" class="card show">
			<h2>Create Inserts</h1>
			<h3>( Make sure you are signed into your OTM account first )</h3>
			<form action="printlayout.php" type="post">
				<input type="text" name="create" placeholder="e.g: 1-10,15,19,20-24"/>
				<input type="submit" value="Get Territories" />
			</form>
		</div>

		<div id="print" class="card unfocus">
			<h2>Print Inserts</h1>
			<h3>Upload already completed territories below.</h3>
			<!-- <form action="upload.php" type="post" class="dropzoneABCD"> -->
			<form action="printlayout.php" type="post">
				<input type="submit" value="Upload" />
			</form>
		</div>
	</section>

<?php
include('footer.php');


