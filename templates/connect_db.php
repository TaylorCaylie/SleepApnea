<?php

// Establish connection variables for the database:
	$servername = "localhost";
	$username = "user";
	$password = "root";
	$database = "SAdb";

	// Create the connection with the database:
	$connection = pg_connect("host=localhost port=5432 dbname=SAdb user=grassroots password=Horses777");
	// Double check that the connection is working - if not, die
	if ($connection->connect_error)
	{
		die("Connection failed: " . $connection->connect_error);
	}

?>