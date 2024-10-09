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
    $id = $_POST['id'];
    $nama = htmlspecialchars($_POST['nama']);
    $usia = (int) $_POST['usia'];
    $komentar = htmlspecialchars($_POST['komentar']);
    
    $sql = "UPDATE komentar SET nama='$nama', usia=$usia, komentar='$komentar' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Komentar berhasil diupdate!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM komentar WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <h2>Edit Komentar</h2>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
        <label for="usia">Usia:</label>
        <input type="number" id="usia" name="usia" value="<?php echo $row['usia']; ?>" required>
        <label for="komentar">Komentar:</label>
        <textarea id="komentar" name="komentar" required><?php echo $row['komentar']; ?></textarea>
        <button type="submit">Update Komentar</button>
        <a href="list_komentar.php" class="back-btn">Kembali</a>
    </form>
</body>
</html>

<?php
$conn->close(); 
?>
