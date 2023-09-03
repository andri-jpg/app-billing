<?php

require 'config/db_connect.php';

$idtagihan = $_POST['idtagihan'];
$idbarang = $_POST['idbarang'];
$idpelanggan = $_POST['idpelanggan'];

$sql_edit = "UPDATE keluar SET idpelanggan='$idpelanggan', idbarang='$idbarang' WHERE idtagihan='$idtagihan'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: barang_keluar.php');

?>