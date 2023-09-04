<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

require 'get_history.php';


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>History Tagihan</title>
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
                        <h1 class="my-4">History Tagihan</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
            
                                <div class="col-md-12">
                                    <a href="laporan_history_excel.php" target="_blank" class="btn btn-success mb-3"><i class="fa fa-file-excel"></i>Export to Excel</a>
                                
                                </div>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pelunasan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Total Pembayaan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_history as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['namapelanggan']; ?></td>
                                                <td><?php echo $item['namapaket']; ?></td>
                                                <td><?php echo $item['harga']; ?></td>
                                                <td> Lunas</td>

                                            </tr>

                                            <?php $i++; ?>
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
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                    </div>
                    <form method="POST" action="tambah_barang_masuk.php">
                        <div class="modal-body">                  
                            <input type="text" name="namapelanggan" placeholder="Nama pelanggan" class="form-control mb-3" required />
                            <input type="number" name="nomorhp" placeholder="Nomor Hp" class="form-control mb-3" required />
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
