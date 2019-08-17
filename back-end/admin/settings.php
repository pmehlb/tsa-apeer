<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
?>
<main role="main">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/index.php">Admin Hub</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/users.php">User Management</a></li>
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">Settings</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/hub.php" id="close">Back</a></li>
		</ul>
	</div>
</main>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>