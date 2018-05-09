<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
$job_id = $_GET['jid'];
session_start();
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
                        <h1>Job Card</h1>
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

        <br><br><form  id="search" name="search" method="POST" >
            <div class="container">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <label class="control-label" for="HexInput1"> 
                            &nbsp&nbsp<input onclick="update4(this.value);" type="radio" name="data[hexInput]" id="HexInput3" checked="true" value="newjobcard"> New Job Card
                            &nbsp&nbsp&nbsp&nbsp&nbsp<input onclick="update4(this.value);" type="radio" name="data[hexInput]" id="HexInput4" value="existingjobcard"> Existing Job Card</label>

                        <div class="row">

                            <div class="col-md-2 padding-top-10">
                                <input type="text" maxlength="13" class="form-control" name="service_ids" id="service_ids" placeholder="service_id" disabled=""/>
                            </div>


                            <div class="col-md-2 padding-top-10">
                                <input type="text" maxlength="13" class="form-control" name="employee_ids" id="employee_ids" placeholder="employee_id" disabled=""/>
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <button type="submit" name="btnsearch" id="btnsearch" class="btn btn-success pull-left" onclick ="showhide()" disabled=""> Retrieve </button>
                            </div>

                            <div class="col-md-2 padding-top-10"></div>

                            <div class="col-md-3 padding-top-10"></div>


                            <div class="col-md-3 padding-top-10"></div>
                        </div>

                    </div>
                </div>
            </div></form>
        <div class="container-fluid" align="center">
            <div id="msg" class="alert alert-success alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Job Captured Successfully.</div>
            <div id="msg2" class="alert alert-success alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Job Updated Successfully.</div>
            <table class='bordered'>
                <col width ="620">
                <col width ="620">
                <tbody>
                    <tr>
                        <td>
                            <form  id="evaluatedService" name="evaluation" method="POST">

                                <div class="panel panel-default" style="display:block;" >
                                    <div class="panel-heading">Job Details</div>
                                    <div class="panel-body">

                                        <!-- Start of Customer details form -->

                                        <div class="row" id="marg-top-20">

                                            <div class="row">
                                                <div class="col-md-2 padding-top-5" align="right">
                                                    Job ID:
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    echo '<input type="text" class="form-control" name="servicedesc1" id="servicedesc1" value="' . $job_id . '" readonly />';
                                                    ?>
                                                </div>

                                                <div class="col-md-3 padding-top-5" align="right">
                                                    Evaluation Number:
                                                </div>

                                                <div class="col-md-3">
                                                    <?php
                                                    $query2 = "Select * from job where job_no='{$job_id}' ";

                                                    $result2 = mysqli_query($conn, $query2);
                                                    while ($rows = mysqli_fetch_array($result2)) {
                                                        $evaluation_number = $rows["evaluation_no"];
                                                    }
                                                    echo '<input type="text" class="form-control" name="evaluation_number" id="evaluation_number" required="true" value="' . $evaluation_number . '" readonly/>'
                                                    ?>
                                                </div>


                                            </div>


                                            <div class="row">
                                                <div class="col-md-2 padding-top-10" align="right">
                                                    Date:
                                                </div>

                                                <div class="col-md-3 padding-top-10">
                                                    <?php
                                                    $query2 = "Select * from job where job_no='{$job_id}' ";

                                                    $result2 = mysqli_query($conn, $query2);
                                                    while ($rows = mysqli_fetch_array($result2)) {
                                                        $jobdate = $rows["job_date"];
                                                    }
                                                    echo '<input type="text" class="form-control" name="evaluation_number" id="evaluation_number" required="true" value="' . $jobdate . '" readonly/>'
                                                    ?>
                                                </div>

                                                <div class="col-md-3 padding-top-10" align="right">
                                                    Status:
                                                </div>

                                                <div class="col-md-3 padding-top-10">
                                                    <?php
                                                    $query2 = "Select * from job where job_no='{$job_id}' ";

                                                    $result2 = mysqli_query($conn, $query2);
                                                    while ($rows = mysqli_fetch_array($result2)) {
                                                        $status = $rows["status"];
                                                    }
                                                    echo '<input type="text" class="form-control" name="status" id="status" required="true" value="' . $status . '" readonly/>'
                                                    ?>
                                                </div>

                                            </div>







                                        </div>

                                    </div>
                                </div>
                        </td>
                        <td>
                            <div class="panel panel-default" style="display:inline-block;">
                                <div class="panel-heading" style="display:inline-block;" >Employee Details</div>
                                <div class="panel-body" style="display:inline-block;">

                                    <!-- Start of search form -->

                                    <div class="row" style="display:inline-block;">
                                        <div class="col-md-2 padding-top-5" align="right">
                                            Employee_ID:
                                        </div>

                                        <div class="col-md-2">

                                            <input type="text" class="form-control" name="employee_id" id="employee_id" value="" readonly />

                                        </div>

                                        <div class="col-md-2 padding-top-5" align="right">
                                            Employee Name:
                                        </div>

                                        <div class="col-md-5 ">

                                            <select class="form-control" name="mechanic" onchange="update()" onclick="update()" id="mechanic" required="true">
                                                <?php
                                                global $conn;

                                                $query = "SELECT * from employee WHERE type = 'mechanic'";
                                                $result = mysqli_query($conn, $query);

                                                while ($rows = mysqli_fetch_array($result)) {
                                                    echo '<option value="' . $rows["staff_no"] . '">' . $rows["first_name"] . " " . $rows["surname"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row" style="display:inline-block;">
                                        <div class="col-md-2 padding-top-12" align="right">
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </div>

                                        <div class="col-md-4 padding-top-10">
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </div>

                                        <div class="col-md-2 padding-top-10" align="right">
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </div>

                                        <div class="col-md-4 padding-top-10">
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </div>
                                    </div>
                                </div>
                        </td>
                    </tr>
                    <tr><td>
                            <div class="panel panel-default" style="display:block;">
                                <div class="panel-heading">Service Details</div>
                                <div class="panel-body">

                                    <!-- Start of search form -->

                                    <div class="row">
                                        <div class="col-md-2 padding-top-5" align="right">
                                            Service_ID:
                                        </div>

                                        <div class="col-md-2">

                                            <input type="text" class="form-control" name="service_id2" id="service_id2" value="" readonly />

                                        </div>

                                        <div class="col-md-2 padding-top-5" align="right">
                                            Description:
                                        </div>

                                        <div class="col-md-4">

                                            <select class="form-control" name="desc" onchange="update2()" onclick="update2()"  id="desc" required="true">
                                                <?php
                                                global $conn;

                                                $query = "SELECT * from evaluated_service WHERE evaluation_no = '{$evaluation_number}'";

                                                $result = mysqli_query($conn, $query);

                                                while ($rows = mysqli_fetch_array($result)) {
                                                    $ServiceID = $rows["service_id"];

                                                    $query2 = "SELECT * from service WHERE service_id = '{$ServiceID}'";
                                                    $result2 = mysqli_query($conn, $query2);

                                                    while ($rows2 = mysqli_fetch_array($result2)) {
                                                        echo '<option value="' . $rows2["service_id"] . '">' . $rows2["description"] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div></td><td>
                            <div class="panel panel-default" style="display:block;">
                                <div class="panel-heading">Part Details</div>
                                <div class="panel-body">

                                    <!-- Start of search form -->

                                    <div class="row">
                                        <div class="col-md-1 padding-top-5" align="right">
                                            Part_ID:
                                        </div>

                                        <div class="col-md-2">

                                            <input type="text" class="form-control" name="part_id" id="part_id" required="true" value="" readonly/>

                                        </div>

                                        <div class="col-md-2 padding-top-5" align="right">
                                            Description:
                                        </div>

                                        <div class="col-md-3 ">
                                            <select class="form-control" name="descp" onchange="update3()" onclick="update3()"  id="descp" required="true">
                                                <?php
                                                global $conn;

                                                $query = "SELECT * from quoted_parts WHERE evaluation_no = '{$evaluation_number}'";

                                                $result = mysqli_query($conn, $query);

                                                while ($rows = mysqli_fetch_array($result)) {
                                                    $ServiceID = $rows["part_no"];

                                                    $query2 = "SELECT * from part WHERE part_no = '{$ServiceID}'";
                                                    $result2 = mysqli_query($conn, $query2);

                                                    while ($rows2 = mysqli_fetch_array($result2)) {
                                                        echo '<option value="' . $rows2["part_no"] . '">' . $rows2["description"] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="col-md-2 padding-top-5" align="right">
                                            Qty_Used:
                                        </div>

                                        <div class="col-md-2 ">
                                            <input type="text" class="form-control" name="qtyupdate" id="qtyupdate"  value="" disabled="" />

                                        </div>
                                    </div>



                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr><td>
                            <div class="panel panel-default" style="display:block;">
                                <div class="panel-heading">Time</div>
                                <div class="panel-body">

                                    <!-- Start of search form -->

                                    <div class="row">
                                        <div class="col-md-2 padding-top-5" align="right">
                                            Start_Time:
                                        </div>

                                        <div class="col-md-3">

                                            <input type="time" class="form-control" name="start_time" id="start_time"  min="08:00:00" max="16:00:00" onblur="onStartTimeChange()"disabled="true"/>

                                        </div>

                                        <div class="col-md-2 padding-top-5" align="right">
                                            End_Time:
                                        </div>

                                        <div class="col-md-4">

                                            <input type="time" class="form-control" name="end_time" id="end_time" value=""  min="08:00:00" max="16:00" onblur="onEndTimeChange()"disabled="true"/>
                                        </div>

                                    </div>
                                    </td>
                                    </tr>
                                    </tbody></table>
            <div class="container">
                                    <div class="row padding-top-10">
                                        <div class="col-md-2 padding-top-10">
                                            <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success"  style="display:block;" style="visibility:visible;"> Save Job Card </button>

                                        </div>


                                        

                                        <div class="col-md-2 padding-top-10">

                                        </div>
                                        <div class="col-md-2 padding-top-10">
                                            <button type="button" name="btnnext" id="btnnext" class="btn btn-info" onclick="getServicePage()" style="width:160px" disabled="true"> Next </button>
                                        </div>
                                        

                                        <div class="col-md-2 padding-top-10">

                                        </div>
                                        <div class="col-md-2 padding-top-10">
                                            <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            </div>
                            </form>
                            <!--
                                    Begining of PHP code
                                    The code gets executed when user clicks the save button
                            -->

                            <?php
                            if (isset($_POST['btnsavebooking'])) {
                                $service_id2 = $_POST['service_id2'];
                                $job_no = $_GET['jid'];
                                $staff_no = $_POST['employee_id'];
                                $part_no = $_POST['part_id'];

                                if ($_POST['start_time'] != "") {

                                    $start_time = $_POST['start_time'];
                                    $end_time = $_POST['end_time'];
                                    $to_time = strtotime($_POST['start_time']);
                                    $from_time = strtotime($_POST['end_time']);
                                    $hours = round(abs($to_time - $from_time) / 60 / 60, 2);

                                    if (isset($_POST['qtyupdate'])) {
                                        $qtytoupdate = $_POST['qtyupdate'];
                                        $query191 = "Select * from part_used where part_no='{$part_no}'";
                                        $result191 = mysqli_query($conn, $query191);
                                        while ($rows191 = mysqli_fetch_array($result191)) {
                                            $quantityusedupdate = $rows191['qty_used'];
                                        }

                                        $query19 = "Select * from quoted_parts where part_no='{$part_no}'";
                                        $result19 = mysqli_query($conn, $query19);
                                        while ($rows19 = mysqli_fetch_array($result19)) {
                                            $quantityquotedupdate = $rows19['qty_quoted'];
                                        }

                                        $query192 = "Select * from part where part_no='{$part_no}'";
                                        $result192 = mysqli_query($conn, $query192);
                                        while ($rows192 = mysqli_fetch_array($result192)) {
                                            $quantitypartsupdate = $rows192['qty_in_stock'];
                                        }

                                        if ($qtytoupdate > $quantityquotedupdate) {

                                            $query24 = "Select * from job where job_no='{$job_no}'";
                                            $result24 = mysqli_query($conn, $query24);
                                            while ($rows24 = mysqli_fetch_array($result24)) {
                                                $evaluationnumpt = $rows24['evaluation_no'];
                                            }

                                            $qtynew = $qtytoupdate - $quantityquotedupdate;
                                            $qtytostore = $quantitypartsupdate - $qtynew;
                                            $query21 = "update quoted_parts set qty_quoted='{$qtytoupdate}' where part_no='{$part_no}' and evaluation_no ='{$evaluationnumpt}'";
                                            $result21 = mysqli_query($conn, $query21);
                                            $query22 = "update part_used set qty_used='{$qtytoupdate}' where part_no='{$part_no}' and job_no ='{$job_no}'";
                                            $result22 = mysqli_query($conn, $query22);
                                            $query23 = "update part set qty_in_stock='{$qtytostore}' where part_no='{$part_no}'";
                                            $result23 = mysqli_query($conn, $query23);
                                        } else {

                                            $query24 = "Select * from job where job_no='{$job_no}'";
                                            $result24 = mysqli_query($conn, $query24);
                                            while ($rows24 = mysqli_fetch_array($result24)) {
                                                $evaluationnumpt = $rows24['evaluation_no'];
                                            }

                                            $qtynew = $quantityquotedupdate - $qtytoupdate;
                                            $qtytostore = $quantitypartsupdate + $qtynew;
                                            $query21 = "update quoted_parts set qty_quoted='{$qtytoupdate}' where part_no='{$part_no}' and evaluation_no ='{$evaluationnumpt}'";
                                            $result21 = mysqli_query($conn, $query21);
                                            $query22 = "update part_used set qty_used='{$qtytoupdate}' where part_no='{$part_no}' and job_no ='{$job_no}'";
                                            $result22 = mysqli_query($conn, $query22);
                                            $query23 = "update part set qty_in_stock='{$qtytostore}' where part_no='{$part_no}'";
                                            $result23 = mysqli_query($conn, $query23);
                                        }
                                    }

                                    $query7 = "Select * from service where service_id='{$service_id2}'";
                                    $result7 = mysqli_query($conn, $query7);
                                    while ($rows7 = mysqli_fetch_array($result7)) {
                                        $rate = $rows7['rate_per_hour'];
                                    }
                                    $query8 = "Select * from part where part_no='{$part_no}'";
                                    $result8 = mysqli_query($conn, $query8);
                                    while ($rows8 = mysqli_fetch_array($result8)) {
                                        $sprice = $rows8['selling_price'];
                                    }
                                    $query9 = "Select * from quoted_parts where part_no='{$part_no}'";
                                    $result9 = mysqli_query($conn, $query9);
                                    while ($rows9 = mysqli_fetch_array($result9)) {
                                        $quantity = $rows9['qty_quoted'];
                                    }
                                    $Total = ($hours * $rate) + ($sprice * $quantity);
                                   
                                    $query6 = "update job_card set start_time='{$start_time}',end_time='{$end_time}', service_total ='{$Total}' where service_id ='{$service_id2}' and job_no ='{$job_no}'";
                                    $result = mysqli_query($conn, $query6);

                                    $query19 = "INSERT INTO `cash_receipt_temp` (`cash_receipt_no`, `date`, `amount`, `transaction_type`, `job_no`) VALUES (NULL, '" . date("Y-m-d") . "', '{$Total}', 'cash', '{$job_no}')";
                                    $result20 = mysqli_query($conn, $query19);

                                    echo "<script type='text/javascript'>
document.getElementById('btnnext').disabled = false;
var div = document.getElementById('msg2');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
</script>";
                                } else {
                                    $service_id2 = $_POST['service_id2'];
                                    $job_no = $_GET['jid'];
                                    $staff_no = $_POST['employee_id'];
                                    $part_no = $_POST['part_id'];
                                    $query = "INSERT INTO `job_card` (`service_id`, `job_no`, `start_time`, `end_time`, `service_total`, `staff_no`) VALUES ('" . $service_id2 . "', '" . $job_no . "', '00:00:00', '00:00:00', '0', '" . $staff_no . "');";

                                    $result = mysqli_query($conn, $query);

                                    $query9 = "Select * from job where job_no='{$job_no}'";
                                    $result9 = mysqli_query($conn, $query9);
                                    while ($rows9 = mysqli_fetch_array($result9)) {
                                        $evaluationnum = $rows9['evaluation_no'];
                                    }
                                    $query8 = "Select * from quoted_parts where part_no='{$part_no}' and evaluation_no='{$evaluationnum}'";
                                    $result8 = mysqli_query($conn, $query8);
                                    while ($rows9 = mysqli_fetch_array($result8)) {
                                        $partqty = $rows9['qty_quoted'];
                                    }

                                    $query3 = "INSERT INTO `part_used` (`job_no`, `part_no`, `service_id`, `qty_used`, `part_total`) VALUES ('" . $job_no . "', '" . $part_no . "', '" . $service_id2 . "', '" . $partqty . "', '0');";
                                    $result3 = mysqli_query($conn, $query3);


                                    $query2 = "Select * from job_card where service_id='{$service_id2}'and job_no='{$job_no}'";

                                    $result2 = mysqli_query($conn, $query2);

                                    echo"<script type='text/javascript'>                   
                                                document.getElementById('btnsavebooking').disabled = false;
                                                document.getElementById('btnnext').disabled = false;
                                                document.getElementById('qtyupdate').disabled = false;
						var div = document.getElementById('msg');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
					</script>";

                                    while ($rows = mysqli_fetch_array($result2)) {
                                        $_SESSION["job_no"] = $rows["job_no"];
                                        $pageurl = "print.php?jid=" . $_SESSION["job_no"] . "&sid=" . $service_id2;
                                        echo "<script type='text/javascript'>
open('$pageurl');history.back();
</script>";
                                    }
                                }
                            }
                            ?>
                            <?php
                            if (isset($_POST['btnsearch'])) {

                                $service_id3 = $_POST['service_ids'];

                                $job_no = $_GET['jid'];
                                $staff_no = $_POST['employee_ids'];

                                $query = "select * from `job_card` where job_no='{$job_no}' and staff_no='{$staff_no}';";
                                $result = mysqli_query($conn, $query);
                                while ($rows = mysqli_fetch_array($result)) {

                                    $query2 = "select * from `employee` where staff_no='{$staff_no}';";

                                    $result2 = mysqli_query($conn, $query2);
                                    while ($rows2 = mysqli_fetch_array($result2)) {
                                        $staff_names = $rows2['first_name'] . " " . $rows2["surname"];
                                    }
                                    $query3 = "select * from `service` where service_id='{$service_id3}';";
                                    $result3 = mysqli_query($conn, $query3);
                                    while ($rows3 = mysqli_fetch_array($result3)) {
                                        $service_descs = $rows3['description'];
                                    }

                                    $query4 = "select * from `part_used` where job_no='{$job_no}' and service_id='{$service_id3}';";
                                    $result4 = mysqli_query($conn, $query4);
                                    while ($rows4 = mysqli_fetch_array($result4)) {
                                        $partnum = $rows4['part_no'];
                                        $query4 = "select * from `part` where part_no='{$partnum}';";
                                        $result4 = mysqli_query($conn, $query4);
                                        while ($rows4 = mysqli_fetch_array($result4)) {
                                            $partdesc = $rows4['description'];
                                        }
                                    }



//                $query3 = "Select * from part_used where job_no ='{$job_no}'";
//                $result3 = mysqli_query($conn, $query3);

                                    echo "<script type='text/javascript'>
                    document.getElementById('service_id2').value = '{$service_id3}';
                    document.getElementById('desc').value = '{$service_id3}';
                    document.getElementById('part_id').value = '{$partnum}';
                    document.getElementById('descp').value = '{$partnum}';
                    document.getElementById('employee_id').value = '{$staff_no}';
                    document.getElementById('mechanic').value = '{$staff_no}';
                        document.getElementById('start_time').disabled = false;
                        document.getElementById('qtyupdate').disabled = false;
                                                document.getElementById('end_time').disabled = false;
                    showhide();
                    

                    </script>";
                                }
//            $start_time =$_POST['start_time'];
//            $end_time = $_POST['end_time'];
//            $query = "update `job_card` set ;";
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
                                function update() {

                                    document.getElementById('employee_id').value = document.getElementById('mechanic').value;

                                }
                            </script>

                            <script language="JavaScript" type="text/javascript">
                                function update2() {

                                    document.getElementById('service_id2').value = document.getElementById('desc').value;

                                }
                            </script>

                            <script language="JavaScript" type="text/javascript">
                                function update3() {

                                    document.getElementById('part_id').value = document.getElementById('descp').value;

                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">
                                function getMainPage() {
                                    window.location.href = "main.php";
                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">
                                function getServicePage() {
                                    window.location.href = "cashreceipt.php?jid=" +<?php
                            echo $_SESSION['job_no'];
                            ?>;
                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">
                                function showhide()
                                {
                                    var div = document.getElementById("btnsavebooking");
                                    var div2 = document.getElementById("btnupdate");


                                    if (div.style.display !== "none") {
                                        div.style.display = "none";
                                        div.style.visibility = "hidden";
                                        div2.style.display = "block";
                                        div2.style.visibility = "visible";

                                    } else {
                                        div.style.display = "block";
                                        div.style.visibility = "visible";
                                        div2.style.display = "hidden";
                                        div2.style.visibility = "hidden";

                                    }
                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">
                                var value = "";
                                function update4(val) {
                                    value = val;

                                    if (value === "existingjobcard") {
                                        document.getElementById('qtyupdate').readonly = false;
                                        document.getElementById('start_time').readonly = false;
                                        document.getElementById('end_time').readonly = false;
                                        document.getElementById('qtyupdate').disabled = false;
                                        document.getElementById('service_ids').disabled = false;
                                        document.getElementById('employee_ids').disabled = false;
                                        document.getElementById('btnsearch').disabled = false;

                                    } else {

                                        document.getElementById('btnnext').disabled = true;
                                        document.getElementById('service_ids').disabled = true;
                                        document.getElementById('employee_ids').disabled = true;
                                        document.getElementById('btnsearch').disabled = true;

                                    }
                                }
                                function getVal() {
                                    return value;
                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">

                                function onStartTimeChange() {
                                    var input = document.getElementById('start_time');
                                    var minTime = input.min;
                                    var maxTime = input.max;
                                    var value = input.value + ':00';
                                    if (minTime > value || value > maxTime) {
                                        alert('Enter Start Time between 8am and 4pm');
                                    }

                                }
                            </script>
                            <script language="JavaScript" type="text/javascript">

                                function onEndTimeChange() {
                                    var input = document.getElementById('end_time');
                                    var minTime = input.min;
                                    var maxTime = input.max;
                                    var value = input.value + ':00';

                                    if (minTime > value || value > maxTime) {
                                        alert('Enter End Time between 8am and 4pm');
                                    }

                                }
                            </script>


                            <script src="jquery.min.js"></script>
                            <script src = "js/bootstrap.min.js"></script>

                            </body>
                            </html>