<?php

session_start();
session_destroy();

if (isset($_GET['error']) && $_GET['error'] == "access") {
	die(header('Location: ../index.php?error=access'));
}
die(header('Location: ../index.php'));