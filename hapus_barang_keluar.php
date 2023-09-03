<?php
require 'config/db_connect.php';

$idtagihan = $_POST['idtagihan'];

// 2. Pilih data yang ingin Anda pindahkan
$sql_select = "SELECT keluar.idtagihan, masuk.namapelanggan, stock.namapaket, stock.harga
FROM keluar
INNER JOIN masuk ON keluar.idpelanggan = masuk.idpelanggan
INNER JOIN stock ON keluar.idbarang = stock.idbarang
WHERE keluar.idtagihan='$idtagihan'";
$result = mysqli_query($conn, $sql_select);
$data_to_move = mysqli_fetch_assoc($result);


$current_timestamp = date('Y-m-d H:i:s'); 
$sql_insert = "INSERT INTO history (tanggal, namapelanggan, namapaket, harga) VALUES ('$current_timestamp', '{$data_to_move['namapelanggan']}', '{$data_to_move['namapaket']}', '{$data_to_move['harga']}')";
$insert_to_history = mysqli_query($conn, $sql_insert);

// 4. Hapus data dari tabel 'keluar'
$sql_hapus = "DELETE FROM keluar WHERE idtagihan='$idtagihan'";
$hapus_barang = mysqli_query($conn, $sql_hapus);

mysqli_close($conn);

header('Location: barang_keluar.php');
?>
