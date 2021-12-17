<?php
if(isset($_POST['entry_id'])){


	$entry_id = $_POST['entry_id'];


	require "../../functions/functions.php";

	echo confirmGrantPermissions($entry_id);
}