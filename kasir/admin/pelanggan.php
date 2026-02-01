<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}

/* Menghapus pelanggan */
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];

    mysqli_query($koneksi,"
        DELETE FROM pelanggan WHERE id_pelanggan='$id'
    ");
}

/* Simpan data pelanggan */
if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];
    $hp   = $_POST['hp'];

    mysqli_query($koneksi,"
        INSERT INTO pelanggan (nama,no_hp)
        VALUES ('$nama','$hp')
    ");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Pelanggan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

<h3>Data Pelanggan</h3>

<div class="card shadow-sm mb-4">
<div class="card-body">

<h5>Tambah Pelanggan</h5>

<form method="POST">

<div class="row g-2 mb-2">

    <div class="col-md-6 mb-3">
        <input type="text" name="nama" placeholder="Nama" class="form-control" required>
    </div>

    <div class="col-md-6 mb-3">
        <input type="text" name="hp" placeholder="No HP" class="form-control" required>
    </div>

</div>

<button name="simpan" class="btn btn-success">Simpan</button>

</form>

</div>
</div>

<div class="card shadow-sm">
<div class="card-body">

<h5>Daftar Pelanggan</h5>

<table class="table table-bordered table-striped">

<tr class="table-dark">
    <th>No</th>
    <th>Nama</th>
    <th>No HP</th>
    <th>Aksi</th>
</tr>

<?php
$no=1;
$data = mysqli_query($koneksi,"SELECT * FROM pelanggan");

while($d=mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama'] ?></td>
    <td><?= $d['no_hp'] ?></td>
    <td>
        <a href="?hapus=<?= $d['id_pelanggan'] ?>"
           onclick="return confirm('Hapus?')"
           class="btn btn-danger btn-sm">
           Hapus
        </a>
    </td>
</tr>

<?php } ?>

</table>

</div>
</div>


</div>

</body>
</html>
