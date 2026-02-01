<?php
include "../koneksi.php";

$id_pelanggan = $_POST['id_pelanggan'];
$id_produk    = $_POST['id_produk'];
$jumlah       = $_POST['jumlah'];

// Ambil harga produk
$data = mysqli_query($koneksi,"
SELECT harga, stok FROM produk
WHERE id_produk='$id_produk'
");

$produk = mysqli_fetch_assoc($data);

$harga = $produk['harga'];
$stok  = $produk['stok'];

// Cek stok
if($jumlah > $stok){
    die("Stok tidak cukup!");
}

// Hitung
$sub_harga   = $harga * $jumlah;
$total_harga = $sub_harga;

// Simpan transaksi
$query = mysqli_query($koneksi,"
INSERT INTO penjualan
(id_pelanggan,id_produk,jumlah_dibeli,sub_harga,total_harga,waktu)
VALUES
('$id_pelanggan','$id_produk','$jumlah','$sub_harga','$total_harga',NOW())
");

// Cek gagal
if(!$query){
    die("Gagal simpan: ".mysqli_error($koneksi));
}

// Ambil ID terakhir
$id_penjualan = mysqli_insert_id($koneksi);

// Update stok
mysqli_query($koneksi,"
UPDATE produk
SET stok = stok - $jumlah
WHERE id_produk='$id_produk'
");

// Redirect ke struk
header("Location: struk.php?id=".$id_penjualan);
exit;
