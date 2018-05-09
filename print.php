<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
$id = $_GET['jid'];
$id2 = $_GET['sid'];
$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage();



$pdf->Image('black.jpg',50,1,-900);


$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
$pdf->Ln(14);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(100, 10, 'JOB CARD', 1, 0);

$query = "SELECT * FROM job_card WHERE job_no='$id' and service_id='$id2'";
$result = mysqli_query($conn, $query);
$no = 0;
while ($row = mysqli_fetch_array($result)) {
    $query2 = "SELECT * FROM service WHERE service_id='$id2'";
    $result2 = mysqli_query($conn, $query2);
    while ($row2 = mysqli_fetch_array($result2)) {
        $service_descr = $row2['description'];
    }
    $no = $no + 1;
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(50, 8, 'Job_ID.', 1, 0);
    $pdf->Cell(50, 8, $row['job_no'], 1, 1);

    $pdf->Cell(50, 8, 'Employee No', 1, 0);
    $pdf->Cell(50, 8, $row['staff_no'], 1, 1);
    $query3 = "SELECT * FROM employee WHERE staff_no='" . $row['staff_no'] . "'";
    $result3 = mysqli_query($conn, $query3);
    while ($row3 = mysqli_fetch_array($result3)) {
        $EmployeeName = $row3['first_name'] . " " . $row3['surname'];
    }
    $pdf->Cell(50, 8, 'Employee Name', 1, 0);
    $pdf->Cell(50, 8, $EmployeeName, 1, 1);
    $pdf->Cell(50, 8, 'Service_ID', 1, 0);
    $pdf->Cell(50, 8, $row['service_id'], 1, 1);

    $pdf->Cell(50, 8, 'Service_Description', 1, 0);
    $pdf->Cell(50, 8, $service_descr, 1, 1);

    $pdf->Cell(50, 8, 'Start Time', 1, 0);
    $pdf->Cell(50, 8, "", 1, 1);

    $pdf->Cell(50, 8, 'End Time', 1, 0);
    $pdf->Cell(50, 8, "", 1, 1);

    $pdf->Cell(50, 8, 'Comment', 1, 0);
    $pdf->Cell(50, 8, "", 1, 1);
}

$pdf->Output();
?>