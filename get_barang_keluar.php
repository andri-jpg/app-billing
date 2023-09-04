<?php

require 'config/db_connect.php';

$sql = "SELECT keluar.idtagihan, keluar.tanggal, masuk.namapelanggan, stock.namapaket, stock.harga, keluar.status
FROM keluar
INNER JOIN masuk ON keluar.idpelanggan = masuk.idpelanggan
INNER JOIN stock ON keluar.idbarang = stock.idbarang
WHERE keluar.status = 'belumlunas';";
$result = mysqli_query($conn, $sql);

$data_barang_keluar = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);
mysqli_close($conn);

?>