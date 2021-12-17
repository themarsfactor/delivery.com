<?php

function createNewEntry($data){

		require "../../core/database.core.php";

		session_start();
		$author_id = $_SESSION['id'];



		$initial_query = "INSERT INTO `entries` (`entry_author_id`) VALUES($author_id)";
		$initial_result = mysqli_query($_conn, $initial_query);

		if($initial_result){
			$id = mysqli_insert_id($_conn);

			$create_entry_errors = [];
			foreach($data as $data_key => $data_value){

				if($data_key != "report_author"){
					$query = "UPDATE `entries` SET `$data_key` = '$data_value' WHERE `entry_author_id` = $author_id AND `id` = $id";

					$result = mysqli_query($_conn, $query);

					if($result){
						//
					}else{
						$create_entry_errors[] = "An error occured: ".mysqli_error($_conn);
					}
				}

			}

			if(!empty($create_entry_errors)){

				return json_encode([
							"message" => $create_entry_errors, 
							"data" => [],
							"status" => 400,
							"type" => "create_entry", 
							"code" => "error"
						]);
				

			}else{

				return json_encode([

							"message" => "Entry successfully entered!",
							"data" => [],
							"status" => 201,
							"type" => "create_entry",
							"code" => "success"

						]);

			}

		}





}


function getUserEntries(){

	require "core/database.core.php";

	$user_id = $_SESSION['id'];

	$query = "SELECT `users`.*, `entries`.* FROM `users` RIGHT JOIN `entries` ON `users`.id = `entries`.entry_author_id WHERE `users`.id = $user_id";


	$result = mysqli_query($_conn, $query);

	if($result){
		

		$user_entries = [];
		while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$user_entries[] = $rows;
		}


		return $user_entries;

	}else{
		//did not trun
		return mysqli_error($_conn);
	}






}


function getEntryInfo($entry_id){

	

	if(file_exists("../../core/database.core.php")){
		require "../../core/database.core.php";
	}elseif(file_exists("core/database.core.php")){
		require "core/database.core.php";
	}

	$entry = (int)$entry_id;


	$query = "SELECT `entries`.id AS `entry_id`, `entries`.*, `entries_permissions`.* FROM `entries` LEFT JOIN `entries_permissions` ON `entries`.id = `entries_permissions`.entry_id WHERE `entries`.id = $entry_id LIMIT 1";
	$result = mysqli_query($_conn, $query);

	if($result){

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			return [
					"code" => "success",
					"data" => $row
			];
		}else{
			//no match
			return [

					"code" => "error",
					"data"=> []

			];
		}

	}else{

		return mysqli_error($_conn);

	}

}


function sendEditPermissionRequest($entry_id, $user_id){

	require "../../core/database.core.php";

	//check if a permission is active already..

	$active_permissions = checkEditPermissionStatus($entry_id);

	if(count($active_permissions) > 0){
		//there are still active permissions
		//return a message that there are still active permissions..

		return json_encode([
			"message" => "Permission Request for this entry has been sent already! Please wait for the Admin to approve request",
			"data" => [],
			"type" => "send_update_permission_request",
			"code" => "duplicate"
		]);


	}else{


		$query = "INSERT INTO `entries_permissions` (`entry_id`, `is_edit_permitted`, `user_id`, `granted_by_admin_id`, `date_updated`) VALUES($entry_id, false, $user_id, 1, null)";

		$result = mysqli_query($_conn, $query);

		if($result){

			return json_encode([

				"message" => "Permission Request Sent!",
				"data" => [],
				"type" => "send_update_permission_request",
				"code" => "success"

			]);
		}else{


		}
	}





}


function checkEditPermissionStatus($entry_id){

	require "../../core/database.core.php";

	$query = "SELECT * FROM `entries_permissions` WHERE `entry_id` = $entry_id AND is_edit_permitted = false";

	$result = mysqli_query($_conn, $query);

	if($result){

		$active_permissions = [];
		if(mysqli_num_rows($result) > 0){	
			//there is something created already!
			while($rows = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$active_permissions[] = $rows;
			}

		}

		return $active_permissions;


		
	}else{


	}

}

function getPermissionsRequestsByAdmin(){

	require "core/database.core.php";

	$query = "SELECT `users`.*, `entries`.id AS `entry_id`, `entries`.*, `entries_permissions`.* FROM `users` LEFT JOIN `entries` ON `users`.id = `entries`.entry_author_id LEFT JOIN `entries_permissions` ON `entries`.id = `entries_permissions`.entry_id WHERE `entries_permissions`.is_edit_permitted = false";

	$result = mysqli_query($_conn, $query);

	if($result){

		$permissions_requests = [];
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

			$permissions_requests[] = $row;

		}

		return $permissions_requests;


	}else{


	}


}

function confirmGrantPermissions($entry_id){
	require "../../core/database.core.php";

	$query = "UPDATE `entries_permissions` SET `is_edit_permitted` = true WHERE `entry_id` = $entry_id";

	$result = mysqli_query($_conn, $query);

	if($result){

		return json_encode([

				"message" => "Permission granted to user",
				"data" => [],
				"code" => "success", 
				"type" => "grant_permission"

		]);

	}else{
		return json_encode([

				"message" => "An error just occured! ".mysqli_error($_conn),
				"data" => [],
				"code" => "error", 
				"type" => "grant_permission"

		]);


	}

}

function checkEntryPermission($entry_id){
	require "core/database.core.php";

	$query = "SELECT * FROM `entries_permissions` WHERE `entry_id` = $entry_id AND `is_edit_permitted` = true LIMIT 1" ;

	$result = mysqli_query($_conn, $query);

	if($result){

		if(mysqli_num_rows($result) == 1){
			return true;
		}else{
			return false;
		}

	}else{
		//error
	}

}




function getEntries($entry_id){

	require "../../core/database.core.php";

	$entry = (int)$entry_id;


	$query = "SELECT `entries`.*, `entries_permissions`.* FROM `entries` LEFT JOIN `entries_permissions` ON `entries`.id = `entries_permissions`.entry_id WHERE `entries`.id = $entry_id LIMIT 1";
	$result = mysqli_query($_conn, $query);

	if($result){

		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

			return [
					"code" => "success",
					"data" => $row
			];
		}else{
			//no match
			return [

					"code" => "error",
					"data"=> []

			];
		}

	}else{

		return mysqli_error($_conn);

	}

}



function updateNewEntry($data){
		
		require "../../core/database.core.php";

		session_start();
		$author_id = $_SESSION['id'];

		unset($data['report_author']);

		$entry_id = $data['entry_id'];

		unset($data['entry_id']);


		$create_entry_errors = [];
		
		foreach($data as $data_key => $data_value){

				$query = "UPDATE `entries` SET `$data_key` = '$data_value' WHERE `entry_author_id` = $author_id AND `id` = $entry_id";

				$result = mysqli_query($_conn, $query);

				if($result){
						//
					}else{
						$create_entry_errors[] = "An error occured: ".mysqli_error($_conn);
					}

		}

		if(empty($create_entry_errors)){
				//make the entry uneditable
				makeEntryUneditable($entry_id);

				//there are no errors
				return json_encode([
						"code" => "success", 
						"type" => "update_entry",
						"status" => 201,
						"data" => [],
						"message" => "Entry updated successfully!"

				]);

		}else{

			return json_encode([
						"code" => "error", 
						"type" => "update_entry",
						"status" => 401,
						"data" => [],
						"message" => $create_entry_errors

				]);




		}
	


}



function makeEntryUneditable($entry_id){
		if(file_exists("../../core/database.core.php")){
			require "../../core/database.core.php";
		}else if(file_exists("core/database.core.php")){
			require "core/database.core.php";
		}


		$query = "DELETE FROM `entries_permissions` WHERE `entry_id` = $entry_id";
		$result = mysqli_query($_conn, $query);


}