<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
ob_start();
$booking_id = $_GET['bid'];
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
                        <h1>Evaluation</h1>
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
        global $conn;

        $query3 = "SELECT * from booking WHERE  booking_id= '{$booking_id}'";
        $result3 = mysqli_query($conn, $query3);

        while ($rows = mysqli_fetch_array($result3)) {
            $_SESSION['cust_id'] = $rows['customer_id'];
            $_SESSION['vin_number'] = $rows['vin_number'];
            $booking_date = $rows['booking_date'];
            $booking_time = $rows['booking_time'];
        }
        $query4 = "SELECT * from customer WHERE  customer_id= '{$_SESSION['cust_id']}'";
        $result4 = mysqli_query($conn, $query4);

        while ($rows = mysqli_fetch_array($result4)) {
            $_SESSION['cust_idno'] = $rows['idnumber'];
        }
        $query5 = "SELECT * from vehicle WHERE  vin_number= '{$_SESSION['vin_number']}'";
        $result5 = mysqli_query($conn, $query5);

        while ($rows = mysqli_fetch_array($result5)) {
            $_SESSION['registration_no'] = $rows['registration_no'];
        }
        echo '<script>
						document.getElementById("cust_idno").value =' . $_SESSION['cust_idno'] . ';
				</script>';
        ?>

        <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">Evaluation Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form -->
                    <form  id="evaluatedService" name="evaluation" method="POST">
                        <div class="row" >

                            <div class="col-md-2 padding-top-5" align="right">
                                Evaluation Date:
                            </div>

                            <div class="col-md-2">
                                <?php
                                echo '<input type="text" class="form-control" name="evaluation_date" id="booking_date" required="true" value="' . date("Y-m-d") . '" min="' . $booking_date . '" />'
                                ?>
                            </div>


                            <div class="row">
                                <div class="col-md-1 padding-top-5" align="right">
                                    Evaluation Time:
                                </div>

                                <div class="col-md-3">
<?php
date_default_timezone_set("Africa/Johannesburg");
echo '<input type="text" class="form-control" name="evaluation_time" id="booking_time" required="true" value="' . date("H:i:s") . '" min="' . $booking_time . '"readonly/>'
?>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 padding-top-5" align="right">
                                    Status:
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    <select class="form-control" name="booking_status" id="booking_status" required="true">
                                        <option value="In Progress">In Progress</option>
                                        <option value="Cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-2 padding-top-5" align="right">
                                    Mechanic:
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    <select class="form-control" name="mechanic" id="mechanic" required="true">
<?php
global $conn;

$query = "SELECT * from employee WHERE type = 'mechanic'";
$result = mysqli_query($conn, $query);

while ($rows = mysqli_fetch_array($result)) {
    echo '<option value="' . $rows["staff_no"] . '">' . $rows["staff_no"] . " " . $rows["first_name"] . " " . $rows["surname"] . '</option>';
}
?>
                                    </select>
                                </div>

                            </div>
                        </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">Customer Details</div>
                <div class="panel-body" >

                    <!-- Start of search form -->

                    <div class="row">
                        <div class="col-md-2 padding-top-5" align="right" >
                            Customer Number:
                        </div>

                        <div class="col-md-2">
<?php
$cust_no = "";
$cust_name = "";
$cust_surname = "";
global $conn;
$cust_idno = $_SESSION['cust_idno'];
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
$cust_no = "";
$cust_name = "";
$cust_surname = "";
global $conn;
$cust_idno = $_SESSION['cust_idno'];
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

                        <div class="col-md-4 padding-top-5"></div>
                    </div>


                    <div class="row">
                        <div class="col-md-2 padding-top-5" align="right">
                            Contact Number:
                        </div>

                        <div class="col-md-2 padding-top-5">
<?php
$cust_no = "";
$contact_no = "";
global $conn;
$cust_idno = $_SESSION['cust_idno'];
$query2 = "SELECT * from customer WHERE idnumber = '{$cust_idno}'";
$result2 = mysqli_query($conn, $query2);

while ($rows2 = mysqli_fetch_array($result2)) {
    $cust_no = $rows2['customer_id'];
    $contact_no = $rows2['phone_number'];
}

echo '<input type="text" class="form-control" name="cust_no" id="cust_no" value="' . $contact_no . '" readonly />';
?>
                        </div>

                        <div class="col-md-1 padding-top-10" align="right">
                            Email:
                        </div>

                        <div class="col-md-3 padding-top-10">
<?php
$cust_no = "";
$email = "";
global $conn;
$cust_idno = $_SESSION['cust_idno'];
$query1 = "SELECT * from customer WHERE idnumber = '{$cust_idno}'";
$result1 = mysqli_query($conn, $query1);

while ($rows = mysqli_fetch_array($result1)) {
    $cust_no = $rows['customer_id'];
    $email = $rows['email'];
}

echo '<input type="text" class="form-control" name="fullname" id="fullname" value="' . $email . '" readonly />'
?>
                        </div>

                        <div class="col-md-4 padding-top-5"></div>
                    </div>
                    <!-- </form>
                    End of search form -->
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Vehicle Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form 
                    <form name="edtform" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']);               ?>" method="POST">-->

                    <div class="row">
                        <div class="col-md-2 padding-top-10" align="right">
                            Registration Number:
                        </div>

                        <div class="col-md-2 padding-top-10">


<?php
global $conn;
$reg_num = "";




$reg_num = $_SESSION['registration_no'];
echo '<input type="text" class="form-control" name="reg_num" id="reg_num" value="' . $reg_num . '" readonly />';
?>

                        </div>

                        <div class="col-md-1 padding-top-10" align="right">
                            Make:
                        </div>

                        <div class="col-md-3 padding-top-10">
<?php
global $conn;

$query1 = "SELECT * from vehicle WHERE registration_no = '" . $_SESSION['registration_no'] . "'";
$result1 = mysqli_query($conn, $query1);

while ($rows = mysqli_fetch_array($result1)) {
    $car_make = $rows['make'];
}

echo '<input type="text" class="form-control" name="make" id="make" value="' . $car_make . '" readonly />'
?>
                        </div>

                        <div class="col-md-4 padding-top-5"></div>
                    </div>


                    <div class="row">
                        <div class="col-md-2 padding-top-10" align="right">
                            Model:
                        </div>

                        <div class="col-md-2 padding-top-10">
<?php
global $conn;

$query1 = "SELECT * from vehicle WHERE registration_no = '" . $_SESSION['registration_no'] . "'";
$result = mysqli_query($conn, $query1);

while ($rows = mysqli_fetch_array($result)) {
    $car_model = $rows['model'];
}

echo '<input type="text" class="form-control" name="model" id="model" value="' . $car_model . '" readonly />'
?>
                        </div>

                        <div class="col-md-1 padding-top-10" align="right">
                            Type:
                        </div>

                        <div class="col-md-3 padding-top-10">
<?php
global $conn;

$query1 = "SELECT * from vehicle WHERE registration_no = '" . $_SESSION['registration_no'] . "'";
$result1 = mysqli_query($conn, $query1);

while ($rows = mysqli_fetch_array($result1)) {
    $vehicle_type = $rows['vehicle_type'];
}

echo '<input type="text" class="form-control" name="vehicle_type" id="vehicle_type" value="' . $vehicle_type . '" readonly />'
?>
                        </div>

                        <div class="col-md-4 padding-top-5"></div>
                    </div>



                    <div class="row">
                        <div class="col-md-2 padding-top-10" align="right">
                            Mileage:
                        </div>

                        <div class="col-md-2 padding-top-10">
<?php
global $conn;

$query1 = "SELECT * from vehicle WHERE registration_no = '" . $_SESSION['registration_no'] . "'";
$result = mysqli_query($conn, $query1);

while ($rows = mysqli_fetch_array($result)) {
    $mileage = $rows['mileage'];
}

echo '<input type="number" class="form-control" name="mileage" id="mileage" value="' . $mileage . '" min="' . $mileage . '" />'
?>
                        </div>

                        <div class="col-md-1 padding-top-10" align="right">
                        </div>

                        <div class="col-md-3 padding-top-10"></div>
                        <div class="col-md-4 padding-top-5"></div>
                    </div>

                    <div class="row padding-top-10">
                        <div class="col-md-2 padding-top-10">
                            <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success" style="width:160px"> Create New Evaluation </button>
                        </div>

                        <div class="col-md-1 padding-top-10">
                        </div>

                        <div class="col-md-2 padding-top-10">

                        </div>
                        <div class="col-md-2 padding-top-10">
                            <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success" style="width:160px"> Cancel Evaluation </button>
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


                    <h5 id="dsp"></h5>
                </div>
            </div>
        </div>







        <!--
                Begining of PHP code
                The code gets executed when user clicks the save button
        -->
<?php
global $conn;
if (isset($_POST['btnsavebooking'])) {
    $date = $_POST['evaluation_date'];
    $time = $_POST['evaluation_time'];
    $comment = $_POST['booking_status'];
    $mechanic = $_POST['mechanic'];

    $query = "INSERT INTO `evaluation` (`evaluation_no`, `date`, `time`, `quoted_amt`, `evaluation_status`, `comment`, `booking_id`, `staff_no`) VALUES (NULL,'" . $date . "','" . $time . "','1.0','" . $comment . "','" . $comment . "','" . $_GET['bid'] . "','" . $mechanic . "');";

    $result = mysqli_query($conn, $query);
    $query10 = "update `booking` set status ='Complete' where booking_id='" . $_GET['bid'] . "'";
    mysqli_query($conn, $query10);
    $query2 = "Select * from evaluation where date='{$date}'and time='{$time}'";

    $result2 = mysqli_query($conn, $query2);

    echo"<script>                           
						document.getElementById('mechanic').value = '.$mechanic.';
                                                document.getElementById('btnnext').disabled = false;
                                                document.getElementById('btnsavebooking').disabled = true;
						
					</script>";
    while ($rows = mysqli_fetch_array($result2)) {
        $_SESSION["evaluation_no"] = $rows["evaluation_no"];
        if ($comment == "In Progress") {
            header("Location: service.php?evid={$_SESSION['evaluation_no']}");
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
            function getServicePage() {
                window.location.href = "service.php?evid=" +<?php
        echo $_SESSION['evaluation_no'];
?>;
            }
        </script>

        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
<?php ob_end_flush(); ?>
    </body>
</html>