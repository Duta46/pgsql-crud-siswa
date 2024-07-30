<?php
$host = 'localhost';
$db = 'sekolah';
$user = 'postgres';
$pass = 'password';
$port = '5432';

$koneksi = "pgsql:host=$host;port=$port;dbname=$db";

try {
    $pdo = new PDO($koneksi, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // echo "Koneksi berhasil"; // Komen ini agar tidak mengganggu output di read.php
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit; 
}

