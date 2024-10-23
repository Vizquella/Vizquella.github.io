<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin'] = true;
            header("Location: admin_dashboard.php");
            exit;
        } else {
            echo "<script>alert('Password salah.');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan.');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1. 0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="styles/admin_style.css">
</head>
<body>
    <div class="container">
        <h2>Login Admin</h2>
        <form action="" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
        <p>Belum punya akun? <a href="admin_register.php">Registrasi di sini</a>.</p>
    </div>
</body>
</html>
