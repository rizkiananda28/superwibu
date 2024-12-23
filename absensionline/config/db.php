<?php
$host = "localhost"; // Host database
$username = "root";  // Username database
$password = "";      // Password database
$dbname = "absensionline"; // Nama database

// Koneksi ke database
$conn = new mysqli('localhost', 'root', '', 'absensionline');

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
