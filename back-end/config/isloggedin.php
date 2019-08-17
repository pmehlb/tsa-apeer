<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
	die(header('Location: login/logout.php?error=access'));
}