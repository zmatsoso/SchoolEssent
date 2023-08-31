<?php
	
	$dbhost = 'localhost';
	$dbuser = 'Zipho';
	$dbpass = 'Monty32';
	$dbname = 'timetable32';
	
	@mysql_connect("localhost","Zipho","Monty32") or die("Server is not available, please try again later");
	@mysql_select_db("timetable32") or die("Database not available, please try again later");

  define('DB_HOST', 'localhost');
  define('DB_USER', 'Zipho');
  define('DB_PASSWORD', 'Monty32');
  define('DB_NAME', 'timetable32');

?>
