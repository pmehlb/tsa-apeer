<?php

session_start();

require '../config/db.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
	global $connection;
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$query = "SELECT password FROM `users` WHERE username='$username'";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	$hash = mysqli_fetch_row($result);
	if (password_verify($password, $hash[0])) {
		// password checks out, get the info
		$id_query = "SELECT id, username, name, admin FROM `users` WHERE username='$username'";
		$result = mysqli_query($connection, $id_query) or die(mysqli_error($connection));
		$row = mysqli_fetch_assoc($result);
		// set our session variables
		$row['admin'] == 1 ? $_SESSION['admin'] = true : $_SESSION['admin'] = false;
		$_SESSION['id'] = $row['id'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['first_name'] = substr($row['name'], 0, strpos($row['name'], ' '));
		$_SESSION['last_name'] = substr($row['name'], strpos($row['name'], ' '), strlen($row['name']));
		$_SESSION['name'] = $row['name'];
		$_SESSION['loggedin'] = true;
		mysqli_close($connection);
		die(header('Location: ../hub.php'));
	} else {
		mysqli_close($connection);
		// incorrect password
		die(header('Location: ../index.php?error=inc'));
	}
}