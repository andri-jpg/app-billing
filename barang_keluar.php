<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_stok_barang.php';

require 'get_barang_keluar.php';
require 'get_barang_masuk.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Aplikasi Management Stok Barang" />
        <meta name="keywords" content="Management Stock, Stock App, Barang" />
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>Data Tagihan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require 'templates/topnavigation.php'; ?>

        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation.php'; ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
                        <h1 class="my-4">Data Tagihan</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data Tagihan
                                </div>
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah Tagihan
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal dan Waktu</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Total Tagihan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i = 1; ?>
                                        
                                        <?php foreach($data_barang_keluar as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['namapelanggan']; ?></td>
                                                <td><?php echo $item['namapaket']; ?></td>
                                                <td><?php echo $item['harga']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['idtagihan']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#bayar<?php echo $item['idtagihan']; ?>">
                                                        Bayar
                                                    </button>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $item['idtagihan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Tagihan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <form method="POST" action="edit_barang_keluar.php">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="idtagihan" value="<?php echo $item['idtagihan']; ?>">
                                                            <select name="idbarang" class="form-control mb-3">
                                                                <?php foreach($data_stok_barang as $item): ?>
                                                                    <option value="<?php echo $item['idbarang']; ?>"><?php echo $item['namapaket']; ?></option>
                                                                    <?php endforeach ?>
                                                                 </select>
                                                                 <select name="idpelanggan" class="form-control mb-3">
                                                                    <?php foreach($data_pelanggan as $pelanggan): ?>
                                                                        <option value="<?php echo $pelanggan['idpelanggan']; ?>"><?php echo $pelanggan['namapelanggan']; ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php foreach($data_barang_keluar as $item): ?>
                                            <div class="modal fade" id="bayar<?php echo $item['idtagihan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <form method="POST" action="hapus_barang_keluar.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin <?php echo $item['namapelanggan']; ?> Sudah membayar ?</p>
                                                                <input type="hidden" name="idtagihan" value="<?php echo $item['idtagihan']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Bayar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                        <?php endforeach ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php require 'templates/footer.php'; ?>

            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah tagihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <form method="POST" action="tambah_barang_keluar.php">
                        <div class="modal-body">
                            <select name="paket" class="form-control mb-3">
                                <?php foreach($data_stok_barang as $item): ?>
                                    <option value="<?php echo $item['idbarang']; ?>"><?php echo $item['namapaket']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <select name="pelanggan" class="form-control mb-3">
                                <?php foreach($data_pelanggan as $item): ?>
                                    <option value="<?php echo $item['idpelanggan']; ?>"><?php echo $item['namapelanggan']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
