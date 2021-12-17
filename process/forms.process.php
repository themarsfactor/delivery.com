<?php

require "core/Message.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    //Registration of Users
    if (isset($_POST['register_user'])) {

        $form_errors = [];

        if (trim(empty($_POST['firstname']))) {
            $form_errors[] = "No firstname entered";
        } else {
            $firstname = trim($_POST['firstname']);
        }

        if (trim(empty($_POST['lastname']))) {
            $form_errors[] = "No lastname entered";
        } else {
            $lastname = trim($_POST['lastname']);
        }

        if (trim(empty($_POST['email']))) {
            $form_errors[] = "No email entered";
        } else {

            $email = trim($_POST['email']);
        }

        if (trim(empty($_POST['password']))) {
            $form_errors[] = "No password entered";
        } else {
            $password = trim($_POST['password']);
        }


        if (!empty($form_errors)) {
            //there are errors in the $form_errors array
        } else {
            //no errors
            require_once "Classes/User.php";
            User::createNewUser($firstname, $lastname, $email, $password);
        }
    }


    //handle login
    if(isset($_POST['login'])){

        if(empty(trim($_POST['email']))){
            $form_errors[] = "Please enter your email address";
        }else{
            $email = trim($_POST['email']);
        }

        if(empty(trim($_POST['password']))){
            $form_errors[] = "Please enter your password";
        }else{
            $password = trim($_POST['password']);
        }


        if(!empty($form_errors)){

            foreach($form_errors as $error){
                echo Message::warningMessage($error);
            }

        }else{

            //sign in the user
            require_once "Classes/User.php";
            User::loginUser($email, $password);

        }

    }


    if(isset($_POST['create_entry'])){

            echo "Create Entry";

    }


    if(isset($_POST['admin_login'])){

        if(empty(trim($_POST['email']))){
            $form_errors[] = "No email entered";
        }else{

            $email = trim($_POST['email']);

        }


        if(empty(trim($_POST['password']))){
            $form_errors[] = "No password entered";
        }else{
            $password = trim($_POST['password']);
        }


        if(empty($form_errors)){
            require_once "Classes/Admin.php";
            Admin::loginAdminUser($email, $password);
        }else{

            foreach($form_errors as $error){

                echo Message::warningMessage($error);

            }



        }



    }
}
