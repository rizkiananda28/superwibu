<?php
session_start();
include('../config/db.php');

$user_id = $_POST['user_id'];
$kehadiran = $_POST['kehadiran'];
$matkul = $_POST['matkul'];
$tanggal = $_POST['tanggal'];

// Perhitungan pertemuan (contoh sederhana, bisa diubah)
$pertemuan = date('W', strtotime($tanggal)); 

// Menyimpan absensi ke database
$query = "INSERT INTO Absensi (user_id, matkul, tanggal, pertemuan, kehadiran) 
          VALUES ('$user_id', '$matkul', '$tanggal', '$pertemuan', '$kehadiran')";
if ($conn->query($query) === TRUE) {
    echo "Absen berhasil!";
} else {
    echo "Error: " . $conn->error;
}
?>
