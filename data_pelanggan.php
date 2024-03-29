<?php

session_start();

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}


require 'get_pelanggan.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
        <title>Daftar Pelanggan</title>
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
                        <h1 class="my-4">Data Pelanggan</h1>
                        <div class="card mb-4">
                            <div class="card-header d-flex justify-content-between align-items-sm-center flex-column flex-sm-row">
                                <div class="py-2">
                                    <i class="fas fa-table me-1"></i>
                                    Data Pelanggan
                                </div>
                                <button type="button"class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambah">
                                    Tambah Pelanggan
                                </button>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal Pendaftaran</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($data_pelanggan as $item): ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $item['tanggal']; ?></td>
                                                <td><?php echo $item['namapelanggan']; ?></td>
                                                <td><?php echo $item['email']; ?></td>
                                                <td><?php echo $item['alamat']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-warning mb-1" data-bs-toggle="modal" data-bs-target="#edit<?php echo $item['idpelanggan']; ?>">
                                                        Edit
                                                    </button>
                                                    <button type="button" class="btn btn-danger mb-1" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $item['idpelanggan']; ?>">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>

                                            <?php $i++; ?>

                                            <div class="modal fade" id="edit<?php echo $item['idpelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <form method="POST" action="edit_pelanggan.php">
                                                            <div class="modal-body">
                                                                <input type="hidden" name="idpelanggan" value="<?php echo $item['idpelanggan']; ?>">
                                                                <input type="text" name="namapelanggan" value="<?php echo $item['namapelanggan']; ?>" class="form-control mb-3" required />
                                                                <input type="text" name="email" value="<?php echo $item['email']; ?>" class="form-control mb-3" required />
                                                                <input type="text" name="alamat" value="<?php echo $item['alamat']; ?>" class="form-control mb-3" required />
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>

                                            <div class="modal fade" id="hapus<?php echo $item['idpelanggan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                                                        </div>
                                                        <form method="POST" action="hapus_pelanggan.php">
                                                            <div class="modal-body">
                                                                <p>Apakah anda yakin ingin menghapus <?php echo $item['namapelanggan']; ?> ?</p>
                                                                <input type="hidden" name="idpelanggan" value="<?php echo $item['idpelanggan']; ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="tambah_pelanggan.php">
                        <div class="modal-body">                  
                            <input type="text" name="namapelanggan" placeholder="Nama pelanggan" class="form-control mb-3" required />
                            <input type="text" name="email" placeholder="Email" class="form-control mb-3" required />
                            <input type="text" name="alamat" placeholder="Alamat" class="form-control mb-3" required />
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
