<?php

include_once 'dbconnect.php';
?>

<?php

/*
  validates SA ID number
 */

function validate_id($idno) {
    $today = date("y/m/d");
    $year = 00;
    $month = 00;
    $day = 00;
    $valid = false;
    $match = preg_match("!^(\d{2})(\d{2})(\d{2})\d\d{6}$!", $idno, $matches);
    if (!$match) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid input ID </div>';
        return false;
    }
    list (, $year, $month, $day) = $matches;
    /**
     * Check that the date is valid
     */
    /**
     * Check citizenship of the users id (0 = .za, 1 = other)
     */
    if (!in_array($idno{10}, array(0, 1))) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid input ID </div>';
        return false;
    }
    /**
     * 'A' digit
     */
    if (!in_array($idno{11}, array(8, 9))) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid input ID </div>';
        return false;
    }


    if (is_numeric($idno) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid input! ID number must be numeric</div>';
    } elseif (strlen($idno) > 13 || strlen($idno) < 13) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid input! ID must be 13 characters long</div>';
    } else {

        $year = substr($idno, 0, 2);
        $month = substr($idno, 2, 2);
        $day = substr($idno, 4, 2);

        $tYear = substr($today, 0, 2);
        $tMonth = substr($today, 3, 2);
        $tDay = substr($today, 6, 2);

        if ($year < 10 || $year > 98) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Customer should at least be 18 years old!</div>';
        } elseif ($month > 12 || $month < 01) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Invalid ID No. Please check the ID number and try again!</div>';
        } elseif ($day > 31 || $day < 01) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Invalid ID No. Please check the ID number and try again!</div>';
        } else {

            $valid = true;
        }
    }

    return $valid;
}

/*
  validates passport number
 */

function validate_passport($passportno) {
    $valid = false;

    if (strlen($passportno) < 6 || strlen($passportno) > 13) {
        echo '<div class="alert alert-danger" role="alert"  align="center">Invalid passport number! Please check the passport number and try again.</div>';
    } else {

        function isValid($passport) {
            return !preg_match('/[^A-Za-z0-9]/', $passport);
        }

        if (isValid($passportno) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Invalid passport number! Please check the passport number and try again.</div>';
        } else {

            $valid = true;
        }
    }

    return $valid;
}

/*
  Validates first name
 */

function validate_firstname($fname) {
    $valid = false;

    function isValid1($name) {
        return !preg_match('/[^A-Za-z]/', $name);
    }

    if (strlen($fname) > 1) {
        if (isValid1($fname) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid first name..</div>';
        } else {
            $valid = true;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid first name..</div>';
    }


    return $valid;
}

/*
  Validates surname
 */

function validate_surname($lname) {
    $valid = false;

    function isValid2($name) {
        return !preg_match('/[^A-Za-z]/', $name);
    }

    if (strlen($lname) > 1) {
        if (isValid2($lname) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid surname..</div>';
        } else {
            $valid = true;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid surname..</div>';
    }

    return $valid;
}

/*
  Validates gender
 */

function validate_gender($gender) {
    $valid = false;

    if ($gender == "female" || $gender == "male") {
        $valid = true;
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid gender..</div>';
    }

    return $valid;
}

/*
  Validates address line 1 and 2
 */

function validate_address1($addressline) {
    $valid = false;

    function isValid19($addline) {
        return !preg_match('/[^A-Z a-z 0-9]/', $addline);
    }

    if (isValid19($addressline) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid address! (only numbers and alphabets are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}
function validate_address2($addressline) {
    $valid = false;

    function isValid4($addline) {
        return !preg_match('/[^A-Z a-z 0-9]/', $addline);
    }

    if (isValid4($addressline) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid address! (only numbers and alphabets are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}
function validate_address3($addressline) {
    $valid = false;

    function isValid5($addline) {
        return !preg_match('/[^A-Z a-z 0-9]/', $addline);
    }

    if (isValid5($addressline) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid address! (only numbers and alphabets are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates city
 */

function validate_city($city) {
    $valid = false;

    function isValid11($city2) {
        return !preg_match('/[^A-Z a-z]/', $city2);
    }

    if (isValid11($city) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid city! (only alphabets are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates province
 */

function validate_province($province) {
    $valid = false;

    function isValid10($province2) {
        return !preg_match('/[^A-Z a-z]/', $province2);
    }

    if (isValid10($province) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid province! (only alphabets are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates the area code
 */

function validate_areacode($acode) {
    $valid = false;

    function isValid6($code) {
        return !preg_match('/[^0-9]/', $code);
    }

    if (isValid6($acode) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid area code! (only numbers are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates the phone number
 */

function validate_phone($pnumber) {
    $valid = false;

    function isValid7($phone) {
        return !preg_match('/[^0-9]/', $phone);
    }

    $zero = substr($pnumber, 0, 1);
    if (isValid7($pnumber) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid phone number! (only numbers are allowed)</div>';
    } elseif (strlen($pnumber) !== 10) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid phone number!</div>';
    } elseif ($zero !== "0") {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid phone number! (number must start with a zero)</div>';
    } else {

        $valid = true;
    }

    return $valid;
}

/*
  Validates the staff number
 */

function validate_staffno($snumber) {
    $valid = false;

    function isValid15($phone) {
        return !preg_match('/[^0-9]/', $phone);
    }

    if (isValid15($snumber) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid employee number! (only numbers are allowed)</div>';
    } else {
        $valid = true;
    }
    return $valid;
}

/*
  Validates the email address
 */

function validate_email($emailadd) {
    $valid = false;

    if (!filter_var($emailadd, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert" align="center">Invalid email format! Please check the email address and try again..</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Creates a customer record
 */

function save_sa_cust($first_name, $surname, $gender, $idnumber, $street_address, $Street_Address_line2, $Street_Address_line3, $city, $province, $area_code, $phone_number, $email) {

    //echo "{$first_name},{$surname},{$gender},{$idnumber},{$street_address},{$city},{$province},{$area_code},{$phone_number}";
    $saved = false;
    $new_is;

    $query = "INSERT INTO customer(first_name, surname, gender, idnumber, street_address, Street_Address_line2, Street_Address_line3, city, province, area_code, phone_number, email) 
					VALUES('{$first_name}','{$surname}','{$gender}','{$idnumber}','{$street_address}','{$Street_Address_line2}','{$Street_Address_line3}','{$city}', '{$province}', '{$area_code}', '{$phone_number}', '{$email}')";

    global $conn;

    if (mysqli_query($conn, $query)) {


        $query2 = "SELECT MAX(customer_id) AS cust_id FROM customer";
        $result2 = mysqli_query($conn, $query2);

        if ($rows2 = mysqli_fetch_array($result2)) {
            $new_id = $rows2['cust_id'];
        }

        $query2 = "INSERT INTO customer_account(customer_id) VALUES({$new_id})";

        if (mysqli_query($conn, $query2)) {
            $saved = true;
        }
    } else {
        echo "Failed";
    }

    return $saved;
}

/*
  Creates an employee record
 */

function save_sales_person($staff_no, $first_name, $surname, $gender, $phone_number, $email, $employee_type, $password) {

    $saved = false;

    $query = "INSERT INTO employee(staff_no, first_name, surname, gender, phone_number, email, employee_type, password) 
					VALUES( " . $staff_no . ",'{$first_name}','{$surname}','{$gender}','{$phone_number}','{$email}','{$employee_type}','{$password}')";

    global $conn;

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success" role="alert">Employee registered successfully..</div>';

        echo '<script> 
					document.getElementById("txtstaffno").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("firstname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("surname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("phone").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("email").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("emp_type").value ="" 
			</script>';
    } else {
        echo "Failed";
    }

    return $saved;
}

/*
  Creates a vehicle record
 */

function save_vehicle($cust_idno, $car_reg_num, $car_make, $vehicle_type, $car_model, $car_year, $car_colour, $vin_number, $car_mileage) {
    $saved = false;
    $cust_no = "";
    global $conn;

    $query1 = "SELECT * from customer WHERE idnumber = '{$cust_idno}'";
    $result1 = mysqli_query($conn, $query1);

    while ($rows = mysqli_fetch_array($result1)) {
        if ($cust_idno === $rows['idnumber']) {

            $cust_no = $rows['customer_id'];
        }
    }

    $query = "INSERT INTO vehicle(vin_number, registration_no, make, vehicle_type, model, year, colour, mileage, customer_no) 
					VALUES(" . "'{$vin_number}','{$car_reg_num}','{$car_make}','{$vehicle_type}','{$car_model}','" . $car_year . "','{$car_colour}','" . $car_mileage . "','" . $cust_no . "')";

    if (mysqli_query($conn, $query)) {
        $saved = true;
    }

    return $saved;
}

/*
  Updates a customer record
 */

function update_sa_cust($cust_id, $first_name, $surname, $gender, $idnumber, $street_address, $street_address_line2, $street_address_line3, $city, $province, $area_code, $phone_number, $email) {
    $saved = false;

    $query = "UPDATE customer SET first_name='" . trim($first_name) . "', surname='" . trim($surname) . "',gender='" . trim($gender) . "', idnumber='" . trim($idnumber) . "', street_address='" . trim($street_address) . "' , Street_Address_line2='" . trim($street_address) . "' , Street_Address_line3='" . trim($street_address) . "',city='" . trim($city) . "', province='" . trim($province) . "', area_code='" . trim($area_code) . "', phone_number='" . trim($phone_number) . "', email='" . trim($email) . "' WHERE customer_id =" . $cust_id;
    global $conn;

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success" role="alert" align="center">Customer account successfully updated..</div>';

        echo '<script> 
					document.getElementById("balance").value ="" 
			</script>';

        echo '<script> 
					document.getElementById("idno2").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("firstname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("surname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("gender").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("street").value ="" 
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
				document.getElementById("btnsave").disabled =true 
			</script>';
    } else {
        echo "Failed";
    }

    return $saved;
}

/*
  Validates registration number
 */

function validate_reg_num($reg_num) {
    $valid = false;

    function isValid13($num) {
        return !preg_match('/[^A-Za-z0-9]/', $num);
    }

    if (strlen($reg_num) > 1) {
        if (isValid13($reg_num) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid registration number</div>';
        } else {
            $valid = true;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid registration number</div>';
    }

    return $valid;
}

/*
  Validates car colour
 */

function validate_car_colour($car_colour) {
    $valid = false;

    function isValid12($colour) {
        return !preg_match('/[^A-Z a-z]/', $colour);
    }

    if (strlen($car_colour) > 1) {
        if (isValid12($car_colour) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid colour</div>';
        } else {
            $valid = true;
        }
    } else {
        echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid colour</div>';
    }

    return $valid;
}

/*
  Validates VIN number
 */

function validate_vin_number($vin_number) {
    $valid = false;
    global $conn;
    if (strlen($vin_number) != 17) {
        echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid VIN number</div>';
    } else {

        function isValid($vin) {
            return !preg_match('/[^A-Za-z0-9]/', $vin);
        }

        $query2 = mysqli_query($conn, "SELECT * from vehicle WHERE  vin_number= '{$vin_number}'");
        if (mysqli_num_rows($query2) > 0) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Vin Number Already Exists</div>';
        } elseif (isValid($vin_number) == false) {
            echo '<div class="alert alert-danger" role="alert"  align="center">Please enter a valid VIN number</div>';
        } else {

            $valid = true;
        }
    }
    return $valid;
}

/*
  Validates car mileage
 */

function validate_car_mileage($snumber) {
    $valid = false;

    function isValid8($car_mileage) {
        return !preg_match('/[^0-9]/', $car_mileage);
    }

    if (isValid8($snumber) == false) {
        echo '<div class="alert alert-danger" role="alert" align="center">Please enter a valid mileage! (only numbers are allowed)</div>';
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Creates a booking record
 */

function save_booking($booking_date, $booking_time, $status, $reg_num, $customer_no) {
    $saved = false;
    global $conn;

    $query1 = "SELECT vin_number from vehicle WHERE registration_no ='{$reg_num}' AND customer_no =" . $customer_no;
    $result1 = mysqli_query($conn, $query1);

    while ($rows = mysqli_fetch_array($result1)) {
        $vin_number = $rows['vin_number'];
    }

    $query = "INSERT INTO booking(booking_id,booking_date, booking_time, status, vin_number, customer_id) 
					VALUES(null," . "'{$booking_date}','{$booking_time}','{$status}','{$vin_number}'," . $customer_no . ")";


    if (mysqli_query($conn, $query)) {
        $saved = true;
    }

    return $saved;
}

/*
  Updates a product record with an image

  function update_product($prod_id, $prod_desc, $qty, $price, $image){
  $saved = false;

  $query = "UPDATE product SET product_name='" .trim($prod_desc) ."', qty_in_stock=" .trim($qty) .",selling_price=" .trim($price) .",img='" .$image ."' WHERE product_id ='" .$prod_id ."'";

  global $conn;

  if(mysqli_query($conn, $query)){

  }

  }
 */

/*
  Updates a product record without an image

  function update_product2($prod_id, $prod_desc, $qty, $price){
  $saved = false;

  $query = "UPDATE product SET product_name='" .trim($prod_desc) ."', qty_in_stock=" .trim($qty) .",selling_price=" .trim($price) ." WHERE product_id ='" .$prod_id ."'";

  global $conn;

  if(mysqli_query($conn, $query)){

  }

  }
 */


/*
  Searches for a customer
 */

function search_customer($idno) {
    $valid = false;
    global $conn;
    global $custID;
    global $firstname;
    global $surname;
    global $gender;
    global $phone_number;
    global $email;
    global $balance;
    global $street_address;
    global $street_address2;
    global $street_address3;
    global $city;
    global $province;
    global $area_code;

    $query = "SELECT * from customer WHERE idnumber = '{$idno}'";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        if ($idno === $rows['idnumber']) {

            $custID = $rows['customer_id'];
            $firstname = $rows['first_name'];
            $surname = $rows['surname'];
            $gender = $rows['gender'];

            $street_address = $rows['street_address'];
             $street_address2 = $rows['Street_Address_line2'];
              $street_address3 = $rows['Street_Address_line3'];
            $city = $rows['city'];
            $province = $rows['province'];
            $area_code = $rows['area_code'];

            $phone_number = $rows['phone_number'];
            $email = $rows['email'];

            $valid = true;

            function getCustID() {
                global $custID;
                return $custID;
            }

            function getID() {
                global $idno;
                return $idno;
            }

            function getFirstName() {
                global $firstname;
                return $firstname;
            }

            function getSurname() {
                global $surname;
                return $surname;
            }

            function getGender() {
                global $gender;
                return $gender;
            }

            function getPhoneNo() {
                global $phone_number;
                return $phone_number;
            }

            function getEmail() {
                global $email;
                return $email;
            }

            function getStreetAddress() {
                global $street_address;
                return $street_address;
            }
            
            function getStreetAddress2() {
                global $street_address2;
                return $street_address2;
            }
            
            function getStreetAddress3() {
                global $street_address3;
                return $street_address3;
            }

            function getCity() {
                global $city;
                return $city;
            }

            function getProvince() {
                global $province;
                return $province;
            }

            function getArea_Code() {
                global $area_code;
                return $area_code;
            }

        }
    }

    return $valid;
}

function search_vehicle($idno) {
    $valid = false;
    global $conn;
    global $vinNumber;
    global $reg_num;
    global $make;
    global $model;
    global $engine_Size;
    global $vehicle_type;
    global $mileage;
    global $colour;
    global $custID;

    $query = "SELECT * from vehicle WHERE vin_number = '{$idno}'";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        if ($idno === $rows['vin_number']) {

            $vinNumber = $rows['vin_number'];
            $reg_num = $rows['registration_no'];
            $make = $rows['make'];
            $model = $rows['model'];
            $engine_Size = $rows['engine_size'];
            $vehicle_type = $rows['vehicle_type'];
            $colour = $rows['colour'];
            $mileage = $rows['mileage'];

            $valid = true;

            function getVinNumber() {
                global $vinNumber;
                return $vinNumber;
            }

            function getID() {
                global $idno;
                return $idno;
            }

            function getRegNumber() {
                global $reg_num;
                return $reg_num;
            }

            function getMake() {
                global $make;
                return $make;
            }

            function getModel() {
                global $model;
                return $model;
            }

            function getEngineSize() {
                global $engine_size;
                return $engine_size;
            }

            function getVehicleType() {
                global $vehicle_type;
                return $vehicle_type;
            }

            function getMileage() {
                global $mileage;
                return $mileage;
            }

            function getColour() {
                global $colour;
                return $colour;
            }

            function getCustID() {
                global $custID;
                return $custID;
            }

        }
    }

    return $valid;
}

/*
  Updates an employee record
 */

function update_employee($staff_no, $first_name, $surname, $gender, $phone_number, $email) {
    $saved = false;

    $query = "UPDATE employee SET first_name='" . trim($first_name) . "', surname='" . trim($surname) . "',gender='" . trim($gender) . "', phone_number='" . trim($phone_number) . "', email='" . trim($email) . "' WHERE staff_no =" . $staff_no;
    global $conn;

    if (mysqli_query($conn, $query)) {
        echo '<div class="alert alert-success" role="alert" align="center">Customer account successfully updated..</div>';

        echo '<script> 
					document.getElementById("staffno").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("firstname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("surname").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("phone").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("email").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("email").value ="" 
			</script>';

        echo '<script> 
				document.getElementById("btnsave").disabled =true 
			</script>';
    } else {
        echo "Failed";
    }

    return $saved;
}

/*
  Searches for an employee
 */

function search_employee($staffno) {
    $valid = false;
    global $conn;
    global $staff_no;
    global $first_name;
    global $surname;
    global $gender;
    global $phone_number;
    global $email;
    global $employee_type;

    $query = "SELECT * from employee WHERE staff_no = '{$staffno}' AND employee_type <> 'admin'";

    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        if ($staffno === $rows['staff_no']) {

            $staff_no = $rows['staff_no'];
            $first_name = $rows['first_name'];
            $surname = $rows['surname'];
            $gender = $rows['gender'];
            $phone_number = $rows['phone_number'];
            $email = $rows['email'];
            $employee_type = $rows['employee_type'];

            $valid = true;

            function getStaffNo() {
                global $staff_no;
                return $staff_no;
            }

            function getFirstName() {
                global $first_name;
                return $first_name;
            }

            function getSurname() {
                global $surname;
                return $surname;
            }

            function getGender() {
                global $gender;
                return $gender;
            }

            function getPhoneNo() {
                global $phone_number;
                return $phone_number;
            }

            function getEmail() {
                global $email;
                return $email;
            }

            function getemployeeType() {
                global $employee_type;
                return $employee_type;
            }

        }
    }

    return $valid;
}

/*
  Generate new ORDER ID
 */

function getNewOrderID() {
    global $conn;
    $order_num = -1;

    $query = "SELECT max(order_no) AS order_num from sale_order";

    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $order_num = $rows['order_num'];
    }

    return $order_num + 1;
}

/*
  Get last inserted ORDER ID
 */

function getLastOrderID() {
    global $conn;
    $order_num = -1;

    $query = "SELECT max(order_no) AS order_num from sale_order";

    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $order_num = $rows['order_num'];
    }

    return $order_num;
}

/*
  Get last inserted ORDER ID
 */

function getLastVenueID() {
    global $conn;
    $venue_num = -1;

    $query = "SELECT max(venue_id) AS venue_num from venue";

    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_array($result)) {
        $venue_num = $rows['venue_num'];
    }

    return $venue_num;
}

/*
  Creates a ORDER record
 */

function save_order($customer_id, $staff_no) {
    $order_date = '20' . date('y-m-d');
    $sale_call = 000;

    $query3 = "INSERT INTO sale_order(order_date, customer_id, staff_no) VALUES('{$order_date}'," . $customer_id . "," . $staff_no . ")";

    global $conn;

    mysqli_query($conn, $query3);
}

/*
  Creates a ORDER record
 */

function save_orderLine($order_no, $product_id, $quantity) {
    $qty = 0;
    $newQty = 0;

    $query3 = "INSERT INTO order_line(order_no, product_id, quantity) VALUES(" . $order_no . ",'" . $product_id . "'," . $quantity . ")";

    global $conn;

    mysqli_query($conn, $query3);


    $query5 = "SELECT qty_in_stock FROM product WHERE product_id = '" . $product_id . "'";

    $result5 = mysqli_query($conn, $query5);

    while ($row5 = mysqli_fetch_array($result5)) {
        $qty = $row5['qty_in_stock'];
    }

    $newQty = $qty - $quantity;

    $query4 = "UPDATE product SET qty_in_stock = " . $newQty . " WHERE product_id = '" . $product_id . "'";

    mysqli_query($conn, $query4);
}

/*
  Creates a Sale record
 */

function save_sale($total_amt, $order_no) {
    $sale_date = '20' . date('y-m-d');

    $query3 = "INSERT INTO sale(sale_date, total_price, order_no) VALUES('" . $sale_date . "'," . $total_amt . "," . $order_no . ")";

    global $conn;

    if (mysqli_query($conn, $query3)) {
        
    } else {
        
    }
}

/*
  Validates delivery date
 */

function validate_delivery_date($del_date) {
    $valid = false;

    $today = '20' . date('y-') . date('m-d');

    $lastDay = strftime("%Y-%m-%d", strtotime("$today +30 day"));


    $currDate = '20' . date('y-m-d');

    if ($del_date < $currDate) {
        echo '<div class="alert alert-danger" role="alert" align="center">Delivery date must be greater than current date..</div>';
    } else {
        $valid = true;
    }

    if ($del_date > $lastDay) {
        echo '<div class="alert alert-danger" role="alert" align="center">Date must not be more than 30 days from now..</div>';
        $valid = false;
    } else {
        $valid = true;
    }


    return $valid;
}

/*
  Validates delivery date
 */

function validRangeStart($date) {
    $valid = false;

    $today = '20' . date('y-') . date('m-d');

    $lastDay = strftime("%Y-%m-%d", strtotime("$today +90 day"));

    $currDate = '20' . date('y-m-d');

    if ($date > $lastDay) {
        echo '<div class="alert alert-danger" role="alert" align="center">Event cannot start more than 90 days from now..</div>';
        $valid = false;
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates event start date
 */

function validate_delstart_date($del_date, $start_date) {
    $valid = false;

    if ($start_date < $del_date) {
        echo '<div class="alert alert-danger" role="alert" align="center">Event cannot start before delivery date</div>';
        $valid = false;
    } else {
        $valid = true;
    }

    return $valid;
}

/*
  Validates event start date
 */

function validate_start_date($del_date) {
    $valid = false;

    $today = '20' . date('y-') . date('m-d');

    $lastDay = strftime("%Y-%m-%d", strtotime("$today +1 day"));

    if ($del_date < $lastDay) {
        echo '<div class="alert alert-danger" role="alert" align="center">Event date must start from tomorrow</div>';
        $valid = false;
    } else {
        $valid = true;
    }


    return $valid;
}

/*
  Validates event end date
 */

function validate_end_date($start_date, $end_date) {

    if ($end_date < $start_date) {
        echo '<div class="alert alert-danger" role="alert" align="center">End date must be greater or equal to start date</div>';
        $valid = false;
    } else {
        $valid = true;
    }


    return $valid;
}

/*
  Creates a ORDER record
 */

function save_delivery($del_date, $order_no, $del_street_address, $del_city, $del_province, $del_area_code, $del_contact_no, $del_email) {

    $query3 = "INSERT INTO delivery(delivery_date, order_no, street_address, city, province, area_code, phone_number, email_address) VALUES('" . $del_date . "'," . $order_no . ",'" . $del_street_address . "','" . $del_city . "','" . $del_province . "','" . $del_area_code . "','" . $del_contact_no . "','" . $del_email . "')";

    global $conn;

    if (mysqli_query($conn, $query3)) {
        
    } else {
        
    }
}

/*
  Check if customer qualifies for promotion
 */

function qualify_promotion() {

    $query3 = "INSERT INTO delivery(delivery_date, order_no, street_address, city, area_code, phone_number) VALUES('" . $del_date . "'," . $order_no . ",'" . $del_street_address . "','" . $del_city . "','" . $del_area_code . "','" . $del_contact_no . "')";

    global $conn;

    if (mysqli_query($conn, $query3)) {
        echo '<div class="alert alert-success" role="alert" align="center">Order captured successfully..</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Order captured unsuccessfully.. Please try again!</div>';
    }
}

/*
  Creates a ORDER record
 */

function save_event() {

    $query3 = "INSERT INTO event(start_date, end_date, duration, sale_no, employee_id, venue_id) VALUES('2014-10-22', '2014-10-23', 2, 10, 2016001, 2)";

    global $conn;

    if (mysqli_query($conn, $query3)) {
        echo '<div class="alert alert-success" role="alert" align="center">Order captured successfully..</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Order captured unsuccessfully.. Please try again!</div>';
    }
    //return $saved;
}

/*
  Creates a ORDER record
 */

function save_product($product_id, $product_name, $selling_price, $qty_in_stock, $img) {

    $query3 = "INSERT INTO product(product_id, product_name, selling_price, qty_in_stock, img) VALUES('" . $product_id . "','" . $product_name . "'," . $selling_price . "," . $qty_in_stock . ",'" . $img . "')";

    global $conn;

    if (mysqli_query($conn, $query3)) {
        echo '<div class="alert alert-success" role="alert" align="center">Order captured successfully..</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Order captured unsuccessfully.. Please try again!</div>';
    }
    //return $saved;
}

/*
  Update customer balance
 */

function update_balance($customer_id, $amount) {
    global $conn;
    $balance = 0;

    $query5 = "SELECT balance FROM customer_account WHERE customer_id =" . $customer_id;

    $result5 = mysqli_query($conn, $query5);

    if ($row5 = mysqli_fetch_array($result5)) {
        $balance = $row5['balance'];
    }

    $balance += $amount;

    //echo $balance .', ' .$customer_id;

    $query4 = "UPDATE customer_account SET balance = " . $balance . " WHERE customer_id = " . $customer_id;

    if (mysqli_query($conn, $query4)) {
        echo '<div class="alert alert-success" role="alert" align="center">successful..</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Failed..</div>';
    }
}

/*
  Deduct customer balance
 */

function deduct_amount($customer_id, $amount) {
    global $conn;
    $balance = 0;

    $query5 = "SELECT balance FROM customer_account WHERE customer_id =" . $customer_id;

    $result5 = mysqli_query($conn, $query5);

    if ($row5 = mysqli_fetch_array($result5)) {
        $balance = $row5['balance'];
    }

    $balance -= $amount;

    //echo $balance .', ' .$customer_id;

    $query4 = "UPDATE customer_account SET balance = " . $balance . " WHERE customer_id = " . $customer_id;

    if (mysqli_query($conn, $query4)) {
        echo '<div class="alert alert-success" role="alert" align="center">successful..</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert" align="center">Failed..</div>';
    }
}

/*
  Assigns event teams to events
 */

function assign_event_team($staff_no, $event_id) {
    $query3 = "";
    $query4 = "";
    global $conn;
    $exist = 0;

    $query4 = "SELECT staff_no FROM event_team WHERE event_id =" . $event_id;

    $result4 = mysqli_query($conn, $query4);

    while ($row4 = mysqli_fetch_array($result4)) {

        if ($row4['staff_no'] == $staff_no) {
            $exist = 1;
        } else {
            
        }
    }

    if ($exist == 0) {
        $query3 = "INSERT INTO event_team(staff_no, event_id) VALUES(" . $staff_no . "," . $event_id . ")";

        mysqli_query($conn, $query3);

        //echo '<div class="alert alert-success" role="alert" align="center">successful..</div>';
    } else {
        
    }
}
?>