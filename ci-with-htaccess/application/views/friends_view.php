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
				<h1>Hello, <?= $this->session->userdata['alias'] ?>!</h1>
				<a href="/main/logout"><button class="btn btn-danger pull-right">Logout</button></a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<h3>Here is a list of your friends:</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Alias</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
					foreach($friends as $friend) {
						?>
						<tr>
							<td><?= $friend['alias'] ?></td>
							<td><a href="/users/profile/<?= $friend['id'] ?>">View Profile</a>&emsp;<a href="/friends/delete/<?= $friend['id'] ?>">Remove as Friend</a></td>
						</tr>
<?php				}
?>						
					</tbody>
				</table>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-6 col-md-offset-2">
				<h3>Users not on your friend's list:</h3>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Alias</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
<?php
					foreach($others as $other){
						?>
						<tr>
							<td><a href="/users/profile/<?= $other['id'] ?>"><?= $other['alias'] ?></a></td>
							<td><a href="/friends/add/<?= $other['id'] ?>" class="btn btn-primary">Add as a Friend</a></td>
						</tr>
<?php					}
?>						
					</tbody>
				</table>
			</div>

		</div>
	</div>
</body>
</html>