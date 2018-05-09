<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
ob_start();
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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        

    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Booking</h1>
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
                    <li><a href="index.php"><span class="glyphicon glyphicon-off"></span>&nbspLogout<?php
?>; </a></li>
                </ul>
            </ul>
        </div>

        <br><br><br><br>

        <?php
        if (isset($_GET['cst'])) {
            $cust_idno = $_GET['cst'];

            echo '<script>
						document.getElementById("cust_idno").value =' . $cust_idno . ';
				</script>';
        }
        ?>

        <div class="container">

            <div id="msg" class="alert alert-success alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Booking Captured Successfully.</div>
            <div id="msgbookingfull" class="alert alert-danger alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Booking has already reached the maximum for the selected date. Please select a new date.</div>

            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- Start of search form -->
                    <form 
                        id="cust_vehicle_details" name="cust_vehicle_details" method="POST">
                        <div class="row">
                            <div class="col-md-2 padding-top-5" align="right">
                                Customer Number:
                            </div>

                            <div class="col-md-1">
                                <?php
                                if (isset($_GET['cst'])) {
                                    $cust_idno = $_GET['cst'];
                                }

                                $cust_no = "";
                                $cust_name = "";
                                $cust_surname = "";
                                global $conn;

                                $query2 = "SELECT * from customer WHERE idnumber = '{$cust_idno}'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $cust_no = $rows2['customer_id'];
                                }

                                echo '<input type="text" class="form-control" name="cust_no" id="cust_no" value="' . $cust_no . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="cust_idno" id="cust_idno" value="' . $cust_idno . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-5" align="right">
                                Name:
                            </div>

                            <div class="col-md-2">
                                <?php
                                if (isset($_GET['cst'])) {
                                    $cust_idno = $_GET['cst'];
                                }

                                $cust_no = "";
                                $cust_name = "";
                                $cust_surname = "";
                                global $conn;

                                $query1 = "SELECT * from customer WHERE idnumber = '{$cust_idno}'";
                                $result1 = mysqli_query($conn, $query1);

                                while ($rows = mysqli_fetch_array($result1)) {
                                    $cust_no = $rows['customer_id'];
                                    $cust_name = $rows['first_name'];
                                    $cust_surname = $rows['surname'];
                                }

                                $fullname = $cust_name . " " . $cust_surname;

                                echo '<input type="text" class="form-control" name="fullname" id="fullname" value="' . $fullname . '" readonly />'
                                ?>
                            </div>


                            <div class="col-md-1 padding-top-5">
                                Vehicle:
                            </div>
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="filter" id="filter"  placeholder="Filter Cars"  onblur="form.submit()"/>
                            </div>

                            <div class="col-md-2">
                                <select class="form-control" name="registration_no" id="registration_no" required="true">
                                    <?php
                                    global $conn;
                                    if (isset($_POST['filter'])) {
                                        $filter = $_POST['filter'];
                                        $query1 = "SELECT registration_no from vehicle WHERE registration_no LIKE '" . $filter . "%' and customer_no='{$cust_no}'";
                                        $result1 = mysqli_query($conn, $query1);
                                        if (mysqli_fetch_array($result1) > 0) {
                                            while ($rows1 = mysqli_fetch_array($result1)) {
                                                echo '<option value="' . $rows1["registration_no"] . '">' . $rows1["registration_no"] . '</option>';
                                            }
                                        } else {
                                            echo '<option value="">No vehicle found</option>';
                                        }
                                    } else {
                                        $query = "SELECT registration_no from vehicle WHERE customer_no =" . $cust_no;
                                        $result = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_array($result)) {
                                            echo '<option value="' . $rows["registration_no"] . '">' . $rows["registration_no"] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-md-1">
                                <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success"  style="width:160px"> Filter </button>
                            </div>
                        </div>
                        <!-- </form>
                        End of search form -->
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Booking Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form 
                    <form name="edtform" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']);                 ?>" method="POST">-->

                    <div class="row" id="marg-top-20">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="form-group">
                                  <label class="col-md-4 padding-top-10">Booking Date</label>
                                  <div class="col-lg-5">
                                    <input type="text" id="booking_date" class="form-control" name="booking_date" value="<?php echo date("m/d/Y") ?>" required>
                                    
                                  </div>
                                </div>
                            </div>

                            <div class="row" style="display:none;" style="visibility:hidden;">
                                <div class="col-md-4 padding-top-10">
                                    Booking Time:
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    <?php
                                    date_default_timezone_set("Africa/Johannesburg");
                                    echo '<input type="time" class="form-control" name="booking_time" id="booking_time" required="true" value="' . date("h:i:s") . '" />'
                                    ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 padding-top-10">
                                    Status:
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    <input type="text" class="form-control" name="service_status" id="service_status" required="true" value="In Progress" readonly=""/>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row padding-top-10">
                        <div class="col-md-2 padding-top-10">
                            <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success"  style="width:160px"> Create Booking </button>
                        </div>

                        <div class="col-md-1 padding-top-10">
                        </div>
                        <div class="col-md-1 padding-top-10">
                        </div>

 <div class="col-md-1 padding-top-10">
                        </div>


                        <div class="col-md-1 padding-top-10">

                        </div>
                        <div class="col-md-1 padding-top-10">

                        </div>

                        <div class="col-md-1 padding-top-10">
                        </div>

                        <div class="col-md-2 padding-top-10">
                            <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                        </div>
                    </div>	

                    </form>
                </div>
            </div>
        </div>

        <!--
                Begining of PHP code
                The code gets executed when user clicks the save button
        -->
        <?php
        if (isset($_POST['btnsavebooking'])) {
            $booking_date = $_POST['booking_date'];
            $booking_time = $_POST['booking_time'];
            $status = "Booked";
            $reg_num = $_POST['registration_no'];
            $customer_no = $_POST['cust_no'];
            $query9 = mysqli_query($conn, "Select * from `booking` where booking_date='" . $booking_date . "'");
            $row = mysqli_num_rows($query9);
            
            if ($row >= 10) {
                echo "<script>
						
						
						var div = document.getElementById('msgbookingfull');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
					</script>";
            } else {
                if (save_booking($booking_date, $booking_time, $status, $reg_num, $customer_no) == true) {
                    echo "<script>
						
						document.getElementById('service_status').disabled = true;
						document.getElementById('btnsavebooking').disabled = true;
                                                document.getElementById('btnnext').disabled = false;
                                                document.getElementById('cust_idno').value =' . $customer_no .';
						var div = document.getElementById('msg');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
					</script>";
                    global $conn;
                    $booking_date = $_POST['booking_date'];
                    $booking_time = $_POST['booking_time'];
                    $query3 = "SELECT * from booking WHERE  booking_time= '{$booking_time}' and booking_date='{$booking_date}'";
                    $result3 = mysqli_query($conn, $query3);

                    while ($rows = mysqli_fetch_array($result3)) {
                        $_SESSION['booking_id'] = $rows['booking_id'];
                        if ($status == "Booked") {
                            header("Location: evaluation.php?bid={$_SESSION['booking_id']}");
                        } else {
                            header("Location: main.php");
                        }
                    }
                } else {
                    echo "<script>
						
					</script>";
                }
            }
            //echo $booking_date ." | " .$booking_time ." | " .$status ." | " .$reg_num ." | " .$customer_no ;
        }
        ?>

        <script language="JavaScript" type="text/javascript">
            function getMainPage() {
                window.location.href = "main.php";
            }
        </script>
        <script language="JavaScript" type="text/javascript">
            function getBookingPage() {
                window.location.href = "evaluation.php?bid=" +<?php
        echo $_SESSION['booking_id'];
        ?>;
            }

        </script>
        <script language="JavaScript" type="text/javascript">
            function onLoad() {
                var input = document.getElementById("booking_date");
                var today = new Date();
                // Set month and day to string to add leading 0
                var day = new String(today.getDate());
                var mon = new String(today.getMonth() + 1); //January is 0!
                var yr = today.getFullYear();

                if (day.length < 2) {
                    day = "0" + day;
                }
                if (mon.length < 2) {
                    mon = "0" + mon;
                }

                var date = new String(yr + '-' + mon + '-' + day);

                input.disabled = false;
                input.setAttribute('min', date);
            }


        </script>
        <?php include 'script.php'; ?>
        <script>
            $(function () {
                //Initialize Select2 Elements
                $(".select2").select2();
            })
            $("#booking_date").datepicker({minDate: 0});

        </script>
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <?php ob_end_flush(); ?>
    </body>
</html>