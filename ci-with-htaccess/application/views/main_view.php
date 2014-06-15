<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Friends</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Welcome! <small>Find your friends!</small></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
<?php
				if ($this->session->flashdata('error')){
					echo $this->session->flashdata('error');
				}
				if ($this->session->flashdata('success')){
					echo "<h3>" . $this->session->flashdata('success') . "</h3>";
				}
?>
				<h2>Register</h2>
				<form role="form" action="/main/register" method="post">
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="name" class="form-control" placeholder="Your Name">
					</div>
					<div class="form-group">
						<label for="alias">Alias:</label>
						<input type="text" name="alias" class="form-control" placeholder="Your Alias">
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" class="form-control" placeholder="example@company.com">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="confirm">Confirm Password:</label>
						<input type="password" name="confirm" class="form-control" placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<label for="date">Birth Date:</label>
						<input type="date" name="date" class="form-control">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
			<div class="col-md-4 col-md-offset-2">
				<h2>Login</h2>
<?php
			if ($this->session->flashdata('login_error')) {
				echo "<h5>" . $this->session->flashdata('login_error') . "</h5>";
			}

?>
				<form role="form" action="/main/login" method="post">
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" name="email" class="form-control" placeholder="example@company.com">
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" name="password" class="form-control" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
