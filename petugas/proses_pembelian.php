<?php
include '../koneksi.php';

$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];

mysqli_query($koneksi,"INSERT INTO pelanggan VALUES('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')");
mysqli_query($koneksi,"INSERT INTO penjualan VALUES('','$TanggalPenjualan','','$PelangganID')");

header("location:pembelian.php?pesan=simpan");

?>