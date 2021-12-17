<?php
    require_once("core/user/check_user_login.core.php");
 ?> 
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v4.6</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/sign-in/">



    <!-- Bootstrap core CSS -->
    <link href="thirdparties/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <?php require "process/forms.process.php"; ?>
                <form class="form-signin" action='' method="POST">
                    <!-- <img class="mb-4" src="/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->


                    <div class="form-group">
                        <label>First name</label>
                        <input type='text' name='firstname' class='form-control'>
                    </div>

                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" name="lastname" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <button class="btn btn-md btn-primary" name="register_user">Register</button>
                        <div class='mt-3'><span>Already Registered? <a href='index.php'>Log in instead</a></span></div>
                    </div>


                </form>
            </div>

        </div>


    </div>



</body>

</html>