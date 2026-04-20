<?php
session_start();
if(!isset($_SESSION["admin"])) {
    header("Location: index.php");
    exit();
}
include "../config/koneksi.php";

// Update status donasi
if(isset($_GET["update_status"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);
    $status = mysqli_real_escape_string($conn, $_GET["status"]);
    mysqli_query($conn, "UPDATE donasi SET status='$status' WHERE id=$id");
    header("Location: donasi_list.php");
    exit();
}

// Hapus donasi
if(isset($_GET["hapus"])) {
    $id = mysqli_real_escape_string($conn, $_GET["hapus"]);
    mysqli_query($conn, "DELETE FROM donasi WHERE id=$id");
    header("Location: donasi_list.php");
    exit();
}

// Ambil data donasi
$query = mysqli_query($conn, "SELECT * FROM donasi ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Donasi - Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-container {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }
        .admin-header {
            background: white;
            padding: 1rem 2rem;
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
        }
        .table-donasi {
            width: 100%;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
            border-collapse: collapse;
        }
        .table-donasi th {
            background: var(--primary);
            color: white;
            padding: 12px 15px;
            text-align: left;
        }
        .table-donasi td {
            padding: 12px 15px;
            border-bottom: 1px solid #eee;
        }
        .table-donasi tr:hover {
            background: #f9f9f9;
        }
        .status-pending {
            background: #ffc107;
            color: #333;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
            font-weight: 600;
        }
        .status-selesai {
            background: #28a745;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
            font-weight: 600;
        }
        .status-batal {
            background: #dc3545;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            display: inline-block;
            font-weight: 600;
        }
        .btn-small {
            padding: 5px 10px;
            font-size: 0.75rem;
            margin: 2px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
        }
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn-warning {
            background: #ffc107;
            color: #333;
        }
        .btn-info {
            background: #17a2b8;
            color: white;
        }
        .total-card {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }
        .total-card h3 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        .search-box {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 300px;
            margin-bottom: 1rem;
        }
        .export-btn {
            background: #28a745;
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
        }
        @media (max-width: 768px) {
            .admin-container {
                padding: 1rem;
            }
            .table-donasi {
                display: block;
                overflow-x: auto;
            }
            .stats-row {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .admin-header {
                flex-direction: column;
                text-align: center;
            }
            .search-box {
                width: 100%;
            }
        }
    </style>
</head>
<body style="background: #f0f2f5;">
    <div class="admin-container">
        <div class="admin-header">
            <div>
                <h2><i class="fas fa-hand-holding-usd"></i> Daftar Donasi</h2>
                <p>Kelola data donatur yang telah berdonasi</p>
            </div>
            <div>
                <a href="dashboard.php" class="btn btn-primary"><i class="fas fa-image"></i> Kelola Galeri</a>
                <a href="logout.php" class="btn" style="background: #dc3545;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
        
        <?php 
        // Hitung statistik
        $total_query = mysqli_query($conn, "SELECT SUM(nominal) as total FROM donasi WHERE status='selesai'");
        $total_row = mysqli_fetch_assoc($total_query);
        $total_nominal = $total_row['total'] ? number_format($total_row['total'], 0, ',', '.') : 0;
        
        $count_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM donasi");
        $count_row = mysqli_fetch_assoc($count_query);
        $total_donatur = $count_row['count'];
        
        $pending_query = mysqli_query($conn, "SELECT COUNT(*) as count FROM donasi WHERE status='pending'");
        $pending_row = mysqli_fetch_assoc($pending_query);
        $total_pending = $pending_row['count'];
        ?>
        
        <div class="stats-row">
            <div class="total-card">
                <i class="fas fa-users" style="font-size: 2rem;"></i>
                <h3><?= $total_donatur ?></h3>
                <p>Total Donatur</p>
            </div>
            <div class="total-card">
                <i class="fas fa-clock" style="font-size: 2rem;"></i>
                <h3><?= $total_pending ?></h3>
                <p>Menunggu Konfirmasi</p>
            </div>
            <div class="total-card">
                <i class="fas fa-money-bill-wave" style="font-size: 2rem;"></i>
                <h3>Rp <?= $total_nominal ?></h3>
                <p>Total Donasi Masuk</p>
            </div>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; flex-wrap: wrap; gap: 1rem;">
            <input type="text" id="searchInput" class="search-box" placeholder="🔍 Cari nama atau email..." onkeyup="searchTable()">
            <button onclick="exportToExcel()" class="export-btn"><i class="fas fa-file-excel"></i> Export ke Excel</button>
        </div>
        
        <table class="table-donasi" id="donasiTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Donatur</th>
                    <th>Email</th>
                    <th>Nominal</th>
                    <th>Metode</th>
                    <th>Pesan</th>
                    <th>Status</th>
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
                        <td>Rp <?= number_format($row['nominal'], 0, ',', '.') ?></td>
                        <td><?= $row['metode'] ?></td>
                        <td style="max-width: 200px;"><?= htmlspecialchars(substr($row['pesan'], 0, 50)) ?><?= strlen($row['pesan']) > 50 ? '...' : '' ?></td>
                        <td>
                            <span class="status-<?= $row['status'] ?>">
                                <?php 
                                if($row['status'] == 'pending') echo "⏳ Menunggu";
                                elseif($row['status'] == 'selesai') echo "✅ Selesai";
                                else echo "❌ Batal";
                                ?>
                            </span>
                        </td>
                        <td><?= date('d/m/Y H:i', strtotime($row['tanggal'])) ?></td>
                        <td>
                            <?php if($row['status'] == 'pending'): ?>
                                <a href="?update_status=1&id=<?= $row['id'] ?>&status=selesai" class="btn-small btn-success" title="Konfirmasi"><i class="fas fa-check"></i></a>
                                <a href="?update_status=1&id=<?= $row['id'] ?>&status=batal" class="btn-small btn-danger" title="Batalkan"><i class="fas fa-times"></i></a>
                            <?php endif; ?>
                            <a href="?hapus=<?= $row['id'] ?>" class="btn-small btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus data donasi ini?')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" style="text-align: center; padding: 3rem;">
                            <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc;"></i>
                            <p>Belum ada donasi masuk</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    
    <script>
        // Fungsi pencarian
        function searchTable() {
            let input = document.getElementById("searchInput");
            let filter = input.value.toLowerCase();
            let table = document.getElementById("donasiTable");
            let tr = table.getElementsByTagName("tr");
            
            for (let i = 1; i < tr.length; i++) {
                let tdNama = tr[i].getElementsByTagName("td")[1];
                let tdEmail = tr[i].getElementsByTagName("td")[2];
                if (tdNama || tdEmail) {
                    let txtValueNama = tdNama.textContent || tdNama.innerText;
                    let txtValueEmail = tdEmail.textContent || tdEmail.innerText;
                    if (txtValueNama.toLowerCase().indexOf(filter) > -1 || 
                        txtValueEmail.toLowerCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        
        // Fungsi export ke Excel
        function exportToExcel() {
            let table = document.getElementById("donasiTable");
            let html = table.outerHTML;
            let url = 'data:application/vnd.ms-excel,' + encodeURIComponent(html);
            let link = document.createElement('a');
            link.href = url;
            link.download = 'daftar_donasi.xls';
            link.click();
        }
    </script>
</body>
</html>