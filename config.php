<?php
$config = parse_ini_file('db.ini');

    $connection = mysqli_connect("localhost", $config['username'],$config['password']);

	if (!$connection){
    	die("Database Connection Failed" . mysqli_error($connection));
	}

	$select_db = mysqli_select_db($connection, $config['db']);
	if (!$select_db){
	    die("Database Selection Failed" . mysqli_error($connection));
	}
	date_default_timezone_set("Asia/Calcutta");
	$t = time();
	$datetime = date("Y-m-d H:i:sa",$t);

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
