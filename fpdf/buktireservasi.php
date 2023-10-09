<?php
// session_start();
// if(!isset($_SESSION['username'])){
//     header("location:index.php");
// }
require('fpdf.php');

class PDF extends FPDF{
// Page Header
function Header()
{
    // $this->Image('naga.png',10,8,17);
    // Arial bold 12
    $this->SetFont('Arial','B',19);
    // Geser Kanan 30mm
    $this->Cell(37);
    // Judul
    $this->Cell(120,5,'ELBRIA HOTEL',0,1,'C');
    $this->Cell(37);
    $this->SetFont('Arial','B',14);
   
    // Garis Bawah Double
    $this->SetLineWidth(1);
    $this->Line(10,30,205,30);
    $this->SetLineWidth(0);
    $this->Line(10,32,205,32);
    // Line break 5mm
    $this->Ln(6);
}
}
// Instanciation of inherited class
$pdf = new PDF('P','mm','A4');
$pdf->AliasNbPages();

$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
$pdf->Cell(120,6,'BUKTI PEMESANAN',0,1,'C');
$pdf->Ln(5);
include '../lib/koneksi.php';
$idpesan = $_GET['isd'];
$sql = $con->query("SELECT*FROM pemesanan WHERE id_pesanan='$idpesan'");
$no = 1;
$row = mysqli_fetch_array($sql);
$rw = $row['id_kamar'];
$sqll = $con->query("SELECT*FROM tb_kamar WHERE id_kamar ='$rw'");
$tamps = $sqll->fetch_array();

$pdf->SetFont('Times','',12);

$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
$pdf->Cell(120,20,'NO PEMESANAN',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(37);
$pdf->Cell(120,0,$row['id_pesanan'],0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
$pdf->Cell(120,20,'JAM PEMESANAN',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(37);
$pdf->Cell(120,0,$row['Jam_pesan'],0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
$pdf->Cell(120,20,'NAMA PEMESAN',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(37);
$pdf->Cell(120,0,$row['nama_pemesan'],0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
$pdf->Cell(120,20,'NAMA KAMAR',0,1,'C');
$pdf->SetFont('Arial','B',10);
$pdf->Cell(37);
$pdf->Cell(120,0,$tamps['nama_kamar'],0,1,'C');
$pdf->SetFont('Arial','B',14);
$pdf->Cell(37);
// $pdf->Cell(120,20,$row['id_pesanan'],0,1,'C');
// $pdf->Cell(120,20,'NO PEMESANAN',0,1,'C');
// $pdf->Cell(120,20,$row['id_pesanan'],0,1,'C');
// $pdf->SetFillColor(24,224,23);
// $pdf->SetFont('Arial','B',10);
// $pdf->SetLineWidth(1);
// $pdf->Line(10,30,205,30);
// $pdf->Cell(80,10,'NO Pesanan:',0,0,'C',0);
// $pdf->Cell(80,10,$row['id_pesanan'],0,0,'C',0);
// $pdf->Cell(7,6,'NO',0,0,'C',0);
// $pdf->Cell(7,6,$no,0,0,'C',0);
// $pdf->Cell(25,6,'Pemesanan',0,0);
// $pdf->Cell(37,6,'NAMA PEGAWAI',1,0,'C',0);
// $pdf->Cell(37,6,'HADIR',1,0,'C',0);
// $pdf->Cell(37,6,'TIDAK HADIR',1,0,'C',0);
// $pdf->Cell(37,6,'Total',1,1,'C',0);

// $pdf->SetFont('Arial','',10);
// $pdf->SetFont('Arial','',11);
// $pdf->Cell(7,6,$no,0,0,'C',0);
// $pdf->Cell(25,6,$row['id_pesanan'],0,0,'C',0);
// $pdf->Cell(37,6,$row['id_kamar'],0,0,'C',0);
// $pdf->Cell(37,6,$row['nama_pemesan'],0,0,'C',0);
// $pdf->Cell(37,6,$row['nama_tamu'],0,0,'C',0);
// $pdf->Cell(37,6,$row['total'],0,0,'C',0);
$pdf->Ln(6);
// $pdf->ttd 

// Menutup dokumen
$pdf->Output('Bukti Reservasi.pdf','I');
?>