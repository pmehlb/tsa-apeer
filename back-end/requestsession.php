<?php
session_start();
// check that our user is logged in
require 'config/isloggedin.php';
// connect to our db
require 'config/db.php';

$teacher  = mysqli_real_escape_string($connection, $_POST['teacher']);
$session  = mysqli_real_escape_string($connection, $_POST['session']);
$location = mysqli_real_escape_string($connection, $_POST['location']);
$priority = mysqli_real_escape_string($connection, $_POST['priority']);
$date     = mysqli_real_escape_string($connection, $_POST['date']);
$id       = $_SESSION['id'];
//$username = $_SESSION['username'];

$priorityquery  = "SELECT `priority` FROM `users_location` WHERE id='$id'";
$priorityresult = mysqli_fetch_row(mysqli_query($connection, $priorityquery));
$prioritynum    = $priorityresult[1];

// check to see that a higher priority doesn't already exist
if ($_SESSION['admin'] == false) {
	if ($prioritynum < $priority) {
		$query = "UPDATE `users_location` SET teacher='$teacher', location='$location', session='$session', priority='$priority', date='$date' WHERE id='$id'";
		mysqli_query($connection, $query) or die(header('Location: request.php?request=error'));
		die(header('Location: request.php?request=success'));
	} else {
		die(header('Location: request.php?request=priority'));
	}
} else {
	$query = "UPDATE `users_location` SET teacher='$teacher', location='$location', session='$session', priority='$priority', date='$date' WHERE id='$id'";
	mysqli_query($connection, $query) or die(header('Location: request.php?request=error'));
		die(header('Location: request.php?request=success'));
}