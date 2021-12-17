<?php 
class Message{


	public static function successMessage($message){


		return "<div class='alert alert-success border-0'>{$message}</div>";


	}


		public static function warningMessage($message){


		return "<div class='alert alert-warning border-0'>{$message}</div>";


	}



}