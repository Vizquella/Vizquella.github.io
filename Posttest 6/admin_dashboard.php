<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="admin_style.css">

</head>
<body>
    <h2>Dashboard Admin</h2>
    <p>Haloo Adminn</p>

    <ul>
        <li><a href="list_komentar.php">Kelola Komentar</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
