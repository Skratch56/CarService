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
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <link href="layout.css" rel="stylesheet" />
    </head>

    <body>

        <script type="text/javascript">
            function populate_vehicleType(a1, a2, a3) {
                var a1 = document.getElementById(a1);
                var a2 = document.getElementById(a2);
                var a3 = document.getElementById(a3);
                var i, x;

                for (i = a2.options.length - 1; i >= 0; i--) {
                    a2.remove(i);
                }

                for (x = a3.options.length - 1; x >= 0; x--) {
                    a3.remove(x);
                }

                if (a1.value == "Audi") {
                    a2.disabled = false;
                    var vehicleType_optionArray = ["|", "Sedan|Sedan", "SUV|SUV"];
                    var carModel_optionArray = ["|"];

                } else if (a1.value == "BMW") {
                    a2.disabled = false;
                    var vehicleType_optionArray = ["|", "Sedan|Sedan", "SUV|SUV"];
                    var carModel_optionArray = ["|"];

                } else if (a1.value == "Mercedes") {
                    a2.disabled = false;
                    var vehicleType_optionArray = ["|", "Sedan|Sedan", "SUV|SUV"];
                    var carModel_optionArray = ["|"];

                } else {

                    var vehicleType_optionArray = ["|"];
                    var carModel_optionArray = ["|"];

                    a2.disabled = true;
                }

                for (var option in vehicleType_optionArray) {
                    var pair = vehicleType_optionArray[option].split("|");
                    var newOption = document.createElement("option");
                    newOption.value = pair[0];
                    newOption.innerHTML = pair[1];
                    a2.options.add(newOption);
                }

                for (var option in carModel_optionArray) {
                    var pair = carModel_optionArray[option].split("|");
                    var newOption = document.createElement("option");
                    newOption.value = pair[0];
                    newOption.innerHTML = pair[1];
                    a3.options.add(newOption);
                }

                a3.disabled = true;
            }
        </script>

        <script type="text/javascript">
            function populate_model2(b1, b2, b3) {
                var b1 = document.getElementById(b1);
                var b2 = document.getElementById(b2);
                var b3 = document.getElementById(b3);
                var j;

                if (b1.value == "Audi") {

                    if (b2.value == "Sedan") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "A3|A3", "A4|A4", "A5|A5", "A6|A6", "A7|A7", "A8|A8", "S3|S3", "S4|S4", "S5|S5", "S6|S6", "S7|S7", "S8|S8"];

                    } else if (b2.value == "SUV") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "Q3|Q3", "Q5|Q5", "Q7|Q7", "SQ5|SQ5"];

                    } else {
                        b3.disabled = true;
                    }

                } else if (b1.value == "BMW") {
                    if (b2.value == "Sedan") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "3 Series|3 Series", "5 Series|5 Series", "7 Series|7 Series", "M3|M3", "M5|M5"];

                    } else if (b2.value == "SUV") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "X1|X1", "X3|X3", "X5|X5"];

                    } else {
                        b3.disabled = true;
                    }

                } else if (b1.value == "Mercedes") {
                    if (b2.value == "Sedan") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "C-Class|C-Class", "E-Class|E-Class", "S-Class|S-Class"];

                    } else if (b2.value == "SUV") {
                        b3.disabled = false;
                        var carModel_optionArray = ["|", "G-Class|G-Class", "GLA|GLA", "GLC|GLC", "GLE|GLE", "GLS|GLS"];

                    } else {
                        b3.disabled = true;
                    }

                }

                for (j = b3.options.length - 1; j >= 0; j--) {
                    b3.remove(j);
                }

                for (var option in carModel_optionArray) {
                    var pair = carModel_optionArray[option].split("|");
                    var newOption = document.createElement("option");
                    newOption.value = pair[0];
                    newOption.innerHTML = pair[1];
                    b3.options.add(newOption);

                    b3.disabled = false;
                }
            }
        </script>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Vehicle</h1>
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
                    <!--<li><a href="#">Customer</a></li>
                    <li><a  class="active" href="#">Book Service</a></li>-->
                    <li><a href="index.php"><span class="glyphicon glyphicon-off"></span>&nbspLogout </a></li>
                </ul>
            </ul>
        </div>

        <br><br>

        <div class="container">
            <div id="msg" class="alert alert-success alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Vehicle Captured Successfully.</div>
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- Start of search form -->

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label class="control-label" for="HexInput1"> 
                            &nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput1" value="existingcar"> Existing Vehicle
                            &nbsp&nbsp&nbsp&nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput2" value="newcar"> New Vehicle</label>

                        <div class="row">

                            <div class="col-md-2 padding-top-10">
                                <input type="text" maxlength="17" class="form-control" name="search_id" id="search_id" placeholder="Vin Number" required="true" />
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <button type="submit" name="btnsearch" id="btnsearch" class="btn btn-success pull-left" style="width:100px"> Retrieve </button>
                            </div>

                            <div class="col-md-2 padding-top-10"></div>

                            <div class="col-md-3 padding-top-10"></div>


                            <div class="col-md-3 padding-top-10"></div>
                        </div>
                    </form>

                    <!-- End of search form -->

                </div>
            </div>
            <script type="text/javascript">
                document.getElementById('search_id').disabled = false;
                document.getElementById('btnsearch').disabled = false;
            </script>
            <div class="panel panel-default">
                <div class="panel-heading">Vehicle Details</div>
                <div class="panel-body">

                    <!-- Start of Customer details form -->

                    <form name="edtform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                        <div class="row" id="marg-top-20">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4 padding-top-5">
                                        Registration Number
                                    </div>

                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="reg_num" id="reg_num" required="true" value="<?php
                                        if (isset($_POST['reg_num'])) {
                                            echo $_POST['reg_num'];
                                        }
                                        ?>"/>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 padding-top-5">
                                        Make
                                    </div>

                                    <div class="col-md-6 padding-top-5">
                                        <select class="form-control" name="make" id="make" required="true" onchange="populate_vehicleType(this.id, 'vehicle_type', 'model')">
                                            <option value="<?php
                                            if (isset($_POST['make'])) {
                                                echo $_POST['make'];
                                            }
                                            ?>"><?php
                                                        if (isset($_POST['make'])) {
                                                            echo $_POST['make'];
                                                        }
                                                        ?>
                                            </option>
                                            <option value="Audi">Audi</option>
                                            <option value="BMW">BMW</option>
                                            <option value="Mercedes">Mercedes</option>
                                        </select>
                                        <!--<input type="text" class="form-control" name="make" id="make" required="true" value="<?php /* if (isset($_POST['make'])) {
                                                          echo $_POST['make'];
                                                          } */ ?>" />-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Vehicle Type
                                    </div>
                                    <div class="col-md-6 padding-top-5">
                                        <select class="form-control" name="vehicle_type" id="vehicle_type" required="true" onchange="populate_model2('make', this.id, 'model')" >

                                            <option value="<?php
                                            if (isset($_POST['vehicle_type'])) {
                                                echo $_POST['vehicle_type'];
                                            }
                                            ?>"><?php
                                                        if (isset($_POST['vehicle_type'])) {
                                                            echo $_POST['vehicle_type'];
                                                        }
                                                        ?>
                                            </option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="SUV">SUV</option>
                                        </select>
                                        <!--<input type="text" class="form-control" name="vehicle_type" id="vehicle_type" required="true" value="<?php /* if (isset($_POST['vehicle_type'])) {
                                                          echo $_POST['vehicle_type'];
                                                          } */ ?>" />-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Model
                                    </div>

                                    <div class="col-md-6 padding-top-5">
                                        <select class="form-control" name="model" id="model" required="true">
                                            <option value="<?php
                                            if (isset($_POST['model'])) {
                                                echo $_POST['model'];
                                            }
                                            ?>"><?php
                                                        if (isset($_POST['model'])) {
                                                            echo $_POST['model'];
                                                        }
                                                        ?>
                                            </option>
                                        </select>
                                        <!--<input type="text" maxlength="60" class="form-control" name="model" id="model" required="true" value="<?php
                                        if (isset($_POST['model'])) {
                                            echo $_POST['model'];
                                        }
                                        ?>" />-->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Year
                                    </div>

                                    <div class="col-md-6 padding-top-5">
                                        <select class="form-control" name="year" id="year" required="true">
                                            <option value="<?php
                                            if (isset($_POST['year'])) {
                                                echo $_POST['year'];
                                            }
                                            ?>"><?php
                                                        if (isset($_POST['year'])) {
                                                            echo $_POST['year'];
                                                        }
                                                        ?>
                                            </option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2016">2016</option>
                                            <option value="2017">2017</option>
                                        </select>
                                        <!--<input type="text" class="form-control" name="year" id="year" required="true" value="<?php
                                        if (isset($_POST['year'])) {
                                            echo $_POST['year'];
                                        }
                                        ?>" />-->
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Colour
                                    </div>
                                    <div class="col-md-6 padding-top-5">
                                        <input type="text" class="form-control" name="colour" id="colour" required="true" value="<?php
                                        if (isset($_POST['colour'])) {
                                            echo $_POST['colour'];
                                        }
                                        ?>" />
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        VIN Number
                                    </div>
                                    <div class="col-md-6 padding-top-5">
                                        <input type="text" class="form-control" maxlength="17" name="vin_num" id="vin_num" required="true" value="<?php
                                        if (isset($_POST['vin_num'])) {
                                            echo $_POST['vin_num'];
                                        }
                                        ?>" />
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 padding-top-10">
                                        Mileage
                                    </div>
                                    <div class="col-md-6 padding-top-5">
                                        <input type="text" class="form-control" name="mileage" id="mileage" required="true" onkeyup="numberValidate(this)" value="<?php
                                        if (isset($_POST['mileage'])) {
                                            echo $_POST['mileage'];
                                        }
                                        ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" class="form-control" name="cust_idno" id="cust_idno" required="true" value="<?php
                        if (isset($_POST['cust_idno'])) {
                            echo $_POST['cust_idno'];
                        }
                        ?>" /> <!-- hidden customer id field -->

                        <div class="row padding-top-10">
                            <div class="col-md-2 padding-top-10">
                                <button type="submit" name="btnsave" id="btnsave" class="btn btn-success" style="width:160px"> Save </button>
                            </div>

                            <div class="col-md-1 padding-top-10">
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <button type="button" name="btnnext" id="btnnext" class="btn btn-info" onclick="getBookingPage()" style="width: 160px"> Next </button>
                            </div>

                            <div class="col-md-5 padding-top-10">
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Cancel &nbsp</button>
                            </div>
                        </div>	

                    </form>


                    <script type="text/javascript">
                        document.getElementById("btnsave").disabled = true;
                        document.getElementById("reg_num").disabled = true;
                        document.getElementById("make").disabled = true;
                        document.getElementById("model").disabled = true;
                        document.getElementById("year").disabled = true;
                        document.getElementById("colour").disabled = true;
                        document.getElementById("vehicle_type").disabled = true;
                        document.getElementById("vin_num").disabled = true;
                        document.getElementById("mileage").disabled = true;
                    </script>
                </div>
            </div>
        </div>
    </div>


    <!--
            Begining of PHP code
            The code gets executed when user clicks the save button
    -->
    <?php
    if (isset($_GET['cst'])) {
        $cust_idno = $_GET['cst'];

        echo '<script>
					document.getElementById("cust_idno").value =' . $cust_idno . ';
				</script>';
    }

    //echo "ID Number = " .$cust_idno;

    $all_clear = 0;

    if (isset($_POST['btnsave'])) {

        $car_reg_num = $_POST['reg_num'];
        $car_make = $_POST['make'];
        $vehicle_type = $_POST['vehicle_type'];
        $car_model = $_POST['model'];
        $car_year = $_POST['year'];
        $car_colour = $_POST['colour'];
        $vin_number = $_POST['vin_num'];
        $car_mileage = $_POST['mileage'];
        $cust_idno = $_POST['cust_idno'];


        if (validate_reg_num($car_reg_num) == false) {
            echo '<script>
						document.getElementById("reg_num").style.borderColor = "red";
					</script>';

            $all_clear += 1;
        } else {
            echo '<script>
						document.getElementById("reg_num").style.borderColor = "green";
					</script>';
        }


        if (validate_car_colour($car_colour) == false) {
            echo '<script>
						document.getElementById("colour").style.borderColor = "red";
					</script>';

            $all_clear += 1;
        } else {
            echo '<script>
						document.getElementById("colour").style.borderColor = "green";
					</script>';
        }


        if (validate_vin_number($vin_number) == false) {
            echo '<script>
						document.getElementById("vin_num").style.borderColor = "red";
					</script>';

            $all_clear += 1;
        } else {
            echo '<script>
						document.getElementById("vin_num").style.borderColor = "green";
					</script>';
        }


        if (validate_car_mileage($car_mileage) == false) {
            echo '<script>
						document.getElementById("mileage").style.borderColor = "red";
					</script>';

            $all_clear += 1;
        } else {
            echo '<script>
						document.getElementById("mileage").style.borderColor = "green";
					</script>';
        }


        /*
          Inserts data into the database if everything is clear
         */
        if ($all_clear == 0) {

            //echo  $cust_idno ." || " .$car_reg_num ." || " .$car_make ." || " .$vehicle_type ." || " .$car_model ." || " .$car_year ." || " .$car_colour ." || " .$vin_number ." || " .$car_mileage;


            if (save_vehicle($cust_idno, $car_reg_num, $car_make, $vehicle_type, $car_model, $car_year, $car_colour, $vin_number, $car_mileage) == true) {
                echo "<script> 
						document.getElementById('reg_num').value = '';
						document.getElementById('make').value = '';
						document.getElementById('vehicle_type').value = '';
						document.getElementById('model').value = '';
						document.getElementById('year').value = '';
						document.getElementById('colour').value = '';
						document.getElementById('vin_num').value = '';
						document.getElementById('mileage').value = '';
						document.getElementById('btnsave').value = '';

						document.getElementById('HexInput1').disabled = true;
						document.getElementById('HexInput2').disabled = true;
						document.getElementById('HexInput2').checked = true;
						document.getElementById('btnnext').disabled = false;

             document.getElementById('HexInput2').checked ='true'; 
                document.getElementById('HexInput1').checked ='false';
        
                document.getElementById('btnsave').disabled = true;
                document.getElementById('reg_num').disabled = true;
                document.getElementById('make').disabled = true;
                document.getElementById('model').disabled = true;
                document.getElementById('year').disabled = true;
                document.getElementById('colour').disabled = true;
                document.getElementById('vehicle_type').disabled = true;
                document.getElementById('vin_num').disabled = true;
                document.getElementById('mileage').disabled = true;
                document.getElementById('btnnext').disabled = false;
                 document.getElementById('btnsearch').disabled = true;
                document.getElementById('search_id').disabled = true;
                
						var div = document.getElementById('msg');
                                                div.style.display = 'block';
                                                div.style.visibility = 'visible';
					</script>";
            }
        } else {
            echo "<script>
					document.getElementById('HexInput2').checked = true;

					document.getElementById('reg_num').disabled = false;
					document.getElementById('make').disabled = false;
					document.getElementById('vehicle_type').disabled = false;
					document.getElementById('model').disabled = false;
					document.getElementById('year').disabled = false;
					document.getElementById('colour').disabled = false;
					document.getElementById('vin_num').disabled = false;
					document.getElementById('mileage').disabled = false;
					document.getElementById('btnsave').disabled = false;

					document.getElementById('btnnext').disabled = true;
				</script>";
        }
    }
    ?>
    <?php
    /*
      The code below is for when the customer exists
      The existing customer will be searched when the employee clicks the search button
      Data returned by the search is then populated onto all relevant input fields
     */

    if (isset($_POST['btnsearch'])) {
        //echo "<script> alert('Ready to search'); </script>";
        $idno = $_POST['search_id'];

        if (search_vehicle($idno) == true) {
            $vin_number = $idno;
            $reg_num = getRegNumber();
            $make = getMake();
            $model = getModel();
            $engine_size = getEngineSize();
            $vehicle_type = getVehicleType();
            $colour = getColour();
            $mileage = getMileage();
            $cust_id = getCustID();

            echo '<script> 
										document.getElementById("idno").value ="" 
									</script>';


            echo '<script> 
										document.getElementById("btnbalance").disabled =false 
									</script>';


            echo '<script> 
										document.getElementById("search_id").value ="' . $idno . '" 
									</script>';

            //$_SESSION['id_no'] = $idno;
            echo '<script> 
										document.getElementById("HexInput1").checked = true;
										document.getElementById("HexInput2").checked = false; 
									</script>';

            echo '<script> 
										document.getElementById("reg_num").value ="' . $reg_num . '" 
									</script>';

            echo '<script> 
										document.getElementById("make").value ="' . $make . '" 
									</script>';

            echo '<script> 
										document.getElementById("vehicle_type").value ="' . $vehicle_type . '" 
									</script>';
            echo '<script> 
										document.getElementById("model").value ="' . $model . '" 
									</script>';

            echo '<script> 
										document.getElementById("year").value ="' . $engine_size . '" 
									</script>';
            echo '<script> 
										document.getElementById("vin_num").value ="' . $vin_number . '" 
									</script>';
            echo '<script> 
										document.getElementById("colour").value ="' . $colour . '" 
									</script>';
            echo '<script> 
										document.getElementById("mileage").value ="' . $mileage . '" 
									</script>';
            echo '<script> 
										document.getElementById("cust_idno").value ="' . $cust_id . '" 
									</script>';




            echo '<script> 
										document.getElementById("idno").disabled = true;
				
										</script>';
        } else {
            echo "<script type='text/javascript'>alert('Not Found');</script>";
        }
    }
    ?>
    <?php
    $query = "SELECT * from customer WHERE idnumber=" . $cust_idno;
    $result = mysqli_query($conn, $query);
    while ($rows2 = mysqli_fetch_array($result)) {
        $customer_id = $rows2['customer_id'];
    }
    $query2 = "SELECT * from vehicle WHERE customer_no=" . $customer_id . "";
    $result2 = mysqli_query($conn, $query2);

    if (mysqli_num_rows($result2) <= 0) {
        echo"<script language='JavaScript' type='text/javascript'>
                document.getElementById('HexInput1').checked ='false'; 
                document.getElementById('HexInput2').checked ='true';
                document.getElementById('HexInput1').disabled ='true';
                document.getElementById('btnsave').disabled = false;
                document.getElementById('reg_num').disabled = false;
                document.getElementById('make').disabled = false;
                document.getElementById('model').disabled = false;
                document.getElementById('year').disabled = false;
                document.getElementById('colour').disabled = false;
                document.getElementById('vehicle_type').disabled = false;
                document.getElementById('vin_num').disabled = false;
                document.getElementById('mileage').disabled = false;
                document.getElementById('btnsearch').disabled = true;
                document.getElementById('search_id').disabled = true;
                document.getElementById('btnnext').disabled = true;
    </script>";
    } else {
        echo"<script language='JavaScript' type='text/javascript'>
             document.getElementById('HexInput2').checked ='true'; 
                document.getElementById('HexInput1').checked ='false';
        
                document.getElementById('btnsave').disabled = true;
                document.getElementById('reg_num').disabled = true;
                document.getElementById('make').disabled = true;
                document.getElementById('model').disabled = true;
                document.getElementById('year').disabled = true;
                document.getElementById('colour').disabled = true;
                document.getElementById('vehicle_type').disabled = true;
                document.getElementById('vin_num').disabled = true;
                document.getElementById('mileage').disabled = true;
                document.getElementById('btnnext').disabled = false;
                </script>";
    }
    ?>
    <script src="jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script language="JavaScript" type="text/javascript">
                        function getBookingPage() {
                            window.location.href = "booking.php?cst=" + <?php echo $cust_idno; ?>;
                        }
    </script>

    <script language="JavaScript" type="text/javascript">
        function getMainPage() {
            window.location.href = "main.php";
        }
    </script>
    <script type="text/javascript">
        function numberValidate(input) {
            var regex = /[^0-9]/g;

            input.value = input.value.replace(regex, "");


        }
    </script>


    <script language="JavaScript" type="text/javascript">

        var value = "";

        function update(val) {
            value = val;

            if (value == "existingcar") {
                document.getElementById("btnsave").disabled = true;
                document.getElementById("reg_num").disabled = true;
                document.getElementById("make").disabled = true;
                document.getElementById("model").disabled = true;
                document.getElementById("year").disabled = true;
                document.getElementById("colour").disabled = true;
                document.getElementById("vehicle_type").disabled = true;
                document.getElementById("vin_num").disabled = true;
                document.getElementById("mileage").disabled = true;
                document.getElementById('btnnext').disabled = false;
            } else {
                document.getElementById("btnsave").disabled = false;
                document.getElementById("reg_num").disabled = false;
                document.getElementById("make").disabled = false;
                document.getElementById("model").disabled = false;
                document.getElementById("year").disabled = false;
                document.getElementById("colour").disabled = false;
                document.getElementById("vehicle_type").disabled = false;
                document.getElementById("vin_num").disabled = false;
                document.getElementById("mileage").disabled = false;
                document.getElementById('btnsearch').disabled = true;
                document.getElementById('search_id').disabled = true;
                document.getElementById('btnnext').disabled = true;
            }
        }

        function getVal() {
            return value;
        }
    </script>
    <script language="JavaScript" type="text/javascript">

        var value = "";

        function update2(val) {
            value = val;

            if (value == "existingcar") {
                document.getElementById("btnsave").disabled = true;
                document.getElementById("reg_num").disabled = true;
                document.getElementById("make").disabled = true;
                document.getElementById("model").disabled = true;
                document.getElementById("year").disabled = true;
                document.getElementById("colour").disabled = true;
                document.getElementById("vehicle_type").disabled = true;
                document.getElementById("vin_num").disabled = true;
                document.getElementById("mileage").disabled = true;
                document.getElementById('btnnext').disabled = false;
            } else {
                document.getElementById("btnsave").disabled = false;
                document.getElementById("reg_num").disabled = false;
                document.getElementById("make").disabled = false;
                document.getElementById("model").disabled = false;
                document.getElementById("year").disabled = false;
                document.getElementById("colour").disabled = false;
                document.getElementById("vehicle_type").disabled = false;
                document.getElementById("vin_num").disabled = false;
                document.getElementById("mileage").disabled = false;
                document.getElementById('btnsearch').disabled = true;
                document.getElementById('search_id').disabled = true;
                document.getElementById('btnnext').disabled = true;
            }
        }

        function getVal() {
            return value;
        }
    </script>
</body>
</html>