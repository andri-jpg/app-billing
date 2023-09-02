<?php

require 'config/db_connect.php';

$idpelanggan = $_POST['idpelanggan'];

$sql_hapus = "DELETE FROM masuk WHERE idpelanggan='$idpelanggan'";
$hapus_barang = mysqli_query($conn, $sql_hapus);

mysqli_close($conn);

header('Location: barang_masuk.php');