<?php
session_start();

if($_SESSION['level'] != "1"){
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
    <title>Halaman Administrator</title>
</head>
<style>
    .btn-test {
        color: white;
        background-color: #198754;
    }

    .btn-test:hover {
        color: #198754;
        border-color: #198754;
        background-color: white
    }
    
    .btn-test:active {
        color: #198754;
        border-color: #198754;
        background-color: white       
    }

    /* .card-bg {
        margin-bottom: 100px;
    } */
</style>
<body>
    <div class="container">
        <div class="content">
