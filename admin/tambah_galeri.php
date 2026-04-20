<?php
session_start();
if(!isset($_SESSION["admin"])) header("Location: index.php");
include "../config/koneksi.php";

if(isset($_POST["submit"])) {
    $judul = mysqli_real_escape_string($conn, $_POST["judul"]);
    $file = $_FILES["gambar"];
    $fileName = time() . "_" . basename($file["name"]);
    $targetPath = "../uploads/" . $fileName;
    
    if(move_uploaded_file($file["tmp_name"], $targetPath)) {
        mysqli_query($conn, "INSERT INTO galeri (judul, gambar) VALUES (\"$judul\", \"$fileName\")");
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Galeri</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .upload-form { background: white; border-radius: 20px; padding: 2rem; max-width: 500px; margin: 50px auto; box-shadow: var(--shadow); }
        .dropzone { border: 2px dashed #ddd; border-radius: 15px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s; }
        .dropzone:hover { border-color: var(--primary); background: #f9f9f9; }
    </style>
</head>
<body style="background: #f0f2f5;">
    <div class="upload-form">
        <h2 style="color: var(--primary); text-align: center;"><i class="fas fa-cloud-upload-alt"></i> Upload Foto</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="text" name="judul" placeholder="Judul Foto" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 10px;">
            <div class="dropzone" onclick="document.getElementById('gambar').click()">
                <i class="fas fa-image" style="font-size: 3rem; color: #ccc;"></i>
                <p>Klik untuk pilih gambar</p>
                <p style="font-size: 0.8rem; color: #999;">Format: JPG, PNG, JPEG</p>
            </div>
            <input type="file" name="gambar" id="gambar" accept="image/*" required style="display: none;" onchange="document.getElementById('file-name').innerHTML = this.files[0].name">
            <p id="file-name" style="color: var(--primary); text-align: center; margin: 10px 0;"></p>
            <button type="submit" name="submit" class="btn btn-primary" style="width: 100%;"><i class="fas fa-upload"></i> Upload</button>
        </form>
        <div style="text-align: center; margin-top: 1rem;">
            <a href="dashboard.php" style="color: #666;"><i class="fas fa-arrow-left"></i> Kembali ke Dashboard</a>
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            if(e.target.files[0]) {
                document.querySelector('.dropzone').style.borderColor = '#0a6b4f';
            }
        });
    </script>
</body>
</html>