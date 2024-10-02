<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Komentar</title>
    <link rel="stylesheet" href="hasil_komentar.css"> 
</head>
<body>

<div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars($_POST['nama']);
        $usia = (int) $_POST['usia'];
        $komentar = htmlspecialchars($_POST['komentar']);
        echo "<h2>Kritik/Saran Anda</h2>";
        echo "<p><strong>Nama:</strong> $nama</p>";
        echo "<p><strong>Usia:</strong> $usia</p>";
        echo "<p><strong>Komentar:</strong> $komentar</p>";
    }
    ?>
    
    <button onclick="window.location.href='index.php'">Kembali ke Halaman Utama</button>
</div>

</body>
</html>
