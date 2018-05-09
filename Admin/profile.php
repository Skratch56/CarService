<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>

	<!-- Bootstrap -->
        <link rel="icon" href="../black.jpg">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		.content {
			margin-top: 80px;
		}
	</style>
	
	
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand visible-xs-block visible-sm-block" href="">Employee Data</a>
				<a class="navbar-brand hidden-xs hidden-sm" href="">Employee Data</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Master Data</a></li>
					<li><a href="add.php">Add Data</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Employee Data &raquo; Biodata</h2>
			<hr />
			
			<?php
			$id = $_GET['emp_id'];
			
			
			$sql = mysqli_query($con, "SELECT * FROM employee WHERE emp_id='$id'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			
			if(isset($_GET['del']) == 'delete'){
			    $s  = $_GET['del'];
				$delete = mysqli_query($con, "DELETE FROM employee WHERE emp_id='$s'");
				if($delete){
					echo '<div class="alert alert-danger alert-dismissable">><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully deleted.</div>';
				}else{
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data failed deleted.</div>';
				}
			}
			?>
			
			<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">Emp_id</th>
					<td><?php echo $row['emp_id']; ?></td>
				</tr>
				<tr>
					<th>Name</th>
					<td><?php echo $row['emp_name']; ?></td>
				</tr>
				<tr>
					<th>Dob</th>
					<td><?php echo $row['emp_id']; ?></td>
				</tr>
				<tr>
					<th>Address</th>
					<td><?php echo $row['emp_address']; ?></td>
				</tr>
				<tr>
					<th>Phone</th>
					<td><?php echo $row['emp_phone']; ?></td>
				</tr>
				<tr>
					<th>Department</th>
					<td><?php echo $row['emp_dept']; ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo $row['emp_status']; ?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $row['emp_email']; ?></td>
				</tr>
				<tr>
					<th>Password</th>
					<td><?php echo $row['emp_password']; ?></td>
				</tr>
			</table>
			<a href="index.php" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span> Revert </a>
			<a href="edit.php?emp_id=<?php echo $row['emp_id']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit Data</a>
			<a href="profile.php?del=<?php echo $row['emp_id']; ?>" class="btn btn-sm btn-danger" onClick="return confirm('You sure are delete data <?php echo $row['emp_name']; ?>')"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete Data</a>
			
		</div>
	</div>

	
</body>
</html>