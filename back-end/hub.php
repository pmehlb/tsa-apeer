<?php
session_start();
// check that our user is logged in
require 'config/isloggedin.php';
// connect to our db
require 'config/db.php';

$datequery = mysqli_query($connection, "SELECT * FROM `dates_log` ORDER BY `date` ASC LIMIT 1");
$daterow   = mysqli_fetch_row($datequery);
$dateMap   = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$result    = mysqli_query($connection, "SELECT * FROM `" . $daterow[1] . "` ORDER BY `teacher` ASC");

$username      = $_SESSION['username'];
$sessionquery  = "SELECT * FROM `users_location` WHERE username='$username' LIMIT 1";
$sessionresult = mysqli_query($connection, $sessionquery);
$sessionrow    = mysqli_fetch_row($sessionresult);
$locresult = $sessionrow[3];

?>
<main role="main" style="overflow: hidden;">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">Home</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/request.php">Request Session</a></li>
			<!-- <li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/profile.php">My Profile</a></li> -->
			<?php if ($_SESSION['admin'] == true) { echo '<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/index.php">Admin Hub</a></li>'; }?>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/login/logout.php" id="close">Log Out</a></li>
		</ul>
	</div>
</main>
<div class="row container-fluid my-2">
	<div class="col-md-4 text-center">
		<h3>Next RAMS day:</h3>
		<h4><?php echo $dateMap[date("w", strtotime($daterow[1]))] . ', ' . $daterow[1]; ?></h4>
		
		<br><br>
		
		<h3>Assigned session:</h3>
		<?php echo '<h4 class="font-weight-bold">' . $sessionrow[2] . ' at room: ' . $sessionrow[3] . '</h4>'; ?>
	</div>
	<div class="col-md-8">
		<table class="table table-bordered table-striped" style="overflow-y: scroll; max-height: 100%;">
			<thead>
				<th scope="col">Teacher</th>
				<th scope="col">Location</th>
				<th scope="col">Club/Activity</th>
			</thead>
			<tbody>
				<?php
					while ($row = mysqli_fetch_assoc($result)) {
						if ($locresult == $row['location']) { echo '<tr class="bg-success font-weight-bold text-white"><td>' . $row['teacher'] . '</td><td>' . $row['location'] . '</td><td>' . $row['session'] . '</td></tr>'; }
						else { echo '<tr><td>' . $row['teacher'] . '</td><td>' . $row['location'] . '</td><td>' . $row['session'] . '</td></tr>'; }
					}
				?>
			</tbody>
		</table>
	</div>
</div>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>
<?php mysqli_close($connection); ?>