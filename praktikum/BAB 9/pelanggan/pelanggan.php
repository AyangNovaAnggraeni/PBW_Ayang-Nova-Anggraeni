<?php
include ('../koneksi_db.php');
include ('../nav.php');

// Tambah pelanggan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['tambah'])) {
    $id = $_POST['ID'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $stmt = $conn->prepare("INSERT INTO pelanggan (ID, Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id, $nama, $alamat, $email, $telepon);
    $stmt->execute();
    header("Location: pelanggan.php");
    exit;
}

// Hapus pelanggan
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $conn->query("DELETE FROM pelanggan WHERE ID = $id");
    header("Location: pelanggan.php");
    exit;
}

// Edit pelanggan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['ID'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];

    $stmt = $conn->prepare("UPDATE pelanggan SET Nama=?, Alamat=?, Email=?, Telepon=? WHERE ID=?");
    $stmt->bind_param("ssssi", $nama, $alamat, $email, $telepon, $id);
    $stmt->execute();
    header("Location: pelanggan.php");
    exit;
}

// Ambil data pelanggan
$pelanggan = $conn->query("SELECT * FROM pelanggan");

$editData = null;
if (isset($_GET['edit'])) {
    $editId = $_GET['edit'];
    $editData = $conn->query("SELECT * FROM pelanggan WHERE ID = $editId")->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Pelanggan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4"><?= $editData ? 'Edit Pelanggan' : 'Tambah Pelanggan' ?></h2>
        <form method="POST" class="mb-5">
            <input type="hidden" name="ID" value="<?= $editData['ID'] ?? '' ?>">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $editData['Nama'] ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $editData['Alamat'] ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $editData['Email'] ?? '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?= $editData['Telepon'] ?? '' ?>" required>
            </div>
            <button type="submit" name="<?= $editData ? 'update' : 'tambah' ?>" class="btn btn-primary">
                <?= $editData ? 'Update' : 'Tambah' ?>
            </button>
            <?php if ($editData): ?>
                <a href="pelanggan.php" class="btn btn-secondary ms-2">Batal</a>
            <?php endif; ?>
        </form>

        <h2 class="mb-3">Daftar Pelanggan</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $pelanggan->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['ID'] ?></td>
                    <td><?= $row['Nama'] ?></td>
                    <td><?= $row['Alamat'] ?></td>
                    <td><?= $row['Email'] ?></td>
                    <td><?= $row['Telepon'] ?></td>
                    <td>
                        <a href="?edit=<?= $row['ID'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="?hapus=<?= $row['ID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
