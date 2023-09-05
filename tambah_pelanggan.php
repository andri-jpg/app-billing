<?php

require 'config/db_connect.php';

$email = $_POST['email'];
$namapelanggan = $_POST['namapelanggan'];
$alamat = $_POST['alamat'];

$sql_masuk = "INSERT INTO pelanggan (namapelanggan, email, alamat) values('$namapelanggan', '$email', '$alamat')";
$addtotable = mysqli_query($conn, $sql_masuk);


mysqli_close($conn);

header('Location: data_pelanggan.php');

?>