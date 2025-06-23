<?php
include ('../koneksi_db.php');
include ('../nav.php');
$result = $conn->query("SELECT * FROM hapus_buku ORDER BY Deleted_At DESC");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku yang Dihapus</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { padding: 8px 12px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h2>Daftar Buku yang Telah Dihapus</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
            <th>Harga</th>
            <th>Dihapus Pada</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['ID']; ?></td>
            <td><?= $row['Judul']; ?></td>
            <td><?= $row['Penulis']; ?></td>
            <td><?= $row['Tahun_Terbit']; ?></td>
            <td>Rp<?= number_format($row['Harga'], 0, ',', '.'); ?></td>
            <td><?= $row['Deleted_At']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
