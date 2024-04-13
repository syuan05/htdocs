<?php
	session_start();
	$dbhost = '127.0.0.1';
	$dbuser = 'hj';
	$dbpass = 'test1234';
	$dbname = 'testdb';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass) or die('Error with MySQL connection');
	mysqli_query($conn, "SET NAMES 'utf8'");
	mysqli_select_db($conn, $dbname);
?>