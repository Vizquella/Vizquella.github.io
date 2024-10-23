<?php
include 'koneksi.php';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "<script>
        alert('Maaf, file sudah ada.');
        window.location.href='index.php';
    </script>";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "<script>
        alert('Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.');
        window.location.href='index.php';
    </script>";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "<script>
        alert('Maaf, file Anda tidak berhasil di-upload.');
        window.location.href='index.php';
    </script>";
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $nama = $_POST['nama'];
        $usia = $_POST['usia'];
        $komentar = $_POST['komentar'];
        $file_name = basename($_FILES["file"]["name"]);

        $stmt = $conn->prepare("INSERT INTO komentar (nama, usia, komentar, file_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("siss", $nama, $usia, $komentar, $file_name);

        if ($stmt->execute()) {
            echo "<script>
                alert('File berhasil di-upload dan data berhasil disimpan ke database.');
                window.location.href='index.php';
            </script>";
        } else {
            echo "<script>
                alert('Error menyimpan data ke database: " . $conn->error . "');
                window.location.href='index.php';
            </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat meng-upload file Anda.');
            window.location.href='index.php';
        </script>";
    }
}

$conn->close();
?>
