<?php
session_start();

if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'get_barang_masuk.php';

if (!isset($_SESSION['is_registered'])) {
    $nama = $_SESSION['login_u']['username'];
    $email = $_SESSION['login_u']['email'];

    $result = $conn->query("SELECT * FROM masuk WHERE namapelanggan = '$nama'") or die(mysqli_error($conn));

    if ($result->num_rows === 0) {
        $conn->query("INSERT INTO masuk (namapelanggan, email) VALUES ('$nama', '$email')") or die(mysqli_error($conn));

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

                <!-- Tabel tagihan user -->
                <h2 class="mt-4">Daftar Tagihan</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Tagihan</th>
                            <th>Jumlah Tagihan</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2023-09-10</td>
                            <td>Rp 500,000</td>
                            <td>Belum Lunas</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2023-09-15</td>
                            <td>Rp 750,000</td>
                            <td>Lunas</td>
                        </tr>
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
