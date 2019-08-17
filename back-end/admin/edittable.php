<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';
?>
<form action="updatetable.php" method="post">
<div class="container-fluid m-4" style="overflow-y: auto;max-height: 100%;">
	<table class="table table-striped">
		<thead>
			<th scope="col">Teacher</th>
			<th scope="col">Location</th>
			<th scope="col">Session</th>
			<th scope="col"></th>
		</thead>
		<tbody>
			<?php
				echo '<tr></tr>';
			?>
		</tbody>
	</table>
</div>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<a href="http://localhost/appeer/admin/index.php" class="btn btn-large btn-danger mx-2">Close (without saving)</a><button type="submit" class="btn btn-large btn-success mx-2">Save + Return</button></form>
	</div>
</footer>
<script>
	// supress the "are you sure you want to leave" alert
	window.onbeforeunload = () => {}
</script>
<?php mysqli_close($connection); ?>