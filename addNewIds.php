<?php
$check = (bool) preg_match('/^[\d,]+$/', $newids);

if( $check ):

	@require_once('../wp-config.php');

	$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
	if (!$conn):
	    die("Connection failed: " . mysqli_connect_error());
	endif;

	$insert_sql = "REPLACE INTO print_ids SET id = 1, ids = '".$newids."'";
	if ( mysqli_multi_query($conn, $insert_sql) ) {
		$msg = "IDs successfully added";
	} else {
		$msg = "Error: " . $insert_sql . mysqli_error($conn);
	}
	mysqli_close($conn);
	// header('Location:'.$msg);
endif;