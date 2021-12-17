<?php
    // require_once("core/user/check_u_login.core.php");
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
                     <!-- <img class="mb-4" src="/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                     <?php  require "process/forms.process.php"; ?>
                    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

              
                <form action='' class="form-signin" method="POST">
               
                    
                    <div class="form-group">
                         <label for="inputEmail" class="sr-only">Admin Email address</label>
                    <input type="email" name="email" id="inputEmail" class="form-control" placeholder=" Admin Email address" autofocus>
                    </div>

                    <div class="form-group">
                         <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                    </div>
                   
                    <div class="checkbox mb-3">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name='admin_login'>Admin Sign in</button>

                </form>
            </div>

        </div>


    </div>



</body>

</html>