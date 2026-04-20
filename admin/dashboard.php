<?php
session_start();
if (!isset($_SESSION["admin"])) header("Location: index.php");
include "../config/koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f0f2f5;
            padding: 1rem;
        }

        .admin-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .admin-header {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .admin-header h2 {
            color: var(--primary);
            font-size: 1.5rem;
        }

        .admin-header p {
            color: #666;
            font-size: 0.85rem;
        }

        .btn-group {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
        }

        .btn-donasi {
            background: #17a2b8;
            color: white;
        }

        .btn-donasi:hover {
            background: #138496;
            transform: translateY(-2px);
        }

        .btn-kontak {
            background: #ffc107;
            color: #333;
        }

        .btn-kontak:hover {
            background: #e0a800;
            transform: translateY(-2px);
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: all 0.3s;
        }

        .gallery-item:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
        }

        .gallery-item img {
            width: 100%;
            height: 220px;
            object-fit: cover;
        }

        .gallery-caption {
            padding: 1rem;
            text-align: center;
        }

        .gallery-caption h3 {
            font-size: 1rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        .gallery-caption p {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0.8rem;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            background: white;
            border-radius: 15px;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ccc;
            margin-bottom: 1rem;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            body {
                padding: 0.5rem;
            }

            .admin-header {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            .admin-header h2 {
                font-size: 1.3rem;
            }

            .btn-group {
                justify-content: center;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.8rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }

            .gallery-item img {
                height: 180px;
            }
        }

        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
                width: 100%;
            }

            .btn-group .btn {
                width: 100%;
                text-align: center;
            }

            .admin-header h2 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <div class="admin-container">
        <div class="admin-header">
            <div>
                <h2><i class="fas fa-image"></i> Kelola Galeri</h2>
                <p>Kelola foto dokumentasi kegiatan</p>
            </div>
            <div class="btn-group">
                <a href="donasi_list.php" class="btn btn-donasi"><i class="fas fa-hand-holding-usd"></i> Daftar Donasi</a>
                <a href="kontak_list.php" class="btn btn-kontak"><i class="fas fa-envelope"></i> Pesan Kontak</a>
                <a href="tambah_galeri.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Foto</a>
                <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <div class="gallery-grid">
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
                <div class="gallery-item">
                    <img src="../uploads/<?= $row["gambar"] ?>" alt="<?= $row["judul"] ?>">
                    <div class="gallery-caption">
                        <h3><?= $row["judul"] ?></h3>
                        <p><small><?= $row["tanggal"] ?></small></p>
                        <a href="hapus.php?id=<?= $row["id"] ?>" class="btn btn-danger" style="display: inline-block; padding: 6px 12px; font-size: 0.75rem;" onclick="return confirm('Yakin ingin menghapus foto ini?')"><i class="fas fa-trash"></i> Hapus</a>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php if (mysqli_num_rows($query) == 0): ?>
                <div class="empty-state">
                    <i class="fas fa-images"></i>
                    <p>Belum ada foto galeri. Klik "Tambah Foto" untuk mulai mengunggah.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>