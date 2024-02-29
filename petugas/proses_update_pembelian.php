<?php
include '../koneksi.php';

$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];

mysqli_query($koneksi,"UPDATE pelanggan SET NamaPelanggan='$NamaPelanggan', NomorTelepon='$NomorTelepon', Alamat='$Alamat' WHERE PelangganID='$PelangganID'");

header("location:pembelian.php?pesan=update");

?>