<?php
    require_once("core/user/data.core.php");
 ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Delivery | User Home</title>

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
   <?php require "includes/navbar.inc.php"; ?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 m-auto">
                     <!-- <img class="mb-4" src="/docs/4.6/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
                    <h1 class="h3 mb-3 font-weight-normal">Welcome <?="{$firstname} {$lastname}"?></h1>

            
            
            </div>

        </div>


    </div>



<script type="text/javascript" src="thirdparties/bootstrap/jquery.min.js"></script>
<script type="text/javascript" src="thirdparties/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>