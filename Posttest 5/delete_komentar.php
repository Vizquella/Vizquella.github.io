<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="delete.css">

</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trail_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM komentar WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Komentar berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<button onclick="window.location.href='list_komentar.php'">Kembali ke Daftar Komentar</button>

</body>
</html>