<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
//$id = $_GET['cash_receipt_no'];


if (isset($_GET['booking_id'])) {
$id = $_GET['booking_id'];
$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();



$pdf->Image('black.jpg', 50, 1, -900);


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
$pdf->Ln(14);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 10, 'Completed Jobs', 1, 0);

$query = "SELECT * FROM booking WHERE booking_id='$id'";
$result = mysqli_query($conn, $query);
$no = 0;
while ($row = mysqli_fetch_array($result)) {
$sql2 = mysqli_query($conn, "SELECT * FROM vehicle where vin_number='" . $row['vin_number'] . "'");
while ($row2 = mysqli_fetch_assoc($sql2)) {
$sql3 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row['customer_id']);
while ($row3 = mysqli_fetch_assoc($sql3)) {
$no = $no + 1;
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 8, 'Booking No', 1, 0);
$pdf->Cell(50, 8, $id, 1, 1);
$pdf->Cell(50, 8, 'Booking Date', 1, 0);
$pdf->Cell(50, 8, $row['booking_date'], 1, 1);
$pdf->Cell(50, 8, 'Booking Time', 1, 0);
$pdf->Cell(50, 8, $row['booking_time'], 1, 1);
$pdf->Cell(50, 8, 'Booking Status', 1, 0);
$pdf->Cell(50, 8, $row['status'], 1, 1);
$pdf->Cell(50, 8, 'Vin Number', 1, 0);
$pdf->Cell(50, 8, $row2['vin_number'], 1, 1);
$pdf->Cell(50, 8, 'Registration No', 1, 0);
$pdf->Cell(50, 8, $row2['registration_no'], 1, 1);
$pdf->Cell(50, 8, 'Customer ID No', 1, 0);
$pdf->Cell(50, 8, $row3['idnumber'], 1, 1);
$pdf->Cell(50, 8, 'Customer Name', 1, 0);
$pdf->Cell(50, 8, $row3['first_name'] . ' ' . $row3['surname'], 1, 1);
}
}
}
} else {
$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage('L');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(50, 10, 'Date:'.date('d-m-Y').'', 0, "R");
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(230, 10, 'Booking Reports', 1, 1, "C");
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(10, 10, 'No.', 1);
$pdf->Cell(25, 10, 'Booking No', 1);
$pdf->Cell(25, 10, 'Booking Date', 1);
$pdf->Cell(25, 10, 'booking_time', 1);
$pdf->Cell(25, 10, 'Booking Status', 1);
$pdf->Cell(30, 10, 'Vin Number', 1);
$pdf->Cell(30, 10, 'Registration No', 1);
$pdf->Cell(30, 10, 'Customer ID No', 1);
$pdf->Cell(30, 10, 'Customer Name', 1);


$query = "SELECT * FROM booking";
$result = mysqli_query($conn, $query);
$no = 0;
while ($row = mysqli_fetch_array($result)) {
$sql2 = mysqli_query($conn, "SELECT * FROM vehicle where vin_number='" . $row['vin_number'] . "'");
while ($row2 = mysqli_fetch_assoc($sql2)) {
$sql3 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row['customer_id']);
while ($row3 = mysqli_fetch_assoc($sql3)) {
$no = $no + 1;
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(10, 10, $no, 1);

$pdf->Cell(25, 10, $row['booking_id'], 1);

$pdf->Cell(25, 10, $row['booking_date'], 1);

$pdf->Cell(25, 10, $row['booking_time'], 1);

$pdf->Cell(25, 10, $row['status'], 1);

$pdf->Cell(30, 10, $row2['vin_number'], 1);

$pdf->Cell(30, 10, $row2['registration_no'], 1);

$pdf->Cell(30, 10, $row3['idnumber'], 1);

$pdf->Cell(30, 10, $row3['first_name'] . ' ' . $row3['surname'], 1);
}
}
}
}






$pdf->Output();
?>