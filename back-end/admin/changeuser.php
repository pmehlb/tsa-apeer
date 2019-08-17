<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';

$username = mysqli_real_escape_string($connection, $_POST['username']);
$email    = mysqli_real_escape_string($connection, $_POST['email']);
$name     = mysqli_real_escape_string($connection, $_POST['name']);
//$admin    = mysqli_real_escape_string($connection, $_POST['admin']);
$id       = mysqli_real_escape_string($connection, $_POST['id']);

$query = "UPDATE `users` SET username='$username', name='$name', email='$email' WHERE id='$id'";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));

$query = "UPDATE `users_location` SET username='$username' WHERE id='$id'";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));
die(header('Location: users.php?update=success'));