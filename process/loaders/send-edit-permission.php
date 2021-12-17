<?php
if(isset($_POST['entry_id']) && isset($_POST['user_id'])){


	$entry_id = (int)$_POST['entry_id'];
	$user_id  = (int)$_POST['user_id'];



	require "../../functions/functions.php";

	$result = sendEditPermissionRequest($entry_id, $user_id);

	echo $result;


}