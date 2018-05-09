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
                        <h1>Service Details</h1>
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
            <div class="panel panel-default">
                <div class="panel-heading">Service Details</div>
                <div class="panel-body">

                    <!-- Start of search form -->
                    <form id="cust_vehicle_details" name="cust_vehicle_details" method="POST">
                        <div class="row">
                            <div class="col-md-2 padding-top-5" align="right">
                                Total Amount:
                            </div>

                            <div class="col-md-2">
                                <?php
                                $TotAmount = 0;

                                $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
                                $result7 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result7)) {
                                    $noOfHours = $rows2['no_of_hours'];
                                    $service_id = $rows2['service_id'];

                                    $query3 = "SELECT * from service WHERE service_id = '" . $service_id . "'";
                                    $result3 = mysqli_query($conn, $query3);

                                    while ($rows3 = mysqli_fetch_array($result3)) {
                                        $rateperhour = $rows3['rate_per_hour'];
                                        $TotAmount += $rateperhour * $noOfHours;
                                    }
                                }

                                $query4 = "SELECT * from quoted_parts WHERE evaluation_no = '" . $_GET['evid'] . "'";
                                $result6 = mysqli_query($conn, $query4);

                                while ($rows4 = mysqli_fetch_array($result6)) {
                                    $qtyQuoted = $rows4['qty_quoted'];
                                    $part_No = $rows4['part_no'];

                                    $query5 = "SELECT * from part WHERE part_no ='$part_No'";
                                    $result5 = mysqli_query($conn, $query5);

                                    while ($rows5 = mysqli_fetch_array($result5)) {
                                        $sellingprice = $rows5['selling_price'];
                                        $TotAmount += $qtyQuoted * $sellingprice;
                                    }
                                }

                                $query11 = "Update evaluation set quoted_amt='$TotAmount' where evaluation_no='" . $_GET['evid'] . "'";
                                $result11 = mysqli_query($conn, $query11);
                                echo '<input type="text" class="form-control" name="servicedesc1" id="servicedesc1" value="' . $TotAmount . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service1id" id="service1id" value="' . $service_id . '" readonly />';
                                echo "<script>document.getElementById('btnnext').disabled = false;</script>"
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-5" align="right">
                                Customer #
                            </div>

                            <div class="col-md-3">
                                <?php
                                $query2 = "SELECT * from evaluation WHERE evaluation_no = '" . $_GET['evid'] . "'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $booking_id = $rows2['booking_id'];
                                }
                                $query3 = "SELECT * from booking WHERE booking_id = '" . $booking_id . "'";
                                $result3 = mysqli_query($conn, $query3);

                                while ($rows3 = mysqli_fetch_array($result3)) {
                                    $customer_id = $rows3['customer_id'];
                                }

                                $query4 = "SELECT * from customer WHERE customer_id = '" . $customer_id . "'";
                                $result4 = mysqli_query($conn, $query4);

                                while ($rows4 = mysqli_fetch_array($result4)) {
                                    $customer_fname = $rows4['first_name'];
                                    $customer_sname = $rows4['surname'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $customer_id . ' ' . $customer_fname . '  ' . $customer_sname . '" readonly />';
                                ?>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Total Hours:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $TotHours = null;

                                $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $TotHours += $rows2['no_of_hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc1" id="servicedesc1" value="' . $TotHours . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service1id" id="service1id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Reg #:
                            </div>

                            <div class="col-md-3 padding-top-10">
                                <?php
                                $query2 = "SELECT * from evaluation WHERE evaluation_no = '" . $_GET['evid'] . "'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $booking_id = $rows2['booking_id'];
                                }
                                $query3 = "SELECT * from booking WHERE booking_id = '" . $booking_id . "'";
                                $result3 = mysqli_query($conn, $query3);

                                while ($rows3 = mysqli_fetch_array($result3)) {
                                    $vin_number = $rows3['vin_number'];
                                }

                                $query4 = "SELECT * from vehicle WHERE vin_number = '" . $vin_number . "'";
                                $result4 = mysqli_query($conn, $query4);

                                while ($rows4 = mysqli_fetch_array($result4)) {
                                    $reg_num = $rows4['registration_no'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $reg_num . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-4 padding-top-5"></div>
                        </div>


                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Parts and Service Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form 
                    <form name="edtform" action="<?php //echo htmlspecialchars($_SERVER['PHP_SELF']);                     ?>" method="POST">-->

                    <div class="row">
                        <div class="col-md-2 padding-top-10" align="right">
                            Details:
                        </div>

                        <div class="col-md-2 padding-top-10">
                            <?php
                            $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
                            $result2 = mysqli_query($conn, $query2);

                            while ($rows2 = mysqli_fetch_array($result2)) {
                                $noOfHours = $rows2['no_of_hours'];
                                $service_id = $rows2['service_id'];




                                $sql = "SELECT * from service WHERE service_id = '" . $service_id . "'";

                                $i = 0;
                                $previousArtistID = "";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) { // loop through your database
                                    if ($row['service_id'] != $previousArtistID) { // if the current artist is not the previous
                                        if ($i > 0) {
                                            echo "</table>"; // if the artist is not the first, close the previous table
                                            echo "<hr>"; // for demo
                                        }
                                        echo "<table class='bordered'>"; // start a table, with headers
                                        echo "<tr>";
                                        echo "<th>Service_ID</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Rate_Per_Hour</th>";
                                        echo "<th>Selected Hours</th>";
                                        echo "</tr>";
                                        echo "<tr>";

                                        echo "</tr>";
                                        $i++; // increment counter
                                        $previousArtistID = $row['service_id']; // set the previousArtistID to the current artistID
                                    }
                                    // list all songs
                                    echo "<tr>";
                                    echo "<td>" . $row['service_id'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['rate_per_hour'] . "</td>";
                                    echo "<td>" . $noOfHours . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>"; // close the table
                            }
                            echo "<br><br><br>";
                            $query2 = "SELECT * from quoted_parts WHERE evaluation_no = '" . $_GET['evid'] . "'";
                            $result2 = mysqli_query($conn, $query2);

                            while ($rows2 = mysqli_fetch_array($result2)) {
                                $part_no = $rows2['part_no'];




                                $sql = "SELECT * from part WHERE part_no = '" . $part_no . "'";

                                $i = 0;
                                $previousArtistID = "";
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($result)) { // loop through your database
                                    if ($row['part_no'] != $previousArtistID) { // if the current artist is not the previous
                                        if ($i > 0) {
                                            echo "</table>"; // if the artist is not the first, close the previous table
                                            echo "<hr>"; // for demo
                                        }

                                        echo "<table class='bordered'>"; // start a table, with headers
                                        echo "<tr>";
                                        echo "<th>part_no</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Qty_In_Stock</th>";
                                        echo "<th>Selling_Price</th>";
                                        echo "<th>Quoted Quatity</th>";
                                        echo "</tr>";
                                        echo "<tr>";

                                        echo "</tr>";
                                        $i++; // increment counter
                                        $previousArtistID = $row['part_no']; // set the previousArtistID to the current artistID
                                    }
                                    // list all songs
                                    echo "<tr>";
                                    echo "<td>" . $row['part_no'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td>" . $row['qty_in_stock'] . "</td>";
                                    echo "<td>" . $row['selling_price'] . "</td>";
                                    echo "<td>" . $rows2['qty_quoted'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</table>"; // close the table
                            }
                            ?>
                        </div>


                        <div class="col-md-4 padding-top-5"></div>
                    </div>

                    <br>

                    <div class="row padding-top-10">



                        <div class="col-md-2 padding-top-10">
                            <button type="button" name="btnnext" id="btnnext" class="btn btn-info" onclick="getJobPage()" style="width:160px"> Next </button>
                        </div>
                        <div class="col-md-1 padding-top-10">
                        </div>

                        <div class="col-md-2 padding-top-10">

                        </div>
                        <div class="col-md-2 padding-top-10">
                            <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                        </div>

                        <div class="col-md-1 padding-top-10">
                        </div>

                        <div class="col-md-2 padding-top-10">

                        </div>
                        <div class="col-md-2 padding-top-10">
                            <button type="button" name="btnprint" id="btncancel" class="btn btn-info" onclick="getPrintPage()" style="width: 160px">&nbsp Print Quotation &nbsp</button>
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


        <script type="text/javascript">
            document.getElementById('mileage').disabled = true;
            document.getElementById("btnsavebooking").disabled = true;
        </script>

        <script language="JavaScript" type="text/javascript">
            function getMainPage() {
                window.location.href = "main.php";
            }
        </script>
        <script language="JavaScript" type="text/javascript">
            function getJobPage() {
                window.location.href = "job.php?evid=" +<?php
                            echo $_GET['evid'];
                            ?>;
            }
        </script>
        <script language="JavaScript" type="text/javascript">
            function getPrintPage() {
                window.location.href = "printInvoice.php?evid=" +<?php
                            echo $_GET['evid'];
                            ?>;
            }
        </script>

        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>