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



        <div class="container">
            <div class="panel panel-default">
                <div class="panel-heading">Cash Receipt Details</div>
                <div class="panel-body">
                    <form action="cashreceipt2.php?jid=<?php echo $_GET['jid'] ?>" method="POST">
                    <!-- Start of search form -->
                    <table class="bordered">
                        <thead>
                            <tr>

                                <th>Cash_receipt_no</th>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Transaction_type</th>
                                <th>Status</th>
                                <th>Job_no</th>
                                 <th>Print</th>
                            </tr>
                        </thead>
                        <?php
                        $job_no = $_GET['jid'];

                        $query = mysqli_query($conn, "SELECT * FROM cash_receipt where job_no='$job_no'");
                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $row['cash_receipt_no'];
                        ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php
                                echo $row['amount'];
                                ?></td>
                                    <td><select class="form-control" name="TransactionType" id="TransactionType"  required="true">
                                            <option value="settype">Set Transaction Type</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Card">Card</option>
                                        </select></td>
                                    <td>
                                        <select class="form-control" name="Status" id="Status"  required="true">
                                            <option value="setstatus">Set Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Paid">Paid</option>
                                        </select></td>
                                    <td><?php echo $row['job_no']; ?></td>
                                    <td><?php
                                echo "<a href='printReport.php?cash_receipt_no=" . $row['cash_receipt_no'] . "' title='Edit Data' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-print' aria-hidden='true'></span></a>";
                                ?></td>
                                </tr> 
                                <?php
                                echo "<Script>"
                                . "document.getElementById('TransactionType').value ='{$row['transaction_type']}';"
                                . "document.getElementById('Status').value = '{$row['Status']}';"
                                . "</Script>";
                            }
                        } else {
                            ?>
                            <tr><td colspan="5">No records found.</td></tr> 
                            <?php
                        }
                        ?>
                    </table>
                    
                    <div class="row padding-top-10">
                        <div class="col-md-2 padding-top-10">
                            <button type="submit" name="submit" id="regsubmit" class="btn btn-success" style="width: 255px">&nbsp Save &nbsp</button>
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

                    <h5 id="dsp"></h5>
                </div>
            </div>
        </div>
<?php 
if (isset($_POST['submit'])){
   $query = mysqli_query($conn, "update cash_receipt set transaction_type = '".$_POST['TransactionType']."' where job_no='".$_GET['jid']."'");



   $query2 = mysqli_query($conn, "update cash_receipt set Status = '".$_POST['Status']."' where job_no='".$_GET['jid']."'");
}

?>
                    
                    

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

        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </body>
</html>