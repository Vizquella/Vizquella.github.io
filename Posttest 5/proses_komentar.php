<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "trail_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $usia = (int) $_POST['usia'];
    $komentar = htmlspecialchars($_POST['komentar']);
    
    $sql = "INSERT INTO komentar (nama, usia, komentar) VALUES ('$nama', $usia, '$komentar')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Komentar berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="komentar.css">
</head>
<body>
<button onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
</body>
</html>
