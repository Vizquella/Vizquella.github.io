<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $komentar = $_POST['komentar'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trail_website";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    if (isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $fileTmp = $_FILES['file']['tmp_name'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($fileName);
        if (move_uploaded_file($fileTmp, $targetFile)) {
            $sql = "UPDATE komentar SET nama=?, usia=?, komentar=?, file_name=? WHERE id=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sissi", $nama, $usia, $komentar, $fileName, $id);
        } else {
            echo "Gagal mengupload file.";
            exit;
        }
    } else {
        $sql = "UPDATE komentar SET nama=?, usia=?, komentar=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sisi", $nama, $usia, $komentar, $id);
    }
    if ($stmt->execute()) {
        header("Location: list_komentar.php");
        exit;
    } else {
        echo "Gagal mengupdate komentar.";
    }

    $stmt->close();
    $conn->close();
}
?>
