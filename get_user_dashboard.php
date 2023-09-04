<?php
if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'config/db_connect.php';

$namaPelanggan = $_SESSION['login_u']['username'];

$sql = "SELECT keluar.status, keluar.idtagihan, keluar.tanggal, masuk.idpelanggan, masuk.namapelanggan, stock.namapaket, stock.harga
FROM keluar
INNER JOIN masuk ON keluar.idpelanggan = masuk.idpelanggan
INNER JOIN stock ON keluar.idbarang = stock.idbarang
WHERE masuk.namapelanggan = '$namaPelanggan';";
$result = mysqli_query($conn, $sql);

$data_tagihan_user = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

?>