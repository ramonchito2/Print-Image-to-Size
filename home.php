<section id="mainContainer">
	<div id="create" class="card<?= $ccard; ?>">
		<h2>Create Inserts</h1>
		<h3>( Make sure you are signed into your OTM account first )</h3>
		<form action="printlayout.php" type="post">
			<input id="terrnums" type="text" name="create" placeholder="e.g: 1-10,15,19,20-24"/>
			<input class="btn" type="button" onclick="createInserts(this)" value="Get Territories" />
		</form>
	</div>

	<div id="print" class="card<?= $pcard; ?>">
		<h2>Print Inserts</h1>
		<h3>Upload already completed territories below.</h3>
		<form action="upload.php" type="post" class="">
			<div id="fileUpload" class="btn btn-primary">
			    <span>Upload File(s)</span>
			    <input name="file" type="file" class="upload" multiple onchange="printInserts(this.files)" />
			</div>
		</form>
	</div>
</section>

<div id="menupanel">
	<div id="menucontainer">
			<h2></h2>
			<h3>Options</h3>
		<div id="options">
			<div class="pagenums">
				<input type="checkbox" name="pagenums" id="pagenums">
				<label for="pagenums">Hide Page Numbers</label>
			</div>
			<div class="cropmarks">
				<input type="checkbox" name="cropmarks" id="cropmarks">
				<label for="cropmarks">Show Cropmarks</label>
			</div>
			<div class="campaign">
				<input type="checkbox" name="campaign" id="campaign">
				<label for="campaign">Enable Campaign Mode</label>
				<input id="campaigntext" type="text" placeholder="Campana Enero 2016">					
			</div>
		</div>
		<a href="." class="startover btn" onclick="confirm('Are you sure you want to start over?')">Start Over</a>
	</div>
</div>
