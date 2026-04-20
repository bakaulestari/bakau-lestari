<?php 
include "config/koneksi.php";

// Proses submit donasi
if(isset($_POST["submit_donasi"])) {
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $nominal = mysqli_real_escape_string($conn, $_POST["nominal"]);
    $metode = mysqli_real_escape_string($conn, $_POST["metode"]);
    $pesan = mysqli_real_escape_string($conn, $_POST["pesan"]);
    
    $query = "INSERT INTO donasi (nama, email, nominal, metode, pesan, status) 
              VALUES ('$nama', '$email', '$nominal', '$metode', '$pesan', 'pending')";
    
    if(mysqli_query($conn, $query)) {
        $success = "Terima kasih! Donasi Anda akan kami proses.";
    } else {
        $error = "Gagal mengirim donasi. Silakan coba lagi.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donasi - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .donasi-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 0;
        }
        
        .donasi-container {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .donasi-info {
            background: var(--white);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }
        
        .donasi-info h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }
        
        .donasi-info p {
            margin-bottom: 1rem;
            line-height: 1.6;
        }
        
        .info-list {
            list-style: none;
            margin: 1.5rem 0;
        }
        
        .info-list li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .info-list i {
            color: var(--primary);
            font-size: 1.2rem;
            width: 25px;
        }
        
        .bank-account {
            background: var(--gray);
            padding: 1rem;
            border-radius: 12px;
            margin: 1rem 0;
        }
        
        .bank-account h4 {
            color: var(--primary);
            margin-bottom: 0.5rem;
        }
        
        .bank-account p {
            font-family: monospace;
            font-size: 1.1rem;
            font-weight: bold;
        }
        
        .donasi-form {
            background: var(--white);
            border-radius: 24px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }
        
        .donasi-form h3 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 1.2rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-family: inherit;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(10, 107, 79, 0.1);
        }
        
        .nominal-buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-top: 10px;
        }
        
        .nominal-btn {
            background: var(--gray);
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .nominal-btn:hover {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .btn-donasi {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 1rem;
        }
        
        .btn-donasi:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
        
        .alert {
            padding: 1rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        @media (max-width: 768px) {
            .donasi-container {
                grid-template-columns: 1fr;
            }
            
            .nominal-buttons {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    
    <div class="donasi-hero">
        <h1 style="font-size: 3rem;">Donasi untuk Konservasi Mangrove</h1>
        <p>Dukung Pelestarian Pesisir Aceh Melalui Donasi Anda</p>
    </div>
    
    <section>
        <div class="donasi-container">
            <!-- Kolom Kiri: Informasi Donasi -->
            <div class="donasi-info">
                <h3><i class="fas fa-heart" style="color: #ff6b6b;"></i> Mengapa Donasi?</h3>
                <p>Donasi Anda akan digunakan untuk:</p>
                <ul class="info-list">
                    <li><i class="fas fa-seedling"></i> Pembibitan mangrove (Rp 5.000/bibit)</li>
                    <li><i class="fas fa-tree"></i> Penanaman dan perawatan mangrove</li>
                    <li><i class="fas fa-chalkboard-user"></i> Program edukasi lingkungan</li>
                    <li><i class="fas fa-hand-holding-heart"></i> Pemberdayaan masyarakat pesisir</li>
                    <li><i class="fas fa-chart-line"></i> Monitoring dan evaluasi program</li>
                </ul>
                
                <h3><i class="fas fa-university"></i> Rekening Donasi</h3>
                <div class="bank-account">
                    <h4>Bank BRI</h4>
                    <p>1234-5678-9012-3456</p>
                    <p>a.n. Kelompok Tani Hutan Bakau Lestari</p>
                </div>
                <div class="bank-account">
                    <h4>Bank Mandiri</h4>
                    <p>9876-5432-1098-7654</p>
                    <p>a.n. Kelompok Tani Hutan Bakau Lestari</p>
                </div>
                
                <p style="font-size: 0.85rem; color: #666; margin-top: 1rem;">
                    <i class="fas fa-shield-alt"></i> Setiap donasi akan mendapat laporan pertanggungjawaban.
                </p>
            </div>
            
            <!-- Kolom Kanan: Form Donasi -->
            <div class="donasi-form">
                <h3><i class="fas fa-hand-holding-usd"></i> Form Donasi Online</h3>
                
                <?php if(isset($success)): ?>
                    <div class="alert alert-success">
                        <i class="fas fa-check-circle"></i> <?= $success ?>
                    </div>
                <?php endif; ?>
                
                <?php if(isset($error)): ?>
                    <div class="alert alert-error">
                        <i class="fas fa-exclamation-triangle"></i> <?= $error ?>
                    </div>
                <?php endif; ?>
                
                <form method="POST">
                    <div class="form-group">
                        <label><i class="fas fa-user"></i> Nama Lengkap *</label>
                        <input type="text" name="nama" required placeholder="Masukkan nama lengkap Anda">
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-envelope"></i> Email *</label>
                        <input type="email" name="email" required placeholder="Masukkan email aktif">
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-money-bill-wave"></i> Nominal Donasi *</label>
                        <input type="number" name="nominal" id="nominal" required placeholder="Masukkan nominal donasi" min="10000">
                        <div class="nominal-buttons">
                            <div class="nominal-btn" onclick="setNominal(50000)">Rp 50.000</div>
                            <div class="nominal-btn" onclick="setNominal(100000)">Rp 100.000</div>
                            <div class="nominal-btn" onclick="setNominal(250000)">Rp 250.000</div>
                            <div class="nominal-btn" onclick="setNominal(500000)">Rp 500.000</div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-credit-card"></i> Metode Pembayaran *</label>
                        <select name="metode" required>
                            <option value="">Pilih metode pembayaran</option>
                            <option value="Bank BRI">Transfer Bank BRI</option>
                            <option value="Bank Mandiri">Transfer Bank Mandiri</option>
                            <option value="QRIS">QRIS (Scan Barcode)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-comment"></i> Pesan (Opsional)</label>
                        <textarea name="pesan" rows="3" placeholder="Tulis pesan atau doa untuk konservasi mangrove..."></textarea>
                    </div>
                    
                    <button type="submit" name="submit_donasi" class="btn-donasi">
                        <i class="fas fa-heart"></i> Donasi Sekarang
                    </button>
                </form>
            </div>
        </div>
    </section>
    
    <?php include "footer.php"; ?>
    
    <script>
        function setNominal(nominal) {
            document.getElementById('nominal').value = nominal;
        }
    </script>
</body>
</html>