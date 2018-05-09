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
                    <a class="navbar-brand visible-xs-block visible-sm-block" href="">Employee Data</a>
                    <a class="navbar-brand hidden-xs hidden-sm" href="">Employee Data</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                       <li><a href="index.php">Employee Data</a></li>
                        <li><a href="add.php">Add Employee</a></li>
                        <li><a href="service.php">Service Data</a></li>
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
                <h2>Employee Data &raquo; Edit Data</h2>
                <hr />

                <?php
                $emp_id = $_GET['staff_no'];
                $sql = mysqli_query($con, "SELECT * FROM employee WHERE staff_no='$emp_id'");
                if (mysqli_num_rows($sql) == 0) {
                    header("Location: index.php");
                } else {
                    $row = mysqli_fetch_assoc($sql);
                }
                if (isset($_POST['save'])) {
                    $firstname = $_POST['firstname'];
                    $surname = $_POST['surname'];
                    $phone = $_POST['phone_number'];
                    $email = $_POST['email'];
                    $type = $_POST['type'];
                    $question = $_POST['question'];
                    $answer = $_POST['answer'];

                    $update = mysqli_query($con, "UPDATE employee SET first_name='$firstname', surname='$surname', phone_number='$phone', email='$email', type='$type', question='$question', answer='$answer'  WHERE staff_no='$emp_id'") or die(mysqli_error());
                    if ($update) {
                        header("Location: edit.php?staff_no=" . $emp_id . "&message=success");
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
                        <label class="col-sm-3 control-label">Emp_id</label>
                        <div class="col-sm-3">
                            <input type="text" name="staff_no" value="<?php echo $row ['staff_no']; ?>" class="form-control" placeholder="Emp_id" disabled="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-3">
                            <input type="text" name="firstname" value="<?php echo $row ['first_name']; ?>" class="form-control" placeholder="First Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Surname</label>
                        <div class="col-sm-3">
                            <input type="text" name="surname" value="<?php echo $row ['surname']; ?>" class="form-control" placeholder="Surname" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Phone Number</label>
                        <div class="col-sm-3">
                            <input type="text" name="phone_number" value="<?php echo $row ['phone_number']; ?>" class="form-control" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-3">
                            <input type="email" name="email" value="<?php echo $row ['email']; ?>" class="input-group date form-control"  placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type</label>

                        <div class="col-sm-3">
                            <select name="type" class="form-control">
                                <option value=""> - Select Type - </option>
                                <option value="Admin" >Admin</option>
                                <option value="Mechanic" >Mechanic</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Security Question</label>
                        <div class="col-sm-3">
                            <select name="question" class="form-control" required>
                                <option value=""> - Select Question - </option>
                                <option value="What is the first name of the person you first kissed?">What is the first name of the person you first kissed?</option>
                                <option value="What is the name of your favorite childhood friend?">What is the name of your favorite childhood friend?</option>
                                <option value="What was your favorite food as a child?">What was your favorite food as a child?</option>
                                <option value="Who is your childhood sports hero?">Who is your childhood sports hero?</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Answer</label>
                        <div class="col-sm-3">
                            <input type="text" name="answer" value="<?php echo $row ['answer']; ?>" class="input-group date form-control"  placeholder="Answer" required>
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