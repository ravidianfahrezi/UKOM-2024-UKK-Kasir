<?php
include '../koneksi.php';

$ProdukID = $_POST['ProdukID'];
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];

mysqli_query($koneksi,"UPDATE detailpenjualan SET ProdukID='$ProdukID' WHERE DetailID='$DetailID'");

header("location:detail_pembelian.php?PelangganID=$PelangganID");

?>