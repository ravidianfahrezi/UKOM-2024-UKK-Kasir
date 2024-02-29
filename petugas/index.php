<?php
include "header.php";
include "navbar.php";
include '../koneksi.php';
?>
<div class="card mt-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        Data Barang
                        <?php
                        $data_produk = mysqli_query($koneksi,"SELECT * FROM produk");
                        $jumlah_produk = mysqli_num_rows($data_produk);
                        ?>
                        <h3><?= $jumlah_produk; ?></h3>
                        <a href="data_barang.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        Pembelian
                        <?php
                        $data_penjualan = mysqli_query($koneksi,"SELECT * FROM penjualan");
                        $jumlah_penjualan = mysqli_num_rows($data_penjualan);
                        ?>
                        <h3><?= $jumlah_penjualan; ?></h3>
                        <a href="pembelian.php" class="btn btn-outline-primary btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-2">
    <div class="card-body text-center">
        <p>Selamat Datang di Halaman Administrator, Silahkan Anda Bisa Mengakses Beberapa Fitur</p>
    </div>
</div>
<?php
include "footer.php";
?>