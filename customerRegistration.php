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
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" >
            <div class="container" id="banner" >
                <div class="col-lg-offset-5"  >
                    <a class="navbar-brand" href="">
                        <h1>Customer</h1>
                    </a>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>

        <br><br>

        <div class="container">
            <div id="msg" class="alert alert-success alert-dismissable" style="display:none;" style="visibility:hidden;"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Customer Captured Successfully.</div>
            <div class="panel panel-default">
                <div class="panel-body">

                    <!-- Start of search form -->

                    

                    <!-- End of search form -->

                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">Customer Details</div>
                <div class="panel-body">

                    <!-- Start of registration form -->

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <label class="control-label" for="HexInput1"> 
                            &nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput1" checked="true" value="RSA"> South African
                            &nbsp&nbsp&nbsp&nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput2" value="Other"> Non South African</label>

                        <div class="row">

                            <div class="col-md-2 padding-top-10">
                                <input type="text" maxlength="13" class="form-control" name="idno" id="idno" placeholder="ID Number" required="true" value="<?php
                                if (isset($_POST['idno'])) {
                                    echo $_POST['idno'];
                                }
                                ?>"  onkeyup="generateGender(this)" />
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <input type="text" class="form-control" name="passportno" id="passportno" placeholder="Passport Number" disabled="true" required="true" value="<?php
                                if (isset($_POST['passportno'])) {
                                    echo $_POST['passportno'];
                                }
                                ?>" />
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <input type="text" class="form-control" name="firstname"  id="firstname" placeholder="First Name" required="true" value="<?php
                                if (isset($_POST['firstname'])) {
                                    echo $_POST['firstname'];
                                }
                                ?>" />
                            </div>

                            <div class="col-md-3 padding-top-10">
                                <input type="text" class="form-control" name="surname" id="surname" placeholder="Surname" required="true" value="<?php
                                if (isset($_POST['surname'])) {
                                    echo $_POST['surname'];
                                }
                                ?>" />
                            </div>


                            <div class="col-md-3 padding-top-10">

                                <div class="row">
                                    <div class="col-md-12 padding-top-5">
                                        <label><input type="radio" name="radgender" id="radmale" value="Male"> Male

                                            &nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="radgender" id="radfemale" value="Female"> Female</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <label for="address1" class="control-label padding-top-10">Street Address:</label>
                        <div class="row">
                            <div class="col-md-12"> 
                                <input type="text" class="form-control" name="address1" id="address1" placeholder="Street Address" required="true" value="<?php
                                if (isset($_POST['address1'])) {
                                    echo $_POST['address1'];
                                }
                                ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 padding-top-10">
                                <label for="city" class="control-label">City:</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City" required="true" value="<?php
                                if (isset($_POST['city'])) {
                                    echo $_POST['city'];
                                }
                                ?>" />
                            </div>

                            <div class="col-md-4 padding-top-10">
                                <label for="province" class="control-label">Province:</label>

                                <select name="cust-province"  id="cust-province" class="form-control" required="true">
                                    <option value="<?php
                                    if (isset($_POST['cust-province'])) {
                                        echo $_POST['cust-province'];
                                    }
                                    ?>"><?php
                                                if (isset($_POST['cust-province'])) {
                                                    echo $_POST['cust-province'];
                                                }
                                                ?></option>
                                    <option value="Limpopo">Limpopo</option>
                                    <option value="Gauteng">Gauteng</option>
                                    <option value="Free State">Free State</option>
                                    <option value="North West">North West</option>
                                    <option value="Mpumalanga">Mpumalanga</option>
                                    <option value="Eastern Cape">Eastern Cape</option>
                                    <option value="Western Cape">Western Cape</option>
                                    <option value="Northern Cape">Northern Cape</option>
                                    <option value="KwaZulu Natal">KwaZulu Natal</option>
                                </select>
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <label for="areacode" class="control-label">Area code:</label>
                                <input type="text" maxlength="4" class="form-control" name="areacode" id="areacode" placeholder="Area code" required="true" value="<?php
                                if (isset($_POST['areacode'])) {
                                    echo $_POST['areacode'];
                                }
                                ?>" onkeyup="numberValidate(this)"/>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 padding-top-10">
                                <label for="phone" class="control-label">Phone Number Enter:</label>
                                <input type="text" maxlength="10" class="form-control" name="phone" id="phone" placeholder="Phone Number" required="true"  value="<?php
                                if (isset($_POST['phone'])) {
                                    echo $_POST['phone'];
                                }
                                ?>" onkeyup="numberValidate(this)"/>
                            </div>

                            <div class="col-md-6 padding-top-10">
                                <label for="email" class="control-label">Email Address:</label>
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email address" required="true" value="<?php
                                if (isset($_POST['email'])) {
                                    echo $_POST['email'];
                                }
                                ?>" />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 padding-top-10">
                                <button type="submit" name="submit" id="regsubmit" class="btn btn-success" style="width: 255px">&nbsp Save &nbsp</button>
                            </div>

                            <div class="col-md-1 padding-top-10">
                            </div>
                            
                          

                            <div class="col-md-2 padding-top-10">
                                <button type="button" name="btnnext" id="btnnext" class="btn btn-info" onclick="getVehiclePage()" style="width: 255px" disabled="true">&nbsp Login &nbsp</button>
                            </div>

                            <div class="col-md-1 padding-top-10">
                            </div>

                            <div class="col-md-2 padding-top-10">
                                <button type="button" name="btncancel" id="btncancel" class="btn btn-danger" onclick="getMainPage()" style="width: 160px">&nbsp Cancel &nbsp</button>
                            </div>
                        </div>
                    </form>

                    <!-- End of registration form -->

                </div>
            </div>
        </div>

        <div class="container" align="center">

            <!-- Start of PHP programming -->

            <?php
            echo "<br>";

            $all_clear = 0;

            if (isset($_POST['submit'])) {
                $idno = "";
                $idokay = false;
                $firstname = "";
                $surname = "";
                $gender = "";
                $addressline1 = "";
                $city = "";
                $province = "";
                $areacode = "";
                $phonenumber = "";
                $emailaddress = "";

                if (isset($_POST['passportno'])) {

                    /*
                      Non South African citizen
                     */

                    $idno = $_POST['passportno'];

                    if (validate_passport($idno) == false) {
                        echo '<script>
							document.getElementById("passportno").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("passportno").style.borderColor = "green";
						</script>';
                    }

                    if (validate_firstname($_POST['firstname']) == false) {
                        echo '<script>
							document.getElementById("firstname").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("firstname").style.borderColor = "green";
						</script>';
                    }

                    if (validate_surname($_POST['surname']) == false) {
                        echo '<script>
							document.getElementById("surname").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("surname").style.borderColor = "green";
						</script>';
                    }

                    if (validate_address($_POST['address1']) == false) {
                        echo '<script>
							document.getElementById("address1").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("address1").style.borderColor = "green";
						</script>';
                    }

                    if (validate_city($_POST['city']) == false) {
                        echo '<script>
							document.getElementById("city").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("city").style.borderColor = "green";
						</script>';
                    }

                    if (validate_province($_POST['cust-province']) == false) {
                        echo '<script>
							document.getElementById("cust-province").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("cust-province").style.borderColor = "green";
						</script>';
                    }

                    if (validate_areacode($_POST['areacode']) == false) {
                        echo '<script>
							document.getElementById("areacode").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("areacode").style.borderColor = "green";
						</script>';
                    }

                    if (validate_phone($_POST['phone']) == false) {
                        echo '<script>
							document.getElementById("phone").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("phone").style.borderColor = "green";
						</script>';
                    }

                    if (validate_email($_POST['email']) == false) {
                        echo '<script>
							document.getElementById("email").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("email").style.borderColor = "green";
						</script>';
                    }

                    if ($all_clear == 0) {

                        $firstname = $_POST['firstname'];
                        $surname = $_POST['surname'];
                        $addressline1 = $_POST['address1'];
                        $city = $_POST['city'];
                        $province = $_POST['cust-province'];
                        $areacode = $_POST['areacode'];
                        $phonenumber = $_POST['phone'];
                        $emailaddress = strtolower($_POST['email']);

                        if (isset($_POST['radgender'])) {
                            $gender = $_POST['radgender'];

                            //echo $idno ." || " .$firstname ." || " .$surname ." || " .$addressline1 ." || " .$city ." || " .$province ." || " .$areacode ." || " .$phonenumber ." || " .$emailaddress ." || " .$gender;


                            if (save_sa_cust($firstname, $surname, $gender, $idno, $addressline1, $city, $province, $areacode, $phonenumber, $emailaddress) == true) {
                                echo '<div class="alert alert-success" role="alert">Customer registered successfully..</div>';

                                echo '<script> 
										document.getElementById("passportno").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("idno").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("firstname").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("surname").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("address1").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("city").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("cust-province").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("areacode").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("phone").value ="" 
									</script>';

                                echo '<script> 
										document.getElementById("email").value ="" 
									</script>';
                            }

                            echo "<script>

										document.getElementById('HexInput2').checked = true;

										document.getElementById('idno').disabled = true;
										document.getElementById('passportno').disabled = true;
										document.getElementById('firstname').disabled = true;
										document.getElementById('surname').disabled = true;
										document.getElementById('address1').disabled = true;
										document.getElementById('city').disabled = true;
										document.getElementById('cust-province').disabled = true;
										document.getElementById('areacode').disabled = true;
										document.getElementById('phone').disabled = true;
										document.getElementById('email').disabled = true;
										document.getElementById('radmale').disabled = true;
										document.getElementById('radfemale').disabled = true;
										document.getElementById('HexInput1').disabled = true;
										document.getElementById('HexInput2').disabled = true;
										document.getElementById('regsubmit').disabled = true;
										document.getElementById('btnnext').disabled = false;
									</script>";

                            if ($gender == "Female") {
                                echo "<script>
											document.getElementById('radfemale').checked = true;
											document.getElementById('radmale').checked = false;
										</script>";
                            } else {
                                echo "<script>
											document.getElementById('radmale').checked = true;
											document.getElementById('radfemale').checked = false;
										</script>";
                            }
                        }
                    }
                } else {

                    /*
                      South African citizen
                     */
                    $idno = $_POST['idno'];

                    if (validate_id($idno) == false) {
                        echo '<script>
							document.getElementById("idno").style.borderColor = "red";
						</script>';

                        echo '<script> 
									document.getElementById("radfemale").style.visibility = "visible";
									document.getElementById("radmale").style.visibility = "visible";
									document.getElementById("radfemale").checked = false;
									document.getElementById("radmale").checked = false;
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("idno").style.borderColor = "green";
						</script>';

                        $intgen = substr($idno, 6, 4);
                        $intval = 5000;

                        if ($intgen < $intval) {
                            $gender = "Female";
                            echo '<script> 
									document.getElementById("radfemale").style.visibility = "visible";
									document.getElementById("radfemale").checked = true;
								</script>';
                        } else {
                            $gender = "Male";
                            echo '<script> 
									document.getElementById("radmale").style.visibility = "visible";
									document.getElementById("radmale").checked = true;
								</script>';
                        }
                    }


                    if (validate_firstname($_POST['firstname']) == false) {
                        echo '<script>
							document.getElementById("firstname").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("firstname").style.borderColor = "green";
						</script>';
                    }

                    if (validate_surname($_POST['surname']) == false) {
                        echo '<script>
							document.getElementById("surname").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("surname").style.borderColor = "green";
						</script>';
                    }

                    if (validate_address($_POST['address1']) == false) {
                        echo '<script>
							document.getElementById("address1").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("address1").style.borderColor = "green";
						</script>';
                    }

                    if (validate_city($_POST['city']) == false) {
                        echo '<script>
							document.getElementById("city").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("city").style.borderColor = "green";
						</script>';
                    }

                    if (validate_province($_POST['cust-province']) == false) {
                        echo '<script>
							document.getElementById("cust-province").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("cust-province").style.borderColor = "green";
						</script>';
                    }

                    if (validate_areacode($_POST['areacode']) == false) {
                        echo '<script>
							document.getElementById("areacode").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("areacode").style.borderColor = "green";
						</script>';
                    }

                    if (validate_phone($_POST['phone']) == false) {
                        echo '<script>
							document.getElementById("phone").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("phone").style.borderColor = "green";
						</script>';
                    }

                    if (validate_email($_POST['email']) == false) {
                        echo '<script>
							document.getElementById("email").style.borderColor = "red";
						</script>';

                        $all_clear += 1;
                    } else {
                        echo '<script>
							document.getElementById("email").style.borderColor = "green";
						</script>';
                    }

                    if ($all_clear == 0) {

                        $firstname = $_POST['firstname'];
                        $surname = $_POST['surname'];
                        $addressline1 = $_POST['address1'];
                        $city = $_POST['city'];
                        $province = $_POST['cust-province'];
                        $areacode = $_POST['areacode'];
                        $phonenumber = $_POST['phone'];
                        $emailaddress = strtolower($_POST['email']);

                        //echo $idno ." || " .$firstname ." || " .$surname ." || " .$addressline1 ." || " .$city ." || " .$province ." || " .$areacode ." || " .$phonenumber ." || " .$emailaddress  ." || " .$gender;

                        if (save_sa_cust($firstname, $surname, $gender, $idno, $addressline1, $city, $province, $areacode, $phonenumber, $emailaddress) == true) {
                            echo '<div class="alert alert-success" role="alert">Customer registered successfully..</div>';

                            echo '<script> 
										document.getElementById("idno").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("firstname").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("surname").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("address1").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("city").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("cust-province").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("areacode").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("phone").value ="" 
									</script>';

                            echo '<script> 
										document.getElementById("email").value ="" 
									</script>';

                            echo '<script>
										document.getElementById("radmale").checked = true
										document.getElementById("radfemale").checked = true
										document.getElementById("radmale").style.visibility = "hidden"
										document.getElementById("radfemale").style.visibility = "hidden";
									</script>';
                        }

                        echo "<script>
										document.getElementById('HexInput1').checked = true;

										document.getElementById('idno').disabled = true;
										document.getElementById('passportno').disabled = true;
										document.getElementById('firstname').disabled = true;
										document.getElementById('surname').disabled = true;
										document.getElementById('address1').disabled = true;
										document.getElementById('city').disabled = true;
										document.getElementById('cust-province').disabled = true;
										document.getElementById('areacode').disabled = true;
										document.getElementById('phone').disabled = true;
										document.getElementById('email').disabled = true;
										document.getElementById('radmale').disabled = true;
										document.getElementById('radfemale').disabled = true;
										document.getElementById('HexInput1').disabled = true;
										document.getElementById('HexInput2').disabled = true;
										document.getElementById('regsubmit').disabled = true;
										document.getElementById('btnnext').disabled = false;
                                                                                var div = document.getElementById('msg');
                                                                                div.style.display = 'block';
                                                                                div.style.visibility = 'visible';
									</script>";
                    } else {


                        /* if ($gender == "Female") {
                          # code...
                          }
                          echo "<script>
                          document.getElementById('radgender').checked = true
                          document.getElementById('radmale').style.visibility = 'visible'
                          document.getElementById('radfemale').style.visibility = 'visible'
                          </script>";
                         */
                    }
                }
            }
            ?>
            <!-- End of PHP programming -->		


            <?php
            /*
              The code below is for when the customer exists
              The existing customer will be searched when the employee clicks the search button
              Data returned by the search is then populated onto all relevant input fields
             */

            if (isset($_POST['btnsearch'])) {
                //echo "<script> alert('Ready to search'); </script>";
                $idno = $_POST['search_id'];

                if (search_customer($idno) == true) {

                    $firstname = getFirstName();
                    $surname = getSurname();
                    $gender = getGender();
                    $street = getStreetAddress();
                    $city = getCity();
                    $province = getProvince();
                    $areacode = getArea_Code();
                    $phonenumber = getPhoneNo();
                    $email = getEmail();

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
										document.getElementById("HexInput1").checked = false;
										document.getElementById("HexInput2").checked = false; 
									</script>';

                    echo '<script> 
										document.getElementById("firstname").value ="' . $firstname . '" 
									</script>';

                    echo '<script> 
										document.getElementById("surname").value ="' . $surname . '" 
									</script>';

                    if ($gender == "Female") {
                        echo '<script> 
												document.getElementById("radfemale").checked = true;
										</script>';
                    } else {
                        echo '<script> 
												document.getElementById("radmale").checked = true;
										</script>';
                    }

                    echo '<script> 
										document.getElementById("phone").value ="' . $phonenumber . '" 
									</script>';

                    echo '<script> 
										document.getElementById("email").value ="' . $email . '" 
									</script>';

                    echo '<script> 
										document.getElementById("address1").value ="' . $street . '" 
									</script>';

                    echo '<script> 
										document.getElementById("city").value ="' . $city . '" 
									</script>';

                    echo '<script> 
										document.getElementById("cust-province").value ="' . $province . '" 
									</script>';

                    echo '<script> 
										document.getElementById("areacode").value ="' . $areacode . '" 
									</script>';

                    echo '<script> 
										document.getElementById("HexInput4").checked = true;
										</script>';


                    echo '<script> 
										document.getElementById("idno").disabled = true;
					document.getElementById("passportno").disabled = true;
					document.getElementById("firstname").disabled = true;
					document.getElementById("surname").disabled = true;
					document.getElementById("address1").disabled = true;
					document.getElementById("city").disabled = true;
					document.getElementById("cust-province").disabled = true;
					document.getElementById("areacode").disabled = true;
					document.getElementById("phone").disabled = true;
					document.getElementById("email").disabled = true;
					document.getElementById("radmale").disabled = true;
					document.getElementById("radfemale").disabled = true;
					document.getElementById("HexInput1").disabled = true;
					document.getElementById("HexInput2").disabled = true;
					document.getElementById("regsubmit").disabled = true;
					document.getElementById("btnnext").disabled = false;
					document.getElementById("search_id").disabled = false;
					document.getElementById("btnsearch").disabled = false;
										</script>';
                } else {
                    echo "<script type='text/javascript'>alert('Not Found');</script>";
                }
            }
            ?>
        </div>

        <script type="text/javascript">
            function generateGender(input) {
                var regex = /[^0-9]/g;

                input.value = input.value.replace(regex, "");

                var val = input.value;

                var n = val.length;

                if (n >= 13) {
                    var gen = val.substring(10, 6);

                    var intval = 5000;

                    if (gen < intval) {
                        //document.getElementById("radfemale").style.visibility = "visible";
                        document.getElementById("radfemale").checked = true;

                    } else {
                        //document.getElementById("radmale").style.visibility = "visible";
                        document.getElementById("radmale").checked = true;
                    }
                }
            }
        </script>

        <script type="text/javascript">
            function numberValidate(input) {
                var regex = /[^0-9]/g;

                input.value = input.value.replace(regex, "");


            }
        </script>

        <script src="jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <script language="JavaScript" type="text/javascript">
            function getVehiclePage() {
                window.location.href = "index1.php";
            }
        </script>

        <script language="JavaScript" type="text/javascript">
            function getMainPage() {
                window.location.href = "index1.php";
            }
        </script>

        <script language="JavaScript" type="text/javascript">

            function getGender(val) {
                return val;
            }
        </script>


        <script language="JavaScript" type="text/javascript">
            var value = "";
            //document.getElementById("radmale").style.visibility = 'hidden';
            //document.getElementById("radfemale").style.visibility = 'hidden';
            function update(val) {
                value = val;

                if (value == "RSA") {
                    document.getElementById("idno").disabled = false;
                    document.getElementById("idno").required = true;

                    document.getElementById("passportno").disabled = true;
                    document.getElementById("passportno").required = false;
                    document.getElementById("passportno").value = "";

                    document.getElementById("radmale").style.visibility = 'hidden';
                    document.getElementById("radfemale").style.visibility = 'hidden';
                } else {
                    document.getElementById("idno").disabled = true;
                    document.getElementById("idno").required = false;
                    document.getElementById("idno").value = "";

                    document.getElementById("passportno").disabled = false;
                    document.getElementById("passportno").required = true;

                    document.getElementById("radmale").style.visibility = 'visible';
                    document.getElementById("radfemale").style.visibility = 'visible';
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

                if (value == "existingcustomer") {
                    document.getElementById('idno').disabled = true;
                    document.getElementById('passportno').disabled = true;
                    document.getElementById('firstname').disabled = true;
                    document.getElementById('surname').disabled = true;
                    document.getElementById('address1').disabled = true;
                    document.getElementById('city').disabled = true;
                    document.getElementById('cust-province').disabled = true;
                    document.getElementById('areacode').disabled = true;
                    document.getElementById('phone').disabled = true;
                    document.getElementById('email').disabled = true;
                    document.getElementById('radmale').disabled = true;
                    document.getElementById('radfemale').disabled = true;
                    document.getElementById('HexInput1').disabled = true;
                    document.getElementById('HexInput2').disabled = true;
                    document.getElementById('regsubmit').disabled = true;
                    document.getElementById('btnnext').disabled = true;
                    document.getElementById('search_id').disabled = false;
                    document.getElementById('btnsearch').disabled = false;

                } else {
                    document.getElementById('idno').disabled = false;
                    document.getElementById('passportno').disabled = true;
                    document.getElementById('firstname').disabled = false;
                    document.getElementById('surname').disabled = false;
                    document.getElementById('address1').disabled = false;
                    document.getElementById('city').disabled = false;
                    document.getElementById('cust-province').disabled = false;
                    document.getElementById('areacode').disabled = false;
                    document.getElementById('phone').disabled = false;
                    document.getElementById('email').disabled = false;
                    document.getElementById('radmale').disabled = false;
                    document.getElementById('radfemale').disabled = false;
                    document.getElementById('HexInput1').disabled = false;
                    document.getElementById('HexInput1').checked = true;
                    document.getElementById('HexInput2').disabled = false;
                    document.getElementById('regsubmit').disabled = false;
                    document.getElementById('btnnext').disabled = false;
                    document.getElementById('search_id').disabled = true;
                    document.getElementById('btnsearch').disabled = true;

                }
            }
            function getVal() {
                return value;
            }
        </script>
    </body>
</html>