<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .about-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .about-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 3rem;
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            margin-top: -50px;
            position: relative;
        }

        .mission-vision {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin: 2rem 0;
        }

        .mv-card {
            background: var(--gray);
            padding: 1.5rem;
            border-radius: 15px;
            text-align: center;
        }

        .mv-card i {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        @media (max-width: 768px) {
            .mission-vision {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="about-hero">
        <h1 style="font-size: 3rem;">Tentang Kami</h1>
        <p>Mengenal Lebih Dekat Perjuangan Kami Untuk Pesisir Aceh</p>
    </div>

    <section style="padding-top: 0;">
        <div class="about-content">
            <h2 style="color: var(--primary);">Kelompok Tani Hutan Bakau Lestari</h2>
            <p style="margin-top: 1rem;">Kelompok Tani Hutan (KTH) Bakau Lestari adalah komunitas masyarakat yang didirikan pada tahun 2025 sebagai respon terhadap kerusakan ekosistem mangrove di pesisir Aceh. Kami berfokus pada pembibitan, penanaman, rehabilitasi, serta peningkatan kesadaran masyarakat untuk melestarikan hutan bakau melalui pendekatan berbasis masyarakat.</p>

            <div class="mission-vision">
                <div class="mv-card">
                    <i class="fas fa-eye"></i>
                    <h3>Visi</h3>
                    <p>Terwujudnya pesisir Aceh yang hijau, produktif, dan berkelanjutan melalui konservasi Bakau yang melibatkan partisipasi aktif masyarakat.</p>
                </div>
                <div class="mv-card">
                    <i class="fas fa-bullseye"></i>
                    <h3>Misi</h3>
                    <ul style="text-align: left; margin-left: 1rem;">
                        <li>Rehabilitasi hutan Bakau seluas 500 hektar</li>
                        <li>Edukasi masyarakat tentang ekosistem Bakau</li>
                        <li>Program ekonomi berkelanjutan berbasis Bakau</li>
                        <li>Kolaborasi dengan pemerintah dan stakeholder</li>
                    </ul>
                </div>
            </div>

            <h3>Sejarah Kami</h3>
            <p>Bermula dari keprihatinan 10 petani tambak yang melihat abrasi parah di desa mereka, kami mulai menanam Bakau secara mandiri. Kini, dengan dukungan berbagai pihak, kami telah menanam lebih dari 120.000 pohon mangrove dan memberdayakan 200+ keluarga pesisir.</p>

            <div style="background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; padding: 1.5rem; border-radius: 15px; margin-top: 2rem; text-align: center;">
                <i class="fas fa-quote-left" style="font-size: 2rem; opacity: 0.5;"></i>
                <p style="font-style: italic;">"Setiap pohon yang kita tanam hari ini adalah investasi untuk masa depan anak cucu kita."</p>
                <strong>- Ketua Kelompok Bakau Lestari</strong>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>