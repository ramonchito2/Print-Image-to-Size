<?php
$width   = $_REQUEST['width'];
$height  = $_REQUEST['height'];
$dwidth  = $_REQUEST['dwidth'];
$dheight = $_REQUEST['dheight'];
if( $dwidth || $width ):
	?>
	<style>
		<?php if( $width ): ?>
		.page-body {
			width: <?= $width; ?>in;
			height: <?= $height; ?>in;
		}
		<?php endif; ?>
		<?php if( $dwidth ): ?>
		.page-container {
			width: <?= $dwidth; ?>in;
			height: <?= $dheight; ?>in;
		}
		<?php endif; ?>
	</style>
	<?php
endif;

// Get all images from imgs folder
if ($handle = opendir('imgs')) { // Get all images from 'imgs' folder

    while (false !== ($entry = readdir($handle))) {
        $files[] = $entry;
    }
    $images=preg_grep('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $files);

    if( $images ) {
	    foreach($images as $image) { // Output every image onto a single page
	    	?>
			<div class="page-body">
				<div class="page-container">
					<div class="page-inner"><img src="imgs/<?= $image; ?>" width="100%" height="auto"></div>
					<span>01</span>
				</div>
			</div>
	    	<?php
	    }   	
    } else {
    	?>
    	<div class="noImages">
    		<h2>You have no images</h2>
    		<p>Try adding images to the 'imgs' folder and try again</p>
    		<a href="/?width=<?= $width; ?>&height=<?= $height; ?>&dwidth=<?= $dwidth; ?>&dheight=<?= $dheight; ?>">Try Again</a>
    	</div>
    	<?php
    }
    closedir($handle);
} else { // imgs folder doesn't exist
	?>
	<div class="noImages">
		<h2>You do not have an 'imgs' folder</h2>
		<p>Try adding an 'imgs' folder in root directory, add images and try again</p>
		<a href="/?width=<?= $width; ?>&height=<?= $height; ?>&dwidth=<?= $dwidth; ?>&dheight=<?= $dheight; ?>">Try Again</a>
	</div>
	<?php
}
