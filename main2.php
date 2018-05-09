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
                <li><a class="active" href="vehiclecust.php?cst=<?php echo $_SESSION['logincustid']?>"><span class="glyphicon glyphicon-wrench"></span> Book For Service </a></li>
                <li><a class="active" href="customerUpdate.php"><span class="glyphicon glyphicon-user"></span> Update My Details </li>
                <li>
                    <a href="searchCustomer.php"> <i class="glyphicon glyphicon-user"></i> Search Customer for Booking</a>
                </li>





        </div>

        <div class="container" id="navigationbar">
            <ul class="nav navbar-nav navbar-right">
                <ul class="breadcrumb list-inline">
                    <li><a class="active" href=""><span class="glyphicon glyphicon-user"></span> Customer:<?php echo $_SESSION['login'] ?></a></li>
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