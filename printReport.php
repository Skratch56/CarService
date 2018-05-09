<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
//$id = $_GET['cash_receipt_no'];


if (isset($_GET['cash_receipt_no'])) {
    $id = $_GET['cash_receipt_no'];
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

    $pdf->AddPage();



    $pdf->Image('black.jpg', 50, 1, -900);


    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
    $pdf->Ln(14);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 10, 'Cash Receipt', 1, 0);
    $query = "SELECT * FROM cash_receipt WHERE cash_receipt_no='$id'";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {

        $sql2 = mysqli_query($conn, "SELECT * FROM job where job_no=" . $row['job_no']);
        while ($row2 = mysqli_fetch_assoc($sql2)) {
            $sql3 = mysqli_query($conn, "SELECT * FROM evaluation where evaluation_no=" . $row2['evaluation_no']);
            while ($row3 = mysqli_fetch_assoc($sql3)) {
                $sql4 = mysqli_query($conn, "SELECT * FROM booking where booking_id=" . $row3['booking_id']);
                while ($row4 = mysqli_fetch_assoc($sql4)) {
                    $sql5 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row4['customer_id']);
                    while ($row5 = mysqli_fetch_assoc($sql5)) {
                        $no = $no + 1;
                        $pdf->Ln(10);
                        $pdf->SetFont('Arial', '', 12);
                        $pdf->Cell(50, 8, 'Cash Receipt No.', 1, 0);
                        $pdf->Cell(50, 8, $id, 1, 1);
                        $pdf->Cell(50, 8, 'Date', 1, 0);
                        $pdf->Cell(50, 8, $row['date'], 1, 1);
                        $pdf->Cell(50, 8, 'Amount', 1, 0);
                        $pdf->Cell(50, 8, $row['amount'], 1, 1);
                        $pdf->Cell(50, 8, 'Transaction Type', 1, 0);
                        $pdf->Cell(50, 8, $row['transaction_type'], 1, 1);
                        $pdf->Cell(50, 8, 'Status', 1, 0);
                        $pdf->Cell(50, 8, $row['Status'], 1, 1);

                        $pdf->Cell(50, 8, 'Job No', 1, 0);
                        $pdf->Cell(50, 8, $row['job_no'], 1, 1);

                        $pdf->Cell(50, 8, 'Job Date', 1, 0);
                        $pdf->Cell(50, 8, $row2['job_date'], 1, 1);

                        $pdf->Cell(50, 8, 'Job Status', 1, 0);
                        $pdf->Cell(50, 8, $row2['status'], 1, 1);

                        $pdf->Cell(50, 8, 'Evauluation No', 1, 0);
                        $pdf->Cell(50, 8, $row2['evaluation_no'], 1, 1);
                        $pdf->Cell(50, 8, 'Vin Number', 1, 0);
                        $pdf->Cell(50, 8, $row4['vin_number'], 1, 1);
                        $pdf->Cell(50, 8, 'Customer ID No', 1, 0);
                        $pdf->Cell(50, 8, $row5['idnumber'], 1, 1);
                    }
                }
            }
        }
    }
} else {
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf->AddPage('L');

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,10,'Date:'.date('d-m-Y').'',0,"R");
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(275,10,'Cash Receipts',1,1,"C");
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10,10,'No.',1);
$pdf->Cell(25,10,'Cash Receipt No.',1);
$pdf->Cell(20,10,'Date',1);
$pdf->Cell(20,10,'Amount',1);
$pdf->Cell(25,10,'Transaction Type',1);
$pdf->Cell(20,10,'Status',1);
$pdf->Cell(20,10,'Job No',1);
$pdf->Cell(20,10,'Job Date',1);
$pdf->Cell(20,10,'Job Status',1);
$pdf->Cell(25,10,'Evauluation No',1);
$pdf->Cell(35,10,'Vin Number',1);
$pdf->Cell(35,10,'Customer ID No',1);

$query = "SELECT * FROM cash_receipt ";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {

        $sql2 = mysqli_query($conn, "SELECT * FROM job where job_no=" . $row['job_no']);
        while ($row2 = mysqli_fetch_assoc($sql2)) {
            $sql3 = mysqli_query($conn, "SELECT * FROM evaluation where evaluation_no=" . $row2['evaluation_no']);
            while ($row3 = mysqli_fetch_assoc($sql3)) {
                $sql4 = mysqli_query($conn, "SELECT * FROM booking where booking_id=" . $row3['booking_id']);
                while ($row4 = mysqli_fetch_assoc($sql4)) {
                    $sql5 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row4['customer_id']);
                    while ($row5 = mysqli_fetch_assoc($sql5)) {
                        $no = $no + 1;
                        $pdf->Ln(10);
                        $pdf->SetFont('Arial', '', 8);
                        $pdf->Cell(10,10,$no,1);
                        $pdf->Cell(25, 10, $row['cash_receipt_no'], 1);
                        
                        $pdf->Cell(20, 10, $row['date'], 1);
                        
                        $pdf->Cell(20, 10, $row['amount'], 1);
                        
                        $pdf->Cell(25, 10, $row['transaction_type'], 1);
                        
                        $pdf->Cell(20, 10, $row['Status'], 1);

                        
                        $pdf->Cell(20, 10, $row['job_no'], 1);

                       
                        $pdf->Cell(20, 10, $row2['job_date'], 1);

                       

                       
                        $pdf->Cell(20, 10, $row2['status'], 1);

                        
                        $pdf->Cell(25, 10, $row2['evaluation_no'], 1);
                        
                        $pdf->Cell(35, 10, $row4['vin_number'], 1);
                        
                        $pdf->Cell(35, 10, $row5['idnumber'], 1);
                    }
                }
            }
        }
    }
}


$pdf->Output();
?>