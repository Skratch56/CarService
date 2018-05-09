<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
//$id = $_GET['cash_receipt_no'];


if (isset($_GET['job_no'])) {
    $id = $_GET['job_no'];
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

    $pdf->AddPage();



    $pdf->Image('black.jpg', 50, 1, -900);


    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
    $pdf->Ln(14);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100, 10, 'Completed Jobs', 1, 0);

    $query = "SELECT * FROM job WHERE job_no='$id'";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {

        $no = $no + 1;
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 8, 'Job No', 1, 0);
        $pdf->Cell(50, 8, $id, 1, 1);
        $pdf->Cell(50, 8, 'Job Date', 1, 0);
        $pdf->Cell(50, 8, $row['job_date'], 1, 1);
        $pdf->Cell(50, 8, 'Job Status', 1, 0);
        $pdf->Cell(50, 8, $row['status'], 1, 1);
        $pdf->Cell(50, 8, 'Evaluation No', 1, 0);
        $pdf->Cell(50, 8, $row['evaluation_no'], 1, 1);
        $pdf->Cell(50, 8, 'Job Cards', 1, 0);


        $sql2 = mysqli_query($conn, "SELECT * FROM job_card where job_no=" . $row['job_no']);
        if (mysqli_num_rows($sql2) == 0) {
            $pdf->Cell(50, 8, 'No Job Cards', 1, 1);
        } else {
            $pdf->Cell(50, 8, 'Job Cards', 1, 1);
            while ($row2 = mysqli_fetch_assoc($sql2)) {
                $pdf->Cell(50, 8, '', 1, 0);
                $pdf->Cell(50, 8, '', 1, 1);
                $pdf->Cell(50, 8, '', 1, 0);
                $pdf->Cell(50, 8, '', 1, 1);
                $pdf->Cell(50, 8, 'Service_id', 1, 0);
                $pdf->Cell(50, 8, $row2['service_id'], 1, 1);

                $pdf->Cell(50, 8, 'Job_No', 1, 0);
                $pdf->Cell(50, 8, $row2['job_no'], 1, 1);

                $pdf->Cell(50, 8, 'Start_Time', 1, 0);
                $pdf->Cell(50, 8, $row2['start_time'], 1, 1);

                $pdf->Cell(50, 8, 'End_Time', 1, 0);
                $pdf->Cell(50, 8, $row2['end_time'], 1, 1);

                $pdf->Cell(50, 8, 'Service_Total', 1, 0);
                $pdf->Cell(50, 8, $row2['service_total'], 1, 1);
                $pdf->Cell(50, 8, 'Staff_No', 1, 0);
                $pdf->Cell(50, 8, $row2['staff_no'], 1, 1);
            }
        }
    }
} else {
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

    $pdf->AddPage('L');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Cash Receipts', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 10, 'No.', 1);
    $pdf->Cell(20, 10, 'Job No', 1);
    $pdf->Cell(20, 10, 'Job Date', 1);
    $pdf->Cell(20, 10, 'Job Status', 1);
    $pdf->Cell(25, 10, 'Evaluation No', 1);
    $pdf->Cell(80, 10, 'Job Cards', 1);

    $query = "SELECT * FROM job";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {

        $no = $no + 1;
        $pdf->Ln(10);
        $pdf->SetFont('Arial', '', 8);
        $pdf->Cell(10, 10, $no, 1);
        $pdf->Cell(20, 10, $row['job_no'], 1);
        $pdf->Cell(20, 10, $row['job_date'], 1);
        $pdf->Cell(20, 10, $row['status'], 1);
        $pdf->Cell(25, 10, $row['evaluation_no'], 1);



        $sql2 = mysqli_query($conn, "SELECT * FROM job_card where job_no=" . $row['job_no']);
        if (mysqli_num_rows($sql2) == 0) {
            $pdf->Cell(20, 10, 'No Job Cards', 1);
        } else {

            while ($row2 = mysqli_fetch_assoc($sql2)) {


                $pdf->Cell(20, 10, 'Job Cards', 1);

                $pdf->Cell(20, 10, 'Service_id', 1);
                $pdf->Cell(20, 10, $row2['service_id'], 1);

                $pdf->Cell(20, 10, 'Job_No', 1);
                $pdf->Cell(20, 10, $row2['job_no'], 1);

                $pdf->Cell(20, 10, 'Start_Time', 1);
                $pdf->Cell(20, 10, $row2['start_time'], 1);

                $pdf->Cell(20, 10, 'End_Time', 1);
                $pdf->Cell(20, 10, $row2['end_time'], 1);

                $pdf->Cell(20, 10, 'Service_Total', 1);
                $pdf->Cell(20, 10, $row2['service_total'], 1);
                $pdf->Cell(20, 10, 'Staff_No', 1, 0);
                $pdf->Cell(20, 10, $row2['staff_no'], 1);
            }
        }
    }
}




$pdf->Output();
?>