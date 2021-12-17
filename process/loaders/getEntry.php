<?php 
if(isset($_GET['entry_id'])){


	$entry_id = (int)$_GET['entry_id'];

	require "../../functions/functions.php";
	$get_entry = getEntries($entry_id);

	echo json_encode($get_entry);



}