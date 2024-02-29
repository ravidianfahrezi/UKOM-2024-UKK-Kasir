<?php
include '../koneksi.php';

$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

mysqli_query($koneksi,"INSERT INTO petugas VALUES('','$nama_petugas','$username','$password','$level')");

header("location:data_pengguna.php?pesan=simpan");

?>