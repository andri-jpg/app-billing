<?php
session_start();

if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'get_pelanggan.php';
require 'get_user_dashboard.php';
require 'get_paket.php';

if (!isset($_SESSION['is_registered'])) {
    $nama = $_SESSION['login_u']['username'];
    $email = $_SESSION['login_u']['email'];
    $alamat = $_SESSION['login_u']['alamat'];

    $result = $conn->query("SELECT * FROM pelanggan WHERE namapelanggan = '$nama'") or die(mysqli_error($conn));

    if ($result->num_rows === 0) {
        $conn->query("INSERT INTO pelanggan (namapelanggan, email, alamat) VALUES ('$nama', '$email', '$alamat')") or die(mysqli_error($conn));

        $_SESSION['is_registered'] = true;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="./images/icon.png" type="image/x-icon" />
    <title>Dashboard</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

</head>
<body class="sb-nav-fixed">
    
    <?php require 'templates/topnavigation_u.php'; ?>

    <div id="layoutSidenav">
        
        <?php require 'templates/sidenavigation_u.php'; ?>

        <!-- Konten Dashboard -->
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-sm-4">
            <div class="container-fluid px-sm-4">
                <h1 class="mt-4">Dashboard</h1>
                <p>Selamat datang <?= $_SESSION['login_u']['nama']; ?>.</p>

                <div class="row">
            <div class="col-md-3">
                <a href="user_tagihan.php" class="btn btn-primary">
                    <div class="box-icon"><i class="fas fa-money-bill-wave"></i></div>
                    <div class="box-text">Tagihan Saya</div>
                </a>
            </div>
        </div>
        <h2 class="mt-4">Daftar Paket</h2>
                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama paket</th>
                                            <th>Kecepatan</th>
                                            <th>Deskripsi</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php foreach($data_stok_barang as $item): ?>
                                            <tr>
                                                <td><?php echo $item['namapaket']; ?></td>
                                                <td><?php echo $item['kecepatan']; ?></td>
                                                <td><?php echo $item['deskripsi']; ?></td>
                                                <td><?php echo $item['harga']; ?></td>
                                            </tr>
                                            <?php endforeach ?>
                    </tbody>
                </table>
                <h2 class="mt-4">Daftar Tagihan</h2>
                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Tagihan</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Paket</th>
                                            <th>Total Tagihan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                        <?php foreach($data_tagihan_user as $item): ?>
                                            <tr>
                                               
                                                <td><?php echo $item['idtagihan']; ?></td>
                                                <td><?php echo $item['namapelanggan']; ?></td>
                                                <td><?php echo $item['namapaket']; ?></td>
                                                <td>Rp.<?php echo $item['harga']; ?></td>
                                                <td><?php echo $item['status']; ?></td>
                                            </tr>
                                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
        </main>

        <?php require 'templates/footer_u.php'; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
