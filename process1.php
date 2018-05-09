<?php

session_start();
include 'dbconnect.php';
include 'functions.php';
?>

<?php


global $conn;
$query1 = "";

/*
  When user clicks Log in button
  Now get data from database
 */
if (isset($_POST['empnum']) AND isset($_POST['password'])) {
    if ((strlen($_POST['empnum']) > 0) || (strlen($_POST['password']) > 0)) {
        $staffno = $_POST['empnum'];
        $password = $_POST['password'];

        $query1 = "SELECT * FROM employee";

        if ((strlen($query1)) > 0) {

            $login_type = "sales";
            $staffnofound = false;
            $found = false;

            $result1 = mysqli_query($conn, $query1);

            while ($rows1 = mysqli_fetch_array($result1)) {
                $rows_data1 = $rows1['staff_no'];
                $rows_data2 = $rows1['password'];
                $rows_data3 = $rows1['first_name'] . " " . $rows1['surname'];
                $rows_data4 = $rows1['type'];
                if ($staffno == $rows_data1 && $password == $rows_data2) {
                    //$_SESSION['empnum'] = $staffno;
                    $found = true;
                    break;
                }

                if ($staffno == $rows_data1) {
                    $staffnofound = true;
                }
            }

            if (strlen($_POST['empnum']) == 0) {
                echo '<div class="alert alert-danger" role="alert">Please enter your employee number to login!</div>';
            } else if (strlen($_POST['password']) == 0) {
                echo '<div class="alert alert-danger" role="alert">Please enter your password to login!</div>';
            } else {
                if ($found == false) {
                    if ($staffnofound == false) {
                        echo '<div class="alert alert-danger" role="alert">Employee number entered is incorrect!</div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Password entered is incorrect!</div>';
                    }
                } else {
                    $query4 = "SELECT * FROM employee where staff_no='{$_POST['empnum']}'";
                    $result4 = mysqli_query($conn, $query4);

                    while ($rows4 = mysqli_fetch_array($result4)) {
                        $_SESSION['type'] = $rows4['type'];
                    }
                    $_SESSION['login'] = $rows_data3;
                    
                    echo 'success';
                }
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Please enter your login details</div>';
    }
}


/*
  When user clicks submit on reset password
  Now get data from database
 */
if (isset($_POST['reset_empnum'])) {
    $found = false;
    $email;

    if (strlen($_POST['reset_empnum']) > 0) {
        $staffno = $_POST['reset_empnum'];
        $query1 = "SELECT * FROM employee";

        if (strlen($query1) > 0) {
            $result1 = mysqli_query($conn, $query1);

            while ($rows1 = mysqli_fetch_array($result1)) {
                $rows_data1 = $rows1['staff_no'];
                $Question = $rows1['question'];
                $_SESSION['password'] = $rows1['staff_no'];
                if ($staffno == $rows_data1) {
                    $found = true;
                    break;
                }
            }
        }

        if ($found == true) {
            echo '<div class="alert alert-success" role="alert">Your question is: ' . $Question . '. Answer Question <a href="#" data-toggle="modal" data-target="#mymodal2">here</a> !</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">Employee number entered is invalid!! Please check your employee number and try again.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Please enter your employee number to reset your password!</div>';
    }
}

if (isset($_POST['reset_answer'])) {
    $found = false;
    $email;

    if (strlen($_POST['reset_answer']) > 0) {
        $staffno = $_POST['reset_answer'];
        $query1 = "SELECT * FROM employee where staff_no ='" . $_SESSION['password'] . "'";

        if (strlen($query1) > 0) {
            $result1 = mysqli_query($conn, $query1);

            while ($rows1 = mysqli_fetch_array($result1)) {
                $rows_data1 = $rows1['answer'];
                $password = $rows1['password'];

                if ($staffno == $rows_data1) {
                    $found = true;
                    break;
                }
            }
        }

        if ($found == true) {
            echo '<div class="alert alert-success" role="alert">Your password is: ' . $password . '</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">The anwer is incorrect please try again.</div>';
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Please enter your employee number to reset your password!</div>';
    }
}
?>