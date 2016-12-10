<?php
if( isset($_REQUEST['create']) ): // OTM Print Layout
	/**
	Currently ids have to be manually copied form OTM
	IDs dynamically change when territory is re-checkedout
	Easy JS way to get all ids of terrs is to use the bookmarklet
	*/
	
	// All terr IDs from OTM
	$ids = [
		"512372","512373","512374","520289","512376","512377","512378","512379","512380","512381","512382","512383","520279","512385","512386","512387","512388","512389","512390","512391","512392","512393","512394","512395","512396","512397","512398","512399","512400","520280","512402","512403","512404","512405","512406","512407","512408","512409","512410","512411","512412","512413","512414","512415","512416","512417","512418","512419","512420","512421","512422","512423","512424","512425","512426","512427","512428","512429"
	];
	// Remove '0' key from array. Needed for foreach loop logic
	array_unshift($ids,"");
	unset($ids[0]);

	// Requested terr numbers to display
	$submitted = $_REQUEST['create'];

	if( $submitted ):

		// Take submitted range of numbers and first turn into string of individual numbers
		$terrs = preg_replace_callback('/(\d+)-(\d+)/', function($m) {
		    return implode(',', range($m[1], $m[2]));
		}, $submitted);
		// .. then turn string into an array
		$terrs = explode(',', $terrs);
		
		$pg = 1;
		foreach( $terrs as $terr ):
			$id = $ids[$terr];
			$num = $terr;
			$addLink = "https://onlineterritorymanager.com/PrintPrev8x10Spanish.php?MyTerID=".$id."&Sort=-1&First=1";
			$mapLink = "https://onlineterritorymanager.com/MapIt.php?MyTerID=".$id."&Sort=-1";
			?>
			<div class="page-body create">
				<div class="page-container">
					<div class="page-inner">
						<iframe id="doc<?= $num; ?>" src="<?= $addLink; ?>" width="100%" height="100%" frameborder="0"></iframe>
					</div>
					<span><?= sprintf("%02d", $pg);$pg++;?></span>
					<div class="campaign-msg"></div>
				</div>
			</div>
			<div class="page-body create map">
				<div class="page-container">
					<div class="page-inner">
						<iframe id="img<?= $num; ?>" src="<?= $mapLink; ?>" width="100%" height="100%" frameborder="0"></iframe>
					</div>
					<span><?= sprintf("%02d", $pg);$pg++;?></span>
				</div>
			</div>
		<?php endforeach;

	else: ?>

		<div class="nothingsumbitted">
			<h2>Woah there, hold up buddy... Nothing was submitted :/</h2>
			<a href=".">Go Back and try again</a>
		</div>

	<?php endif;

endif;

if( isset($_REQUEST['print']) ):  // Custom Print Layout

	var_dump($_REQUEST['print']);

	// Display uploaded images
	?>
	<div class="page-body">
		<div class="page-container">
			<span>01</span>
		</div>
	</div>

<?php
endif;