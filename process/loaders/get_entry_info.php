<?php 
if(isset($_GET['entry_id'])){


	$entry_id = (int)$_GET['entry_id'];

	require "../../functions/functions.php";
	$entry_info = getEntryInfo($entry_id);

	echo json_encode($entry_info);



}