<?php
if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'config/db_connect.php';

$namaPelanggan = $_SESSION['login_u']['username'];

$sql = "SELECT pelanggan.idpelanggan, pelanggan.namapelanggan
FROM pelanggan
WHERE pelanggan.namapelanggan = '$namaPelanggan';";
$result = mysqli_query($conn, $sql);

$idpelanggan = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>