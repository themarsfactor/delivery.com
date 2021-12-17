<?php 
session_start();

require "functions/functions.php";

if(isset($_SESSION['email'])){
	$current_user_id = $_SESSION['id'];
	$email = $_SESSION['email'];
	$firstname = $_SESSION['firstname'];
	$lastname = $_SESSION['lastname'];


}else{

	header("location: index.php");

}	