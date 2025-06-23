<?php
include '../koneksi_db.php';

$nama = trim($_POST['username']);
$katasandi = $_POST['password'];
$konfirmasi = $_POST['confirm_password'];

// Validasi password sama
if ($katasandi !== $konfirmasi) {
    header("Location: register.php?message=" . urlencode("Password tidak cocok."));
    exit;
}

// Cek apakah nama sudah ada
$cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama = '$nama'");
if (mysqli_num_rows($cek) > 0) {
    header("Location: register.php?message=" . urlencode("Nama pengguna sudah digunakan."));
    exit;
}

// Simpan ke database
$hash = password_hash($katasandi, PASSWORD_DEFAULT);
$query = "INSERT INTO pengguna (nama, katasandi) VALUES ('$nama', '$hash')";

if (mysqli_query($conn, $query)) {
    header("Location: login.php?message=" . urlencode("Berhasil mendaftar! Silakan login."));
} else {
    header("Location: register.php?message=" . urlencode("Gagal mendaftar."));
}
?>
