<?php 
session_start();

require "functions/functions.php";

if(isset($_SESSION['email'])){
	$current_admin_id = $_SESSION['id'];
	$email = $_SESSION['email'];
	$fullname = $_SESSION['fullname'];


}else{

	header("location: admin.php");

}	