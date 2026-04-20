<?php
include "config/koneksi.php";
if (isset($_POST["send"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    $query = "INSERT INTO kontak (nama, email, pesan) VALUES (\"$name\", \"$email\", \"$message\")";
    mysqli_query($conn, $query);
    $success = true;
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - Bakau Lestari</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .kontak-hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            padding: 100px 0 60px;
            text-align: center;
            color: white;
            margin-top: 70px;
        }

        .contact-form {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--shadow);
        }

        .contact-info {
            background: var(--gray);
            border-radius: 20px;
            padding: 2rem;
            height: 100%;
        }

        .contact-info i {
            color: var(--primary);
            width: 30px;
        }

        input,
        textarea {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 12px;
            width: 100%;
            margin-bottom: 1rem;
            font-family: inherit;
        }

        input:focus,
        textarea:focus {
            outline: none;
            border-color: var(--primary);
        }

        .map-container {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <?php include "navbar.php"; ?>

    <div class="kontak-hero">
        <h1 style="font-size: 3rem;">Hubungi Kami</h1>
        <p>Mari Berkolaborasi Untuk Pesisir Yang Lebih Hijau</p>
    </div>

    <section>
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            <div class="contact-info">
                <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Informasi Kontak</h3>
                <p><i class="fas fa-map-marker-alt"></i> <strong>Alamat:</strong><br>Dsn.Malahayati, Desa: Seuriget, Kec.Langsa Barat - Kota Langsa</p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong><br>bakaulestari1@gmail.com</p>
                <p><i class="fas fa-phone"></i> <strong>Telepon:</strong><br>+62 812 6582 4123</p>
                <p><i class="fab fa-whatsapp"></i> <strong>WhatsApp:</strong><br>+62 812 6582 4123</p>
                <hr style="margin: 1.5rem 0;">
                <h4>Jam Operasional</h4>
                <p>Senin - Jumat: 08:00 - 16:00 WIB<br>Sabtu: 08:00 - 12:00 WIB<br>Minggu: Libur</p>
            </div>

            <div class="contact-form">
                <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Kirim Pesan</h3>
                <?php if (isset($success)): ?>
                    <div style="background: #d4edda; color: #155724; padding: 1rem; border-radius: 10px; margin-bottom: 1rem;">✅ Pesan berhasil dikirim! Kami akan segera merespon.</div>
                <?php endif; ?>
                <form method="POST">
                    <input type="text" name="name" placeholder="Nama Lengkap" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <textarea name="message" placeholder="Pesan" rows="5" required></textarea>
                    <button type="submit" name="send" class="btn btn-primary" style="width: 100%;">Kirim Pesan <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>

        <div class="map-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127504.8439585156!2d95.278915!3d5.548289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3040e5f4b5b5b5b5%3A0x5b5b5b5b5b5b5b5b!2sAceh!5e0!3m2!1sid!2sid!4v1234567890123!5m2!1sid!2sid" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

    <?php include "footer.php"; ?>
</body>

</html>