<!DOCTYPE html>

<?php
session_start();
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Car Service</title>
<link rel="icon" href="black.jpg">
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="layout.css" rel="stylesheet" />
        <!--<link href="css/basic-template.css" rel="stylesheet" />-->
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" />
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Datsun Motors</h1>

                    </a>

                </div>
            </div>
        </nav>

        <br><br><br><br><br>

        <div id="sidebar">
            <div class="toggle-btn" onclick="toggleSidebar()">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <ul>
                <li align="center"><span class="glyphicon glyphicon-dashboard"></span>&nbsp DASHBOARD</li>
                <li><a class="active" href="customer.php"><span class="glyphicon glyphicon-wrench"></span> Book For Service </a></li>
                <li><a class="active" href="customer2.php"><span class="glyphicon glyphicon-user"></span> Customer </li>
                
                <li data-toggle="collapse" data-target="#demo1">
                    <a href="#"><span class="glyphicon glyphicon-search"></span> Search And Continue <span class="fa arrow"></span></a>
                    <ul class="panel-collapse collapse" id="demo1">
                        <li>
                            <a href="searchCustomer.php"> <i class="glyphicon glyphicon-user"></i> Search Customer for Booking</a>
                        </li>
                        <li>
                            <a href="searchbooking.php"> <i class="glyphicon glyphicon-book"></i> Search Booking for Evaluation</a>
                        </li>
                        <li>
                            <a href="searchEvaluation.php"> <i class="glyphicon glyphicon-registration-mark"></i> Search Evaluation</a>
                        </li>
                        <li>
                            <a href="searchJob.php"> <i class="glyphicon glyphicon-cog"></i> Search Job</a>
                        </li>
                        
                        <li>
                            <a href="searchCashReceipt.php"> <i class="glyphicon glyphicon-cog"></i> Search Cash Receipt</a>
                        </li>
                    

                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#demo">
                    <a href="#"><span class="glyphicon glyphicon-record"></span> Reports <span class="fa arrow"></span></a>
                    <ul class="panel-collapse collapse" id="demo">
                        <li>
                            <a href="reports.php"> <i class="fa fa-credit-card"></i> Cash Receipt</a>
                        </li>
                        <li>
                            <a href="reports_1.php"> <i class="glyphicon glyphicon-cog"></i> Completed Jobs</a>
                        </li>
                        <li>
                            <a href="reports_2.php"> <i class="glyphicon glyphicon-book"></i> Bookings</a>
                        </li>
                        <li>
                            <a href="reports_3.php"> <i class="glyphicon glyphicon-user"></i> Customers</a>
                        </li>
                        <li>
                            <a href="reports_4.php"> <i class="glyphicon glyphicon-usd"></i> Revenue Report</a>
                        </li>
                        <li>
                            <a href="reports_5.php"> <i class="glyphicon glyphicon-bishop"></i> Customer Gender Report</a>
                        </li>
                         <li>
                            <a href="reports_6.php"> <i class="glyphicon glyphicon-registration-mark"></i> Evaluation Report</a>
                        </li>
                        <li>
                            <a href="reports_8.php"> <i class="glyphicon glyphicon-registration-mark"></i> Parameterized Reports</a>
                        </li>

                    </ul>
                </li>
                <li><a class="active" href="tst.php"><span class="glyphicon glyphicon-question-sign"></span> Help </li>
        </div>

        <div class="container" id="navigationbar">
            <ul class="nav navbar-nav navbar-right">
                <ul class="breadcrumb list-inline">
                    <li><a class="active" href=""><span class="glyphicon glyphicon-user"></span> Employee:<?php echo $_SESSION['login'] ?></a></li>
                    <li><a class="active" href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>

                    <li><a href="index.php"><span class="glyphicon glyphicon-off"></span>&nbspLogout </a></li>

                </ul>
            </ul>
        </div>
        <div class="container-fluid">
            <div style="height:40px;"></div>
            <img src="car-service.png" class="thumbnail" style="height:800px; width:1600px;">
        </div>

        <script type="text/javascript">
            function toggleSidebar() {
                document.getElementById("sidebar").classList.toggle('active');
            }
        </script>

        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>