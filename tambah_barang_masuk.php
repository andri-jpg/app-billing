<?php

require 'config/db_connect.php';

$nomorhp = $_POST['nomorhp'];
$namapelanggan = $_POST['namapelanggan'];

$sql_masuk = "INSERT INTO masuk (namapelanggan, nomorhp) values('$namapelanggan', '$nomorhp')";
$addtotable = mysqli_query($conn, $sql_masuk);


mysqli_close($conn);

header('Location: barang_masuk.php');

?>