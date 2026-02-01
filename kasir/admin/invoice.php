<?php
include "../koneksi.php";
require('fpdf/fpdf.php');

$id = $_GET['id'];

/* Ambil data */
$q = mysqli_query($koneksi,"
SELECT 
penjualan.*,
produk.nama_produk,
produk.harga,
pelanggan.nama

FROM penjualan
JOIN produk ON penjualan.id_produk=produk.id_produk
JOIN pelanggan ON penjualan.id_pelanggan=pelanggan.id_pelanggan

WHERE id_penjualan='$id'
");

$data = mysqli_fetch_assoc($q);

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'INVOICE PEMBELIAN',0,1,'C');

$pdf->Ln(10);

/* Data */
$pdf->SetFont('Arial','',12);

$pdf->Cell(50,8,'Pelanggan',0,0);
$pdf->Cell(5,8,':',0,0);
$pdf->Cell(50,8,$data['nama'],0,1);

$pdf->Cell(50,8,'Produk',0,0);
$pdf->Cell(5,8,':',0,0);
$pdf->Cell(50,8,$data['nama_produk'],0,1);

$pdf->Cell(50,8,'Harga',0,0);
$pdf->Cell(5,8,':',0,0);
$pdf->Cell(50,8,'Rp '.number_format($data['harga']),0,1);

$pdf->Cell(50,8,'Jumlah',0,0);
$pdf->Cell(5,8,':',0,0);
$pdf->Cell(50,8,$data['jumlah'],0,1);

$pdf->Cell(50,8,'Total',0,0);
$pdf->Cell(5,8,':',0,0);
$pdf->Cell(50,8,'Rp '.number_format($data['total']),0,1);

$pdf->Ln(10);

$pdf->Cell(0,10,'Terima kasih telah berbelanja',0,1,'C');

$pdf->Output();
