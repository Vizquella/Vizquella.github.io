<?php
include 'koneksi.php';
session_start();

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: admin_login.php");
    exit;
}

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM komentar WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$komentar = $result->fetch_assoc();

if (!$komentar) {
    echo "<script>
            alert('Komentar tidak ditemukan.');
            window.location.href='list_komentar.php';
          </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="styles/update.css">
</head>
<body>
    <h2>Edit Komentar</h2>
    
    <form action="proses_edit_komentar.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($komentar['nama']); ?>" required>

        <label for="usia">Usia:</label>
        <input type="number" id="usia" name="usia" value="<?php echo (int)$komentar['usia']; ?>" required>

        <label for="komentar">Komentar:</label>
        <textarea id="komentar" name="komentar" rows="4" required><?php echo htmlspecialchars($komentar['komentar']); ?></textarea>

        <label for="file">Ganti File (Opsional):</label>
        <input type="file" id="file" name="file">
        <p>File saat ini: <?php echo htmlspecialchars($komentar['file_name'] ?? ''); ?></p>


        <button type="submit">Simpan Perubahan</button>
    </form>

    <a href="list_komentar.php" class="back-btn">Kembali</a>
</body>
</html>

<?php
$query->close();
$conn->close();
?>
