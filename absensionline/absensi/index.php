<?php
session_start();
include('../config/db.php');

if ($_SESSION['role'] != 'mahasiswa') {
    header("Location: ../login/index.php");
    exit;
}

// Ambil data mahasiswa
$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM Users WHERE user_id='$user_id'";
$result = $conn->query($query);
$user = $result->fetch_assoc();

// Form absensi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Absensi</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Form Absensi</h1>
    <form method="POST" action="absen_process.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <label>Nama Lengkap:</label>
        <input type="text" name="full_name" value="<?php echo $user['username']; ?>" disabled>
        <label>NIM:</label>
        <input type="text" name="nim" value="23012001" disabled>
        <label>Kehadiran:</label>
        <select name="kehadiran">
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
        </select>
        <label>Mata Kuliah:</label>
        <select name="matkul">
            <option value="Bahasa Inggris">Bahasa Inggris</option>
            <option value="Ilmu Sosial & Budaya Dasar">Ilmu Sosial & Budaya Dasar</option>
            <option value="Pemrograman Web">Pemrograman Web</option>
            <option value="Struktur Data">Struktur Data</option>
            <option value="Matematika Diskrit">Matematika Diskrit</option>
        </select>
        <label>Tanggal:</label>
        <input type="date" name="tanggal" required>
        <button type="submit">Absen</button>
    </form>
</body>
</html>
