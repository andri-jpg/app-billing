<?php

require 'config/db_connect.php';

$sql = "SELECT tagihan.idtagihan, tagihan.tanggal, pelanggan.namapelanggan, paket.namapaket, paket.harga, tagihan.status
FROM tagihan
INNER JOIN pelanggan ON tagihan.idpelanggan = pelanggan.idpelanggan
INNER JOIN paket ON tagihan.idbarang = paket.idbarang;";
$result = mysqli_query($conn, $sql);

$data_tagihan = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>