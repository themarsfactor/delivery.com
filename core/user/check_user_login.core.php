<?php
session_start();

if(isset($_SESSION['email'])){
	header("location: user.php");
}