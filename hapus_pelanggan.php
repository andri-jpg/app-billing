<?php

require 'config/db_connect.php';

$idpelanggan = $_POST['idpelanggan'];

$sql_hapus = "DELETE FROM pelanggan WHERE idpelanggan='$idpelanggan'";
$hapus_barang = mysqli_query($conn, $sql_hapus);

mysqli_close($conn);

header('Location: data_pelanggan.php');