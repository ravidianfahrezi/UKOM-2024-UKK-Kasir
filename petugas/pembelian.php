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
                    <th>Nama Pelanggan</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Total Pembayaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $d['PelangganID']; ?></td>
                        <td><?= $d['NamaPelanggan'] ?></td>
                        <td><?= $d['NomorTelepon']; ?></td>
                        <td><?= $d['Alamat']; ?></td>
                        <td>Rp. <?= $d['TotalHarga']; ?></td>
                        <td>
                            <a href="detail_pembelian.php?PelangganID=<?= $d['PelangganID']; ?>" class="btn btn-info btn-sm">Detail</a>
                            <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit-data<?= $d['PelangganID']; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-data<?= $d['PelangganID']; ?>">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    <!-- modal edit data -->
                    <div class="modal fade" id="edit-data<?= $d['PelangganID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_update_pembelian.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="text" name="PelangganID" value="<?= $d['PelangganID']; ?>" class="form-control" hidden>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pelanggan</label>
                                            <input type="text" name="NamaPelanggan" class="form-control" value="<?= $d['NamaPelanggan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="text" name="NomorTelepon" class="form-control" value="<?= $d['NomorTelepon']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" name="Alamat" class="form-control" value="<?= $d['Alamat']; ?>">
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
                    <div class="modal fade" id="hapus-data<?= $d['PelangganID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="proses_hapus_pembelian.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Nama Produk</label>
                                            <input type="hidden" name="PelangganID" value="<?= $d['PelangganID']; ?>">
                                            Apakah Anda Yakin Ingin Menghapus Data <b><?= $d['NamaPelanggan']; ?></b>
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
            <form action="proses_pembelian.php" method="post">
                <div class="modal-body">
                <div class="form-group">
                        <label>ID Pelanggan</label>
                        <input type="text" name="PelangganID" value="<?= date("dmHis") ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" name="NamaPelanggan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="NomorTelepon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="Alamat" class="form-control">
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