<?php
require 'config/db_connect.php';

$idtagihan = $_POST['idtagihan'];

// 2. Ubah status menjadi 'lunas'
$sql_update = "UPDATE keluar SET status = 'lunas' WHERE idtagihan='$idtagihan'";
$update_status = mysqli_query($conn, $sql_update);

if ($update_status) {
    // Jika pembaruan berhasil, pindahkan data ke tabel 'history'
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
    
    if ($insert_to_history) {
        // Jika pemindahan data berhasil
        header('Location: barang_keluar.php');
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
