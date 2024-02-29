<?php
session_start();

if($_SESSION['level'] != "2"){
    header("location:../index.php?pesan=gagal");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.2/dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../assets/login.png" type="image/x-icon">
    <title>Halaman Petugas</title>
</head>
<body>
    <div class="container">
        <div class="content">
