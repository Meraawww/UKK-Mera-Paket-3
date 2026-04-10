# Dokumentasi Proyek Sistem Pengaduan Siswa

Dokumentasi ini berisi penjelasan lengkap tentang proyek aplikasi sistem pengaduan siswa yang dibangun dengan Laravel. Semua bagian dibuat sesuai ketentuan lampiran yang diminta.

---

## 1. Folder Proyek Aplikasi

### 1.1 Tujuan
Menjelaskan struktur folder dan file penting di proyek Laravel agar mudah dipahami dan dinavigasi.

### 1.2 Struktur Folder Utama
- `app/`
  - Berisi kode aplikasi utama: controller, model, dan provider.
  - File penting:
    - `app/Http/Controllers/SiswasController.php`: mengatur logika halaman siswa, termasuk dashboard, store aspirasi, histori, dan status penyelesaian.
    - `app/Http/Controllers/AdminsController.php`: mengatur autentikasi dan dashboard admin.
    - `app/Http/Controllers/AspirasisController.php`: mengatur CRUD aspirasi jika digunakan oleh admin.
    - `app/Models/Siswa.php`: model siswa yang juga sebagai user autentikasi untuk guard `siswa`.
    - `app/Models/Aspirasi.php`: model aspirasi yang menyimpan status dan feedback.
    - `app/Models/InputAspirasi.php`: model permintaan aspirasi siswa.
    - `app/Models/Kategori.php`: model kategori aspirasi.

- `bootstrap/`
  - Berisi file bootstrap aplikasi Laravel.
  - `bootstrap/app.php`: memuat aplikasi dan service provider.

- `config/`
  - Berisi konfigurasi aplikasi.
  - `config/auth.php`: penting untuk konfigurasi guard `admin` dan `siswa`.

- `database/`
  - Berisi migration dan seeder.
  - `database/migrations/`: schema tabel, termasuk tabel `siswas`, `kategoris`, `input_aspirases`, `aspirases`, dan `admins`.
  - `database/seeders/`: file seeder `SiswaSeeder.php` untuk data siswa sample.

- `public/`
  - Entry point aplikasi (`public/index.php`).
  - Aset publik seperti `robots.txt`.

- `resources/`
  - Berisi view Blade dan aset frontend.
  - `resources/views/siswa/dashboard.blade.php`: halaman dashboard siswa.
  - `resources/views/siswa/histori.blade.php`: halaman riwayat aspirasi siswa.
  - `resources/views/siswa/status.blade.php`: halaman status penyelesaian aspirasi siswa.
  - `resources/views/auth/siswa-login.blade.php`: halaman login siswa.
  - `resources/views/auth/login.blade.php`: halaman login admin.

- `routes/`
  - Semua route aplikasi.
  - `routes/web.php`: definisi route utama untuk siswa dan admin.

- `storage/`
  - Penyimpanan file runtime Laravel seperti cache, log, dan sesi.

- `tests/`
  - Berisi testing dasar aplikasi.

### 1.3 File Penting dan Peranannya
- `routes/web.php`
  - Memetakan route `siswa.dashboard`, `siswa.histori`, `siswa.status`, dan route admin.

- `app/Http/Controllers/SiswasController.php`
  - Menangani semua halaman siswa.
  - Memproses input aspirasi dan menampilkan data ke view.

- `app/Models/Siswa.php`
  - Model siswa dengan primary key `nis`.
  - Digunakan sebagai guard autentikasi siswa.

- `resources/views/siswa/dashboard.blade.php`
  - Layout halaman dashboard siswa, form aspirasi, statistik, dan ringkasan aspirasi.

- `resources/views/siswa/histori.blade.php`
  - Tabel riwayat aspirasi siswa beserta statusnya.

- `resources/views/siswa/status.blade.php`
  - Halaman status penyelesaian yang menampilkan progress aspirasi dan feedback.

- `resources/views/auth/siswa-login.blade.php`
  - Tampilan login siswa.

---

## 2. Database dengan ekstensi `.sql`

### 2.1 Tujuan
Menyediakan penjelasan struktur database dan referensi tabel yang digunakan dalam proyek.

### 2.2 Tabel Utama
- `siswas`
  - `nis` (string, primary key)
  - `nama_siswa` (string)
  - `kelas` (string)
  - `password` (string)
  - `created_at`, `updated_at`

- `kategoris`
  - `id_kategori` (integer, primary key)
  - `ket_kategori` (string)
  - `created_at`, `updated_at`

- `input_aspirases`
  - `id_pelaporan` (integer, primary key)
  - `nis` (string, foreign key ke `siswas.nis`)
  - `id_kategori` (integer, foreign key ke `kategoris.id_kategori`)
  - `lokasi` (string)
  - `ket` (text)
  - `created_at`, `updated_at`

- `aspirases`
  - `id_aspirasi` (integer, primary key)
  - `id_kategori` (integer, foreign key ke `kategoris.id_kategori`)
  - `status` (string, contoh: `menunggu`, `proses`, `selesai`)
  - `feedback` (text, nullable)
  - `created_at`, `updated_at`

- `admins`
  - `id` (integer, primary key)
  - `username` (string)
  - `password` (string)
  - `created_at`, `updated_at`

- `users`
  - Tabel default Laravel, masih ada tetapi tidak digunakan dalam alur siswa/admin utama.

### 2.3 Relasi Antar Tabel
- `siswas` -> `input_aspirases`: one-to-many
  - Satu siswa dapat membuat banyak aspirasi.

- `input_aspirases` -> `aspirases`: one-to-one
  - Setiap laporan aspirasi memiliki satu status penyelesaian.

- `kategoris` -> `input_aspirases` dan `aspirases`
  - Kategori aspirasi digunakan untuk mengelompokkan jenis laporan.

### 2.4 Petunjuk Pembuatan File `.sql`
- Gunakan `mysqldump` atau phpMyAdmin untuk mengekspor database.
- Simpan file hasil export dengan nama `ukk_mera_paket_3.sql`.
- Pastikan file `.sql` mencakup struktur tabel dan data yang diperlukan.

Contoh perintah `mysqldump`:
```bash
mysqldump -u root -p ukk_mera_paket_3 > ukk_mera_paket_3.sql
```

---

## 3. Dokumentasi

### 3.a ERD

#### Tujuan
Menjelaskan relasi entitas penting dalam sistem.

#### Deskripsi ERD
Diagram ERD ini menunjukkan tiga entitas utama yang saling berhubungan:
- `Siswa`
- `InputAspirasi`
- `Aspirasi`
- `Kategori`

#### Hubungan Entitas
- `Siswa` (1) --- (N) `InputAspirasi`
- `InputAspirasi` (1) --- (1) `Aspirasi`
- `Kategori` (1) --- (N) `InputAspirasi`
- `Kategori` (1) --- (N) `Aspirasi`

#### Representasi Teks ERD
```text
Siswa
  - nis PK
  - nama_siswa
  - kelas
  - password

Kategori
  - id_kategori PK
  - ket_kategori

InputAspirasi
  - id_pelaporan PK
  - nis FK -> Siswa.nis
  - id_kategori FK -> Kategori.id_kategori
  - lokasi
  - ket

Aspirasi
  - id_aspirasi PK
  - id_kategori FK -> Kategori.id_kategori
  - status
  - feedback
```

### 3.b Deskripsi Program

#### Tujuan
Menjelaskan fungsi utama aplikasi dan alur penggunaan.

#### Ringkasan Aplikasi
Aplikasi ini adalah sistem pengaduan aspirasi siswa sekolah yang dibuat dengan Laravel. Siswa dapat masuk, mengajukan aspirasi, melihat riwayat laporan, serta memantau status penyelesaian. Admin dapat mengelola aspirasi dan memberikan feedback.

#### Fitur Utama
- Login siswa
- Dashboard siswa dengan statistik aspirasi
- Form pengajuan aspirasi siswa
- Halaman histori aspirasi siswa
- Halaman status penyelesaian aspirasi siswa
- Login admin
- Dashboard admin dan manajemen aspirasi

#### Alur Penggunaan
1. Siswa membuka halaman login siswa.
2. Siswa masuk dengan NIS dan password.
3. Siswa melihat dashboard dengan summary aspirasi.
4. Siswa mengisi form aspirasi dan mengirim laporan.
5. Aspirasi disimpan di tabel `input_aspirases` dan status dibuat di tabel `aspirases`.
6. Siswa melihat histori aspirasi di halaman `histori`.
7. Admin melihat dan memproses aspirasi.
8. Siswa memantau status penyelesaian di halaman `status`.

### 3.c Dokumentasi Fungsi / Prosedur

#### Tujuan
Menjelaskan fungsi kode penting, input, proses, dan output.

#### Fungsi Utama di `SiswasController`
- `dashboard()`
  - Input: request dari siswa yang sudah login.
  - Proses: mengambil data aspirasi siswa, kategori, total aspirasi, aspirasi selesai, dan aspirasi terbaru.
  - Output: view `siswa.dashboard` dengan data.

- `storeAspirasi(Request $request)`
  - Input: form `id_kategori`, `lokasi`, `ket`.
  - Proses:
    1. Validasi input.
    2. Simpan ke `input_aspirases`.
    3. Simpan/Update status ke `aspirases` menggunakan `updateOrCreate`.
  - Output: redirect ke dashboard dengan pesan sukses.

- `show($nis)`
  - Input: NIS siswa dari route.
  - Proses: cek apakah siswa login sama dengan NIS, ambil histori aspirasi siswa.
  - Output: view `siswa.histori`.

- `statusPenyelesaian()`
  - Input: siswa yang sudah login.
  - Proses: ambil aspirasi siswa, hitung jumlah dalam tiap status, dan buat data kartu status.
  - Output: view `siswa.status`.

#### Fungsi Utama di `AdminsController`
- `showLogin()`
  - Menampilkan halaman login admin.

- `login()`
  - Validasi credentials admin dan autentikasi.

- `logout()`
  - Mengeluarkan admin dari session.

- `dashboard()`
  - Menampilkan ringkasan admin.

#### Fungsi CRUD di `AspirasisController`
- `index()`
  - Menampilkan daftar aspirasi untuk admin.

- `create()`, `store()`, `edit()`, `update()`, `destroy()`
  - Mengelola data aspirasi di admin panel.

#### Alur Data Request-Response
- Siswa kirim form aspirasi di `dashboard.blade.php`.
- `SiswasController@storeAspirasi` memproses dan menyimpan data.
- Siswa diarahkan kembali ke dashboard.
- Untuk histori, siswa membuka route `siswa.histori/{nis}`.
- Untuk status, siswa membuka `siswa/status-penyelesaian`.

### 3.d Debugging

#### Tujuan
Menjelaskan masalah utama dan cara penyelesaiannya.

#### Masalah yang Ditemukan
- `View [siswa.histori] not found`
- Duplicate primary key pada tabel `aspirases`
- Route login siswa belum ditangani dengan benar
- Kolom `nama_siswa` dan `password` di tabel `siswas` belum terstruktur jelas

#### Solusi yang Diterapkan
- Membuat file `resources/views/siswa/histori.blade.php` untuk memperbaiki view not found.
- Mengubah fungsi penyimpanan aspirasi menjadi `Aspirasi::updateOrCreate(...)` untuk mencegah duplicate key.
- Menambahkan route login siswa dengan `Route::match(['get','post'], 'login', [SiswasController::class, 'login'])`.
- Membuat migration tambahan untuk memastikan kolom `nama_siswa` dan `password` tersedia di tabel `siswas`.

#### Metode Debugging
- Menggunakan `php artisan route:list` untuk memeriksa route yang terdaftar.
- Membaca error log Laravel di `storage/logs/laravel.log`.
- Memeriksa kode controller dan view yang berhubungan.
- Menggunakan `dd()` atau `dump()` saat debugging bila diperlukan.

---

## 4. Laporan Evaluasi Singkat

### 4.1 Ringkasan Hasil
Proyek sistem pengaduan siswa berhasil dibuat dengan fitur utama:
- Login siswa dan admin
- Tampilan dashboard siswa dengan summary aspirasi
- Form pengajuan aspirasi
- Halaman histori aspirasi
- Halaman status penyelesaian aspirasi
- Admin dapat mengelola aspirasi

### 4.2 Kelebihan Sistem
- Antarmuka siswa dirancang responsif dan mudah digunakan.
- Data aspirasi terhubung dengan status dan feedback.
- Relasi database jelas antara siswa, aspirasi, dan kategori.
- Penggunaan Laravel memudahkan struktur kode dan routing.

### 4.3 Kelemahan / Batasan
- Fitur admin belum lengkap jika dibandingkan sistem pengaduan penuh (misalnya notifikasi email belum ada).
- Belum ada mekanisme upload gambar atau file pendukung aspirasi.
- Validasi kategori dan status masih sederhana.

### 4.4 Rencana Pengembangan Berikutnya
- Tambahkan fitur upload foto bukti aspirasi.
- Tambahkan notifikasi email atau pesan untuk siswa.
- Tambahkan role-based access control lebih lengkap.
- Buat dashboard admin dengan grafik statistik aspirasi.

---

## 5. Lampiran

### File yang disiapkan
- `DOKUMENTASI_PROYEK.md` (dokumentasi lengkap)
- `DOCUMENTATION_PLAN.md` (rencana dokumentasi)
- `ukk_mera_paket_3.sql` (ekspor database, jika sudah dibuat)
- `ERD.png` atau `ERD.pdf` (diagram ERD, jika sudah dibuat)

---

## 6. Penutup

Dokumentasi ini dapat langsung digunakan untuk lampiran proyek. Jika dibutuhkan, saya bisa bantu membuat file `ERD.png` atau menghasilkan output markdown tambahan untuk setiap bagian menjadi file terpisah.
