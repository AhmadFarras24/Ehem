<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "kasir";

$koneksi = mysqli_connect($host,$user,$pass,$db);

if(!$koneksi){
    die("Koneksi gagal");
}
