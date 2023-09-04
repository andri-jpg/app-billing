<?php
if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'config/db_connect.php';

$namaPelanggan = $_SESSION['login_u']['username'];

$sql = "SELECT tagihan.idtagihan, tagihan.tanggal, pelanggan.idpelanggan, pelanggan.namapelanggan, paket.namapaket, paket.harga
FROM tagihan
INNER JOIN pelanggan ON tagihan.idpelanggan = pelanggan.idpelanggan
INNER JOIN paket ON tagihan.idbarang = paket.idbarang
WHERE pelanggan.namapelanggan = '$namaPelanggan' AND tagihan.status = 'belumlunas';";
$result = mysqli_query($conn, $sql);

$data_tagihan_user = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>