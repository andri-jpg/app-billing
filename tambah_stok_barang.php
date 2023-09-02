<?php

require 'config/db_connect.php';

$namapaket = $_POST['namapaket'];
$kecepatan = $_POST['kecepatan'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

$sql = "INSERT INTO stock (namapaket, kecepatan, deskripsi, harga) values('$namapaket', '$kecepatan', '$deskripsi', '$harga')";
$addtotable = mysqli_query($conn, $sql);

mysqli_close($conn);

header('Location: home.php');

?>