<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
include("fusioncharts.php");
$hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "dbcar2";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = mysqli_connect($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if (!$dbhandle) {
  	exit("There was an error with your connection: ".mysqli_connect_error());
   }
?>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Car Service</title>
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="black.jpg">
        <script type="text/javascript" src="jquery.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="layout.css" rel="stylesheet" />
        <script type="text/javascript" src="js/fusioncharts.js"></script>
        <script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>	
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Revenue Report</h1>
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
                <h2>Revenue Report</h2>
                <hr />


                <?php
                // Form the SQL query that returns the top 10 most populous countries
                $strQuery = "SELECT * FROM `cash_receipt` ORDER BY `cash_receipt_no` ASC";

                // Execute the query, or else return the error message.
                $result = mysqli_query($dbhandle, $strQuery);

                // If the query returns a valid response, prepare the JSON string
                if ($result) {
                    // The `$arrData` array holds the chart attributes and data
                    $arrData = array(
                        "chart" => array(
                            "caption" => "Amount ",
                            "subCaption" => "For last year",
                            "xAxisname" => "Date",
                            "pYAxisName" => "Amount (In Rands)",
                            "sYAxisName" => "Profit R",
                            "numberPrefix" => "R",
                            "sNumberSuffix" => "%",
                            "sYAxisMaxValue" => "50",
                            "numDivLines" => "3",
                            "theme" => "fint"
                        )
                    );

                    //prepare categories  
                    $arrData["categories"] = array();
                    $category = array();
                    // Push the data into the category array
                    while ($row = mysqli_fetch_array($result)) {
                        array_push($category, array(
                            "label" => $row["date"]
                                )
                        );
                    }
                    array_push($arrData["categories"], array("category" => $category));

                    //prepare dataset
                    $arrData["dataset"] = array();
                    array_push($arrData["dataset"], buildDataset(array("seriesName" => "amount"), "amount", $strQuery));
                    array_push($arrData["dataset"], buildDataset(array("seriesName" => "amount", "renderAs" => "area",
                        "showValues" => "0",), "amount", $strQuery));
                    

                    //prepare trendline
                    $arrData["trendlines"] = array();
                    $line = array();
                    array_push($line, array("startValue" => "18833", "color" => "#0075c2", "valuePadding" => "20", "displayvalue" => "Average{br}Revenue"));
                    array_push($line, array("startValue" => "21", "parentYAxis" => "s", "color" => "#f2c500", "displayvalue" => "Average{br}Profit %"));
                    array_push($arrData["trendlines"], array("line" => $line));

                    //JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
                    $jsonEncodedData = json_encode($arrData);

                    /* Create an object for the mscombi chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor. */
                    $mscombidy2dChart = new FusionCharts("mscombidy2d", "myFirstChart", 600, 300, "chart-1", "json", $jsonEncodedData);
                    // Render the chart
                    $mscombidy2dChart->render();
                    // Close the database connection
                    $dbhandle->close();
                }

                function buildDataset($data, $dataColumName, $sqlquery) {
                    $resultset = mysqli_query($GLOBALS['dbhandle'], $sqlquery);
                    $datasetinner = $data;
                    $makedata = array();

                    while ($row = mysqli_fetch_array($resultset)) {
                        array_push($makedata, array(
                            "value" => $row[$dataColumName]
                        ));
                    }
                    $datasetinner["data"] = $makedata;
                    return $datasetinner;
                }
                ?>

                <div id="chart-1"><!-- Fusion Charts will render here--></div>
            </div></div>

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