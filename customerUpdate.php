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
	
		 <div class="container" id="navigationbar">
	        <ul class="nav navbar-nav navbar-right">
	          <ul class="breadcrumb list-inline">
                      <li><a class="active" href=""><span class="glyphicon glyphicon-user"></span> Customer: <?php echo $_SESSION['login']?></a></li>
	            <li><a  class="active" href="main2.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
	            <!--<li><a href="#">Customer</a></li>
	            <li><a  class="active" href="#">Book Service</a></li>-->
	            <li><a href="index.php"><span class="glyphicon glyphicon-off"></span>&nbspLogout </a></li>
	          </ul>
	        </ul>
	      </div>

	      <br><br><br><br>

          		</ul>
       	 	</ul>
      </div>

		<div class="container">
			
			
			<div class="panel panel-default">
				<div class="panel-heading">Retrieve My details</div>
				<div class="panel-body">

					<!-- Start of search form -->

					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<label class="control-label" for="HexInput1"> 
						&nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput1" checked="true" value="RSA"> South African
						&nbsp&nbsp&nbsp&nbsp&nbsp<input onclick="update(this.value);" type="radio" name="data[hexInput]" id="HexInput2" value="Other"> Non South African</label>

						<div class="row">

							<div class="col-md-2 padding-top-10">
								<input type="text" maxlength="13" class="form-control" name="idno" id="idno" placeholder="ID Number" required="true" />
							</div>

							<div class="col-md-2 padding-top-10">
								<input type="text" class="form-control" name="passportno" id="passportno" placeholder="Passport Number" disabled="true" required="true" />
							</div>

							<div class="col-md-2 padding-top-10">
								<button type="submit" name="submit" id="btnsearch" class="btn btn-info">&nbsp Retrieve &nbsp</button>
							</div>
							
							<div class="col-md-3 padding-top-10"></div>


							<div class="col-md-3 padding-top-10"></div>
						</div>
					</form>

					<!-- End of search form -->

				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">Update My details</div>
				<div class="panel-body">

					<!-- Start of Customer details form -->

					<form name="edtform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

								<div class="row" id="marg-top-50">
									<div class="col-md-6">
										<div class="row">
											<div class="col-md-4 padding-top-5">
												ID Number
											</div>

											<div class="col-md-6">
												<input type="text" class="form-control" name="idno2" id="idno2" required="true" value="<?php if (isset($_POST['idno2'])) {
										echo $_POST['idno2'];
								} ?>" readonly />
											</div>
										</div>


										<div class="row">
											<div class="col-md-4 padding-top-10">
												First Name
											</div>

											<div class="col-md-6 padding-top-5">
												<input type="text" maxlength="60" class="form-control" name="firstname" id="firstname" required="true" value="<?php if (isset($_POST['firstname'])) {
										echo $_POST['firstname'];
								} ?>" />
											</div>
										</div>


										<div class="row">
											<div class="col-md-4 padding-top-10">
												Surname
											</div>
											<div class="col-md-6 padding-top-5">
												<input type="text" class="form-control" name="surname" id="surname" required="true" value="<?php if (isset($_POST['surname'])) {
										echo $_POST['surname'];
								} ?>" />
											</div>
										</div>
								

										<div class="row">
											<div class="col-md-4 padding-top-10">
												Gender
											</div>
											<div class="col-md-6 padding-top-5">
												<input type="text" maxlength="10" class="form-control" name="gender" id="gender" required="true" value="<?php if (isset($_POST['gender'])) {
										echo $_POST['gender'];
								} ?>" readonly />
											</div>
										</div>
								
							
										<div class="row">
											<div class="col-md-4 padding-top-10">
												Contact Number
											</div>
											<div class="col-md-6 padding-top-5">
												<input type="text" class="form-control" name="phone" id="phone" required="true" value="<?php if (isset($_POST['phone'])) {
										echo $_POST['phone'];
								} ?>" />
											</div>
										</div>


										<div class="row">
											<div class="col-md-4 padding-top-10">
												E-Mail
											</div>
											<div class="col-md-6 padding-top-5">
												<input type="text" class="form-control" name="email" id="email"  required="true" value="<?php if (isset($_POST['email'])) {
										echo $_POST['email'];
								} ?>" />
											</div>
										</div>
									</div>



									<div class="col-md-6">

										<div class="row padding-bottom-5">
											<div class="col-md-3 padding-top-5">
												
											</div>

											<div class="col-md-6">
													<h4>Customer Address</h4>
											</div>
										</div>

										<div class="row padding-top-10">
											<div class="col-md-3 padding-top-5">
												Street
											</div>

											<div class="col-md-6">
													<input type="text" class="form-control" name="street" id="street" required="true"  value="<?php if (isset($_POST['street'])) {
										echo $_POST['street'];
								} ?>" />
											</div>
										</div>


										<div class="row">
											<div class="col-md-3 padding-top-10">
												City
											</div>

											<div class="col-md-6 padding-top-5">
												<input type="text" maxlength="60" class="form-control" name="city" id="city" required="true" value="<?php if (isset($_POST['city'])) {
										echo $_POST['city'];
								} ?>" />
											</div>
										</div>


										<div class="row">
											<div class="col-md-3 padding-top-10">
												Province
											</div>
											<div class="col-md-6 padding-top-5">
												<select name="cust-province"  id="cust-province" class="form-control" required="true">
													<option value="<?php if (isset($_POST['cust-province'])) {
														echo $_POST['cust-province'];
												} ?>"><?php if (isset($_POST['cust-province'])) {
														echo $_POST['cust-province'];
												} ?></option>
													<option value="Limpopo">Limpopo</option>
													<option value="Gauteng">Gauteng</option>
													<option value="Free State">Free State</option>
													<option value="North West">North West</option>
													<option value="Mpumalanga">Mpumalanga</option>
													<option value="Eastern Cape">Eastern Cape</option>
													<option value="Western Cape">Western Cape</option>
													<option value="Northern Cape">Northern Cape</option>
													<option value="KwaZulu-Natal">KwaZulu-Natal</option>
												</select>
											</div>
										</div>
								

										<div class="row">
											<div class="col-md-3 padding-top-10">
												Area Code
											</div>
											<div class="col-md-6 padding-top-5">
												<input type="text" maxlength="10" class="form-control" name="areacode" id="areacode" required="true" value="<?php if (isset($_POST['areacode'])) {
										echo $_POST['areacode'];
								} ?>" />
											</div>
										</div>
									</div>
								</div>

						
								<div class="row padding-top-10">
									<div class="col-md-2 padding-top-10">
										<button type="submit" name="btnsave" id="btnsave" class="btn btn-success"> Save Changes </button>
									</div>
								</div>	

						</form>


						<script> 
							document.getElementById("btnsave").disabled =true;
						</script>
					<!-- End of registration form -->


				<?php
				if (isset($_POST['btnbalance'])) {
					include 'modal_balance.php';
				}

				


				echo "<br>";

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
						$idno = $_POST['passportno'];

						if (validate_passport($idno) == true){
							//$idokay = true;
						}

					}else{
						$idno = $_POST['idno'];

						if (validate_id($idno) == true){
						
							if(search_customer($idno) == true){

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
										document.getElementById("idno2").value ="' .$idno .'" 
									</script>';

									$_SESSION['id_no'] = $idno;

									echo '<script> 
										document.getElementById("firstname").value ="' .$firstname  .'" 
									</script>';

									echo '<script> 
										document.getElementById("surname").value ="' .$surname  .'" 
									</script>';

									echo '<script> 
										document.getElementById("gender").value ="' .$gender  .'" 
									</script>';

									echo '<script> 
										document.getElementById("phone").value ="' .$phonenumber  .'" 
									</script>';

									echo '<script> 
										document.getElementById("email").value ="' .$email  .'" 
									</script>';

									echo '<script> 
										document.getElementById("street").value ="' .$street  .'" 
									</script>';

									echo '<script> 
										document.getElementById("city").value ="' .$city  .'" 
									</script>';

									echo '<script> 
										document.getElementById("cust-province").value ="' .$province  .'" 
									</script>';

									echo '<script> 
										document.getElementById("areacode").value ="' .$areacode  .'" 
									</script>';

									echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

							}else{
								echo "<script type='text/javascript'>alert('Not Found');</script>";
							}		
						}
					}
				}



				if (isset($_POST['btnsubmit_balance'])) {
					$amount = $_POST['txtamount'];
					$idno = $_SESSION['id_no'];



					if(search_customer($idno) == true){

						$cust_id = getCustID();
						$firstname = getFirstName();
						$surname = getSurname();
						$gender = getGender();
						$street = getStreetAddress();
						$city = getCity();
						$province = getProvince();
						$areacode = getArea_Code();
						$phonenumber = getPhoneNo();
						$email = getEmail();
						$balance = getBalance();

									echo '<script> 
										document.getElementById("idno").value ="" 
									</script>';

									echo '<script> 
										document.getElementById("balance").value ="' .$balance .'" 
									</script>';


									echo '<script> 
										document.getElementById("btnbalance").disabled =false 
									</script>';
									

									echo '<script> 
										document.getElementById("idno2").value ="' .$idno .'" 
									</script>';

									echo '<script> 
										document.getElementById("firstname").value ="' .$firstname  .'" 
									</script>';

									echo '<script> 
										document.getElementById("surname").value ="' .$surname  .'" 
									</script>';

									echo '<script> 
										document.getElementById("gender").value ="' .$gender  .'" 
									</script>';

									echo '<script> 
										document.getElementById("phone").value ="' .$phonenumber  .'" 
									</script>';

									echo '<script> 
										document.getElementById("email").value ="' .$email  .'" 
									</script>';

									echo '<script> 
										document.getElementById("street").value ="' .$street  .'" 
									</script>';

									echo '<script> 
										document.getElementById("city").value ="' .$city  .'" 
									</script>';

									echo '<script> 
										document.getElementById("cust-province").value ="' .$province  .'" 
									</script>';

									echo '<script> 
										document.getElementById("areacode").value ="' .$areacode  .'" 
									</script>';

									echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';


									update_balance($cust_id, $amount);

									echo '<script> 
										document.getElementById("idno").value ="' .$idno .'" 
									</script>';
									
									echo '<script> 
										document.getElementById("btnsearch").click() 
									</script>';
					}
				}


				/*
					Save changes
				*/
				if (isset($_POST['btnsave'])) {

						$all_clear = 0;
							//South African citizen
						


						if (validate_id($_POST['idno2']) == false){
							echo '<script>
							document.getElementById("idno2").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("idno2").style.borderColor = "green";
						</script>';
						}

						if (validate_firstname($_POST['firstname']) == false){
							echo '<script>
							document.getElementById("firstname").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("firstname").style.borderColor = "green";
						</script>';
						}
							
						if (validate_surname($_POST['surname']) == false){
							echo '<script>
							document.getElementById("surname").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("surname").style.borderColor = "green";
						</script>';
						}

						if (validate_gender(strtolower($_POST['gender'])) == false){
							echo '<script>
							document.getElementById("gender").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("gender").style.borderColor = "green";
						</script>';
						}


						if (validate_phone($_POST['phone']) == false){
							echo '<script>
							document.getElementById("phone").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("phone").style.borderColor = "green";
						</script>';
						}
													
						if (validate_email($_POST['email']) == false){
							echo '<script>
							document.getElementById("email").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("email").style.borderColor = "green";
						</script>';
						}


						if (validate_address($_POST['street']) == false){
							echo '<script>
							document.getElementById("street").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("street").style.borderColor = "green";
						</script>';
						}

						if (validate_city($_POST['city']) == false){
							echo '<script>
							document.getElementById("city").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("city").style.borderColor = "green";
						</script>';
						}

						if (validate_province($_POST['cust-province']) == false){
							echo '<script>
							document.getElementById("cust-province").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("cust-province").style.borderColor = "green";
						</script>';
						}

						if (validate_areacode($_POST['areacode']) == false){
							echo '<script>
							document.getElementById("areacode").style.borderColor = "red";
						</script>';

						echo '<script> 
										document.getElementById("btnsave").disabled =false 
									</script>';

						$all_clear += 1;
						}else{
							echo '<script>
							document.getElementById("areacode").style.borderColor = "green";
						</script>';
						}
						
						if ($all_clear == 0) {

							if(search_customer($_POST['idno2']) == true){

								$cust_id = getCustID();
								$intgen = substr($_POST['idno2'], 6, 4);

								$intval = 5000;


								$idno = $_POST['idno2'];
								$firstname = $_POST['firstname'];
								$surname = $_POST['surname'];
								$addressline1 = $_POST['street'];
								$city = $_POST['city'];
								$province = $_POST['cust-province'];
								$areacode = $_POST['areacode'];
								$phonenumber = $_POST['phone'];
								$emailaddress = strtolower($_POST['email']);

								
								if ($intgen < $intval) {
									$gender = "Female";
								}else{
									$gender = "Male";
								}	

								if (update_sa_cust($cust_id, $firstname, $surname, $gender, $idno, $addressline1, $city, $province, $areacode, $phonenumber, $emailaddress) == true){

									
								}	
							}
						}							
						
				}
			?>	



				</div>
			</div>
		</div>


		

		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>


		<script language="JavaScript" type="text/javascript">

			var value = "";

			function update(val) {
				value = val;

				if (value == "RSA") {
					document.getElementById("idno").disabled = false;
					document.getElementById("idno").required = true;

					document.getElementById("passportno").disabled = true;
					document.getElementById("passportno").required = false;
				
				}else{
					document.getElementById("idno").disabled = true;
					document.getElementById("idno").required = false;

					document.getElementById("passportno").disabled = false;
					document.getElementById("passportno").required = true;
				}
    			
			}

			function getVal(){
				return value;
			}

		</script>



	</body>
</html>