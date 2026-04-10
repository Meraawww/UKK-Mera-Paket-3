# Rencana Dokumentasi Proyek Sistem Pengaduan Siswa

Dokumentasi ini dibuat sesuai ketentuan lampiran proyek yang mencakup:
1. Folder Proyek Aplikasi (kode program lengkap)
2. Database dengan ekstensi `.sql`
3. Dokumentasi:
   - ERD
   - Deskripsi Program
   - Dokumentasi fungsi / prosedur
   - Debugging
4. Laporan evaluasi singkat

---

## 1. Folder Proyek Aplikasi

### Tujuan
Menjelaskan struktur folder dan file penting di dalam proyek Laravel.

### Konten yang harus disertakan
- Penjelasan singkat setiap folder utama:
  - `app/`
  - `bootstrap/`
  - `config/`
  - `database/`
  - `public/`
  - `resources/`
  - `routes/`
  - `storage/`
  - `tests/`
- File penting yang berperan dalam aplikasi:
  - `routes/web.php`
  - `app/Http/Controllers/SiswasController.php`
  - `app/Models/Siswa.php`
  - `resources/views/siswa/dashboard.blade.php`
  - `resources/views/siswa/histori.blade.php`
  - `resources/views/siswa/status.blade.php`
  - `resources/views/auth/siswa-login.blade.php`

### Format
- Jelaskan fungsi folder
- Tuliskan file penting dan perannya
- Sertakan screenshot atau contoh jika perlu (opsional)

---

## 2. Database dengan ekstensi .sql

### Tujuan
Menjelaskan struktur database dan menyediakan file dump SQL.

### Konten yang harus disertakan
- Daftar tabel utama:
  - `siswas`
  - `kategoris`
  - `input_aspirases`
  - `aspirases`
  - `admins`
  - `users` (jika masih digunakan)
- Penjelasan field utama setiap tabel:
  - `siswas`: `nis`, `nama_siswa`, `kelas`, `password`
  - `kategoris`: `id_kategori`, `ket_kategori`
  - `input_aspirases`: `id_pelaporan`, `nis`, `id_kategori`, `lokasi`, `ket`
  - `aspirases`: `id_aspirasi`, `id_kategori`, `status`, `feedback`
- Relasi antar tabel:
  - `siswas` -> `input_aspirases` (one-to-many)
  - `input_aspirases` -> `aspirases` (one-to-one)
  - `kategoris` -> `input_aspirases` / `aspirases`
- Petunjuk pembuatan file `.sql`:
  - export dari database MySQL / phpMyAdmin
  - simpan dengan nama `ukk_mera_paket_3.sql`

---

## 3. Dokumentasi

### a. ERD

#### Tujuan
Menjelaskan hubungan antar entitas dalam sistem.

#### Konten
- Diagram ERD sederhana yang memuat tabel dan relasi.
- Tabel dan hubungan:
  - `Siswa` (NIS) -> `InputAspirasi`
  - `InputAspirasi` (ID Pelaporan) -> `Aspirasi`
  - `Kategori` -> `InputAspirasi` dan `Aspirasi`
- Keterangan cardinality (1 : banyak, 1 : 1)

### b. Deskripsi Program

#### Tujuan
Menjelaskan alur sistem dan fitur yang tersedia.

#### Konten
- Deskripsi singkat aplikasi: sistem pengaduan aspirasi siswa.
- Fitur utama:
  - Login siswa
  - Dashboard siswa
  - Pengajuan aspirasi
  - Riwayat aspirasi
  - Status penyelesaian aspirasi
  - Admin mengelola aspirasi
- Alur penggunaan:
  1. Siswa login
  2. Siswa melihat dashboard
  3. Siswa mengajukan aspirasi
  4. Aspirasi masuk ke histori
  5. Admin memproses status aspirasi
  6. Siswa melihat status dan feedback

### c. Dokumentasi Fungsi / Prosedur

#### Tujuan
Menjelaskan fungsi-fungsi utama di kode program.

#### Konten
- Daftar fungsi/prosedur penting beserta penjelasan:
  - `SiswasController::dashboard()`
  - `SiswasController::storeAspirasi()`
  - `SiswasController::show()`
  - `SiswasController::statusPenyelesaian()`
  - `AdminsController::dashboard()`
  - `AspirasisController` CRUD (jika ada)
- Input, proses, dan output setiap fungsi.
- Contoh alur data dari request ke response.

### d. Debugging

#### Tujuan
Menjelaskan masalah yang diperbaiki dan cara debugging.

#### Konten
- Daftar bug / error yang ditemukan:
  - View `siswa.histori` tidak ditemukan
  - Duplicate primary key pada `aspirases`
  - Route login siswa belum ada
- Solusi yang diterapkan untuk setiap masalah.
- Tools / metode debugging:
  - Membaca log error Laravel
  - Memeriksa route dengan `php artisan route:list`
  - Menggunakan `dd()` atau validasi di controller

---

## 4. Laporan Evaluasi Singkat

### Tujuan
Menjelaskan hasil akhir proyek dan evaluasi singkat kualitas.

### Konten
- Ringkasan fitur yang selesai.
- Kelebihan sistem.
- Kelemahan atau batasan jika ada.
- Rencana pengembangan berikutnya.

### Contoh
- Sistem berhasil menampilkan halaman dashboard, histori, dan status penyelesaian.
- Autentikasi siswa dan admin telah berfungsi.
- Data aspirasi disimpan dengan baik di database.
- Saran perbaikan: tambahkan notifikasi email atau fitur upload gambar.

---

## 5. Langkah Pengerjaan Dokumentasi

1. Buat file markdown dokumentasi utama (`DOCUMENTATION_PLAN.md` atau `DOKUMENTASI_PROYEK.md`).
2. Buat diagram ERD di file gambar atau teks.
3. Export database ke file `.sql`.
4. Isi setiap bagian sesuai daftar di atas.
5. Validasi kembali dengan ketentuan lampiran proyek.
6. Simpan semua file di dalam folder `Lampiran Proyek` jika perlu.

---

## 6. Struktur File Dokumentasi yang Disarankan

- `DOCUMENTATION_PLAN.md` (rencana & daftar isi)
- `ERD.png` / `ERD.pdf`
- `database.sql`
- `DOKUMENTASI_FUNGSI.md`
- `DEBUGGING.md`
- `LAPORAN_EVALUASI.md`

---

## Catatan
Gunakan dokumen ini sebagai panduan utama. Jika ingin, saya bisa lanjut membantu membuat isi detail untuk setiap bagian dokumentasi dalam format markdown.
