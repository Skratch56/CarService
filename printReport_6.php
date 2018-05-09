<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
//$id = $_GET['cash_receipt_no'];


if (isset($_GET['evaluation_no'])) {
    $id = $_GET['evaluation_no'];
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

$pdf = new FPDF();
///var_dump(get_class_methods($pdf));

    $pdf->AddPage('L');

    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(287, 10, 'Evaluation Reports', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 10, 'No.', 1);
    $pdf->Cell(25, 10, 'Evaluation No', 1);
    $pdf->Cell(25, 10, 'Evaluation Date', 1);
    $pdf->Cell(25, 10, 'Quoted Amount', 1);
    $pdf->Cell(25, 10, 'Evaluation Status', 1);
    $pdf->Cell(25, 10, 'Staff No', 1);
    $pdf->Cell(30, 10, 'Employee Name', 1);
    $pdf->Cell(32, 10, 'Vin Number', 1);
    $pdf->Cell(30, 10, 'Registration No', 1);
    $pdf->Cell(30, 10, 'Customer ID No', 1);
    $pdf->Cell(30, 10, 'Customer Name', 1);


    $query = "SELECT * FROM evaluation WHERE evaluation_no='$id'";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $sql5 = mysqli_query($conn, "SELECT * FROM booking where booking_id='" . $row['booking_id'] . "'");
        while ($row5 = mysqli_fetch_assoc($sql5)) {
            $sql2 = mysqli_query($conn, "SELECT * FROM vehicle where vin_number='" . $row5['vin_number'] . "'");
            while ($row2 = mysqli_fetch_assoc($sql2)) {
                $sql3 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row5['customer_id']);
                while ($row3 = mysqli_fetch_assoc($sql3)) {
                    $sql4 = mysqli_query($conn, "SELECT * FROM employee where staff_no=" . $row['staff_no']);
                    while ($row4 = mysqli_fetch_assoc($sql4)) {
                        $no = $no + 1;
                        $pdf->Ln(10);
                        $pdf->SetFont('Arial', '', 8);
                        $pdf->Cell(10, 10, $no, 1);

                        $pdf->Cell(25, 10, $row['evaluation_no'], 1);

                        $pdf->Cell(25, 10, $row['date'], 1);

                        $pdf->Cell(25, 10, $row['quoted_amt'], 1);

                        $pdf->Cell(25, 10, $row['evaluation_status'], 1);
                        
                        $pdf->Cell(25, 10, $row4['staff_no'], 1);

                        $pdf->Cell(30, 10, $row4['first_name'] . ' ' . $row4['surname'], 1);

                        $pdf->Cell(32, 10, $row2['vin_number'], 1);

                        $pdf->Cell(30, 10, $row2['registration_no'], 1);

                        $pdf->Cell(30, 10, $row3['idnumber'], 1);

                        $pdf->Cell(30, 10, $row3['first_name'] . ' ' . $row3['surname'], 1);
                    }
                }
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
    $pdf->Cell(287, 10, 'Evaluation Reports', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 10, 'No.', 1);
    $pdf->Cell(25, 10, 'Evaluation No', 1);
    $pdf->Cell(25, 10, 'Evaluation Date', 1);
    $pdf->Cell(25, 10, 'Quoted Amount', 1);
    $pdf->Cell(25, 10, 'Evaluation Status', 1);
    $pdf->Cell(25, 10, 'Staff No', 1);
    $pdf->Cell(30, 10, 'Employee Name', 1);
    $pdf->Cell(32, 10, 'Vin Number', 1);
    $pdf->Cell(30, 10, 'Registration No', 1);
    $pdf->Cell(30, 10, 'Customer ID No', 1);
    $pdf->Cell(30, 10, 'Customer Name', 1);


    $query = "SELECT * FROM evaluation";
    $result = mysqli_query($conn, $query);
    $no = 0;
    while ($row = mysqli_fetch_assoc($result)) {
        $sql5 = mysqli_query($conn, "SELECT * FROM booking where booking_id='" . $row['booking_id'] . "'");
        while ($row5 = mysqli_fetch_assoc($sql5)) {
            $sql2 = mysqli_query($conn, "SELECT * FROM vehicle where vin_number='" . $row5['vin_number'] . "'");
            while ($row2 = mysqli_fetch_assoc($sql2)) {
                $sql3 = mysqli_query($conn, "SELECT * FROM customer where customer_id=" . $row5['customer_id']);
                while ($row3 = mysqli_fetch_assoc($sql3)) {
                    $sql4 = mysqli_query($conn, "SELECT * FROM employee where staff_no=" . $row['staff_no']);
                    while ($row4 = mysqli_fetch_assoc($sql4)) {
                        $no = $no + 1;
                        $pdf->Ln(10);
                        $pdf->SetFont('Arial', '', 8);
                        $pdf->Cell(10, 10, $no, 1);

                        $pdf->Cell(25, 10, $row['evaluation_no'], 1);

                        $pdf->Cell(25, 10, $row['date'], 1);

                        $pdf->Cell(25, 10, $row['quoted_amt'], 1);

                        $pdf->Cell(25, 10, $row['evaluation_status'], 1);
                        
                        $pdf->Cell(25, 10, $row4['staff_no'], 1);

                        $pdf->Cell(30, 10, $row4['first_name'] . ' ' . $row4['surname'], 1);

                        $pdf->Cell(32, 10, $row2['vin_number'], 1);

                        $pdf->Cell(30, 10, $row2['registration_no'], 1);

                        $pdf->Cell(30, 10, $row3['idnumber'], 1);

                        $pdf->Cell(30, 10, $row3['first_name'] . ' ' . $row3['surname'], 1);
                    }
                }
            }
        }
    }
}






$pdf->Output();
?>