<?php 

class Admin{


	public static function loginAdminUser($email, $password){

		 require "core/database.core.php";

        $password = mysqli_real_escape_string($_conn, $password);

        $query = "SELECT * FROM `admins` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1";

        $result =  mysqli_query($_conn, $query);

        if($result){

            if(mysqli_num_rows($result) == 1){
                //the user is founfs
                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                header("location: admin_home.php");
                exit();

            }else{
                //there is no match
               echo Message::warningMessage("No admin was found");

            }


        }else{

            //error
            echo Message::warningMessage("102: Something unexpected happened: ". mysqli_error($_conn));
        }


	}


}