<?php
session_start();
if(!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit();
}
include "../config/koneksi.php";

// Hapus pesan
if(isset($_GET["hapus"])) {
    $id = mysqli_real_escape_string($conn, $_GET["hapus"]);
    mysqli_query($conn, "DELETE FROM kontak WHERE id=$id");
    header("Location: kontak_list.php");
    exit();
}

// Ambil data pesan
$query = mysqli_query($conn, "SELECT * FROM kontak ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pesan Kontak - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f0f2f5; padding: 1rem; }
        .admin-container { max-width: 1200px; margin: 0 auto; }
        .admin-header {
            background: white; padding: 1rem 1.5rem; border-radius: 15px;
            box-shadow: var(--shadow); margin-bottom: 2rem;
            display: flex; justify-content: space-between; align-items: center;
            flex-wrap: wrap; gap: 1rem;
        }
        .admin-header h2 { color: var(--primary); }
        .btn { padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .table-container { overflow-x: auto; background: white; border-radius: 15px; box-shadow: var(--shadow); }
        table { width: 100%; border-collapse: collapse; min-width: 600px; }
        th { background: var(--primary); color: white; padding: 12px; text-align: left; }
        td { padding: 12px; border-bottom: 1px solid #eee; }
        tr:hover { background: #f9f9f9; }
        .pesan-text { max-width: 300px; white-space: normal; word-wrap: break-word; }
        .empty-state { text-align: center; padding: 3rem; }
        @media (max-width: 768px) {
            .admin-header { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <div>
                <h2><i class="fas fa-envelope"></i> Daftar Pesan Kontak</h2>
                <p>Pesan yang masuk dari pengunjung website</p>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-primary"><i class="fas fa-image"></i> Kelola Galeri</a>
                <a href="logout.php" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($query) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['nama']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td class="pesan-text"><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($row['tanggal'])) ?></td>
                            <td>
                                <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger" style="padding: 5px 12px; font-size: 0.75rem;" onclick="return confirm('Yakin hapus pesan ini?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="empty-state">
                                <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc;"></i>
                                <p>Belum ada pesan masuk</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>