<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM komentar WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Komentar berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<button onclick="window.location.href='list_komentar.php'">Kembali ke Daftar Komentar</button>
