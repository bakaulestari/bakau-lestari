<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data & Dampak - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .data-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .impact-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 5px solid var(--primary);
            box-shadow: var(--shadow);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: var(--primary);
            color: white;
        }

        tr:hover {
            background: #f5f5f5;
        }

        .stats-section {
            background: transparent;
            margin: 2rem auto;
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            text-align: center;
        }

        .stat-card {
            background: white;
            border: 2px solid var(--primary);
            border-radius: 20px;
            padding: 2rem 1rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--primary);
        }

        .stat-label {
            font-size: 0.9rem;
            color: #555;
            margin-top: 0.5rem;
        }

        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 1rem;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="data-hero">
        <h1 style="font-size: 3rem;">Data & Dampak</h1>
        <p>Bukti Nyata Perubahan Yang Telah Kami Capai</p>
    </div>

    <section>
        <!-- Statistik Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">200.000+</div>
                <div class="stat-label">Bibit Diproduksi</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">150 Ha</div>
                <div class="stat-label">Luas Rehabilitasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Keluarga Terdampak</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">60%</div>
                <div class="stat-label">Penurunan Abrasi</div>
            </div>
        </div>

        <!-- Tabel Capaian Program -->
        <h3 style="margin-top: 3rem; color: var(--primary);">📊 Capaian Program per Tahun</h3>
        <table>
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Jumlah Bibit</th>
                    <th>Luas Tanam (Ha)</th>
                    <th>Desa Binaan</th>
                    <th>Masyarakat Terlibat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2021</td>
                    <td>25.000</td>
                    <td>20</td>
                    <td>3</td>
                    <td>150 orang</td>
                </tr>
                <tr>
                    <td>2022</td>
                    <td>40.000</td>
                    <td>35</td>
                    <td>5</td>
                    <td>250 orang</td>
                </tr>
                <tr>
                    <td>2023</td>
                    <td>55.000</td>
                    <td>45</td>
                    <td>7</td>
                    <td>380 orang</td>
                </tr>
                <tr>
                    <td>2024</td>
                    <td>85.000</td>
                    <td>60</td>
                    <td>9</td>
                    <td>500 orang</td>
                </tr>
                <tr>
                    <td>2025</td>
                    <td>90.000</td>
                    <td>65</td>
                    <td>9</td>
                    <td>570 orang</td>
                </tr>
            </tbody>
        </table>

        <!-- Dampak Lingkungan & Sosial -->
        <h3 style="margin-top: 2rem; color: var(--primary);">🌿 Dampak Lingkungan & Sosial</h3>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> Keanekaragaman hayati meningkat 60% (kepiting, ikan, burung kembali)
        </div>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> Hasil tangkapan nelayan naik 45%
        </div>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> Terbentuk 8 kelompok ekonomi produktif
        </div>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> Menjadi destinasi ekowisata edukasi
        </div>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> Penyerapan karbon meningkat 50%
        </div>
        <div class="impact-card">
            <i class="fas fa-check-circle" style="color: var(--primary);"></i> 5 sekolah binaan program edukasi mangrove
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>