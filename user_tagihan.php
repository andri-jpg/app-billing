<?php
session_start();

if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'get_paket.php';
require 'config/db_connect.php';
require 'get_user_tagihan.php';
require 'get_user_id.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>Data Tagihan</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        
        <?php require 'templates/topnavigation_u.php'; ?>

        <div id="layoutSidenav">
            
            <?php require 'templates/sidenavigation_u.php'; ?>

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
                                            <th>ID Tagihan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Total Tagihan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php $i = 1; ?>
                                        
                                        <?php foreach($data_tagihan_user as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['idtagihan']; ?></td>
                                                <td><?php echo $item['namapelanggan']; ?></td>
                                                <td><?php echo $item['namapaket']; ?></td>
                                                <td>Rp.<?php echo $item['harga']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['idtagihan']; ?>">
                                                        Bayar
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <?php require 'templates/footer_u.php'; ?>

            </div>
        </div>

        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah tagihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <form method="POST" action="user_tambah_tagihan.php">
                        <div class="modal-body">
                            <select name="paket" class="form-control mb-3">
                                <?php foreach($data_stok_barang as $item): ?>
                                    <option value="<?php echo $item['idbarang']; ?>"><?php echo $item['namapaket']; ?></option>
                                <?php endforeach ?>
                            </select>
                            <select name="pelanggan" class="form-control mb-3">
                                <?php foreach($idpelanggan as $item): ?>
                                    <option value="<?php echo $item['idpelanggan']; ?>"><?php echo $namaPelanggan; ?></option>
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

<?php foreach($data_tagihan_user as $item): ?>
    <div class="modal fade" id="hapus<?php echo $item['idtagihan']; ?>" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarModalLabel">Pembayaran Tagihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="kirim_pembayaran.php" enctype="multipart/form-data">
                    <input type="hidden" name="idtagihan" value="<?php echo $item['idtagihan']; ?>">
                    
                    <div class="form-group">
                        <label for="buktiPembayaran">Unggah Bukti Pembayaran</label>
                        <input type="file" class="form-control-file" id="buktiPembayaran" name="buktiPembayaran" required>
                    </div>
                   
                    <p>Jumlah yang harus dibayar: Rp.<?php echo $item['harga']; ?></p>
                    <p>Silakan bayar melalui rekening BRI 232xxxxxxxxx A/n Admin.</p>
                    <p>Setelah membayar, silakan unggah bukti pembayaran.</p>
                    
                    <button type="submit" class="btn btn-primary">Kirim Bukti Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php endforeach ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
