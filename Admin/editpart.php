<?php
include("connection.php");
//error_reporting(1);
?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Edit Data</title>

        <!-- Bootstrap -->
        <link rel="icon" href="../black.jpg">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            $('.date').datepicker({
                format: 'yyyy-mm-dd',
            })
        </script>

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
                    <a class="navbar-brand visible-xs-block visible-sm-block" href="">Part Data</a>
                    <a class="navbar-brand hidden-xs hidden-sm" href="">Part Data</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                         <li ><a href="index.php">Employee Data</a></li>
                        <li><a href="add.php">Add Employee</a></li>
                        <li><a href="service.php">Service Data</a></li>
                        <li><a href="addservice.php">Add Service</a></li>
                        <li class="active"><a href="part.php">Part Data</a></li>
                        <li><a href="addpart.php">Add Part</a></li>
                        <li><a href="../index.php">Log Out</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="content">
                <h2>Part Data &raquo; Edit Data</h2>
                <hr />

                <?php
                $emp_id = $_GET['part_no'];
                $sql = mysqli_query($con, "SELECT * FROM part WHERE part_no='$emp_id'");
                if (mysqli_num_rows($sql) == 0) {
                    header("Location: part.php");
                } else {
                    $row = mysqli_fetch_assoc($sql);
                }
                if (isset($_POST['save'])) {
                    $description = $_POST['description'];
                    $qty = $_POST['qty'];
                    $price = $_POST['price'];
                    $category = $_POST['category'];


                    $update = mysqli_query($con, "UPDATE part SET description='$description', qty_in_stock='$qty', selling_price='$price', category='$category'  WHERE part_no='$emp_id'") or die(mysqli_error());
                    if ($update) {
                        header("Location: editpart.php?part_no=" . $emp_id . "&message=success");
                    } else {
                        echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data failed, try again.</div>';
                    }
                }

                if (isset($_GET['message']) == 'success') {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data successfully saved.</div>';
                }
                ?>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-3">
                            <input type="text" name="description" value="<?php echo $row ['description']; ?>" class="form-control" placeholder="description" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Qty In Stock</label>
                        <div class="col-sm-3">
                            <input type="text" name="qty" value="<?php echo $row ['qty_in_stock']; ?>" class="form-control" placeholder="Qty In Stock" required>
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="col-sm-3 control-label">Selling Price</label>
                        <div class="col-sm-3">
                            <input type="text" name="price" value="<?php echo $row ['selling_price']; ?>" class="input-group date form-control"  placeholder="Selling Price" required>
                        </div>
                    </div>



                    <div class="form-group">
                        <label class="col-sm-3 control-label">Category</label>
                        <div class="col-sm-3">
                            <select name="category" class="form-control" required>
                                <option value=""> - Select Category - </option>
                                <option value="change oil">Change Oil</option>
                                <option value="break pads">Break Pads</option>
                                <option value="clean pistols">Clean Pistols</option>
                                
                            </select>
                        </div>

                    </div>
<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Update">
						<a href="index.php" class="btn btn-sm btn-danger">Cancel</a>
					</div>
				</div>
                </form>
            </div>
        </div>


    </body>
</html>