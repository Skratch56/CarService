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



        <!-- Start of search form -->

        <input type="hidden" name="country" id="countryId" value="ZA"/>
<select name="province" class="states order-alpha" id="stateId">
    <option value="">Select State</option>
</select>
<select name="city" class="cities order-alpha" id="cityId">
    <option value="">Select City</option>
</select>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script>

        <script language="JavaScript" type="text/javascript">
        function Validate() {
            // first clear any left over error messages
            $('#error p').remove();

            // store the error div, to save typing
            var error = $('#error');

            var idNumber = $('#idnumber').val();


            // assume everything is correct and if it later turns out not to be, just set this to false
            var correct = true;

            //Ref: http://www.sadev.co.za/content/what-south-african-id-number-made
            // SA ID Number have to be 13 digits, so check the length
            if (idNumber.length != 13 || !isNumber(idNumber)) {
                error.append('<p>ID number does not appear to be authentic - input not a valid number</p>');
                correct = false;
            }

            // get first 6 digits as a valid date
            var tempDate = new Date(idNumber.substring(0, 2), idNumber.substring(2, 4) - 1, idNumber.substring(4, 6));

            var id_date = tempDate.getDate();
            var id_month = tempDate.getMonth();
            var id_year = tempDate.getFullYear();
            var age = 2017 - id_year;
            var fullDate = id_date + "-" + (id_month + 1) + "-" + id_year;

            if (!((tempDate.getYear() == idNumber.substring(0, 2)) && (id_month == idNumber.substring(2, 4) - 1) && (id_date == idNumber.substring(4, 6)))) {
                error.append('<p>ID number does not appear to be authentic - date part not valid</p>');
                correct = false;
            }

            // get the gender
            var genderCode = idNumber.substring(6, 10);
            var gender = parseInt(genderCode) < 5000 ? "Female" : "Male";

            // get country ID for citzenship
            var citzenship = parseInt(idNumber.substring(10, 11)) == 0 ? "Yes" : "No";

            // apply Luhn formula for check-digits
            var tempTotal = 0;
            var checkSum = 0;
            var multiplier = 1;
            for (var i = 0; i < 13; ++i) {
                tempTotal = parseInt(idNumber.charAt(i)) * multiplier;
                if (tempTotal > 9) {
                    tempTotal = parseInt(tempTotal.toString().charAt(0)) + parseInt(tempTotal.toString().charAt(1));
                }
                checkSum = checkSum + tempTotal;
                multiplier = (multiplier % 2 == 0) ? 1 : 2;
            }
            if ((checkSum % 10) != 0) {
                error.append('<p>ID number does not appear to be authentic - check digit is not valid</p>');
                correct = false;
            }
            ;


            // if no error found, hide the error message
            if (correct) {
                error.css('display', 'none');

                // clear the result div
                $('#result').empty();
                // and put together a result message
                $('#result').append('<p>South African ID Number:   ' + idNumber + '</p><p>Birth Date:   ' + fullDate + '</p><p>Gender:  ' + gender + '</p><p>Gender:  ' + age + '</p><p>SA Citizen:  ' + citzenship + '</p>');
            }
            // otherwise, show the error
            else {
                error.css('display', 'block');
            }

            return false;
        }

        function isNumber(n) {
            return !isNaN(parseFloat(n)) && isFinite(n);
        }

        $('#idCheck').submit(Validate);
        </script>
        <script language="JavaScript" type="text/javascript">
            function getMainPage() {
                window.location.href = "main.php";
            }
        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </form>


</body>
</html>