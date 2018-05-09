<?php

session_start();
include 'dbconnect.php';

$idArr = $_POST['checked_id'];
$qtyArr = $_POST['qtyoil1'];
$idArr2 = $_POST['checked_id2'];
$qtyArr2 = $_POST['qtyoil12'];
$idArr3 = $_POST['checked_id3'];
$qtyArr3 = $_POST['qtyoil13'];
$idArr4 = $_POST['checked_id4'];
$qtyArr4 = $_POST['qtyoil14'];
$idArr5 = $_POST['checked_id5'];
$qtyArr5 = $_POST['qtyoil15'];
$idArr6 = $_POST['checked_id6'];
$qtyArr6 = $_POST['qtyoil16'];
$evid = $_SESSION['evaluation_no'];

$s1 = $_POST['service1id'];
$s2 = $_POST['service2id'];
$s3 = $_POST['service3id'];
$s4 = $_POST['service4id'];
$s5 = $_POST['service5id'];
$s6 = $_POST['service6id'];
$h1 = $_POST['noOfHours'];
$h2 = $_POST['noOfHours2'];
$h3 = $_POST['noOfHours3'];
$h4 = $_POST['noOfHours4'];
$h5 = $_POST['noOfHours5'];
$h6 = $_POST['noOfHours6'];


if (isset($_POST['data1'])) {
    $query7 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s1 . "','" . $evid . "','" . $h1 . "');";
    mysqli_query($conn, $query7);
}
if (isset($_POST['data2'])) {
    $query8 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s2 . "','" . $evid . "','" . $h2 . "');";
    mysqli_query($conn, $query8);
}
if (isset($_POST['data3'])) {
    $query9 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s3 . "','" . $evid . "','" . $h3 . "');";
    mysqli_query($conn, $query9);
}
if (isset($_POST['data4'])) {
    $query7 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s4 . "','" . $evid . "','" . $h4 . "');";
    mysqli_query($conn, $query7);
}
if (isset($_POST['data5'])) {
    $query8 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s5 . "','" . $evid . "','" . $h5 . "');";
    mysqli_query($conn, $query8);
}
if (isset($_POST['data6'])) {
    $query9 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $s6 . "','" . $evid . "','" . $h6 . "');";
    mysqli_query($conn, $query9);
}
for ($i = 0; $i < count($idArr); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr[$i]);
    $qty = $qtyArr[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);

    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}

for ($i = 0; $i < count($idArr2); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr2[$i]);
    $qty = $qtyArr2[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);
    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}
for ($i = 0; $i < count($idArr3); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr3[$i]);
    $qty = $qtyArr3[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);
    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}
for ($i = 0; $i < count($idArr4); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr4[$i]);
    $qty = $qtyArr4[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);
    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}
for ($i = 0; $i < count($idArr5); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr5[$i]);
    $qty = $qtyArr5[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);
    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}
for ($i = 0; $i < count($idArr6); $i++) {
    //$query1 = "INSERT INTO `evaluated_service` (`service_id`, `evaluation_no`, `no_of_hours`) VALUES ('" . $service1 . "', " . $evaluation_id . ", " . $service1 . ");";
    $id = mysql_real_escape_string($idArr6[$i]);
    $qty = $qtyArr6[$i];
    $query4 = "INSERT INTO `quoted_parts` (`part_no`, `evaluation_no`, `qty_quoted`) VALUES ('" . $id . "', '" . $evid . "', '" . $qty . "');";
    mysqli_query($conn, $query4);
    $query9 = mysqli_query($conn, "Select * from `part` where part_no='" . $id . "'");
    while ($row = mysqli_fetch_assoc($query9)) {
        $qtyinstock = $row['qty_in_stock'];
        $newqty = $qtyinstock - $qty;
        $query10 = "update `part` set qty_in_stock ='" . $newqty . "' where part_no='" . $id . "'";
        mysqli_query($conn, $query10);
    }
}
$_SESSION['success_msg'] = 'Successful';
header("Location:servicedetails.php?evid=" . $evid . "");
?>