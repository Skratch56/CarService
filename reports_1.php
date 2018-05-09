<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Car Service</title>
        <link rel="icon" href="black.jpg">
        <link rel="stylesheet" href="style.css"/>
        <script type="text/javascript" src="jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="layout.css" rel="stylesheet" />
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Completed Jobs</h1>
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

        <?php
//        if (isset($_GET['cst'])) {
//            $cust_idno = $_GET['cst'];
//
//            echo '<script>
//						document.getElementById("cust_idno").value =' . $cust_idno . ';
//				</script>';
//        }
        ?>

        <div class="container">
            <div class="content">
                <h2>Jobs Report</h2>
                <hr />



                <form class="form-inline" method="get">
                    <div class="form-group">
                        <select name="filter" class="form-control" onChange="form.submit()">
                            <option value="0">Filter Jobs Data</option>
                            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                            <option value="In Service" <?php
                            if ($filter == 'In Service') {
                                echo 'selected';
                            }
                            ?>>In Service</option>
                            <option value="Complete" <?php
                            if ($filter == 'Complete') {
                                echo 'selected';
                            }
                            ?>>Complete</option>

                        </select>
                    </div>
                </form>
                <br />
                <div class="table-responsive">
                    <table class="bordered">
                        <tr>
                            <th>No.</th>
                            <th>Job No</th>
                            <th>Job Date</th>
                            <th>Job Status</th>
                            <th>Evaluation No</th>

                            <th>Job Cards</th>

                        </tr>
                        <?php
                        if ($filter) {
                            $sql = mysqli_query($conn, "SELECT * FROM job WHERE status='$filter'");
                        } else {
                            $sql = mysqli_query($conn, "SELECT * FROM job ORDER BY job_no ASC");
                        }
                        if (mysqli_num_rows($sql) == 0) {
                            echo '<tr><td colspan="8">Data not found.</td></tr>';
                        } else {

                            $no = 1;
                            while ($row = mysqli_fetch_assoc($sql)) {
                                echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $row['job_no'] . '</td>
							<td>' . $row['job_date'] . '</a></td>
                            <td>' . $row['status'] . '</td>
                            <td>' . $row['evaluation_no'] . '</td>
                            <td>
                            ';
                                $sql2 = mysqli_query($conn, "SELECT * FROM job_card where job_no=" . $row['job_no']);
                                if (mysqli_num_rows($sql2) == 0) {
                                    echo 'No Job Card.';
                                } else {
                                    echo'<table><tr>
                            <th>Service_id</th>
                            <th>Job_No</th>
                            <th>Start_Time</th>
                            <th>End_Time</th>
                            
                            <th>Service_Total</th>
                            <th>Staff_No</th>
                            </tr><tr>';
                                    while ($row2 = mysqli_fetch_assoc($sql2)) {

                                        echo
                                        '
                            <td>' . $row2['service_id'] . '</td>
                                <td>' . $row2['job_no'] . '</td>
                                    <td>' . $row2['start_time'] . '</td>
                                        <td>' . $row2['end_time'] . '</td>
                                            <td>' . $row2['service_total'] . '</td>
                                                <td>' . $row2['staff_no'] . '</td></tr>
                                ';
                                    }
                                    echo
                                    '</table></td>';
                                }

                                echo'
							<td>';
                                if ($row['status'] == 'Paid') {
                                    echo '<span class="label label-success">Paid</span>';
                                } else if ($row['status'] == 'Pending') {
                                    echo '<span class="label label-info">Pending</span>';
                                }
                                echo '
							</td>
							<td>
								<a href="printReport_1.php?job_no=' . $row['job_no'] . '" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
							</td>
						</tr>
						';
                                $no++;
                            }
                        }
                        ?>
                    </table>
                    <div class="col-md-2 padding-top-10">
                        <a href="printReport_1.php" title="Edit Data" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print All</a>
                    </div>
                    <div class="col-md-2 padding-top-10">
                        <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                    </div>
                </div>
            </div>
        </div>

        <!--
                Begining of PHP code
                The code gets executed when user clicks the save button
        -->


        <script type="text/javascript">
            document.getElementById('mileage').disabled = true;
            document.getElementById("btnsavebooking").disabled = true;
        </script>


        <script language="JavaScript" type="text/javascript">
            function getVehicleDetails(a1, a2, a3, a4, a5) {
                var a1 = document.getElementById(a1);
                var a2 = document.getElementById(a2);
                var a3 = document.getElementById(a3);
                var a4 = document.getElementById(a4);
                var a5 = document.getElementById(a5);


                if (a1.value != "null") {

                    //Create our XMLHttpRequest object
                    var hr = new XMLHttpRequest();
                    //Create some variables we need to send to our PHP file
                    var url = "process_populate.php";
                    var reg_num = a1.value;

                    var vars = "reg_num=" + reg_num;

                    hr.open("POST", url, true);
                    //Set content type header information for sending url encoded variables in the request
                    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    //Access the onreadystatechange event for the XMLHttpRequest object
                    hr.onreadystatechange = function () {
                        if (hr.readyState == 4 && hr.status == 200) {
                            var return_data = hr.responseText;
                            var vehicleDetails = return_data.split("|");

                            a2.value = vehicleDetails[1];
                            a3.value = vehicleDetails[2];
                            a4.value = vehicleDetails[3];
                            a5.value = vehicleDetails[4];

                            a5.disabled = false;
                            document.getElementById("btnsavebooking").disabled = false;
                            //document.getElementById("dsp").innerHTML = return_data;
                        }
                    }

                    //Send the data to PHP now... and wait for response to update the status div
                    hr.send(vars);//Actually execute the request

                } else {
                    a2.value = "";
                    a3.value = "";
                    a4.value = "";
                    a5.value = "";
                    a5.disabled = true;

                    document.getElementById("btnsavebooking").disabled = true;
                }
            }
        </script>



        <script language="JavaScript" type="text/javascript">
            function getMainPage() {
                window.location.href = "main.php";
            }
        </script>
        <script language="JavaScript" type="text/javascript">
            function getJobPage() {
                window.location.href = "cashreceipt2.php?jid=" +<?php
                        echo $_GET['jid'];
                        ?>;
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>