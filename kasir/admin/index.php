<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<?php include "sidebar.php"; ?>

<div class="content">

    <h3>Dashboard</h3>
    <p>Selamat datang <b><?= $_SESSION['admin']; ?></b></p>

<div class="row mt-4">
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Produk</h5>
                <p>Kelola data produk</p>
                <a href="produk.php" class="btn btn-primary w-100">
                    Kelola
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Pelanggan</h5>
                <p>Kelola pelanggan</p>
                <a href="pelanggan.php" class="btn btn-success w-100">
                    Kelola
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h5>Penjualan</h5>
                <p>Lihat transaksi</p>
                <a href="penjualan.php" class="btn btn-light w-100">
                    Lihat
                </a>
            </div>
        </div>
    </div>
</div>

</div>

</body>
</html>
