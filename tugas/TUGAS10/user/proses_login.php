<?php
session_start();
include '../koneksi_db.php';

$nama = $_POST['username'];
$katasandi = $_POST['password'];
$remember = isset($_POST['remember']);

// Ambil data pengguna
$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama='$nama'");
$user = mysqli_fetch_assoc($query);

// Verifikasi password
if ($user && password_verify($katasandi, $user['katasandi'])) {
    $_SESSION['login_Un51k4'] = [
        'id' => $user['id'],
        'username' => $user['nama']
    ];

    if ($remember) {
        setcookie('remember_token', base64_encode($user['nama']), time() + (86400 * 30), "/");
    }

    header("Location: ../index.php");
    exit;
} else {
    header("Location: login.php?message=" . urlencode("Nama atau password salah."));
    exit;
}
