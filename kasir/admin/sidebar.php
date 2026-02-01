<style>
body{
    margin:0;
    background:#f8f9fa;
    font-family: Arial, sans-serif;
}

.sidebar{
    width:230px;
    height:100vh;
    background:#212529;
    position:fixed;
    left:0;
    top:0;
    padding-top:20px;
}

.sidebar h4{
    color:white;
    text-align:center;
    margin-bottom:30px;
}

.sidebar a{
    color:#adb5bd;
    text-decoration:none;
    display:block;
    padding:12px 20px;
}

.sidebar a:hover{
    background:#343a40;
    color:white;
}

.content{
    margin-left:230px;
    padding:20px;
    min-height:100vh;
}
</style>


<div class="sidebar">

    <h4>Pun Store</h4>

    <a href="index.php">Dashboard</a>
    <a href="produk.php">Produk</a>
    <a href="pelanggan.php">Pelanggan</a>
    <a href="transaksi.php">Transaksi</a>
    <a href="penjualan.php">Penjualan</a>
    <a href="../logout.php" class="text-danger">Logout</a>

</div>
