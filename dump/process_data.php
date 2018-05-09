<?php
	include 'dbconnect.php';
?>

<?php
	$firstname;
	$surname;
	$query1;

	if (isset($_POST['firstname']) && isset($_POST['surname'])) {
		$firstname = $_POST['firstname'];
		$surname = $_POST['surname'];

		$query1 = "INSERT INTO person(firstname, surname) VALUES('" .$firstname ."','" .$surname ."')";

		global $conn;

		if(mysqli_query($conn, $query1)){
			echo "Successfully inserted";
		}else{
			echo "Unsuccessful";
		}
	}

?>