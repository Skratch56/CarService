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
                        <h1>Reports</h1>
                    </a>
                </div>
            </div>
        </nav>
        <br><br><br><br><br>
		
		<div class="container">
	        <br><br>  
			<!-- 
				Booking Report 
			-->
	        <div class="row">
				<form action="reporting/booking_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Booking</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Booking Status</label>
						<select class="form-control" name="bookingStatus" id="bookingStatus" data-placeholder="Search by status" style="width:155px">	
							<option value="all">All</option>
							<option value="Booked">Booked</option>
							<option value="In Service">In Service</option>
							<option value="In Evaluation">In Evaluation</option>							
						</select>     
					</div>
					
					<!-- Filtering dates -->
	                <div class="col-md-1">
	                    <label>From</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="booking_from_date" id="booking_from_date" max="' .date('Y-m-d') .'" value="" onchange="" />';
						?>
	                </div>

	                <div class="col-md-1">
	                    &nbsp
	                </div>

	                <div class="col-md-1">
						<label>To</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="booking_to_date" id="booking_to_date" max="' .date('Y-m-d') .'" value="" onchange="checkBookingDates(\'booking_from_date\',\'booking_to_date\')" />';
						?>
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-2">
						<label></label>
	                    <input class="form-control" type="text" name="booking_vin_num" id="booking_vin_num" placeholder="VIN Number" style="margin-top:5px" />
	                </div>
					
					
					
					<div class="col-md-1">
						<label></label>
	                    <input class="form-control" type="text" name="booking_cust_id" id="booking_cust_id" placeholder="Customer ID" style="width:110px;margin-top:5px" />
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info" type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>
			
			<hr>
			
			<!-- 
				Cash Receipt Report 
			-->
			<div class="row">
				<form action="reporting/cash_receipt_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Cash Receipt</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Payment Type</label>
						<select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:155px">
							<option value="all">All</option>
							<option value="Cash">Cash</option>
							<option value="Card">Card</option>							
						</select>     
					</div>
					
					<div class="col-md-2">
						<label>Payment Status</label>
						<select class="form-control" name="pay_status" id="pay_status" data-placeholder="Search by status" style="width:165px">
							<option value="all">All</option>
							<option value="Paid">Paid</option>
							<option value="Pending">Pending</option>							
						</select>     
					</div>

	                <div class="col-md-1">
	                    <label>From</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="receipt_from_date" id="receipt_from_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>

	                <div class="col-md-1">
	                    &nbsp
	                </div>

	                <div class="col-md-1">
						<label>To</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="receipt_to_date" id="receipt_to_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					

	                <div class="col-md-1">
						<label>Amount</label>
	                    <select class="form-control" name="receipt_amt" id="receipt_amt" data-placeholder="Search by status" style="width:110px">
							<option value="all">All</option>
							<option value="10">> 10</option>
							<option value="20">> 20</option>
							<option value="50">> 50</option>	
							<option value="100">> 100</option>
							<option value="500">> 500</option>
							<option value="1000">> 1000</option>
							<option value="5000">> 5000</option>							
						</select>  
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>
			
			<hr>
			
			<!-- 
				Evaluation Report 
			-->
			<div class="row">
				<form action="reporting/evaluation_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Evaluation</font></b>      
					</div>
					
					
	                <div class="col-md-1">
	                    <label>From</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="evaluation_from_date" id="evaluation_from_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>

	                <div class="col-md-1">
	                    &nbsp
	                </div>

	                <div class="col-md-1">
						<label>To</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="evaluation_to_date" id="evaluation_to_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-2">
						<label></label>
						<input class="form-control" type="text" name="evaluation_staff" id="evaluation_staff" placeholder="Staff Number" style="margin-top:5px" />    
					</div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>
			
			<hr>
			
			<!-- 
				Customer Report 
			-->
			<div class="row">
				<form action="reporting/customer_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Customer</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Bookings</label>
						<select class="form-control" name="cust_bookings" id="cust_bookings" onchange="customerControl1('cust_bookings', 'cust_id1')" style="width:155px">
							<option value="all">All</option>
							<option value="most_bookings">Most Bookings</option>
							<option value="least_bookings">Least Bookings</option>							
						</select>     
					</div>
					
					<div class="col-md-2">
						<label></label>
						<input class="form-control" type="text" name="cust_id1" id="cust_id1" placeholder="Customer ID" style="margin-top:5px" />     
					</div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>
			
			<hr>
			
			<!-- 
				Vehicle Report 
			-->
			<div class="row">
				<form action="reporting/vehicle_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Vehicle</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Bookings</label>
						<select class="form-control" name="car_bookings" id="car_bookings" onchange="customerControl2('car_bookings', 'car_vin1')" style="width:155px">
							<option value="all">All</option>
							<option value="most_booked">Most Booked</option>
							<option value="least_booked">Least Booked</option>							
						</select>     
					</div>
					
					<div class="col-md-2">
						<label></label>
						<input class="form-control" type="text" name="car_vin1" id="car_vin1" placeholder="VIN Number" style="margin-top:5px" />     
					</div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:14px" />   
					</div>
				</form>
	        </div>
			
			<!--<hr>
			
				Service Report 
			-->
			<!--<div class="row">
				<form action="reporting/service_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Service</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Payment Type</label>
						<select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:155px">
							<option value="all">All</option>
							<option value="Cash">Cash</option>
							<option value="Card">Card</option>							
						</select>     
					</div>
					
					
	                <div class="col-md-1">
	                    <label>From</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="from_date" id="from_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>

	                <div class="col-md-1">
	                    &nbsp
	                </div>

	                <div class="col-md-1">
						<label>To</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="to_date" id="to_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-2">
						<label>Payment Type</label>
						<select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:165px">
							<option value="all">All</option>
							<option value="Cash">Paid</option>
							<option value="Card">Pending</option>							
						</select>     
					</div>

	                <div class="col-md-1">
						<label>Amount</label>
	                    <select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:110px">
							<option value="al">All</option>
							<option value="10">> 10</option>
							<option value="20">> 20</option>
							<option value="50">> 50</option>	
							<option value="100">> 100</option>
							<option value="500">> 500</option>
							<option value="1000">> 1000</option>
							<option value="1000">> 5000</option>							
						</select>  
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>-->
			
			<hr>
			
			<!-- 
				Part Report 
			-->
			<!--<div class="row">
				<form action="reporting/part_report.php" method="post">
					<div class="col-md-1 padding-top-10">
						<b><font color="#00bfff">Parts</font></b>      
					</div>
					
					<div class="col-md-2">
						<label>Payment Type</label>
						<select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:155px">
							<option value="all">All</option>
							<option value="Cash">Cash</option>
							<option value="Card">Card</option>							
						</select>     
					</div>
					
				
	                <div class="col-md-1">
	                    <label>From</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="from_date" id="from_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>

	                <div class="col-md-1">
	                    &nbsp
	                </div>

	                <div class="col-md-1">
						<label>To</label>
	                    <?php
							date_default_timezone_set("Africa/Johannesburg");
							echo '<input type="date" style="width: 160px" class="form-control" name="to_date" id="to_date" max="' .date('Y-m-d') .'" value="" onchange="enableTime()" />';
						?>
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-2">
						<label>Payment Type</label>
						<select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:165px">
							<option value="all">All</option>
							<option value="Cash">Paid</option>
							<option value="Card">Pending</option>							
						</select>     
					</div>

	                <div class="col-md-1">
						<label>Amount</label>
	                    <select class="form-control" name="pay_type" id="pay_type" data-placeholder="Search by status" style="width:110px">
							<option value="al">All</option>
							<option value="10">> 10</option>
							<option value="20">> 20</option>
							<option value="50">> 50</option>	
							<option value="100">> 100</option>
							<option value="500">> 500</option>
							<option value="1000">> 1000</option>
							<option value="1000">> 5000</option>							
						</select>  
	                </div>
					
					<div class="col-md-1">
	                    &nbsp
	                </div>
					
					<div class="col-md-1 padding-top-10">
						<input class="form-control btn-info"  type="submit" value="View" style="width:60px; margin-top:15px" />   
					</div>
				</form>
	        </div>-->
	    </div>

	     <br><br> 
		
		<script type="text/javascript">
			function checkBookingDates(a1, a2){
				var a1 = document.getElementById(a1);
				var a2 = document.getElementById(a2);
				
				if(a1.value > a2.value){
					alert("Start date cannot be greater than end date");
					a2.value = "";
				}
			}
		</script>

		<script type="text/javascript">
			function customerControl1(a1, a2){
				var a1 = document.getElementById(a1);
				var a2 = document.getElementById(a2);
				
				//alert(document.getElementById(a1));

				if(a1.value != "all"){
					a2.disabled = true;
					a2.value = "";
				}else{
					a2.disabled = false;
				}
			}
		</script>

		<script type="text/javascript">
			function customerControl2(a1, a2){
				var a1 = document.getElementById(a1);
				var a2 = document.getElementById(a2);
				
				//alert(document.getElementById(a1));

				if(a1.value != "all"){
					a2.disabled = true;
					a2.value = "";
				}else{
					a2.disabled = false;
				}
			}
		</script>
		
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>












