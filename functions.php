<?php 
require_once 'config/db_connect.php';

function register($data) {
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $username = $conn->real_escape_string($data['username']); 
    $password = $conn->real_escape_string($data['password']); 
    $password2 = $conn->real_escape_string($data['password2']); 
    $email = $conn->real_escape_string($data['email']);

    $result = $conn->query("SELECT * FROM tb_user WHERE username = '$username'");
    if ($result->num_rows > 0) {
        echo "<script>alert('Username sudah terdaftar!');window.location='register.php';</script>";
        return false;
    }

    if ($password != $password2) {
        echo "<script>alert('Konfirmasi password salah.');</script>";
        return false;
    }

    if (strlen($password) < 6) {
        echo "<script>alert('Password terlalu pendek, minimal 6 karakter');window.location='register.php';</script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $conn->query("INSERT INTO tb_user VALUES (null, '$username', '$password', '$nama', '$email')") or die(mysqli_error($conn));
    return $conn->affected_rows;
}
?>



