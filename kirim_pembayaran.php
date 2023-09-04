<?php
session_start();

if (!isset($_SESSION['login_u'])) {
    header('Location: login_user.php');
    exit;
}

require 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idtagihan = $_POST['idtagihan'];

    $targetDir = 'uploads/'; 
    $targetFile = $targetDir . basename($_FILES['buktiPembayaran']['name']);
    
    $allowedFileTypes = array('jpg', 'jpeg', 'png'); 
    $uploadedFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (in_array($uploadedFileType, $allowedFileTypes)) {
        if (move_uploaded_file($_FILES['buktiPembayaran']['tmp_name'], $targetFile)) {
            $updateStatusSql = "UPDATE tagihan SET status = 'pending' WHERE idtagihan = $idtagihan";
            if (mysqli_query($conn, $updateStatusSql)) {
                $insertBuktiSql = "INSERT INTO bp (idtagihan, foto) VALUES ($idtagihan, '$targetFile')";
                if (mysqli_query($conn, $insertBuktiSql)) {
                    mysqli_close($conn);
                    header('Location: user_index.php');
                    exit;
                } else {
                    echo 'Gagal memasukkan data bukti pembayaran.';
                }
            } else {
                echo 'Gagal mengubah status tagihan.';
            }
        } else {
            echo 'Gagal mengunggah foto bukti pembayaran.';
        }
    } else {
        echo 'Jenis berkas tidak diizinkan. Hanya file JPG, JPEG, dan PNG yang diizinkan.';
    }
} else {
    echo 'Akses tidak sah.';
}
?>
