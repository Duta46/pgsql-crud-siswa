<?php
require 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Query untuk menghapus data dari tabel
        $query = "DELETE FROM mahasiswa WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: siswa.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID tidak ditemukan.";
}
