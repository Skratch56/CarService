<?php
include("connection.php");
error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Master Data</title>

        <!-- Bootstrap -->
        <link rel="icon" href="../black.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


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
                    <a class="navbar-brand visible-xs-block visible-sm-block" href="">Service Data</a>
                    <a class="navbar-brand hidden-xs hidden-sm" href="">Service Data</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Employee Data</a></li>
                        <li><a href="add.php">Add Employee</a></li>
                        <li class="active"><a href="service.php">Service Data</a></li>
                        <li><a href="addservice.php">Add Service</a></li>
                        <li><a href="part.php">Part Data</a></li>
                        <li><a href="addpart.php">Add Part</a></li>
                        <li><a href="../index.php">Log Out</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="content">
                <h2>Employee Data</h2>
                <hr />

                <?php
                if (isset($_GET['sevice_id']) == 'delete') {
                    $del = $_GET['sevice_id'];
                    $sql = mysqli_query($con, "SELECT * FROM Service WHERE service_id='$del'");
                    if (mysqli_num_rows($sql) == 0) {
                        echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data not found.</div>';
                    } else {
                        $delete = mysqli_query($con, "DELETE FROM service WHERE service_id='$del'");
                        if ($delete) {
                            echo '<div class="alert alert-primary alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully deleted.</div>';
                        } else {
                            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data failed deleted.</div>';
                        }
                    }
                }
                ?>

                <form class="form-inline" method="get">
                    <div class="form-group">
                        <select name="filter" class="form-control" onChange="form.submit()">
                            <option value="0">Filter Service Data</option>
                            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                            <option value="Contract" <?php if ($filter == 'Contract') {
                                echo 'selected';
                            } ?>>Contract</option>
                            <option value="Office" <?php if ($filter == 'Office') {
                                echo 'selected';
                            } ?>>Office</option>
                            <option value="Outsourcing" <?php if ($filter == 'Outsourcing') {
                                echo 'selected';
                            } ?>>Outsourcing</option>
                        </select>
                    </div>
                </form>
                <br />
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>No.</th>
                            <th>Service ID</th>
                            <th>Description</th>
                            <th>Rate_Per_Hour</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        
                            $sql = mysqli_query($con, "SELECT * FROM service");
                        
                        if (mysqli_num_rows($sql) == 0) {
                            echo '<tr><td colspan="8">Data not found.</td></tr>';
                        } else {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $row['sevice_id'] . '</td>
							<td>' . $row['description'] . '</td>
                            <td>' . $row['rate_per_hour'] . '</td>
                            
					
							<td>

								<a href="editservice.php?service_id=' . $row['service_id'] . '" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
								<a href="Service.php?service_id=' . $row['service_id'] . '" title="Delete Record" onclick="return confirm(\'You are sure will erase data. ' . $row['description'] . '?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
                                $no++;
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div><center>
        <p>&copy;  2017</p
        ></center>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
