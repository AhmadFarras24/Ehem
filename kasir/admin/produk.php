<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Produk</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

<h3>Data Produk</h3>

<form method="POST" class="row g-2 mb-4">

    <div class="col-md-4">
        <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
    </div>

    <div class="col-md-3">
        <input type="number" name="stok" class="form-control" placeholder="Stok" required>
    </div>

    <div class="col-md-3">
        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
    </div>

    <div class="col-md-2">
        <button name="simpan" class="btn btn-success w-100">Simpan</button>
    </div>

</form>

<table class="table table-bordered table-striped">

<tr class="table-dark">
    <th>No</th>
    <th>Nama</th>
    <th>Stok</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM produk");

while($d = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_produk'] ?></td>
    <td><?= $d['stok'] ?></td>
    <td>Rp <?= number_format($d['harga']) ?></td>
    <td>
        <a href="?hapus=<?= $d['id_produk'] ?>"
           class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus?')">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>
</div>

</body>
</html>
