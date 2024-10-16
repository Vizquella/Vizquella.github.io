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
    $id = (int)$_GET['id'];
    $sql = "SELECT file_name FROM komentar WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $fileName = $row['file_name'];
        if (!empty($fileName) && file_exists('uploads/' . $fileName)) {
            unlink('uploads/' . $fileName);
        }
        $sql = "DELETE FROM komentar WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Komentar berhasil dihapus!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Komentar tidak ditemukan.";
    }
}
$conn->close();
?>
<button onclick="window.location.href='list_komentar.php'">Kembali ke Daftar Komentar</button>
