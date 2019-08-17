<?php
session_start();
// check that our user is logged in
require 'config/isloggedin.php';
require 'config/db.php';

$datequery = mysqli_query($connection, "SELECT * FROM `dates_log` ORDER BY `date` ASC LIMIT 1");
$daterow   = mysqli_fetch_row($datequery);
$dateMap   = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
$result    = mysqli_query($connection, "SELECT * FROM `" . $daterow[1] . "` ORDER BY `teacher` ASC");

if (isset($_GET['request'])) {
	if ($_GET['request'] == "success") {
		echo '<div class="modal fade" id="successModal"><div class="modal-dialog"><div class="alert alert-success">Successfully requested session!</div></div></div><script>$(document).ready(function() {$("#successModal").modal(\'show\'); setTimeout(function() {$("#successModal").modal(\'hide\');$(".modal-backdrop").remove();}, 1500);});</script>';
	} else if ($_GET['request'] == "priority") {
		echo '<div class="modal fade" id="priorityModal"><div class="modal-dialog"><div class="alert alert-warning">You already have a higher priority request!</div></div></div><script>$(document).ready(function() {$("#priorityModal").modal(\'show\'); setTimeout(function() {$("#priorityModal").modal(\'hide\');$(".modal-backdrop").remove();}, 1500);});</script>';
	} else {
		echo '<div class="modal fade" id="successModal"><div class="modal-dialog"><div class="alert alert-danger">Error requesting session!</div></div></div><script>$(document).ready(function() {$("#errorModal").modal(\'show\'); setTimeout(function() {$("#errorModal").modal(\'hide\');$(".modal-backdrop").remove();}, 1500);});</script>';
	}
}
?>
<div class="modal fade" id="requestModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Request Session</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<form action="http://localhost/appeer/requestsession.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<div class="form-group form-inline">
							<label for="teacher" class="col-form-label">Session Teacher: </label>
							<input type="text" class="form-control-plaintext font-weight-bold" id="teacher" name="teacher" readonly required>
						</div>
						<div class="form-group form-inline">
							<label for="location" class="col-form-label">Location: </label>
							<input type="text" class="form-control-plaintext font-weight-bold" id="location" name="location" readonly required>
						</div>
						<div class="form-group form-inline">
							<label for="session" class="col-form-label">Session Description: </label>
							<input type="text" class="form-control-plaintext font-weight-bold" id="session" name="session" readonly required>
						</div>
						<label for="priority" class="col-form-label">Request Priority: </label>
						<select class="form-control font-weight-bold" id="priority" name="priority" required>
							<option value="0">Low priority</option>
							<option value="2">High priority</option>
						</select>
						<input type="hidden" id="date" name="date" value="<?php echo $daterow[1]; ?>">
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" id="requestSession" class="btn btn-primary" value="Request Session">
				</div>
			</form>
		</div>
	</div>
</div>
<main role="main" style="overflow: hidden;">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/hub.php">Home</a></li>
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">Request Session</a></li>
			<!-- <li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/profile.php">My Profile</a></li> -->
			<?php if ($_SESSION['admin'] == true) { echo '<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/index.php">Admin Hub</a></li>'; }?>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/login/logout.php" id="close">Log Out</a></li>
		</ul>
	</div>
</main>
<div class="container-fluid">
	<table class="table table-bordered table-striped my-2" style="overflow-y: scroll; max-height: 100%;">
		<thead>
			<th scope="col">Teacher</th>
			<th scope="col">Location</th>
			<th scope="col">Club/Activity</th>
			<th scope="col"></th>
		</thead>
		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr><td>' . $row['teacher'] . '</td><td>' . $row['location'] . '</td><td>' . $row['session'] . '</td><td><button class="btn btn-large btn-primary btn-block" id="registerSession" data-teacher="' . $row['teacher'] . '" data-location="' . $row['location'] . '" data-session="' . $row['session'] . '" data-toggle="modal" data-target="#requestModal">Request</button></td></tr>';
				}
			?>
		</tbody>
	</table>
</div>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>

<script>
	$("#requestModal").on('show.bs.modal', function(event) {
		var button   = $(event.relatedTarget);
		var teacher  = button.data('teacher');
		var location = button.data('location');
		var session  = button.data('session');
		
		var modal = $(this);
		modal.find('form input#teacher').attr('value', teacher);
		modal.find('form input#location').attr('value', location);
		modal.find('form input#session').attr('value', session);
	});
</script>
<?php mysqli_close($connection); ?>