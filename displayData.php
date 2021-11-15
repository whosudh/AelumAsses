	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>table</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
		<div class="row">
		<div class="col-md-12 pt-5">
		
			<table class="table table-bordered">
				<thead align="center">
					<tr>
					<th>Id</th>
					<th>Name</th>
					<th>Email</th>
					<th>D.O.B</th>
					<th>About</th>
					</tr>
				</thead>
				<tbody align="center">
				<?php
				include 'connection.php';
				$selectquery="select * from profile";
				$query=mysqli_query($con,$selectquery);
				while($res=mysqli_fetch_array($query)){
				?>
					<tr>
					<td><?php echo $res['Id']; ?></td>
					<td><?php echo $res['Name']; ?></td>
					<td><?php echo $res['Email']; ?></td>
					<td><?php echo $res['DOB']; ?></td>
					<td><?php echo $res['About']; ?></td>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
		</div>
		</div>
	</body>
	</html>