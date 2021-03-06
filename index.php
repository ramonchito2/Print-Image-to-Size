<?php
include('header.php');

if( $psize || $csize || $otm): // Show Print Layout
	include( 'printlayout.php');
else: ?>

	<?php 
	if( $newids ):
		include('addNewIds.php');
		var_dump($msg);
	endif; ?>
	
	<section class="homeContainer">
		<div id="cpl">
			<h1>Custom Print Layout</h1>
			<!-- <form action="upload.php" type="post" class="dropzoneABCD"> -->
			<form action="printlayout.php" type="post">
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

		<div id="otm" class="show">
			<div class="which">
				<h1>Which Territories?</h1>
				<form action="printlayout.php" method="get">
					<h3 style="text-align: center;">Input OTM territories you want to print<span>( Make sure you are signed into your account first )</h3>
					<input type="text" name="otm" placeholder="e.g: 1-10,15,19,20-24"/>
					<input type="submit" value="Submit" />
				</form>
				<a class="updateLinks" href="#">Update Links</a>
			</div>
			<div class="updateids hidden">
				<h1>Update Terr IDs</h1>
				<form action="" method="post">
					<h3 style="text-align: center;">Paste the IDs copied from OTM here</h3>
					<input type="text" name="newids" placeholder="paste here"/>
					<input type="submit" value="Submit" />
				</form>
				<a class="printTerrs" href="#">Print Territories</a>
			</div>
		</div>

		<!-- <div class="onoffswitch">
		    <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked />
		    <label class="onoffswitch-label" for="myonoffswitch">
		        <span class="onoffswitch-inner"></span>
		        <span class="onoffswitch-switch"></span>
		    </label>
		</div> -->
	</section>

<?php endif;

include('footer.php');


