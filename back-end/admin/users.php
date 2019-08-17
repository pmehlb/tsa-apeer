<?php
session_start();
// check that our user is logged in
require '../config/isadmin.php';
// connect to our db
require '../config/db.php';

$result = mysqli_query($connection, "SELECT id, username, name, email, admin FROM `users`");

if (isset($_GET['update'])) {
	if ($_GET['update'] == "success") {
		echo '<div class="modal fade" id="successModal"><div class="modal-dialog"><div class="alert alert-success">Successfully updated user!</div></div></div><script>$(document).ready(function() {$("#successModal").modal(\'show\'); setTimeout(function() {$("#successModal").modal(\'hide\');$(".modal-backdrop").remove();}, 1500);});</script>';
	} else {
		echo '<div class="modal fade" id="successModal"><div class="modal-dialog"><div class="alert alert-danger">Error updating user!</div></div></div><script>$(document).ready(function() {$("#errorModal").modal(\'show\'); setTimeout(function() {$("#errorModal").modal(\'hide\');$(".modal-backdrop").remove();}, 1500);});</script>';
	}
}
?>
<div class="modal fade" id="addUserModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add User</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<form action="http://localhost/appeer/admin/adduser.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="username" class="col-form-label">Username:</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="S123456" required>
						<label for="email" class="col-form-label">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="john.doe@gmail.com" required>
						<label for="name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
						<label for="password" class="col-form-label">Password:</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
						<label for="admin_choose" class="col-form-label">Admin?</label>
						<div id="admin_choose" class="form-check form-check-inline">
							<input type="radio" class="form-check-input" id="admin1" name="admin" value="1"><label class="form-check-label" for="admin1">Yes</label>
							<input type="radio" class="form-check-input" id="admin2" name="admin" value="0"><label class="form-check-label" for="admin2">No</label>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" id="newUser" class="btn btn-primary" value="Add User">
				</div>
			</form>
		</div>
	</div>
</div>
<div class="modal fade" id="editUserModal" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit User</h5>
				<button type="button" class="close" data-dismiss="modal">
					<span>&times;</span>
				</button>
			</div>
			<form action="http://localhost/appeer/admin/changeuser.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="username" class="col-form-label">Username:</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="S123456" required>
						<label for="email" class="col-form-label">Email:</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="john.doe@gmail.com" required>
						<label for="name" class="col-form-label">Name:</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
						<input type="hidden" id="id" name="id" required>
					</div>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" id="saveUser" class="btn btn-primary" value="Save User">
				</div>
			</form>
		</div>
	</div>
</div>
<main role="main" style="overflow: hidden;">
	<div class="container-fluid bg-primary">
		<ul class="nav justify-content-end">
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/index.php">Admin Hub</a></li>
			<li class="nav-item custom-item active"><a class="text-white nav-link active" href="#">User Management</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/admin/settings.php">Settings</a></li>
			<li class="nav-item custom-item"><a class="text-white nav-link" href="http://localhost/appeer/hub.php" id="close">Back</a></li>
		</ul>
	</div>
</main>
<div class="row container-fluid">
	<table class="table table-bordered table-striped mx-5 my-2" style="overflow-y: scroll; max-height: 100%;">
		<thead>
			<th scope="col">Username</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Admin</th>
			<th scope="col"></th>
		</thead>
		<tbody>
			<?php
				while ($row = mysqli_fetch_assoc($result)) {
					echo '<tr id="' . $row['id'] . '"><td>' . $row['username'] . '</td>';
					echo '<td>' . $row['name'] . '</td>';
					echo '<td>' . $row['email'] . '</td>';
					echo '<td>';
					if ($row['admin'] == 1) { echo '<i class="fas fa-check fa-2x" style="color: #0f9d58;"></i>'; }
					else { echo '<i class="fas fa-times fa-2x" style="color: #db4437;"></i>'; }
					echo '</td>';
					echo '<td><button id="editUser" class="btn btn-large btn-primary btn-block" data-toggle="modal" data-target="#editUserModal" data-id="' . $row['id'] . '" data-username="' . $row['username'] . '" data-name="' . $row['name'] . '" data-email="' . $row['email'] . '">Edit</button><a href="http://localhost/appeer/admin/deleteuser.php?id=' . $row['id'] . '" class="btn btn-large btn-danger btn-block">Delete</a></td></tr>';
				}
			?>
			<tr><td colspan="5"><button id="addUser" class="btn btn-large btn-success btn-block" data-toggle="modal" data-target="#addUserModal">Add User</button></td></tr>
		</tbody>
	</table>
</div>
<footer class="footer py-3" style="position: absolute;bottom: 0;right: 0;">
	<div class="container">
		<span class="text-dark">Currently logged in as <strong><?php echo $_SESSION['name']; if ($_SESSION['admin'] == true) { echo ' (admin)'; } ?></strong></span>
	</div>
</footer>

<script>
	$("#editUserModal").on('show.bs.modal', function(event) {
		var button    = $(event.relatedTarget);
		var username  = button.data('username');
		var name      = button.data('name');
		var email     = button.data('email');
		//var admin     = button.data('admin');
		var id        = button.data('id');
		
		var modal = $(this);
		modal.find('form input#username').attr('value', username);
		modal.find('form input#email').attr('value', email);
		modal.find('form input#name').attr('value', name);
		modal.find('form input#id').attr('value', id);
	});
	
	$("input").on('input', function() {
		var input = $(this);
		var val   = input.val();
		
		if (input.data('lastval') != val) {
			input.data('lastval', val);
			input.attr('value', val);
		}
	});
</script>
<?php mysqli_close($connection); ?>