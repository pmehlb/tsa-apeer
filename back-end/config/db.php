<?php

$connection = mysqli_connect('localhost', 'root', '');
$select_db = mysqli_select_db($connection, 'tsa_db');

function connect() {
	global $connection, $select_db;
	// check that we successfully connected to the MySQL server
	if (!$connection) { die("Database Connection Failed" . mysqli_error($connection)); }
	// check that we successfully selected the actual database
	if (!$select_db) { die("Database Selection Failed" . mysqli_error($connection)); }
}

connect();