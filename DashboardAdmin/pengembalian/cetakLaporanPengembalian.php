<?php
require '../../fpdf/fpdf.php';
require '../../config/config.php';

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Laporan Pengembalian Buku', 0, 1, 'C');
        $this->Ln(5);
        
        // Add table header
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 10, 'ID', 1);
        $this->Cell(20, 10, 'ID Buku', 1);
        $this->Cell(40, 10, 'Judul', 1);
        $this->Cell(20, 10, 'NISN', 1);
        $this->Cell(30, 10, 'Nama', 1);
        $this->Cell(20, 10, 'Kelas', 1);
        $this->Cell(30, 10, 'Jurusan', 1);
        $this->Cell(30, 10, 'Nama Admin', 1);
        $this->Cell(30, 10, 'Tgl Kembali', 1);
        $this->Cell(20, 10, 'Keterlambatan', 1);
        $this->Cell(20, 10, 'Denda', 1);
        $this->Ln();
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
$pdf->SetFont('Arial', '', 10);

// Fetch data from database
$result = mysqli_query($conn, "SELECT pengembalian.id_pengembalian, pengembalian.id_buku, buku.judul, pengembalian.nisn, member.nama, member.kelas, member.jurusan, admin.nama_admin, pengembalian.buku_kembali, pengembalian.keterlambatan, pengembalian.denda FROM pengembalian INNER JOIN buku ON pengembalian.id_buku = buku.id_buku INNER JOIN member ON pengembalian.nisn = member.nisn INNER JOIN admin ON pengembalian.id_admin = admin.id");

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(20, 10, $row['id_pengembalian'], 1);
    $pdf->Cell(20, 10, $row['id_buku'], 1);
    $pdf->Cell(40, 10, $row['judul'], 1);
    $pdf->Cell(30, 10, $row['kategori'], 1);
    $pdf->Cell(20, 10, $row['nisn'], 1);
    $pdf->MultiCell(30, 10, $row['nama'], 1);
    $pdf->Cell(20, 10, $row['kelas'], 1);
    $pdf->Cell(30, 10, $row['jurusan'], 1);
    $pdf->Cell(30, 10, $row['nama_admin'], 1);
    $pdf->Cell(30, 10, $row['buku_kembali'], 1);
    $pdf->Cell(20, 10, $row['keterlambatan'], 1);
    $pdf->Cell(20, 10, $row['denda'], 1);
    $pdf->Ln();
}

$pdf->Output();
?> 