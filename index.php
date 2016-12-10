<?php
include('header.php');

$create = isset($_REQUEST['create']) && $_REQUEST['create'];
$print = isset($_REQUEST['print']) && $_REQUEST['print'];

if( !$create && !$print ) {
	include('home.php');
} else {
	include('printlayout.php');
}

include('footer.php');


