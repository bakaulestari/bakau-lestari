<?php
include "config/koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM galeri ORDER BY tanggal DESC");
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gallery-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 0;
        }

        /* Video lokal */
        .local-video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            background: #000;
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="gallery-hero">
        <h1 style="font-size: 3rem;">Galeri & Video</h1>
        <p>Dokumentasi lapangan kegiatan konservasi mangrove dan video</p>
    </div>

    <section>
        <!-- ========== SECTION 1: GALERI FOTO ========== -->
        <h2 class="section-title">📸 Galeri Foto Kegiatan</h2>
        <div class="gallery-grid">
            <?php
            $sampleImages = [
                "https://images.unsplash.com/photo-1621244338343-b2452f5bc8d9?w=600",
                "https://images.unsplash.com/photo-1470071459604-3b5ec3a7fe05?w=600",
                "https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=600"
            ];
            $sampleTitles = ["Penanaman Mangrove 2024", "Pembibitan Mangrove", "Edukasi Lingkungan di Sekolah"];

            if (mysqli_num_rows($query) > 0):
                while ($row = mysqli_fetch_assoc($query)): ?>
                    <div class="gallery-item">
                        <img src="uploads/<?= $row["gambar"] ?>" alt="<?= $row["judul"] ?>">
                        <div class="gallery-caption">
                            <h3><?= $row["judul"] ?></h3>
                            <p><small><?= date("d F Y", strtotime($row["tanggal"])) ?></small></p>
                        </div>
                    </div>
                <?php endwhile;
            else: ?>
                <?php for ($i = 0; $i < 6; $i++): ?>
                    <div class="gallery-item">
                        <img src="<?= $sampleImages[$i % 3] ?>" alt="<?= $sampleTitles[$i % 3] ?>">
                        <div class="gallery-caption">
                            <h3><?= $sampleTitles[$i % 3] ?></h3>
                            <p><small>Contoh Dokumentasi</small></p>
                        </div>
                    </div>
                <?php endfor; ?>
            <?php endif; ?>
        </div>

        <!-- ========== SECTION 2: GALERI VIDEO (GRID 5 KOLOM) ========== -->
        <div class="video-section">
            <div class="video-title">
                <i class="fas fa-video" style="color: var(--primary);"></i>
                <span>Galeri Video Dokumentasi</span>
            </div>
            <div class="video-grid">
                <!-- Video 1 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-1.jpg">
                            <source src="assets/video/1.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Mangrove 2026</h3>
                        <p>Aksi penanaman serentak</p>
                    </div>
                </div>

                <!-- Video 2 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-2.jpg">
                            <source src="assets/video/2.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Edukasi Mangrove</h3>
                        <p>Sosialisasi ke sekolah</p>
                    </div>
                </div>

                <!-- Video 3 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-3.jpg">
                            <source src="assets/video/3.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pembibitan Mangrove</h3>
                        <p>Proses pembibitan</p>
                    </div>
                </div>

                <!-- Video 4 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-4.jpg">
                            <source src="assets/video/4.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Panen Hasil Tambak</h3>
                        <p>Hasil program pemberdayaan</p>
                    </div>
                </div>

                <!-- Video 5 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-5.jpg">
                            <source src="assets/video/5.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Wisata Mangrove</h3>
                        <p>Ekowisata mangrove</p>
                    </div>
                </div>

                <!-- Video 6 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-6.jpg">
                            <source src="assets/video/6.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Bersama</h3>
                        <p>Kerja sama masyarakat</p>
                    </div>
                </div>

                <!-- Video 7 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-7.jpg">
                            <source src="assets/video/7.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Monitoring Bibit</h3>
                        <p>Cek pertumbuhan bibit</p>
                    </div>
                </div>

                <!-- Video 8 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-8.jpg">
                            <source src="assets/video/8.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pelatihan Wirausaha</h3>
                        <p>Pelatihan olahan mangrove</p>
                    </div>
                </div>

                <!-- Video 9 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-9.jpg">
                            <source src="assets/video/9.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Kunjungan Dinas</h3>
                        <p>Monitoring dari DLHK</p>
                    </div>
                </div>

                <!-- Video 10 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-10.jpg">
                            <source src="assets/video/10.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Massal</h3>
                        <p>1.000 pohon dalam sehari</p>
                    </div>

                </div>
                <!-- Video 11 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-11.jpg">
                            <source src="assets/video/11.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Mangrove 2026</h3>
                        <p>Aksi penanaman serentak</p>
                    </div>
                </div>

                <!-- Video 12 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-12.jpg">
                            <source src="assets/video/12.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Edukasi Mangrove</h3>
                        <p>Sosialisasi ke sekolah</p>
                    </div>
                </div>

                <!-- Video 13 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-13.jpg">
                            <source src="assets/video/13.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pembibitan Mangrove</h3>
                        <p>Proses pembibitan</p>
                    </div>
                </div>

                <!-- Video 14 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-14.jpg">
                            <source src="assets/video/14.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Panen Hasil Tambak</h3>
                        <p>Hasil program pemberdayaan</p>
                    </div>
                </div>

                <!-- Video 15 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-15.jpg">
                            <source src="assets/video/15.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Wisata Mangrove</h3>
                        <p>Ekowisata mangrove</p>
                    </div>
                </div>

                <!-- Video 16 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-16.jpg">
                            <source src="assets/video/16.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Bersama</h3>
                        <p>Kerja sama masyarakat</p>
                    </div>
                </div>

                <!-- Video 17 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-17.jpg">
                            <source src="assets/video/17.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Monitoring Bibit</h3>
                        <p>Cek pertumbuhan bibit</p>
                    </div>
                </div>

                <!-- Video 18 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-18.jpg">
                            <source src="assets/video/18.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pelatihan Wirausaha</h3>
                        <p>Pelatihan olahan mangrove</p>
                    </div>
                </div>

                <!-- Video 19 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-19.jpg">
                            <source src="assets/video/19.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Kunjungan Dinas</h3>
                        <p>Monitoring dari DLHK</p>
                    </div>
                </div>

                <!-- Video 20 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-20.jpg">
                            <source src="assets/video/20.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Massal</h3>
                        <p>1.000 pohon dalam sehari</p>
                    </div>

                </div><!-- Video 21 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-21.jpg">
                            <source src="assets/video/21.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Mangrove 2026</h3>
                        <p>Aksi penanaman serentak</p>
                    </div>
                </div>

                <!-- Video 22 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-22.jpg">
                            <source src="assets/video/22.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Edukasi Mangrove</h3>
                        <p>Sosialisasi ke sekolah</p>
                    </div>
                </div>

                <!-- Video 23 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-23.jpg">
                            <source src="assets/video/23.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pembibitan Mangrove</h3>
                        <p>Proses pembibitan</p>
                    </div>
                </div>

                <!-- Video 24 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-24.jpg">
                            <source src="assets/video/24.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Panen Hasil Tambak</h3>
                        <p>Hasil program pemberdayaan</p>
                    </div>
                </div>

                <!-- Video 25 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-25.jpg">
                            <source src="assets/video/25.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Wisata Mangrove</h3>
                        <p>Ekowisata mangrove</p>
                    </div>
                </div>

                <!-- Video 26 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-26.jpg">
                            <source src="assets/video/26.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Bersama</h3>
                        <p>Kerja sama masyarakat</p>
                    </div>
                </div>

                <!-- Video 27 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-27.jpg">
                            <source src="assets/video/27.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Monitoring Bibit</h3>
                        <p>Cek pertumbuhan bibit</p>
                    </div>
                </div>

                <!-- Video28 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-28.jpg">
                            <source src="assets/video/28.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Pelatihan Wirausaha</h3>
                        <p>Pelatihan olahan mangrove</p>
                    </div>
                </div>

                <!-- Video 29 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-29.jpg">
                            <source src="assets/video/29.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Kunjungan Dinas</h3>
                        <p>Monitoring dari DLHK</p>
                    </div>
                </div>

                <!-- Video 30 -->
                <div class="video-card">
                    <div class="video-wrapper">
                        <video class="local-video" controls poster="assets/video/thumbnail-30.jpg">
                            <source src="assets/video/30.mp4" type="video/mp4">
                            Browser Anda tidak mendukung video tag.
                        </video>
                    </div>
                    <div class="video-caption">
                        <h3>Penanaman Massal</h3>
                        <p>1.000 pohon dalam sehari</p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>