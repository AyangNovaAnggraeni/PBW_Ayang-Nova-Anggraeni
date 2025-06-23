<?php
include ('../koneksi_db.php'); // Koneksi database


$query = "
SELECT 
    Pesanan.ID AS Pesanan_ID,
    Pelanggan.Nama AS Nama_Pelanggan,
    Pesanan.Tanggal_Pesanan,
    Pesanan.Total_Harga,
    GROUP_CONCAT(Buku.Judul SEPARATOR ', ') AS Nama_Buku
FROM Pesanan
JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
JOIN detail_pesanan ON Pesanan.ID = detail_pesanan.Pesanan_ID
JOIN Buku ON detail_pesanan.Buku_ID = Buku.ID
GROUP BY Pesanan.ID
";
$result = $conn->query($query);


if (isset($_GET['hapus'])) {
    $id = intval($_GET['hapus']);

    // Hapus dari detail_pesanan
    $stmt1 = $conn->prepare("DELETE FROM detail_pesanan WHERE Pesanan_ID = ?");
    $stmt1->bind_param("i", $id);
    $stmt1->execute();

    // Hapus dari pesanan
    $stmt2 = $conn->prepare("DELETE FROM pesanan WHERE ID = ?");
    $stmt2->bind_param("i", $id);
    $stmt2->execute();

    header("Location: " . basename(__FILE__));
    exit;
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Daftar Pesanan</title>
</head>
<body>
   <?php include '../nav.php' ?>
   <div class="container mt-4">
       <h2>Daftar Pesanan</h2>


       <!-- Tabel Daftar Pesanan -->
       <table class="table table-striped">
           <thead>
               <tr>
                   <th>ID Pesanan</th>
                   <th>Nama Buku</th>
                   <th>Nama Pelanggan</th>
                   <th>Tanggal Pesanan</th>
                   <th>Total Harga</th>
               </tr>
           </thead>
           <tbody>
               <?php while ($row = $result->fetch_assoc()): ?>
               <tr>
                   <td><?= $row['Pesanan_ID'] ?></td>
                   <td><?= htmlspecialchars($row['Nama_Buku']) ?></td>
                   <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                   <td><?= $row['Tanggal_Pesanan'] ?></td>
                   <td>Rp<?= number_format($row['Total_Harga'], 2) ?></td>
                   <td><a href="?hapus=<?= $row['Pesanan_ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">Hapus</a></td>

               </tr>
               <?php endwhile; ?>
           </tbody>
       </table>
   </div>


   <!-- Bootstrap JS -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>