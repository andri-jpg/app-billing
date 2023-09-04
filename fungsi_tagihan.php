<?php
require 'config/db_connect.php';

$idtagihan = $_POST['idtagihan'];

$sql_update = "UPDATE tagihan SET status = 'lunas' WHERE idtagihan='$idtagihan'";
$update_status = mysqli_query($conn, $sql_update);

if ($update_status) {
    $sql_select = "SELECT tagihan.idtagihan, pelanggan.namapelanggan, paket.namapaket, paket.harga
    FROM tagihan
    INNER JOIN pelanggan ON tagihan.idpelanggan = pelanggan.idpelanggan
    INNER JOIN paket ON tagihan.idbarang = paket.idbarang
    WHERE tagihan.idtagihan='$idtagihan'";
    
    $result = mysqli_query($conn, $sql_select);
    $data_to_move = mysqli_fetch_assoc($result);

    $current_timestamp = date('Y-m-d H:i:s'); 
    $sql_insert = "INSERT INTO history (tanggal, namapelanggan, namapaket, harga) VALUES ('$current_timestamp', '{$data_to_move['namapelanggan']}', '{$data_to_move['namapaket']}', '{$data_to_move['harga']}')";
    $insert_to_history = mysqli_query($conn, $sql_insert);
    
    if ($insert_to_history) {
        header('Location: konfirmasi.php');
    } else {
        // Jika gagal memindahkan data
        echo 'Gagal memindahkan data ke tabel history.';
    }
} else {
    // Jika gagal mengubah status
    echo 'Gagal mengubah status tagihan.';
}

mysqli_close($conn);
?>
