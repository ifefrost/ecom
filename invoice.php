<?php
require('./db/db_conn.php');
require_once("./db/functions.inc.php");
require_once("./assets/fpdf/fpdf.php");
redirectIfNotLoggedIn();

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(200);
        $this->SetTextColor(0,128,0);
        $this->Cell(30, 10, 'TEAM !NULL ECOMMERCE PROJECT', 0, 0, 'C');
        $this->Line(10, 20, 290, 20);
        $this->Ln(15);
        $this->SetFont('Helvetica', '', 20);
        $this->Cell(30, 10, 'INVOICE', 0, 0, 'C');
    }

    function Footer()
    {
        $this->SetY(-40);
        $this->SetLineWidth(0.5);
        $this->Line(10, 165, 290, 165);
        $this->SetFont('Helvetica', 'I', 10);
        $this->Cell(200, 10, 'Note: Please make the required amount of payment to our account and be sure to include', 0, 0, 'L');
        $this->Ln(5);
        $this->Cell(200, 10, 'the invoice number from this transaction to ensure transaction can be easily traced.', 0, 0, 'L');
        $this->Ln(8);
        $this->Cell(100, 10, 'Thank you for shopping with us!', 0, 0, 'L');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$cart = fetchCart();
$userdetails = getUserDetails();

$pdf = new PDF('L');
$pdf->SetTitle("Purchase Invoice");
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->Ln(10);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf-> Cell(30, 10, 'Invoice Number:', 0, 0, 'L');
$pdf->SetFont('Helvetica', '', 10);
$pdf-> Cell(30, 10, 'INV-0001', 0, 0, 'L');
$pdf->Cell(170);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf-> Cell(50, 10, 'CUSTOMER DETAILS:', 0, 0, 'R');
$pdf->Ln(7);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf-> Cell(10, 10, 'Date:', 0, 0, 'L');
$pdf->SetFont('Helvetica', '', 10);
$date = date('Y/m/d');
$pdf-> Cell(30, 10, $date, 0, 0, 'L');
$pdf->Cell(190);
$pdf->SetFont('Helvetica', '', 10);
$pdf-> Cell(50, 10, $userdetails[0]['FirstName']." ".$userdetails[0]['LastName'], 0, 0, 'R');
$pdf->Ln(7);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf-> Cell(15, 10, 'Payment Due:', 0, 0, 'L');
$pdf->SetFont('Helvetica', '', 10);
$pdf-> Cell(30, 10, date('Y/m/d', strtotime($date.' + 7 days')), 0, 0, 'R');
$pdf->Cell(175);
$pdf->SetFont('Helvetica', '', 10);
$pdf-> Cell(60, 10, '1234 Street, City, State, Country', 0, 0, 'R');
$pdf->Ln(7);
$pdf->Cell(230);
$pdf->SetFont('Helvetica', '', 10);
$pdf-> Cell(50, 10, $userdetails[0]['Email'], 0, 0, 'R');
$pdf->Ln(15);
$pdf->SetFillColor(120,180,120);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(130, 10, 'PRODUCT DETAILS', 1, 0, 'L', true);
$pdf->Cell(50, 10, 'PRICE', 1, 0, 'R', true);
$pdf->Cell(50, 10, 'QUANTITY', 1, 0, 'R', true);
$pdf->Cell(50, 10, 'SUBTOTAL', 1, 0, 'R', true);

// At this point i will use a foreach loop to go through items in the cart, calculate the total price, total quantity and display them in the invoice
foreach($cart as $item){
    $pdf->Ln(10);
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->Cell(130, 10, $item['product_name'], 1, 0, 'L');
    $pdf->Cell(50, 10, '$'.' '.$item['product_price'], 1, 0, 'R');
    $pdf->Cell(50, 10, $item['cart_qty'], 1, 0, 'R');
    $pdf->Cell(50, 10, '$'.' '.$item['product_price']*$item['cart_qty'], 1, 0, 'R');
}

$pdf->Ln(10);
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->Cell(180);
$pdf->Cell(50, 10, 'SUBTOTAL', 1, 0, 'R', true);
$pdf->Cell(50, 10, '$ '.fetchCartTotalPrice()["total"], 1, 0, 'R', true);
$pdf->Ln(10);
$pdf->Cell(180);
$pdf->Cell(50, 10, 'TAXES (13%)', 1, 0, 'R', true);
$pdf->Cell(50, 10, '$ '.fetchCartTotalPrice()["total"]*0.13, 1, 0, 'R', true);
$pdf->Ln(10);
$pdf->Cell(180);
$pdf->Cell(50, 10, 'TOTAL', 1, 0, 'R', true);
$pdf->Cell(50, 10, '$ '.fetchCartTotalPrice()["total"]*1.13, 1, 0, 'R', true);
$pdf->Ln(10);


$pdf->Output();
