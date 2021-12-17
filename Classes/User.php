<?php


class User
{


    public static function createNewUser($firstname, $lastname, $email, $password)
    {
        require "core/database.core.php";
        require_once "core/Message.php";

        //check if user already exists 
       if(self::checkUserExists($email) == true){

            echo Message::warningMessage("User exists already!");
       }else{

            $query = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `registered_date`) VALUES('$firstname', '$lastname', '$email', '$password', NOW())";

            $result = mysqli_query($_conn, $query);

            if($result){

                echo Message::successMessage("User created successfully");

            }else{

                echo "Could not create user account: ". mysqli_error($_conn);
            }

       }
    }



    public static function loginUser($email, $password){
        require "core/database.core.php";

        $password = mysqli_real_escape_string($_conn, $password);

        $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1";

        $result =  mysqli_query($_conn, $query);

        if($result){

            if(mysqli_num_rows($result) == 1){
                //the user is founfs
                session_start();
                $_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
                header("location: user.php");
                exit();

            }else{
                //there is no match
               echo Message::warningMessage("No user was found");

            }


        }else{

            //error
            echo Message::warningMessage("102: Something unexpected happened: ". mysqli_error($_conn));
        }


    }

    public static function checkUserExists($email){

        require "core/database.core.php";

        $query = "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1";
        $result = mysqli_query($_conn, $query);
        if ($result) {

            if(mysqli_num_rows($result) == 1){
                //thre is a matche
                return true; //the user exists
            }else{
                return false;
            }


        } else {
            
            //error
        }
    }
}
