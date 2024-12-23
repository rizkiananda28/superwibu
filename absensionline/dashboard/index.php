<?php
session_start();
include('../config/db.php');

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login/index.php");
    exit;
}

// Ambil data mahasiswa
$query = "SELECT * FROM Users WHERE role = 'mahasiswa'";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Dashboard Admin</h1>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['user_id']; ?>">Edit</a> |
                        <a href="delete_user.php?id=<?php echo $row['user_id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
