<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trail_website";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT id, nama, usia, komentar, created_at FROM komentar";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Komentar</title>
    <link rel="stylesheet" href="list_komentar.css">

</head>
<body>
    <h2>Daftar Komentar</h2>
    <table>
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Komentar</th>
            <th>Waktu</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["nama"] . "</td>
                        <td>" . $row["usia"] . "</td>
                        <td>" . $row["komentar"] . "</td>
                        <td>" . $row["created_at"] . "</td>
                        <td>
                            <a href='edit_komentar.php?id=" . $row["id"] . "'>Edit</a> |
                            <a href='delete_komentar.php?id=" . $row["id"] . "' onclick=\"return confirm('Apakah Anda yakin?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Belum ada komentar.</td></tr>";
        }
        ?>
    </table>
    <a href="admin_dashboard.php" class="back-btn">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
