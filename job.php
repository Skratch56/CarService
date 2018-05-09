<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
ob_start();
$evaluation = $_GET['evid'];
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Car Service</title>
        <link rel="icon" href="black.jpg">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="layout.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Job</h1>
                    </a>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>

        <div class="container" id="navigationbar">
            <ul class="nav navbar-nav navbar-right">
                <ul class="breadcrumb list-inline">
                    <li><a class="active" href=""><span class="glyphicon glyphicon-user"></span> Employee <?php echo $_SESSION['login'] ?></a></li>
                    <li><a  class="active" href="main.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                    <li><a href="index.php"><span class="glyphicon glyphicon-off"></span>&nbspLogout </a></li>
                </ul>
            </ul>
        </div>

        <br><br>



        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">Job Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form -->
                    <form  id="evaluatedService" name="evaluation" method="POST">
                        <div class="row" id="marg-top-20">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2 padding-top-5" align="right">
                                        Job Date:
                                    </div>

                                    <div class="col-md-3">
                                        <?php
                                        echo '<input type="text" class="form-control" name="job_date" id="job_date" required="true" value="' . date("Y-m-d") . '" min="' . date("Y-m-d") . '"/>'
                                        ?>
                                    </div>

                                    <div class="col-md-2 padding-top-5" align="right">
                                        Evaluation Number:
                                    </div>

                                    <div class="col-md-3">
                                        <?php
                                        echo '<input type="text" class="form-control" name="evaluation_number" id="evaluation_number" required="true" value="' . $_GET['evid'] . '" readonly/>'
                                        ?>

                                    </div>

                                    <div class="col-md-4 padding-top-5"></div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Status:
                                    </div>

                                    <div class="col-md-6 padding-top-5">
                                        <select class="form-control" name="Status" id="Status" required="true">
                                            <option value="In Progress">In Progress</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                </div>




                                <div class="row padding-top-10">
                                    <div class="col-md-2 padding-top-10">
                                        <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success" style="width:160px"> Create New Job </button>
                                    </div>

                                    <div class="col-md-1 padding-top-10">
                                    </div>

                                    <div class="col-md-2 padding-top-10">

                                    </div>
                                    <div class="col-md-2 padding-top-10">
                                        <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success" style="width:160px"> Cancel Job </button>
                                    </div>
                                    <div class="col-md-1 padding-top-10">
                                    </div>

                                    <div class="col-md-2 padding-top-10">

                                    </div>
                                    <div class="col-md-2 padding-top-10">
                                        <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                                    </div>
                                </div>
                                </form>


                            </div>
                        </div>
                </div>
            </div>

            <!--
                    Begining of PHP code
                    The code gets executed when user clicks the save button
            -->

            <?php
            if (isset($_POST['btnsavebooking'])) {
                $date = $_POST['job_date'];
                $Evaluation_id = $_POST['evaluation_number'];
                $Status = $_POST['Status'];
                //$mechanic = $_POST['mechanic'];
//                $query = "INSERT INTO `job` (`job_no`, `job_date`, `tot_amount`, `status`, `evaluation_no`) VALUES (NULL,'" . $date . "','" . $Evaluation_id . "','". $Status . "','" . $Evaluation_id . "');";
                $query = "INSERT INTO `job` (`job_no`, `job_date`, `tot_amount`, `status`, `evaluation_no`) VALUES (null, '" . $date . "', '" . $Evaluation_id . "', '" . $Status . "', '" . $Evaluation_id . "');";
                $result = mysqli_query($conn, $query);
                $query10 = "update `evaluation` set evaluation_status ='Complete' where evaluation_no='" . $Evaluation_id. "'";
                mysqli_query($conn, $query10);
                $query2 = "Select * from job where job_date='{$date}' and evaluation_no='{$Evaluation_id}'";

                $result2 = mysqli_query($conn, $query2);

                echo"<script>                   document.getElementById('Status').value = '$Status';
						document.getElementById('evaluation_number').value = '$Evaluation_id';
                                                document.getElementById('btnnext').disabled = false;
                                                document.getElementById('btnsavebooking').disabled = true;
						
					</script>";
                while ($rows = mysqli_fetch_array($result2)) {
                    $_SESSION["job_no"] = $rows["job_no"];
                    if ($Status == "In Progress") {
                        header("Location: jobcard.php?jid={$_SESSION['job_no']}");
                    } else {

                        header("Location: main.php");
                    }
                }
            }
            ?>

            <script language="JavaScript" type="text/javascript">
                function enableTime() {
                    document.getElementById('evaluation_time').disabled = false;
                }
            </script>

            <script language="JavaScript" type="text/javascript">
                document.getElementById('evaluation_time').disabled = false;
                document.getElementById('mechanic').disabled = false;
            </script>

            <script language="JavaScript" type="text/javascript">
                function getMainPage() {
                    window.location.href = "main.php";
                }
            </script>
            <script language="JavaScript" type="text/javascript">
                function getJobCardPage() {
                    window.location.href = "jobcard.php?jid=" +<?php
            echo $_SESSION['job_no'];
            ?>;
                }
            </script>

            <script language="JavaScript" type="text/javascript">
                function DisableButton() {
                    window.location.href = "jobcard.php?jid=" +<?php
            echo $_SESSION['job_no'];
            ?>;
                }
            </script>

            <script src="jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <?php ob_end_flush(); ?>
    </body>
</html>