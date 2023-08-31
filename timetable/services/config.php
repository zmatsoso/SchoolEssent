<?php
	
	$dbhost = 'localhost';
	$dbuser = 'schoovvh_zipho';
	$dbpass = 'Monty32';
	$dbname = 'schoovvh_timetable32';
	
	@mysql_connect("localhost","schoovvh_zipho","Monty32") or die("Server is not available, please try aziphoin later");
	@mysql_select_db("schoovvh_timetable32") or die("Database not available, please try aziphoin later");

  define('DB_HOST', 'localhost');
  define('DB_USER', 'schoovvh_zipho');
  define('DB_PASSWORD', 'Monty32');
  define('DB_NAME', 'schoovvh_timetable32');

?>