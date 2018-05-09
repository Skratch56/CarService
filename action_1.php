<?php

session_start();
include 'dbconnect.php';

    $idArr = $_POST['checked_id'];
    $qtyArr = $_POST['qtyoil1'];
    $idArr2 = $_POST['checked_id2'];
    $qtyArr2 = $_POST['qtyoil12'];
    $idArr3 = $_POST['checked_id3'];
    $qtyArr3 = $_POST['qtyoil13'];
    $evid = $_SESSION['evaluation_no'];
    $s1 = $_POST['service1id'];
    $s2 = $_POST['service2id'];
    $s3 = $_POST['service3id'];
    $h1 = $_POST['noOfHours'];
    $h2 = $_POST['noOfHours2'];
    $h3 = $_POST['noOfHours3'];
    
    
    if (isset($_POST['data1'])){
        $query7 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s1 . "','" . $evid . "','" . $h1 . "');";
        mysqli_query($conn, $query7);
    }
    if (isset($_POST['data2'])){
        $query8 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s2 . "','" . $evid . "','" . $h2 . "');";
        mysqli_query($conn, $query8);
    }
    if (isset($_POST['data3'])){
        $query9 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s3 . "','" . $evid . "','" . $h3 . "');";
        mysqli_query($conn, $query9);
    }
    for ($i = 0; $i < count($idArr); $i++) {
        //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
        $id = mysql_real_escape_string($idArr[$i]);
        $qty = $qtyArr[$i];
        $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
        mysqli_query($conn, $query4);
    }

    for ($i = 0; $i < count($idArr2); $i++) {
        //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
        $id = mysql_real_escape_string($idArr2[$i]);
        $qty = $qtyArr2[$i];
        $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
        mysqli_query($conn, $query4);
    }
    for ($i = 0; $i < count($idArr3); $i++) {
        //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
        $id = mysql_real_escape_string($idArr3[$i]);
        $qty = $qtyArr3[$i];
        $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
        mysqli_query($conn, $query4);
    }
    $_SESSION['success_msg'] = 'Successful';
    header("Location:service.php?evid=" . $evid."&suc=1");

?>