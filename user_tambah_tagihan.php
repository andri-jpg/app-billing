<?php

require 'config/db_connect.php';

$idbarang = $_POST['paket'];
$idpelanggan = $_POST['pelanggan'];
$sql_masuk = "INSERT INTO keluar (idbarang, idpelanggan) values('$idbarang', '$idpelanggan')";
$addtotable = mysqli_query($conn, $sql_masuk);



header('Location: user_tagihan.php');
?>