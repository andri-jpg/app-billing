<?php

require 'config/db_connect.php';

$idbarang = $_POST['idbarang'];
$namapaket = $_POST['namapaket'];
$deskripsi = $_POST['deskripsi'];

$sql_edit = "UPDATE stock SET namapaket='$namapaket', deskripsi='$deskripsi' WHERE idbarang='$idbarang'";
$edit_barang = mysqli_query($conn, $sql_edit);

mysqli_close($conn);

header('Location: home.php');

?>