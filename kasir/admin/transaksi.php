<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}

$produk = mysqli_query($koneksi,"SELECT * FROM produk");
$pelanggan = mysqli_query($koneksi,"SELECT * FROM pelanggan");
?>

<!DOCTYPE html>
<html>
<head>
<title>Transaksi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
@media print {
    .sidebar,
    button {
        display: none;
    }

    body {
        background: white;
    }

    .content {
        margin: 0;
        padding: 0;
    }
}
</style>


</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

<h3>Form Pembelian</h3>

<div class="card mt-3 shadow">
<div class="card-body">

<form action="proses_transaksi.php" method="POST">

    <div class="mb-3">
    <label>Pelanggan</label>
    <select name="id_pelanggan" class="form-control" required>

        <option value="">Pilih Pelanggan</option>

        <?php
        include '../koneksi.php';

        $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");

        while($p = mysqli_fetch_assoc($pelanggan)){
        ?>
            <option value="<?= $p['id_pelanggan']; ?>">
                <?= $p['nama']; ?> (<?= $p['no_hp']; ?>)
            </option>
        <?php } ?>

    </select>
    </div>

    <div class="mb-3">
    <label>Produk</label>
    <select name="id_produk" class="form-control" required>

        <option value="">Pilih Produk</option>

        <?php
        $produk = mysqli_query($koneksi, "SELECT * FROM produk");

        while($pr = mysqli_fetch_assoc($produk)){
        ?>
            <option value="<?= $pr['id_produk']; ?>"
                    data-harga="<?= $pr['harga']; ?>"
                    data-stok="<?= $pr['stok']; ?>">

                <?= $pr['nama_produk']; ?> 
                (Stok: <?= $pr['stok']; ?> | Rp <?= number_format($pr['harga']); ?>)

            </option>
        <?php } ?>

    </select>
    </div>


    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan Transaksi</button>

</form>

</div>
</div>

</div>

</body>
</html>
