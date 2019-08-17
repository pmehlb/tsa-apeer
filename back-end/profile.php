<?php
session_start();
// check that our user is logged in
require 'config/isloggedin.php';
?>
<main role="main">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/hub.php">Home</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/request.php">Request Session</a></li>
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">My Profile</a></li>
			<?php if ($_SESSION['admin'] == true) { echo '<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/index.php">Admin Hub</a></li>'; }?>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/login/logout.php" id="close">Log Out</a></li>
		</ul>
	</div>
</main>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>