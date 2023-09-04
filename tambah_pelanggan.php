<?php

require 'config/db_connect.php';

$email = $_POST['email'];
$namapelanggan = $_POST['namapelanggan'];

$sql_masuk = "INSERT INTO pelanggan (namapelanggan, email) values('$namapelanggan', '$email')";
$addtotable = mysqli_query($conn, $sql_masuk);


mysqli_close($conn);

header('Location: data_pelanggan.php');

?>