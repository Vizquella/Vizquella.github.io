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

$sql = "SELECT id, nama, usia, komentar, created_at, file_name FROM komentar";
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

    <table class="table-komentar">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Komentar</th>
            <th>Waktu</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                echo "<td>" . (int)$row['usia'] . "</td>";
                echo "<td>" . htmlspecialchars($row['komentar']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                if (!empty($row['file_name'])) {
                    echo "<td><img src='uploads/" . htmlspecialchars($row['file_name']) . "' alt='Foto' style='max-width: 100px; height: auto;'></td>";
                } else {
                    echo "<td>Tidak ada foto</td>";
                }
                echo "<td>
                        <a href='edit_komentar.php?id=" . $row['id'] . "'>Edit</a> | 
                        <a href='delete_komentar.php?id=" . $row['id'] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus komentar ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada komentar yang ditemukan.</td></tr>";
        }
        ?>
    </table>

    <a href="admin_dashboard.php" class="back-btn">Kembali</a>
</body>
</html>

<?php
$conn->close();
?>
