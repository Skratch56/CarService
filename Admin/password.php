<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Password Update</title>

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
		
		
		<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
		
		
			<h2>Employee Data &raquo; Change Password</h2>
			<hr />

			<p>Change password Employee with Id <?php echo '<b>'.$_GET['emp_id'].'</b>'; ?></p>
			<?php
			$s= $_GET['emp_id'];
			//echo $s;
			?>
			<?php
			if(isset($_POST['Change'])){
			
				//$emp_id 	= $_POST['emp_id'];
				$password 	= ($_POST['password']);
				$password1 	= $_POST['password1'];
				$password2 	= $_POST['password2'];

				$sql = mysqli_query($con, "SELECT * FROM employee WHERE emp_id='$s' AND emp_password='$password'");
					//$sql = mysqli_query($con, "select emp_password from employee where emp_id='$s'");
				if(mysqli_num_rows($sql) == 0){
				
				//echo '<div class="alert alert-danger" role="alert">
//  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
 // <span class="sr-only">Error:</span>
 // Wrong password entry password is incorrect.
//</div>';
				
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Wrong password entry password is correct</div>';
				}else{
					if($password1 == $password2){
						if(strlen($password1) >= 6){
							//$pass = $password1;
							$update = mysqli_query($con, "UPDATE employee SET emp_password='$password1' WHERE emp_id='$s'");
							if($update){
								echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password successfully change.</div>';
							}else{
								echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>The password failed to change.</div>';
							}
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Long character Password at least 6 characters.</div>';
						}
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pasword is not the same.</div>';
					}
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Old Password</label>
					<div class="col-sm-3">
						<input type="password" name="password" class="form-control" placeholder="Old Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">New Password</label>
					<div class="col-sm-3">
						<input type="password" name="password1" class="form-control" placeholder="New Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Re-enter New Password</label>
					<div class="col-sm-3">
						<input type="password" name="password2" class="form-control" placeholder="Re-enter New Password" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="Change" class="btn btn-sm btn-info" value="Change">
						<a href="index.php" class="btn btn-sm btn-danger"><b>Cancel</b></a>
					</div>
				</div>
			</form>
		</div>
	</div>

	
</body>
</html>
