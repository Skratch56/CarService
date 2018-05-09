<!DOCTYPE html>

<?php
include 'dbconnect.php';
include 'functions.php';
session_start();
$_SESSION['evaluation_no'] = $_GET['evid'];
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
        <link rel="stylesheet" href="style.css"/>
        <script type="text/javascript" src="jquery.min.js"></script>
        <script type="text/javascript">
            function delete_confirm() {
            var result = confirm("Are you sure to delete users?");
            if (result) {
            return true;
            } else {
            return false;
            }
            }

            $(document).ready(function () {
            $('#select_all').on('click', function () {
            if (this.checked) {
            $('.checkbox').each(function () {
            this.checked = true;
            });
            } else {
            $('.checkbox').each(function () {
            this.checked = false;
            });
            }
            });
            $('.checkbox').on('click', function () {
            if ($('.checkbox:checked').length == $('.checkbox').length) {
            $('#select_all').prop('checked', true);
            } else {
            $('#select_all').prop('checked', false);
            }
            });
            });
        </script>
    </head>

    <body>
        <form name="bulk_action_form" action="action.php" id="form1" method="post" >
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
                <div class="container" id="banner" >
                    <div class="col-lg-offset-5"  >
                        <a class="navbar-brand" href="">
                            <h1>Service</h1>
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
                <?php
                if (isset($_SESSION['success_msg']) == 'Not Found') {
                    echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Service Captured Successfully</div>';
                    $_SESSION['success_msg'] = null;
                }
                ?>
                <div id="msgservice" class="alert alert-danger alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Enter between 0 to 9 for hours.</div>
                <div class="panel panel-default">

                    <div class="panel-heading">Service Details</div>

                    <div class="panel-body">


                        <!-- Start of search form -->

                        <div class="row">
                            <div class="col-md-2 padding-top-5" align="right">
                                Description:
                            </div>

                            <div class="col-md-2">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'change oil'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                    $minimumhours = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc1" id="servicedesc1" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service1id" id="service1id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-5" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'change oil'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours1"  style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin1" style="display:none;" style="visibility:hidden;">
                                <input type="text" class="form-control" name="noOfHours"  onkeyup="numberValidatehours(this)" id="noOfHours" value="<?php echo $minimumhours;?>" required=""  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput1"> 
                                    &nbsp&nbsp<input onclick="showhide();" type="checkbox" name="data1" id="HexInput1"  value="oil"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>

                            <div class="col-md-4 padding-top-5"></div>

                        </div>


                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Description:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Service Body'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                     $minimumhours2 = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc2" id="servicedesc2" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service2id" id="service2id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Service Body'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours2" style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin2" style="display:none;" style="visibility:hidden;">
                                <input type="text" onkeyup="numberValidatehours(this)" class="form-control" name="noOfHours2" id="noOfHours2" value="<?php echo $minimumhours2;?>"  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput2"> 
                                    &nbsp&nbsp<input onclick="showhide2();" type="checkbox" name="data2" id="HexInput2"  value="pads"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>
                            <div class="col-md-4 padding-top-5"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Description:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'clean pistols'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                    $minimumhours3 = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc3" id="servicedesc3" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service3id" id="service3id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'clean pistols'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours3" style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin3" style="display:none;" style="visibility:hidden;">
                                <input type="text" class="form-control"  onkeyup="numberValidatehours(this)"  name="noOfHours3" id="noOfHours3" value="<?php echo $minimumhours3;?>"  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput3"> 
                                    &nbsp&nbsp<input onclick="showhide3();" type="checkbox" name="data3" id="HexInput3"  value="pistol"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>
                            <div class="col-md-4 padding-top-5"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Description:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Service Engine'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                    $minimumhours4 = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc4" id="servicedesc4" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service4id" id="service4id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Service Engine'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours4" style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin4" style="display:none;" style="visibility:hidden;">
                                <input type="text" class="form-control"  onkeyup="numberValidatehours(this)"  name="noOfHours4" id="noOfHours4" value="<?php echo $minimumhours4;?>"  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput4"> 
                                    &nbsp&nbsp<input onclick="showhide4();" type="checkbox" name="data4" id="HexInput4"  value="pistol"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>
                            <div class="col-md-4 padding-top-5"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Description:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Disk Brakes'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                    $minimumhours5 = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc5" id="servicedesc5" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="service5id" id="service5id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Disk Brakes'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours5" style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin5" style="display:none;" style="visibility:hidden;">
                                <input type="text" class="form-control"  onkeyup="numberValidatehours(this)"  name="noOfHours5" id="noOfHours5" value="<?php echo $minimumhours5;?>"  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput5"> 
                                    &nbsp&nbsp<input onclick="showhide5();" type="checkbox" name="data5" id="HexInput5"  value="pistol"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>
                            <div class="col-md-4 padding-top-5"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 padding-top-10" align="right">
                                Description:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Drum Brake'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_desc = $rows2['description'];
                                    $service_id = $rows2['service_id'];
                                    $minimumhours6 = $rows2['hours'];
                                }


                                echo '<input type="text" class="form-control" name="servicedesc6" id="servicedesc6" value="' . $service_desc . '" readonly />';

                                echo '<input type="hidden" class="form-control" name="checked_id" id="service6id" value="' . $service_id . '" readonly />';
                                ?>
                            </div>

                            <div class="col-md-1 padding-top-10" align="right">
                                Rate per hour:
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <?php
                                $query2 = "SELECT * from service WHERE description = 'Drum Brake'";
                                $result2 = mysqli_query($conn, $query2);

                                while ($rows2 = mysqli_fetch_array($result2)) {
                                    $service_rate = $rows2['rate_per_hour'];
                                }


                                echo '<input type="text" class="form-control" name="servicerate1" id="servicerate1" value="' . $service_rate . '" readonly />';
                                ?>
                            </div>
                            <div class="col-md-1 padding-top-5" align="right" id="hours6" style="display:none;" style="visibility:hidden;">
                                No Of Hours:
                            </div>
                            <div class="col-md-1" id="hoursin6" style="display:none;" style="visibility:hidden;">
                                <input type="text" class="form-control"  onkeyup="numberValidatehours(this)"  name="noOfHours6" id="noOfHours6" value="<?php echo $minimumhours6;?>"  />
                            </div>
                            <div class="col-md-3 padding-top-10">
                                <label class="control-label" for="HexInput6"> 
                                    &nbsp&nbsp<input onclick="showhide6();" type="checkbox" name="data6" id="HexInput6"  value="pistol"> Select Service
                                    &nbsp&nbsp&nbsp&nbsp&nbsp</label></div>
                            <div class="col-md-4 padding-top-5"></div>
                        </div>



                    </div>
                </div>
                <div id="msgparts" class="alert alert-danger alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Enter a number between 1 and the quantity in stock.</div>
                <div class="panel panel-default">
                    <div class="panel-heading">Parts Details</div>
                    <div class="panel-body">



                        <div class="row" id="rowoil" style="display:none;" style="visibility:hidden;" >


                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'change oil'");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" max="<?php echo $row['qty_in_stock']; ?>" min="1" class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil1[]" id="qtyoil3" value=""   />
                                            </td>
                                        </tr> 
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>



                            <div class="col-md-4 padding-top-5"></div>
                        </div>





                        <div class="row" id="rowpads" style="display:none;" style="visibility:hidden;">
                            <br>

                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>

                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'Service Body'");
                                if (mysqli_num_rows($query) > 0) {
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id2[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" min="1" max="<?php echo $row['qty_in_stock']; ?>"class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil12[]" id="qtyoil2" value=""   />
                                            </td>

                                        </tr> 
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>



                            <div class="col-md-4 padding-top-5"></div>
                        </div>


                        <div class="row" id="rowpistol" style="display:none;" style="visibility:hidden;">
                            <br>

                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'clean pistols'");
                                if (mysqli_num_rows($query) > 0) {
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id3[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" max="<?php echo $row['qty_in_stock']; ?>" min="1" class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil13[]" id="qtyoil<?php echo $cnt; ?>" value=""   />
                                            </td>
                                        </tr> 
                                        <?php
                                        $cnt += 1;
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>


                            <div class="col-md-4 padding-top-5"></div>
                        </div>

                        <div class="row" id="rowpistol1" style="display:none;" style="visibility:hidden;">
                            <br>

                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'Service Engine'");
                                if (mysqli_num_rows($query) > 0) {
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id4[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" max="<?php echo $row['qty_in_stock']; ?>" min="1" class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil14[]" id="qtyoil<?php echo $cnt; ?>" value=""   />
                                            </td>
                                        </tr> 
                                        <?php
                                        $cnt += 1;
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>


                            <div class="col-md-4 padding-top-5"></div>
                        </div>
                        <div class="row" id="rowpistol2" style="display:none;" style="visibility:hidden;">
                            <br>

                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'Disk Brakes'");
                                if (mysqli_num_rows($query) > 0) {
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id5[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" max="<?php echo $row['qty_in_stock']; ?>" min="1" class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil15[]" id="qtyoil<?php echo $cnt; ?>" value=""   />
                                            </td>
                                        </tr> 
                                        <?php
                                        $cnt += 1;
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>


                            <div class="col-md-4 padding-top-5"></div>
                        </div>
                        <div class="row" id="rowpistol3" style="display:none;" style="visibility:hidden;">
                            <br>

                            <table class="bordered">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="select_all" id="select_all" value=""/></th>        
                                        <th>Part No</th>
                                        <th>Description</th>
                                        <th>Quantity in Stock</th>
                                        <th>Selling Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <?php
                                $query = mysqli_query($conn, "SELECT * FROM part where category = 'Drum Brake'");
                                if (mysqli_num_rows($query) > 0) {
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_assoc($query)) {
                                        ?>
                                        <tr>
                                            <td align="center"><input type="checkbox" name="checked_id6[]" class="checkbox" value="<?php echo $row['part_no']; ?>"/></td>        
                                            <td><?php echo $row['part_no']; ?></td>
                                            <td><?php echo $row['description']; ?></td>
                                            <td><?php
                                                if ($row['qty_in_stock'] == 0) {
                                                    echo "no parts in stock";
                                                } else {
                                                    echo $row['qty_in_stock'];
                                                }
                                                ?></td>
                                            <td><?php echo $row['selling_price']; ?></td>
                                            <td>
                                                <input type="text" max="<?php echo $row['qty_in_stock']; ?>" min="1" class="form-control" onkeyup="numberValidateqty(this)" name="qtyoil16[]" id="qtyoil<?php echo $cnt; ?>" value=""   />
                                            </td>
                                        </tr> 
                                        <?php
                                        $cnt += 1;
                                    }
                                } else {
                                    ?>
                                    <tr><td colspan="5">No records found.</td></tr> 
                                <?php } ?>
                            </table>


                            <div class="col-md-4 padding-top-5"></div>
                        </div>
                        <br>

                        <div class="row padding-top-10"> 

                            <div class="col-md-2 padding-top-10">
                                <input type="submit" name="bulk_add_submit" id="bulk_add_submit" onclick="submitforms();" class="btn btn-success" value="save" style="width:160px" />
                            </div>

                            <div class="col-md-1 padding-top-10">
                            </div>

                            <div class="col-md-2 padding-top-10">

                            </div>
                            
                            <div class="col-md-1 padding-top-10">
                            </div>

                            <div class="col-md-2 padding-top-10">

                            </div>
                            <div class="col-md-2 padding-top-10">
                                <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Close &nbsp</button>
                            </div>
                        </div>	



                        <h5 id="dsp"></h5>

                    </div>


                </div>

            </div>
            <?php
            if (isset($_GET['suc'])) {
                echo "<script language='JavaScript' type='text/javascript'> "
                . "document.getElementById('bulk_add_submit').disabled = true;"
                . "document.getElementById('btnnext').disabled = false;</script>";
            }
            ?>
            <!--
                    Begining of PHP code
                    The code gets executed when user clicks the save button
            -->
            <?php
            if (isset($_POST['bulk_add_submit'])) {
//            $evaluation_id = $_GET['evid'];
//            $service1 = $_POST['service1id'];
//            $service2 = $_POST['service2id'];
//            $service3 = $_POST['service3id'];
//            $part1 = $_POST['partid1'];
//            $part2 = $_POST['partid2'];
//            $part3 = $_POST['partid3'];
//            $qty1 = $_POST['qtyoil1'];
//            $qty2 = $_POST['qtypads1'];
//            $qty3 = $_POST['qtypistol1'];
//            if (isset($_POST['service1id'])) {
//                $query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
//                $result1 = mysqli_query($conn, $query1);
//            }
//            if (isset($_POST['service2id'])) {
//                $query2 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service2 . "', " . $evaluation_id . ", " . $service2 . ");";
//                $result2 = mysqli_query($conn, $query2);
//            }
//            if (isset($_POST['service3id'])) {
//                $query3 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service3 . "', " . $evaluation_id . ", " . $service3 . ");";
//                $result3 = mysqli_query($conn, $query3);
//            }
//
//            if (isset($_POST['partid1'])) {
//                $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $part1 . "', '" . $evaluation_id . "', '" . $qty1 . "');";
//                $result4 = mysqli_query($conn, $query4);
//            }
//            if (isset($_POST['partid2'])) {
//                $query5 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $part2 . "', '" . $evaluation_id . "', '" . $qty2 . "');";
//                $result5 = mysqli_query($conn, $query5);
//            }
//            if (isset($_POST['partid3'])) {
//                $query6 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $part3 . "', '" . $evaluation_id . "', '" . $qty3 . "');";
//                $result6 = mysqli_query($conn, $query6);
//            }
//
//            echo "<script>
//						document.getElementById('btnsavebooking').disabled = true;
//                                                document.getElementById('btnnext').disabled = false;
//						alert('Service captured successfully');
//					</script>";
                //echo $booking_date ." | " .$booking_time ." | " .$status ." | " .$reg_num ." | " .$customer_no ;
            }
            ?>

            <script type="text/javascript">
                document.getElementById('mileage').disabled = true;
                document.getElementById("btnsavebooking").disabled = true;
            </script>
            <script language="JavaScript" type="text/javascript">
                function getServicePage() {
                window.location.href = "servicedetails.php?evid=" +<?php
            echo $_SESSION['evaluation_no'];
            ?>;
                }
            </script>


            <script language="JavaScript" type="text/javascript">
                function showhide()
                {
                var div = document.getElementById("rowoil");
                var div2 = document.getElementById("hours1");
                var div3 = document.getElementById("hoursin1");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none";
                div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>

            <script language="JavaScript" type="text/javascript">
                function showhide2()
                {
                var div = document.getElementById("rowpads");
                var div2 = document.getElementById("hours2");
                var div3 = document.getElementById("hoursin2");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none";
                div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>
            <script language="JavaScript" type="text/javascript">
                function showhide3()
                {
                var div = document.getElementById("rowpistol");
                var div2 = document.getElementById("hours3");
                var div3 = document.getElementById("hoursin3");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none";
                div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>

            <script language="JavaScript" type="text/javascript">
                function showhide4()
                {
                var div = document.getElementById("rowpistol1");
                var div2 = document.getElementById("hours4");
                var div3 = document.getElementById("hoursin4");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none";
                div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>
            <script language="JavaScript" type="text/javascript">
                function showhide5()
                {
                var div = document.getElementById("rowpistol2");
                var div2 = document.getElementById("hours5");
                var div3 = document.getElementById("hoursin5");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none";
                div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>

            <script language="JavaScript" type="text/javascript">
                function showhide6()
                {
                var div = document.getElementById("rowpistol3");
                var div2 = document.getElementById("hours6");
                var div3 = document.getElementById("hoursin6");
                if (div.style.display !== "none") {
                div.style.display = "none";
                div.style.visibility = "hidden";
                div2.style.display = "none";
                div2.style.visibility = "hidden";
                div3.style.display = "none"; div3.style.visibility = "hidden";
                div3.required = false;
                } else {
                div.style.display = "block";
                div.style.visibility = "visible";
                div2.style.display = "block";
                div2.style.visibility = "visible";
                div3.style.display = "block";
                div3.style.visibility = "visible";
                div3.required = true;
                }
                }
            </script>  

            <script language="JavaScript" type="text/javascript">
                function getMainPage() {
                window.location.href = "main.php";
                }
                                </                        script>
                    <script type="te                            xt/javascript">
                    function numberValidat                                ehours(input) {
                    var rege                                x = /[^0-9]/g;
                    input.value = input.value.repl                                ace(regex, "");
                    v                                ar minTime = 1;
                    v                                ar maxTime = 9;
                    var value = input.value;
                    var reg                                ex2 = /[0-9]/g;
                    if (minTime > value || value > maxTime) {


                    input.value = input.value.repla                                    ce(regex2, "");
                    var div = document.getElementById                                    ('msgservice');
                    div.style.dis                                    play = 'block';
                    div.style.visibili                                ty = 'visible';
                    }

                    }
                    </script>
                                <script type                                ="text/javascript">
                        function numberV                                    alidateqty(input) {
                        var regex = /[^0-9]/g;
                        input.value = input.value.r                                    eplace(regex, "");
                        var minTime = p                                    arseInt(input.min);
                        var maxTime = p                                    arseInt(input.max);
                        var v                                    alue = input.value;
                        var regex2 = /[0-9]/g;
                        if (minTime > value || value > maxTime) {

                        input.value = input.value.r                                        eplace(regex2, "");
                        var div = document.getEleme                                        ntById('msgparts');
                        div.style.display = 'block';
                        div.style.visi                                    bility = 'visible';
                        }

                        }
                        </script>
                        <script>

                            function onqtyChange(val) {

                            var minTime = 1;
                            var maxTime = 9;
                            var value = val;
                            if (minTime > value || value > maxTime) {
                            alert('Enter between 0 to 9');
                            }

                            }
                        </script>
                        <script src="jquery.min.js"></script>
                        <script src="js/bootstrap.min.js"></script>
                    </form>
                    <script language="JavaScript" type="text/javascript">
                            function submitforms()
                            {
                            document.getElementById("form1").submit();
                            }
                    </script>

                </body>
            </html>