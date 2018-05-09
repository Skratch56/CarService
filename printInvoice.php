<?php

require('fpdf/fpdf.php');
include 'dbconnect.php';
//$id = $_GET['cash_receipt_no'];


if (isset($_GET['evid'])) {
    $id = $_GET['evid'];
    $pdf = new FPDF();
///var_dump(get_class_methods($pdf));

    $pdf->AddPage();



    $pdf->Image('black.jpg', 50, 1, -450);


//    $pdf->SetFont('Arial', 'B', 16);
//    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
//    $pdf->Ln(14);
//    $pdf->SetFont('Arial', '', 10);
//    $pdf->Cell(100, 10, 'Invoice', 1, 0);

    $no = 0;


    $TotAmount = 0;

    $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
    $result7 = mysqli_query($conn, $query2);

    while ($rows2 = mysqli_fetch_array($result7)) {
        $noOfHours = $rows2['no_of_hours'];
        $service_id = $rows2['service_id'];

        $query3 = "SELECT * from service WHERE service_id = '" . $service_id . "'";
        $result3 = mysqli_query($conn, $query3);

        while ($rows3 = mysqli_fetch_array($result3)) {
            $rateperhour = $rows3['rate_per_hour'];
            $TotAmount += $rateperhour * $noOfHours;
        }
    }

    $query4 = "SELECT * from quoted_parts WHERE evaluation_no = '" . $_GET['evid'] . "'";
    $result6 = mysqli_query($conn, $query4);

    while ($rows4 = mysqli_fetch_array($result6)) {
        $qtyQuoted = $rows4['qty_quoted'];
        $part_No = $rows4['part_no'];

        $query5 = "SELECT * from part WHERE part_no ='$part_No'";
        $result5 = mysqli_query($conn, $query5);

        while ($rows5 = mysqli_fetch_array($result5)) {
            $sellingprice = $rows5['selling_price'];
            $TotAmount += $qtyQuoted * $sellingprice;
        }

        $query2 = "SELECT * from evaluation WHERE evaluation_no = '" . $_GET['evid'] . "'";
        $result8 = mysqli_query($conn, $query2);

        while ($rows2 = mysqli_fetch_array($result8)) {
            $booking_id = $rows2['booking_id'];
        }
        $query3 = "SELECT * from booking WHERE booking_id = '" . $booking_id . "'";
        $result9 = mysqli_query($conn, $query3);

        while ($rows3 = mysqli_fetch_array($result9)) {
            $customer_id = $rows3['customer_id'];
        }

        $query4 = "SELECT * from customer WHERE customer_id = '" . $customer_id . "'";
        $result10 = mysqli_query($conn, $query4);

        while ($rows4 = mysqli_fetch_array($result10)) {
            $customer_fname = $rows4['first_name'];
            $customer_sname = $rows4['surname'];
        }

        $TotHours = null;

        $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
        $result11 = mysqli_query($conn, $query2);

        while ($rows2 = mysqli_fetch_array($result11)) {
            $TotHours += $rows2['no_of_hours'];
        }

        $query2 = "SELECT * from evaluation WHERE evaluation_no = '" . $_GET['evid'] . "'";
        $result12 = mysqli_query($conn, $query2);

        while ($rows2 = mysqli_fetch_array($result12)) {
            $booking_id = $rows2['booking_id'];
        }
        $query3 = "SELECT * from booking WHERE booking_id = '" . $booking_id . "'";
        $result3 = mysqli_query($conn, $query3);

        while ($rows3 = mysqli_fetch_array($result3)) {
            $vin_number = $rows3['vin_number'];
        }

        $query4 = "SELECT * from vehicle WHERE vin_number = '" . $vin_number . "'";
        $result4 = mysqli_query($conn, $query4);

        while ($rows4 = mysqli_fetch_array($result4)) {
            $reg_num = $rows4['registration_no'];
        }
    }



    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50, 10, 'Date:' . date('d-m-Y') . '', 0, "R");
    
    $pdf->SetFont('Arial', 'B', 16);
    
    $pdf->Cell(30, 20, 'Quotation', 0, "R");
    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(105, 10, 'Evaluation Details', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(25, 10, 'Total Amount.', 1);
    $pdf->Cell(25, 10, 'Customer Details', 1);
    $pdf->Cell(25, 10, 'Total Hours', 1);
    $pdf->Cell(30, 10, 'Registration Number', 1);


    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 8);


    $pdf->Cell(25, 10, $TotAmount, 1);

    $pdf->Cell(25, 10, $customer_id . ' ' . $customer_fname . '  ' . $customer_sname, 1);

    $pdf->Cell(25, 10, $TotHours, 1);
    $pdf->Cell(30, 10, $reg_num, 1);



    $query2 = "SELECT * from evaluated_service WHERE evaluation_no = '" . $_GET['evid'] . "'";
    $result13 = mysqli_query($conn, $query2);
    $pdf->SetFont('Arial', '', 10);

    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(105, 10, 'Services', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(25, 10, 'Sevice ID.', 1);
    $pdf->Cell(25, 10, 'Description', 1);
    $pdf->Cell(25, 10, 'Rate Per Hour', 1);
    $pdf->Cell(30, 10, 'Selected Hours', 1);
    while ($rows2 = mysqli_fetch_array($result13)) {
        $noOfHours = $rows2['no_of_hours'];
        $service_id = $rows2['service_id'];




        $sql = "SELECT * from service WHERE service_id = '" . $service_id . "'";

        $i = 0;
        $previousArtistID = "";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {




            $pdf->Ln(10);
            $pdf->SetFont('Arial', '', 8);


            $pdf->Cell(25, 10, $row['service_id'], 1);

            $pdf->Cell(25, 10, $row['description'], 1);

            $pdf->Cell(25, 10, $row['rate_per_hour'], 1);
            $pdf->Cell(30, 10, $noOfHours, 1);
        }
    }

    $query2 = "SELECT * from quoted_parts WHERE evaluation_no = '" . $_GET['evid'] . "'";
    $result2 = mysqli_query($conn, $query2);
    $pdf->SetFont('Arial', '', 10);

    $pdf->Ln(15);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(105, 10, 'Parts', 1, 1, "C");
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(25, 10, 'Part_No.', 1);
    $pdf->Cell(25, 10, 'Description', 1);
    $pdf->Cell(25, 10, 'Selling_price', 1);
    $pdf->Cell(30, 10, 'Qty_quoted', 1);
    while ($rows2 = mysqli_fetch_array($result2)) {
        $part_no = $rows2['part_no'];




        $sql = "SELECT * from part WHERE part_no = '" . $part_no . "'";

        $i = 0;
        $previousArtistID = "";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {




            $pdf->Ln(10);
            $pdf->SetFont('Arial', '', 8);


            $pdf->Cell(25, 10, $row['part_no'], 1);

            $pdf->Cell(25, 10, $row['description'], 1);

            $pdf->Cell(25, 10, $row['qty_in_stock'], 1);
            $pdf->Cell(30, 10, $rows2['qty_quoted'], 1);
        }
    }
}



$pdf->Output();
?>