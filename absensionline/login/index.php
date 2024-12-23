<?php
session_start();
include('../config/db.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengecek pengguna
    $query = "SELECT * FROM Users WHERE username='$username'";
    $result = $conn->query($query);
    $user = $result->fetch_assoc();

    // Validasi login
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        if ($user['role'] == 'admin') {
            header("Location: ../dashboard/index.php");
        } else {
            header("Location: ../absensi/index.php");
        }
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Absensi</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="login-container">
        <form method="POST" action="index.php">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>
