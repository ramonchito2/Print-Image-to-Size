<?php
if( isset($_REQUEST['otm']) ):
	/**
	Easy JS way to get all ids of terrs
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
	copy(ids) // actually copies var into clipboard
	---
	*/
	// All terr IDs from OTM
	$ids = [
	  "463118","487313","461914","487314","461851","487315","510415","488403","488395","488396","488397","488398","487317","488402","487318","461916","487319","473800","473801","473802","422066","393934","445071","454071","488400","463119","473803","488399","488404","487320","473806","445373","422072","380885","461888","454076","461876","473807","380914","473808","393941","454073","393942","463120","461922","488401","415549","454074","461920","373111","454075","473809","473810","463116","461918","473811","415550","463117"
	];
	// Remove '0' key from array. Needed for foreach loop logic
	array_unshift($ids,"");
	unset($ids[0]);

	// Requested terr numbers to display
	$submitted = $_REQUEST['otm'];

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
	<?php endforeach; ?>

	<style>
		.page-body {
			width: 8.5in;
			height: 11in;
		}
		.page-container {
			width: 7.1in;
			height: 9.9in;
		}
	</style>

<?php else:
	$psize   = $_REQUEST['psize'];
	$csize   = $_REQUEST['csize'];
	if( $psize || $csize ):	?>
		<style>
			<?php if( $psize ): ?>
			.page-body {
				width: <?= $width; ?>in;
				height: <?= $height; ?>in;
			}
			<?php endif; ?>
			<?php if( $csize ): ?>
			.page-container {
				width: <?= $dwidth; ?>in;
				height: <?= $dheight; ?>in;
			}
			<?php endif; ?>
		</style>
	<?php endif; ?>
	<div class="page-body">
		<div class="page-container">
			<div class="page-inner"></div>
			<span>Feature Currently Disabled</span>
		</div>
	</div>
<?php endif; ?>

<div class="menupanel">
	<div class="menucontainer">
		<?php $title = $otm ? 'Territories '.$submitted : 'Print Layout'; ?>
		<h2><?= $title; ?></h2>
		<h3>Options</h3>
		<input type="checkbox" name="borders" id="borders">
		<label for="borders">Hide Borders</label><br>
		<input type="checkbox" name="pagenums" id="pagenums">
		<label for="pagenums">Hide Page Numbers</label>
		<a href="." class="startover">Start Over</a>
	</div>
</div>

<a class="menu"></a>