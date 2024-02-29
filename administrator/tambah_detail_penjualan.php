<?php
include '../koneksi.php';

$PelangganID = $_POST['PelangganID'];
$PenjualanID = $_POST['PenjualanID'];

mysqli_query($koneksi,"INSERT INTO detailpenjualan (PenjualanID, ProdukID) VALUES('$PenjualanID', NULL)");

header("location:detail_pembelian.php?PelangganID=$PelangganID");

?>