<?php
// starts the session, allows us to use session variables
session_start();

if (isset($_SESSION['loggedin'])) {
	die(header('Location: hub.php'));
}

?>

<div class="container-fluid bg-primary">
	<h2 class="text-white text-center pt-5">Hello there! Welcome to Appeer!</h2>
	<h5 class="text-white text-center pb-5">The app that manages your students for you.</h5>
</div>
<div class="container mt-4">
	<div class="">
		<h3>To get started, please login!</h3>
	</div>
	<hr />
	<?php if (isset($_GET['error']) && $_GET['error'] == "access") {
		echo '<div class="alert alert-danger" role="alert">You do not have permission to access this page, please log in.</div>';
	} else if (isset($_GET['error']) && $_GET['error'] == "inc") {
		echo '<div class="alert alert-danger" role="alert">Incorrect user or password, please try again!</div>';
	} ?>
	<form action="http://localhost/appeer/login/login.php" method="post">
	<div class="form-group row">
		<label class="col-3 col-form-label" for="username">Username</label>
		<div class="col-9">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text">
						<i class="fa fa-user"></i>
					</div>
				</div>
				<input type="text" class="form-control" id="username" name="username" placeholder="yourname@school.com" required>
			</div>
			<span class="form-text text-muted" id="usernameHelpBlock">Enter your school email.</span>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-3 col-form-label" for="password">Password</label>
		<div class="col-9">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text">
						<i class="fa fa-lock"></i>
					</div>
				</div>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
			</div>
			<span class="form-text text-muted" id="passwordHelpBlock">Enter your password.</span>
		</div>
	</div>
	<div class="form-group row">
		<div class="col">
			<button class="btn btn-primary btn-large btn-block" name="submit" type="submit">Login</button>
		</div>
	</div>
</form>
</div>