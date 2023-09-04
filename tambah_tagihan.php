<?php

require 'config/db_connect.php';

$idbarang = $_POST['paket'];
$idpelanggan = $_POST['pelanggan'];
$sql_masuk = "INSERT INTO tagihan (idbarang, idpelanggan) values('$idbarang', '$idpelanggan')";
$addtotable = mysqli_query($conn, $sql_masuk);


mysqli_close($conn);

header('Location: list_tagihan.php');
?>