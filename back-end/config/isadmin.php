<?php

if (!isset($_SESSION['admin']) || $_SESSION['admin'] != true) {
	die(header('Location: login/logout.php?error=access'));
}