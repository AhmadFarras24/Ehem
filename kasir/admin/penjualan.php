<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Penjualan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

<h3>Data Penjualan</h3>
<p>Daftar transaksi lunas</p>


<div class="card shadow-sm mt-3">

<div class="card-body">

<table class="table table-bordered table-striped">

<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Pelanggan</th>
    <th>Produk</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>Tanggal</th>
</tr>
</thead>

<tbody>

<?php
$no = 1;

/* Join 3 tabel */
$query = mysqli_query($koneksi,"
SELECT 
    penjualan.*,
    produk.nama_produk,
    pelanggan.nama

FROM penjualan
JOIN produk ON penjualan.id_produk = produk.id_produk
JOIN pelanggan ON penjualan.id_pelanggan = pelanggan.id_pelanggan

ORDER BY penjualan.id_penjualan DESC
");

while($data = mysqli_fetch_assoc($query)){
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $data['nama'] ?></td>
    <td><?= $data['nama_produk'] ?></td>
    <td><?= $data['jumlah_dibeli']; ?></td>
    <td><?= number_format($data['total_harga']); ?></td>
    <td><?= $data['waktu']; ?></td>

</tr>

<?php } ?>

</tbody>
</table>

</div>
</div>

</div>

</body>
</html>
