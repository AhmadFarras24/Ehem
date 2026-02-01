<?php
include "../koneksi.php";

if(!isset($_GET['id'])){
    die("ID transaksi tidak ada!");
}

$id = $_GET['id'];

// Ambil data transaksi
$query = mysqli_query($koneksi,"
SELECT 
    pjl.*,
    plg.nama,
    plg.no_hp,
    pr.nama_produk,
    pr.harga
FROM penjualan pjl
JOIN pelanggan plg ON pjl.id_pelanggan = plg.id_pelanggan
JOIN produk pr ON pjl.id_produk = pr.id_produk
WHERE pjl.id_penjualan = '$id'
");

$data = mysqli_fetch_assoc($query);

if(!$data){
    die("Data transaksi tidak ditemukan!");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Struk</title>

<style>
body{
    font-family: monospace;
}

.struk{
    width:280px;
    margin:auto;
}

@media print{
    button{display:none;}
}
</style>
</head>

<body onload="window.print()">

<div class="struk">

<h4 align="center">PUN STORE</h4>
<p align="center">Struk Pembelian</p>

<hr>

No : <?= $data['id_penjualan']; ?><br>
Tanggal : <?= $data['waktu']; ?><br>
Pelanggan : <?= $data['nama']; ?>

<hr>

<?= $data['nama_produk']; ?><br>

<?= $data['jumlah_dibeli']; ?> x <?= number_format($data['harga']); ?>
<span style="float:right">
<?= number_format($data['sub_harga']); ?>
</span>

<hr>

<b>TOTAL</b>
<span style="float:right">
<?= number_format($data['total_harga']); ?>
</span>

<hr>

<p align="center">Terima Kasih</p>

</div>

</body>
</html>
