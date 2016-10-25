<?php
	define("dbhost", "your_host_name");
	define("dbuser", "your_user_name");
	define("dbpass", "your_password");
	define("dbname", "your_database_name");

	$dbc = mysqli_connect(dbhost,dbuser,dbpass,dbname);

// Check Database connection error
if(!$dbc) {
	die ("Database Connection error" . mysqli_error($dbc));
}
 ?>
