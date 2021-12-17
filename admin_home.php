<?php 
 require_once("core/admin/data.core.php");

    require "includes/head.inc.php";

   $user_entries = getUserEntries();

 ?>


<body>
	<?php  require "includes/admin-navbar.inc.php"; ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 m-auto">
                  
                   <?php 

echo "<h3>Welcome {$fullname}! </h3>";

// echo "<a href='admin_logout.php'>Log out</a>";


echo "<hr>";

?>
			</div>
		</div>
	</div>

	<?php  require "includes/footer-scripts.inc.php"; ?>
</body>
