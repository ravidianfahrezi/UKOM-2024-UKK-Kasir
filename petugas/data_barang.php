<?php
include "header.php";
include "navbar.php";
include '../koneksi.php';
?>
<div class="card mt-2">
    <div class="card-body">
        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah-data">
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php
        if(isset($_GET['pesan'])){
            if($_GET['pesan']=="simpan"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil di Simpan
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="update"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil di Update
                </div>
            <?php } ?>
            <?php if($_GET['pesan']=="hapus"){?>
                <div class="alert alert-success" role="alert">
                    Data Berhasil di Hapus
                </div>
            <?php } ?>
            <?php
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM produk");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['NamaProduk']; ?></td>
                        <td>Rp. <?= $d['Harga'] ?></td>
                        <td><?= $d['Stok']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?= $d['ProdukID']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?= $d['ProdukID']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- modal edit data -->
                    <div class="modal fade" id="edit-data<?= $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_update_barang.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="hidden" name="ProdukID" value="<?= $d['ProdukID']; ?>">
                                            <input type="text" name="NamaProduk" class="form-control" value="<?= $d['NamaProduk']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga Produk</label>
                                            <input type="number" name="Harga" class="form-control" value="<?= $d['Harga']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Stok Produk</label>
                                            <input type="text" name="Stok" class="form-control" value="<?= $d['Stok']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- modal hapus data -->
                    <div class="modal fade" id="hapus-data<?= $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_hapus_barang.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="hidden" name="ProdukID" value="<?= $d['ProdukID']; ?>">
                                            Apakah Anda Yakin Ingin Menghapus Data <b><?= $d['NamaProduk']; ?></b>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- modal tambah data -->
<div class="modal fade" id="tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="proses_simpan_barang.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="NamaProduk" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Harga Produk</label>
                        <input type="number" name="Harga" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Stok Produk</label>
                        <input type="text" name="Stok" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>