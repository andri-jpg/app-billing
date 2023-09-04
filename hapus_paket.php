<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];

$sql_hapus_paket = "DELETE FROM paket WHERE idbarang='$idbarang'";
$paket = mysqli_query($conn, $sql_hapus_paket);

$sql_hapus_tagihan = "DELETE FROM tagihan WHERE idbarang='$idbarang'";
$result = mysqli_query($conn, $sql_hapus_tagihan);

mysqli_close($conn);

header('Location: home.php');

?>