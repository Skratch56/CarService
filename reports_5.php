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

/* Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if (!$dbhandle) {
    exit("There was an error with your connection: " . mysqli_connect_error());
}
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
        <script type="text/javascript" src="js/fusioncharts.js"></script>
        <script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>	
    </head>

    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Customer Report</h1>
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
                <h2>Customer Report</h2>
                <hr />


                <?php
                // Form the SQL query that returns the top 10 most populous countries
                // Preparing the object of FusionCharts with needed informations
                /**
                 * The parameters of the constructor are as follows
                 * chartType   {String}  The type of chart that you intend to plot. e.g. Column3D, Column2D, Pie2D etc.
                 * chartId     {String}  Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.
                 * chartWidth  {String}  Intended width for the chart (in pixels). e.g. 400
                 * chartHeight {String}  Intended height for the chart (in pixels). e.g. 300
                 * containerId {String}  The id of the chart container. e.g. chart-1
                 * dataFormat  {String}  Type of data used to render the chart. e.g. json, jsonurl, xml, xmlurl
                 * dataSource  {String}  Actual data for the chart. e.g. {"chart":{},"data":[{"label":"Jan","value":"420000"}]}
                 */
                $male = 0;
                $female = 0;
                $query2 = "Select * from customer where gender='Male'";

                $result2 = mysqli_query($conn, $query2);

                while ($rows = mysqli_fetch_array($result2)) {
                    $male += 1;
                }
                $query3 = "Select * from customer where gender='Female'";

                $result3 = mysqli_query($conn, $query3);

                while ($rows = mysqli_fetch_array($result3)) {
                    $female += 1;
                }
                $columnChart = new FusionCharts("column2d", "ex1", "100%", 400, "chart-1", "json", '{
      "chart": {
        "caption": "Male And Female Customers",
        "subCaption": "",
        "numberPrefix": "",
        "rotatevalues": "0",
        "plotToolText": "<div><b>$label</b><br/>Sales : <b>$$value</b></div>",
        "theme": "fint"
      },
      "data": [{
        "label": "Male",
        "value": "' . $male . '"
      }, {
        "label": "Female",
        "value": "' . $female . '"
      }]
    }');
// Render the chart
                $columnChart->render();
                ?>

                <div id="chart-1"><!-- Fusion Charts will render here--></div>
            </div></div>

        <!--
                Begining of PHP code
                The code gets executed when user clicks the save button
        -->








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