<?php 

if(isset($_POST)){


		$form_errors = [];
		foreach($_POST as $form_entry_key => $value){

				if(empty(trim($_POST[$form_entry_key]))){
					//nothing was entered
					$form_entry_key = str_replace("_", " ", $form_entry_key);
					$form_errors[] = "You did not enter {$form_entry_key}";
				}


		}


		if(empty($form_errors)){
			//submit the form
			require "../../functions/functions.php";
			$feeback = createNewEntry($_POST);
			echo $feeback;
		}else{
			
			echo json_encode([
				"message" => "There are errors in the form entry",
				"data" => $form_errors, 
				"type" => "create_entry",
				"status" => 400,
				"code" => "error"
			]);

		}

		



}