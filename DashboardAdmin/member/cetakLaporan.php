<?php
require '../../fpdf/fpdf.php';
require '../../config/config.php';

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Member', 0, 1, 'C');
        $this->Ln(5);
    }

    // Footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Create instance of the PDF class
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Fetch data from database
$result = mysqli_query($conn, "SELECT * FROM member");

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(40, 10, $row['nisn'], 1);
    $pdf->Cell(40, 10, $row['nama'], 1);
    $pdf->Cell(40, 10, $row['kelas'], 1);
    $pdf->Cell(40, 10, $row['jurusan'], 1);
    $pdf->Ln();
}

$pdf->Output();
?> 