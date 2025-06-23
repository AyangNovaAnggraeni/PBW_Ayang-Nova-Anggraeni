<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: ../user/login.php?message=" . urlencode("Harus login dulu untuk akses fitur ini."));
    exit;
}
?>

<?php
include ('../koneksi_db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Get the book data before deleting
    $result = $conn->query("SELECT * FROM buku WHERE ID = $id");
    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();

        // Insert the book data into backup table
        $stmt = $conn->prepare("INSERT INTO hapus_buku (ID, Judul, Penulis, Tahun_Terbit, Harga) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issid", $book['ID'], $book['Judul'], $book['Penulis'], $book['Tahun_Terbit'], $book['Harga']);
        $stmt->execute();
        $stmt->close();

        // Delete the book from original table
        $conn->query("DELETE FROM buku WHERE ID = $id");

        header("Location: index.php?message=deleted");
        exit();
    } else {
        echo "Data not found.";
    }
} else {
    echo "Invalid request.";
}
?>


