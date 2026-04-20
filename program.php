<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .program-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .program-detail {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
        }

        .program-detail:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-hover);
        }

        .program-icon {
            font-size: 3rem;
            color: var(--primary);
            margin-right: 1.5rem;
            float: left;
        }

        .program-stats {
            background: var(--gray);
            padding: 0.5rem 1rem;
            border-radius: 10px;
            display: inline-block;
            margin-top: 1rem;
        }

        @media (max-width: 768px) {
            .program-icon {
                float: none;
                margin-bottom: 1rem;
            }
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="program-hero">
        <h1 style="font-size: 3rem;">Program Kerja Kami</h1>
        <p>Empat pilar utama konservasi Bakau</p>
    </div>

    <section style="padding-top: 0;">
        <div class="program-detail">
            <div class="program-icon"><i class="fas fa-seedling"></i></div>
            <h2>Pembibitan Bakau</h2>
            <p>Kami memiliki 3 lokasi pembibitan dengan kapasitas produksi 50.000 bibit per tahun. Bibit didistribusikan gratis untuk warga yang ingin menanam.</p>
            <div class="program-stats">
                <strong>📊 Target 2024:</strong> 75.000 bibit
            </div>
        </div>

        <div class="program-detail">
            <div class="program-icon"><i class="fas fa-tree"></i></div>
            <h2>Penanaman Bakau</h2>
            <p>Kegiatan rutin setiap bulan di 5 desa pesisir. Libatkan masyarakat, pelajar, dan relawan.</p>
            <div class="program-stats">
                <strong>🌱 Telah menanam:</strong> 120.000 pohon
            </div>
        </div>

        <div class="program-detail">
            <div class="program-icon"><i class="fas fa-chalkboard-user"></i></div>
            <h2>Edukasi Lingkungan</h2>
            <p>Program sekolah lapang, sosialisasi ke sekolah, dan pelatihan pemuda tentang konservasi Bakau.</p>
            <div class="program-stats">
                <strong>👥 Peserta:</strong> 2.500+ orang
            </div>
        </div>

        <div class="program-detail">
            <div class="program-icon"><i class="fas fa-hand-holding-heart"></i></div>
            <h2>Pemberdayaan Masyarakat</h2>
            <p>Pengolahan buah Bakau menjadi sirup, keripik, dan produk olahan lainnya. Juga ekowisata Bakau.</p>
            <div class="program-stats">
                <strong>🏪 Kelompok usaha:</strong> 5 kelompok aktif
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>