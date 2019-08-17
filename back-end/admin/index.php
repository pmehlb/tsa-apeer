<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';
?>
<main role="main">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">Admin Hub</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/users.php">User Management</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/settings.php">Settings</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/hub.php" id="close">Back</a></li>
		</ul>
	</div>
</main>
<div class="container-fluid m-4">
	<h2>Upcoming RAMS days: </h2>
	<div class="list-group py-3 pl-2 w-75">
		<?php
			$result = mysqli_query($connection, "SHOW TABLES");
	
			if ($result) {
				while ($row = mysqli_fetch_array($result)) {
					if ($row[0] == 'users' || $row[0] == 'dates_log' || $row[0] == 'users_location') {}
					else {
						echo '<form action="http://localhost/appeer/admin/edittable.php" method="post"><input type="hidden" name="date" value="' . $row[0] . '"><button type="submit" class="list-group-item list-group-item-action">' . $row[0] . '</button></form>';
					}
				}
			}
		?>
	</div>
</div>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>
<?php mysqli_close($connection); ?>