<?php
	/*
		validates passport number 
	
	function validate_password($password){
		$valid = false;

		if(strlen($password) >= 8){

			function isValid($password){
				return !preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!-\/]{1,}$/", $password);
			}

			if (isValid($password) == false) {
				echo 'Invalid password';
			}else{

				$valid = true;
			}
		}
		return $valid;
	}
	*/



















	$user_password = "uuAuhhjg54k9";

	if ((preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!-\/]{1,}$/", $user_password)==1) && (strlen($user_password) >= 8)){
		echo "valid";
	}else{
		echo "invalid";
	}



























	//echo validate_password($user_password);
	/*function isPrime($number){
		$prime = true;

		$cnt = $number - 1;

		if ($cnt == 0) {
			$prime = false;
		}else{
			$prime = true;
		}

		while ($cnt > 1) {

			if ( ($number%$cnt) == 0) {
				$prime = false;
				break;
			}

			$cnt--;
		}

		if ($prime == false) {
			return "Not a prime number";
		}else{
			return "Prime number";
		}
	}
	echo isPrime(29);
	*/
?>