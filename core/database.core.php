<?php
$_db_hostname = "localhost";
$_db_user = "root";
$_db_password = "";
$_db_dbname = "delivery.com";



$_conn = mysqli_connect($_db_hostname, $_db_user, $_db_password, $_db_dbname) or die("Could not connect to database ...");
