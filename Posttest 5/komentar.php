<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komentar</title>
    <link rel="stylesheet" href="komentar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Eagle+Lake&family=Road+Rage&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vollkorn:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>
    <main>
        <section id="komentar" class="komentar">
            <h2>Tulis Saran/Kritik Anda</h2>
            <form action="proses_komentar.php" method="post" class="form-komentar">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
                <label for="usia">Usia:</label>
                <input type="number" id="usia" name="usia" required>
                <label for="komentar">Komentar:</label>
                <textarea id="komentar" name="komentar" rows="4" required></textarea>
                <button type="submit">Kirim Komentar</button>
            </form>
        </section>
    </main>
</body>
</html>