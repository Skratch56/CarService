<?php
include 'dbconnect.php';
include 'functions.php';
ob_start();
session_start();
//$_SESSION = array();
global $conn;
$query1 = "";
?>

<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="black.jpg">
        <title>Car Service</title>

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="layout.css" rel="stylesheet">

    </head>

    <body>
        <nav class="navbar navbar-inverse  navbar-fixed-top" role="navigation">
            <div class="container" id="banner">
                <div class="row">
                    <a class="navbar-brand" href="#">
                                    <!--<img class="brand" src="images/logo.png" />-->
                    </a>
                </div>
            </div>
        </nav>


        <div class="container" id="navigationbar">
            <ul class="nav navbar-nav navbar-right padding-bottom-150">
            </ul>

            <!-- START OF MODAL POPUP -->

            <div class="modal" id="mymodal">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal">x</button>
                            <h4 class="modal-title">Your UserName is your id number your password is your email</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                    
                            </div>

                            <br />
                            <h5 id="screen3"></h5>
                        </div>
                    </div><!-- END modal-content -->
                </div><!-- END MODAL DIALOG -->

            </div>
            <!-- END OF MODAL POPUP -->
        </div>
        <div class="container" id="navigationbar">
            <ul class="nav navbar-nav navbar-right padding-bottom-150">
            </ul>
            <div class="modal" id="mymodal2">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal">x</button>
                            <h4 class="modal-title">Please enter your anwer to your question</h4>
                        </div>

                        <div class="modal-body">
                            

                            <br />
                            <h5 id="screen3"></h5>
                        </div>
                    </div><!-- END modal-content -->
                </div><!-- END MODAL DIALOG -->
            </div>
        </div>
        <div class="container" id="marg-top-50" align="center">

            <div class="row">
                <div class="col-md-1">
                </div>

                <div class="col-md-10">
                    <div class="jumbotron" align="center">

                        <form action="index1.php" method="POST">

                            <div class="row">
                                <div class="col-md-3 padding-top-10">					
                                </div>					
                                <div class="col-md-6 padding-top-10">
                                    <h3><strong>LOGIN</strong></h3>
                                </div>				
                                <div class="col-md-3">						
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3 padding-top-10">					
                                </div>					
                                <div class="col-md-6 padding-top-10">
                                    <input type="text" class="form-control" id="staffno" name="staffno" placeholder="ID Number" required="true" />
                                </div>				
                                <div class="col-md-3">						
                                </div>
                            </div>

                            <div class="row" id="marg-top-10">
                                <div class="col-md-3">					
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="true" />
                                </div>		
                                <div class="col-md-3 padding-top-10">			
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3 padding-top-5">
                                </div>
                                <div class="col-md-6 padding-top-5">

                                    <button type="submit" name="submit" class="btn btn-info" >Sign In</button>
                                </div>
                                <div class="col-md-3 padding-top-10">

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6" >

                                    <?php
                                    if (isset($_POST['submit'])) {
                                        if (isset($_POST['staffno']) AND isset($_POST['password'])) {
                                            if ((strlen($_POST['staffno']) > 0) || (strlen($_POST['password']) > 0)) {
                                                $staffno = $_POST['staffno'];
                                                $password = $_POST['password'];

                                                $query1 = "SELECT * FROM Customer";

                                                if ((strlen($query1)) > 0) {

                                                    $login_type = "sales";
                                                    $staffnofound = false;
                                                    $found = false;

                                                    $result1 = mysqli_query($conn, $query1);

                                                    while ($rows1 = mysqli_fetch_array($result1)) {
                                                        $rows_data1 = $rows1['idnumber'];
                                                        $rows_data2 = $rows1['email'];
                                                        $rows_data3 = $rows1['first_name'] . " " . $rows1['surname'];
                                                        
                                                        if ($staffno == $rows_data1 && $password == $rows_data2) {
                                                            //$_SESSION['empnum'] = $staffno;
                                                            $found = true;
                                                            break;
                                                        }

                                                        if ($staffno == $rows_data1) {
                                                            $staffnofound = true;
                                                        }
                                                    }

                                                    if (strlen($_POST['staffno']) == 0) {
                                                        echo '<div class="alert alert-danger" role="alert" style="transform: translate(50%, 50%);">Please enter your employee number to login!</div>';
                                                    } else if (strlen($_POST['password']) == 0) {
                                                        echo '<div class="alert alert-danger" role="alert" style="transform: translate(50%, 50%);">Please enter your password to login!</div>';
                                                    } else {
                                                        if ($found == false) {
                                                            if ($staffnofound == false) {
                                                                echo '<div class="alert alert-danger alert-dismissable" style="transform: translate(50%, 50%);">id number entered is incorrect!</div>';
                                                            } else {
                                                                echo '<div class="alert alert-danger alert-dismissable" style="transform: translate(50%, 50%);">Password entered is incorrect!</div>';
                                                            }
                                                        } else {
                                                            $query4 = "SELECT * FROM employee where staff_no='{$_POST['staffno']}'";
                                                            $result4 = mysqli_query($conn, $query4);

                                                            
                                                            $_SESSION['login'] = $rows_data3;
                                                             $_SESSION['logincustid'] =$rows_data1;
                                                                header("Location:main2.php");
                                                            
                                                            echo '<div class="alert alert-sucess" role="alert" style="transform: translate(50%, 50%);">success</div>';
                                                        }
                                                    }
                                                }
                                            } else {
                                                echo '<div class="alert alert-danger" role="alert" style="transform: translate(50%, 50%);">Please enter your login details</div>';
                                            }
                                        }
                                    }
                                    ?></div>
                            </div>


                            <br>
                            <div class="row">
                                <div class="col-md-3 padding-top-5">
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    Forgot your password? <br>
                                    Click <a href="#" data-toggle="modal" data-target="#mymodal">here</a> to reset your password.
                                </div>

                                <div class="col-md-3 padding-top-5">
                                </div>
                                <div class="col-md-12 padding-top-5">
                                    No User Account? <br>
                                    Click <a href="customerRegistration.php" >here</a> to signup.
                                </div>
                                <div class="col-md-3 padding-top-10">
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3 padding-top-5">
                                </div>

                                <div class="col-md-6 padding-top-5">
                                    <h5 id="screen4"></h5>
                                </div>

                                <div class="col-md-3 padding-top-10">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

                <div class="col-md-1">
                </div>
            </div>
        </div>





        <script  language="JavaScript" type="text/javascript">
            function resetPassword(a1) {
                var a1 = document.getElementById(a1);

                //Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                //Create some variables we need to send to our PHP file
                var url = "process.php";
                var emp_num = a1.value;

                var vars = "reset_empnum=" + emp_num;

                hr.open("POST", url, true);
                //Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function () {
                    if (hr.readyState === 4 && hr.status === 200) {
                        var return_data = hr.responseText;
                        document.getElementById("screen3").innerHTML = return_data;
                    }
                };

                //Send the data to PHP now... and wait for response to update the status div
                hr.send(vars);//Actually execute the request
                document.getElementById("screen3").innerHTML = "processing...";
            }
        </script>
        <script language="JavaScript" type="text/javascript">
            function resetPassword2(a1) {
                var a1 = document.getElementById(a1);

                //Create our XMLHttpRequest object
                var hr = new XMLHttpRequest();
                //Create some variables we need to send to our PHP file
                var url = "process.php";
                var emp_num = a1.value;

                var vars = "reset_answer=" + emp_num;

                hr.open("POST", url, true);
                //Set content type header information for sending url encoded variables in the request
                hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                //Access the onreadystatechange event for the XMLHttpRequest object
                hr.onreadystatechange = function () {
                    if (hr.readyState === 4 && hr.status === 200) {
                        var return_data = hr.responseText;
                        document.getElementById("screen3").innerHTML = return_data;
                    }
                };

                //Send the data to PHP now... and wait for response to update the status div
                hr.send(vars);//Actually execute the request
                document.getElementById("screen3").innerHTML = "processing...";
            }
        </script>
        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
    <?php ob_end_flush(); ?>
</html>
