<?php include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legalitas - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .legal-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .document-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            box-shadow: var(--shadow);
            transition: all 0.3s;
        }

        .document-card:hover {
            transform: translateX(10px);
            box-shadow: var(--shadow-hover);
        }

        .doc-icon {
            font-size: 2.5rem;
            color: #dc3545;
        }

        .btn-download {
            background: var(--primary);
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-download:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="legal-hero">
        <h1 style="font-size: 3rem;">Dokumen Legalitas</h1>
        <p>Kelengkapan administrasi dan perizinan resmi</p>
    </div>

    <section>
        <div class="document-card">
            <div><i class="fas fa-file-pdf doc-icon"></i> <strong>Akta Pendirian Kelompok</strong><br><small>No. 123/SK/2020</small></div>
            <a href="assets/documents/akta-pendirian.pdf" class="btn-download" download><i class="fas fa-download"></i> Download PDF</a>
        </div>

        <div class="document-card">
            <div><i class="fas fa-file-pdf doc-icon"></i> <strong>SK Rehabilitasi Bakau dari DLHK</strong><br><small>No. 456/SK-DLHK/2021</small></div>
            <a href="assets/documents/sk-rehabilitasi.pdf" class="btn-download" download><i class="fas fa-download"></i> Download PDF</a>
        </div>

        <div class="document-card">
            <div><i class="fas fa-file-pdf doc-icon"></i> <strong>Dokumen AMDAL Kegiatan</strong><br><small>No. 789/AMDAL/2022</small></div>
            <a href="assets/documents/amdal.pdf" class="btn-download" download><i class="fas fa-download"></i> Download PDF</a>
        </div>

        <div class="document-card">
            <div><i class="fas fa-file-pdf doc-icon"></i> <strong>Peta rencana kerja (KTH) Bakau Lestari</strong><br><small>Peta Rencana Penanaman Mangrove</small></div>
            <a href="assets/documents/peta rencana penanaman mangrove.pdf" class="btn-download" download><i class="fas fa-download"></i> Download PDF</a>
        </div>

        <div class="document-card">
            <div><i class="fas fa-file-pdf doc-icon"></i> <strong>REKOMENDASI _DESA_kph_DLHK</strong><br><small>REKOMENDASI _DESA_kph_DLHK</small></div>
            <a href="assets/documents/REKOMENDASI _DESA_kph_DLHK.pdf" class="btn-download" download><i class="fas fa-download"></i> Download PDF</a>
        </div>

    </section>

    <?php include "footer.php"; ?>
</body>

</html>