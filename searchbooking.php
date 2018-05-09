<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
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
                        <h1>Search Booking</h1>
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
            
                 <div id="msg" class="alert alert-danger alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Booking Already Has An Evaluation</div>
            <div class="panel panel-default">
                <div class="panel-heading">Enter Booking Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form -->
                    <form  id="evaluatedService" name="evaluation" method="POST">
                        <div class="row" id="marg-top-20">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2 padding-top-5" align="right">
                                        Booking ID:
                                    </div>

                                    <div class="col-md-3">
                                        <?php
                                        echo '<input type="text" class="form-control" name="booking" id="booking" required="true" placeholder="Enter Booking" />'
                                        ?>
                                    </div>



                                    <div class="col-md-4 padding-top-5"></div>
                                </div>







                                <div class="row padding-top-10">
                                    <div class="col-md-2 padding-top-10">
                                        <button type="submit" name="btnsavebooking" id="btnsavebooking" class="btn btn-success" style="width:160px"> Search </button>
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
                $Booking = $_POST['booking'];

                $query2 = "Select * from booking where booking_id='{$Booking}'";

                $result2 = mysqli_query($conn, $query2);
                if (mysqli_fetch_array($result2) > 0) {
                    $query3 = "Select * from evaluation where booking_id='{$Booking}'";
                    $result3 = mysqli_query($conn, $query3);
                    if (mysqli_fetch_array($result3) > 0) {
                        echo "<script>
                            var div = document.getElementById('msg');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
					
					</script>";
                    } else {
                       echo" <script language='JavaScript' type='text/javascript' >
					 window.location.href ='evaluation.php?bid={$Booking}'
					</script>";
                    }
                        
            
          
                    
                } else {
                    echo "<script>
					alert('Booking Not Found');
					</script>";
            }}
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

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>

    </body>
</html>