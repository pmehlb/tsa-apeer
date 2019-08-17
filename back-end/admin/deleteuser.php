<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';

$id = mysqli_real_escape_string($connection, $_GET['id']);

$query = "DELETE FROM `users` WHERE id='$id'";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));
$query = "DELETE FROM `users_location` WHERE id='$id'";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));
die(header('Location: users.php?update=success'));