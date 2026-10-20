
# Sistem Informasi Kepegawaian

Aplikasi Sistem Informasi Kepegawaian berbasis Laravel dan MySQL untuk mengelola data departemen dan pegawai.

## Teknologi
- Laravel 13
- PHP 8.5
- MySQL
- Bootstrap 5

## Fitur
- Login dan logout
- Middleware untuk melindungi halaman
- CRUD departemen
- CRUD pegawai
- Relasi departemen dan pegawai
- Validasi input nama, jabatan, gaji, tanggal masuk, dan departemen
- Pencegahan penghapusan departemen yang masih memiliki pegawai
- Seeder untuk data awal

## Persyaratan
- PHP yang kompatibel dengan Laravel 13
- Composer
- MySQL atau MariaDB

## Cara Instalasi

1. Clone repository:
   ```bash
   git clone URL_REPOSITORY
   cd sistem-kepegawaian
   ```

2. Instal dependensi:
   ```bash
   composer install
   ```

3. Siapkan file konfigurasi:
   ```bash
   copy .env.example .env
   ```

4. Buat application key:
   ```bash
   php artisan key:generate
   ```

5. Buat database MySQL bernama `sistem_kepegawaian`, lalu sesuaikan konfigurasi DB_DATABASE, DB_USERNAME, dan DB_PASSWORD di file `.env`.

6. Jalankan migration dan seeder:
   ```bash
   php artisan migrate --seed
   ```

7. Jalankan aplikasi:
   ```bash
   php artisan serve
   ```

8. Buka `http://127.0.0.1:8000/login`.

## Akun Demo

- Email: admin@kepegawaian.test
- Password: password

Akun ini hanya untuk pengujian lokal.

## Pengujian
- Login, logout, dan pembatasan akses dashboard
- CRUD departemen
- CRUD pegawai
- Validasi data input
- Relasi departemen dan pegawai
- Pencegahan penghapusan departemen yang masih digunakan

