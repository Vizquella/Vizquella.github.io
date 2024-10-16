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
    $stmt = $conn->prepare("INSERT INTO komentar (nama, usia, komentar) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $nama, $usia, $komentar);
    
    if ($stmt->execute()) {
        echo "Komentar berhasil disimpan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
