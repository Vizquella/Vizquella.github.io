<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Komentar</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>

<h2>Edit Komentar</h2>

<form action="proses_update_komentar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>" required>

    <label for="usia">Usia:</label>
    <input type="number" id="usia" name="usia" value="<?php echo htmlspecialchars($usia); ?>" required>

    <label for="komentar">Komentar:</label>
    <textarea id="komentar" name="komentar" rows="4" required><?php echo htmlspecialchars($komentar); ?></textarea>
    <label for="file">Upload File:</label>
    <input type="file" id="file" name="file">
    
    <button type="submit">Update Komentar</button>
</form>

<a href="index.php" class="back-btn">Kembali</a>

</body>
</html>
