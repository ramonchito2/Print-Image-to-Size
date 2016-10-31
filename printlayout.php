<?php

include('header.php');

if( isset($_REQUEST['otm']) ): // OTM Print Layout
	/**
	Currently ids have to be manually copied form OTM
	IDs dynamically change when territory is re-checkedout
	Easy JS way to get all ids of terrs (won't work as bookmarklet)
	copy and run following script in a browser's Dev Tools
	(make sure to turn admin options on and order by name)
	---
	terrs = $('tr > td:nth-child(3)');
	ids = [];
	terrs.each(function(){
	    link = $(this).siblings('td').find('a[href^="PrintPrev8x10Spanish"]').attr('href');
	    id = link.match(/MyTerID=([0-9]*)&/)[1];
	    ids.push(id);
	})
	$('body').append('<div class="idscopied">IDs Copied!</div><style>.idscopied{position:fixed;top:45%;left:50%;z-index:99999999;background:rgba(27, 134, 27, 0.94);border:1px solid green;font-size:1.8em;color:white;padding:3px 24px;border-radius:4px;opacity:0;transform:translate(-50%,-50%);transition:all .3s ease}.idscopied.enter{top:50%;opacity:1}</style>');
	// Autosave message
	$('.idscopied').css('opacity');
	$('.idscopied').addClass('enter');
	setTimeout(function(){
		$('.idscopied').removeClass('enter');
	},2000 );
	copy(ids); // actually copies var into clipboard
	---
	*/
	// All terr IDs from OTM
	$ids = [
		"512372","512373","512374","520289","512376","512377","512378","512379","512380","512381","512382","512383","520279","512385","512386","512387","512388","512389","512390","512391","512392","512393","512394","512395","512396","512397","512398","512399","512400","520280","512402","512403","512404","512405","512406","512407","512408","512409","512410","512411","512412","512413","512414","512415","512416","512417","512418","512419","512420","512421","512422","512423","512424","512425","512426","512427","512428","512429"
	];
	// Remove '0' key from array. Needed for foreach loop logic
	array_unshift($ids,"");
	unset($ids[0]);

	// Requested terr numbers to display
	$submitted = $_REQUEST['otm'];

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
			<div class="page-body mapcard">
				<div class="page-container">
					<div class="page-inner">
						<iframe id="doc<?= $num; ?>" src="<?= $addLink; ?>" width="100%" height="100%" frameborder="0"></iframe>
					</div>
					<span><?= sprintf("%02d", $pg);$pg++;?></span>
					<div class="campaign-msg"></div>
				</div>
			</div>
			<div class="page-body mapcard">
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

else: // Custom Print Layout
	$psize = $_REQUEST['psize'];
	$csize = $_REQUEST['csize'];
	if( $psize || $csize ):
		$width;
		$height;
		$invalidsize;
		$invalidmsg = '';
		function convert_size($input) {
			global $width, $height, $invalidsize;
			$invalidsize = false;
			// Remove unwanted characters and convert value into an array
			$input = preg_replace('/[^\d\s\/x]/', '', $input);
			$input = preg_split('/[\s]*x[\s]*/', $input);
			// Validate proper value
			if( empty($input[0]) ):
				$invalidsize = true;
				return;
			endif;
			// Convert width and height to decimal if necessary
			foreach ($input as $n => $value):
				$value = trim($value);
				if (preg_match("/([\d]+) (([\d]+)\/([\d]+))/",$value,$matches)):
				  	if ($matches[4]>0):
				  	    $decimal = $matches[3] / $matches[4];
				  	    if( !$n ): $width = $matches[1]+$decimal;
				  	    else: $height = $matches[1]+$decimal;
				  	    endif;
			  	  	else:
				  	    $invalidsize = true;
			  	  	endif;

				else:
				  	$value = preg_replace('/[^\d]/', '', $value);
				  	if( !$n ): $width = $value;
				  	else: $height = $value;
				  	endif;
				endif;
			endforeach;
		}
		
		if( $psize ):
			convert_size($psize);
			if( !$invalidsize ): ?>
				<style>
				.page-body {
					width: <?= $width; ?>in;
					height: <?= $height; ?>in;
				}
				</style>
			<?php else: $invalidmsg .= "<span>Your <b>Page Size</b> is invalid. The default width and height <b>8.5 x 11</b> are being used instead.</span>";
			endif;
		else: $invalidmsg .= "<span>Something's wrong with your <b>Page Size</b>. The default width and height <b>8.5 x 11</b> are being used instead.</span>";
		endif;
		if( $csize ):
			convert_size($csize);
			if( !$invalidsize ): ?>
				<style>
				.page-container {
					width: <?= $width; ?>in;
					height: <?= $height; ?>in;
				}
				</style>
			<?php else: $invalidmsg .= "<span>Your <b>Print Size</b> is invalid. The default width and height <b>8 x 10</b> are being used instead.</span>";
			endif;
		else: $invalidmsg .= "<span>Something's wrong with your <b>Print Size</b>. The default width and height <b>8 x 10</b> are being used instead.</span>";
		endif;
		if( $invalidsize ): ?>
			<script>
				invalidsize = "<?= $invalidmsg; ?>";
			</script>
		<?php endif;
	endif;

	// Get all images from imgs folder
	if ($handle = opendir('imgs')): // Get all images from 'imgs' folder
	    while (false !== ($entry = readdir($handle))):
	        $files[] = $entry;
	    endwhile;
	    $images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);
	    if( $images ):
	    	$pg = 1;
		    foreach($images as $image): // Output every image onto a single page
		    	?>
				<div class="page-body">
					<div class="page-container">
						<div class="page-inner"><img src="imgs/<?= $image; ?>" width="100%" height="auto"></div>
						<span><?= sprintf("%02d", $pg);$pg++;?></span>
					</div>
				</div>
		    	<?php
		    endforeach;
	    closedir($handle);
	    endif;
	endif;

endif; ?>

<div class="menupanel">
	<div class="menucontainer">
		<?php $title = isset($otm) ? 'Territories '.$submitted : 'Print Layout'; ?>
		<h2><?= $title; ?></h2>
		<h3>Options</h3>
		<input type="checkbox" name="borders" id="borders">
		<label for="borders">Hide Borders</label><br>
		<input type="checkbox" name="pagenums" id="pagenums">
		<label for="pagenums">Hide Page Numbers</label><br>
		<input type="checkbox" name="campaign" id="campaign">
		<label for="campaign">Add Campaign Label?</label><br>
		<input id="campaigntext" type="text" placeholder="Campana Enero 2016">
		<a href="." class="startover">Start Over</a>
	</div>
</div>

<a class="menu"></a>

<?php
include('footer.php');