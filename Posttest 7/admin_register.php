<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='admin_login.php';</script>";
    } else {
        echo "<script>alert('Username sudah ada. Silakan gunakan username lain.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin</title>
    <link rel="stylesheet" href="styles/admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Registrasi Admin</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Registrasi">
        </form>
        <p>Sudah punya akun? <a href="admin_login.php">Login di sini</a>.</p>
    </div>
</body>
</html>
