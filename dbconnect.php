<?php
	/*
		Connecting to the database
	*/
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$db = 'dbcar2';
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

	if(mysqli_connect_errno()){
		echo "Failed to connect.";
	}
?>