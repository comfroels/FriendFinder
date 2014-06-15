<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<br>
				<div class="pull-right">
					<a href="/friends" class="btn btn-warning">Home</a>&emsp;<a href="/main/logout" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<h1><?= $user['alias'] ?>'s <small>Profile</small></h1>
				<h3>Name: <small><?= $user['name'] ?></small></h3>
				<h3>Email: <small><?= $user['email'] ?></small></h3>
			</div>
		</div>
	</div>
</body>
</html>