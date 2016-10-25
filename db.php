<?php
	define("dbhost", "localhost");
	define("dbuser", "root");
	define("dbpass", "");
	define("dbname", "shop");

	$dbc = mysqli_connect(dbhost,dbuser,dbpass,dbname);

// Check Database connection error
if(!$dbc) {
	die ("Database Connection error" . mysqli_error($dbc));
}
 ?>
