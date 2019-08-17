<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';

$username = mysqli_real_escape_string($connection, $_POST['username']);
$email    = mysqli_real_escape_string($connection, $_POST['email']);
$name     = mysqli_real_escape_string($connection, $_POST['name']);
$password = password_hash(mysqli_real_escape_string($connection, $_POST['password']), PASSWORD_DEFAULT);
$admin    = mysqli_real_escape_string($connection, $_POST['admin']);

$query = "INSERT INTO `users` (username, password, name, email, admin) VALUES ('$username', '$password', '$name', '$email', '$admin')";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));
$query = "INSERT INTO `users_location` (username) VALUES ('$username')";
mysqli_query($connection, $query) or die(header('Location: users.php?update=error'));
die(header('Location: users.php?update=success'));