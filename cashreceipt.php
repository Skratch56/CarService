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
                        <h1>Cash Receipt</h1>
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
                    <table class="bordered">
                        <thead>
                            <tr>

                                <th>Cash_receipt_no</th>
                                <th>Date</th>
                                <th>Amount</th>
                                

                                <th>Job_no</th>
                            </tr>
                        </thead>
                        <?php
                        $job_no = $_GET['jid'];
                        $total = 0;
                        $trans = "";
                        $query = mysqli_query($conn, "SELECT * FROM cash_receipt_temp where job_no='$job_no'");
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['cash_receipt_no']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php $total += $row['amount'];
                                    echo $row['amount']; ?></td>
                                                                    
                                    <td><?php echo $row['job_no']; ?></td>
                                    
                                </tr> 
                                <?php
                            }
                        } else {
                            ?>
                            <tr><td colspan="5">No records found.</td></tr> 
                        <?php }
                        

                        $query2 = mysqli_query($conn, "SELECT * FROM cash_receipt where job_no='$job_no'");
                        if (mysqli_num_rows($query2) == 0) {
                        $query19 = "INSERT INTO `cash_receipt` (`cash_receipt_no`, `date`, `amount`, `transaction_type`, `status`, `job_no`) VALUES (NULL, '" . date("Y-m-d") . "', '{$total}', 'settype','setstatus', '{$job_no}')";
                                    $result20 = mysqli_query($conn, $query19);
                        }
                         $query10 = "update `job` set status ='Complete' where job_no='" . $job_no. "'";
                mysqli_query($conn, $query10);?>
                    </table>
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
                window.location.href = "cashreceipt2.php?jid=" +<?php
                        echo $_GET['jid'];
                        ?>;
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>