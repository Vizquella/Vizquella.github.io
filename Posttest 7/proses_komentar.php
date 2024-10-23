<?php
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $usia = (int) $_POST['usia'];
    $komentar = htmlspecialchars($_POST['komentar']);
    
    $sql = "INSERT INTO komentar (nama, usia, komentar) VALUES ('$nama', '$usia', '$komentar')";

    if (mysqli_query($conn, $sql)) {
        echo "Komentar berhasil disimpan!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
