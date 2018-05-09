<?php 
	//session_start();
	include 'dbconnect.php';
	include 'functions.php';
?>

<?php
	global $conn;

	/*
		On vehicle registration number option change
	*/
 	if (isset($_POST['reg_num'])){
 		$reg_num = $_POST['reg_num'];

 		global $conn;

		$query1 = "SELECT * from vehicle WHERE registration_no = '" .$reg_num ."'";
		$result1 = mysqli_query($conn, $query1);

		while($rows = mysqli_fetch_array($result1)){
			$registration_no = $rows['registration_no'];	
			$car_make = $rows['make'];	
			$model = $rows['model'];	
			$vehicle_type = $rows['vehicle_type'];	
			$mileage = $rows['mileage'];	
		}		

		echo $registration_no."|".$car_make."|".$model."|".$vehicle_type."|".$mileage;
 	}
?>