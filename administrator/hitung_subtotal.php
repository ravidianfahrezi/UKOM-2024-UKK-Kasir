<?php
include '../koneksi.php';

$Stok = $_POST['Stok'];
$ProdukID = $_POST['ProdukID'];
$JumlahProduk = $_POST['JumlahProduk'];
$Harga = $_POST['Harga'];
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];
$Subtotal = $JumlahProduk * $Harga;
$Stok_total = $Stok - $JumlahProduk;

mysqli_query($koneksi,"UPDATE detailpenjualan SET Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' WHERE DetailID='$DetailID'");
mysqli_query($koneksi,"UPDATE produk SET Stok='$Stok_total' WHERE ProdukID='$ProdukID'");
// var_dump($Subtotal);
// var_dump($JumlahProduk);

header("location:detail_pembelian.php?PelangganID=$PelangganID");

?>