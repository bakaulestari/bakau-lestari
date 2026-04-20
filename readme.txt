email : bakaulestari1@gmail.com
pass  : b@kau123
=====================
wordpress
Database Name : bakau_db
Username : root
Password : root

instal:
 Thema astra
 Exotic Plant Store
 eco NGO

instal Plugin : elementor
Instal Plugin starter template

===================================================
.php
Admin Login: http://localhost/bakaulestari/admin/
Username: root
Password: root


================================================================================

Alur Status Donasi:
┌─────────────────────────────────────────────────────────────────────────┐
│                         ALUR STATUS DONASI                              │
├─────────────────────────────────────────────────────────────────────────┤
│                                                                         │
│   1. Donatur mengisi form donasi                                       │
│          ↓                                                              │
│   2. Data masuk ke database → STATUS = "MENUNGGU" (Pending)             │
│          ↓                                                              │
│   3. Donatur transfer ke rekening yang ditentukan                      │
│          ↓                                                              │
│   4. Admin cek bukti transfer (manual)                                 │
│          ↓                                                              │
│   5. Admin update status di dashboard                                   │
│          ↓                                                              │
│   ┌─────────────────────────────────────────────────────────────┐       │
│   │                                                             │       │
│   │   ✅ STATUS "SELESAI" (Confirmed)   → Donasi valid           │       │
│   │   ❌ STATUS "BATAL" (Cancelled)     → Donasi dibatalkan      │       │
│   │                                                             │       │
│   └─────────────────────────────────────────────────────────────┘       │
│                                                                         │
└─────────────────────────────────────────────────────────────────────────┘

🎨 Tampilan Status di Halaman Admin
Status	Warna	Arti
🟡 Menunggu	Kuning	Donasi baru masuk, belum dicek
🟢 Selesai	Hijau	Donasi sudah dikonfirmasi valid
🔴 Batal	Merah	Donasi dibatalkan/tidak valid
🔧 Cara Mengubah Status Donasi
Sebagai Admin, Anda bisa mengubah status:
Buka halaman: http://localhost/bakau-lestari/admin/donasi_list.php

Lihat kolom "Aksi" pada setiap baris donasi:

text
┌─────────────────────────────────────────────────────────────────┐
│ Status     │ Aksi                                              │
├────────────┼───────────────────────────────────────────────────┤
│ 🟡 Menunggu │ [✓] Konfirmasi  [✗] Batalkan  [🗑] Hapus          │
│ 🟢 Selesai  │ [🗑] Hapus                                        │
│ 🔴 Batal    │ [🗑] Hapus                                        │
└─────────────────────────────────────────────────────────────────┘
Klik tombol:

✓ (centang hijau) → Ubah status menjadi "Selesai" (donasi valid)

✗ (silang merah) → Ubah status menjadi "Batal" (donasi tidak valid)

🗑 (tong sampah) → Hapus data donasi

📝 Contoh Skenario Penggunaan
Skenario 1: Donasi Valid
Tahap	Status	Keterangan
Donatur mengisi form	🟡 Menunggu	Data masuk, admin belum cek
Donatur transfer Rp 100.000	🟡 Menunggu	Admin cek mutasi bank
Admin konfirmasi	🟢 Selesai	Donasi dianggap sah
Skenario 2: Donasi Tidak Valid
Tahap	Status	Keterangan
Donatur mengisi form	🟡 Menunggu	Data masuk
Donatur tidak transfer	🟡 Menunggu	Tidak ada bukti
Admin batalkan	🔴 Batal	Donasi dibatalkan
Skenario 3: Donasi Dihapus
Tahap	Status	Keterangan
Donatur isi form salah	🟡 Menunggu	Data tidak valid
Admin hapus	❌ Dihapus	Data dihapus dari database
💡 Mengapa Perlu Status "Menunggu"?
Alasan	Penjelasan
✅ Validasi pembayaran	Memastikan donatur benar-benar transfer
✅ Mencegah duplikasi	Menghindari kesalahan input ganda
✅ Laporan keuangan	Memisahkan donasi masuk vs sudah dikonfirmasi
✅ Transparansi	Donatur bisa cek status donasinya
📊 Statistik yang Terpengaruh
Di halaman admin, terdapat statistik yang dipengaruhi status:

text
┌─────────────────────────────────────────────────────────────────┐
│  👥 25           🟡 3              💰 Rp 12.500.000              │
│  Total Donatur   Menunggu          Total Donasi Masuk            │
│                  (pending)         (hanya status selesai)        │
└─────────────────────────────────────────────────────────────────┘
Total Donatur = Semua donasi (pending + selesai + batal)

Menunggu = Hanya yang status pending

Total Donasi Masuk = Hanya yang status selesai

✅ Kesimpulan
Status	Arti	Tindakan Admin
Menunggu (Pending)	Donasi baru, belum dicek  Perlu dikonfirmasi atau dibatalkan
Selesai (Confirmed)	Donasi valid	Sudah selesai, tidak perlu tindakan
Batal (Cancelled)	Donasi tidak valid	Arsip donasi batal

Jadi, status "Menunggu" adalah tahap awal donasi yang membutuhkan verifikasi 
manual dari admin sebelum dianggap sah. 👍

===============================================================================
