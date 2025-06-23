<?php

// Cek cookie remember me
if (isset($_COOKIE['remember_token']) && !isset($_SESSION['login_Un51k4'])) {
    include 'koneksi_db.php';
    $nama = base64_decode($_COOKIE['remember_token']);
    $query = mysqli_query($conn, "SELECT * FROM pengguna WHERE nama='$nama'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        $_SESSION['login_Un51k4'] = [
            'id' => $user['id'],
            'nama' => $user['nama']
        ];
    }
}
?>

<!-- Link Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<!-- Link SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Menu Navigasi -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/TUGAS9/index.php">Toko Buku Online</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <!-- Semua menu dipasang cekLogin() kecuali index -->
        <li class="nav-item">
            <a class="nav-link" href="/TUGAS9/index.php">Daftar Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cekLogin('/TUGAS9/buku/tambah_buku.php')">Tambah Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cekLogin('/TUGAS9/pelanggan/pelanggan.php')">Pelanggan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cekLogin('/TUGAS9/transaksi/transaksi.php')">Buat Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cekLogin('/TUGAS9/transaksi/lihat_transaksi.php')">Lihat Pesanan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" onclick="cekLogin('/TUGAS9/buku/hapus.php')">Hapus Buku</a>
        </li>
      </ul>

      <!-- Login / Dropdown User -->
      <ul class="navbar-nav">
        <?php if (isset($_SESSION['login_Un51k4'])): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              <i class="bi bi-person-circle"></i> <?php echo $_SESSION['login_Un51k4']['nama']; ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <!-- <li><a class="dropdown-item" href="#">Profil</a></li> -->
              <li><a class="dropdown-item" href="/TUGAS9/user/logout.php">Logout</a></li>
            </ul>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="/TUGAS9/user/login.php"><i class="bi bi-person-circle"></i> Login / Register</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Script untuk cek login -->
<script>
  function cekLogin(target) {
    const isLoggedIn = <?php echo isset($_SESSION['login_Un51k4']) ? 'true' : 'false'; ?>;
    if (isLoggedIn) {
      window.location.href = target;
    } else {
      Swal.fire({
        icon: 'warning',
        title: 'Akses Ditolak',
        text: 'Kamu harus login terlebih dahulu!',
        confirmButtonText: 'Login Sekarang'
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = '/TUGAS9/user/login.php';
        }
      });
    }
  }
</script>
