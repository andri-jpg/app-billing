<?php

require 'config/db_connect.php';

$idpelanggan = $_POST['idpelanggan'];
$namapelanggan = $_POST['namapelanggan'];
$email = $_POST['email'];

$sql_edit = "UPDATE pelanggan SET namapelanggan='$namapelanggan', email='$email' WHERE idpelanggan='$idpelanggan'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: data_pelanggan.php');

?>