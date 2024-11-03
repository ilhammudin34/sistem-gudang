# Sistem Gudang

Sistem Gudang adalah aplikasi berbasis web yang dibangun dengan Laravel 11 untuk mengelola data barang dan mutasi di dalam sebuah gudang. Aplikasi ini menyediakan fitur login, manajemen barang, dan riwayat mutasi yang terintegrasi dengan autentikasi menggunakan Bearer Token.

## Fitur

- Autentikasi pengguna dengan token
- CRUD untuk model User, Barang, dan Mutasi
- Melihat riwayat mutasi untuk setiap barang
- Melihat riwayat mutasi untuk setiap pengguna
- Output data dalam format JSON

## Teknologi yang Digunakan

- **Laravel**: Versi 11
- **MySQL**: Database
- **Postman**: Untuk dokumentasi API dan pengujian

## Cara Instalasi

1. **Clone Repository**:
   ```bash
   git clone https://github.com/ilhammudin34/sistem-gudang.git
   cd sistem-gudang
   ```

2. **Instalasi Dependensi**:
   Pastikan Anda telah menginstal Composer, lalu jalankan:
   ```bash
   composer install
   ```

3. **Buat File .env**:
   Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi database dan lainnya:
   ```bash
   cp .env.example .env
   ```

4. **Generate Kunci Aplikasi**:
   Jalankan perintah berikut untuk menghasilkan kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

5. **Migrasi Database**:
   Lakukan migrasi untuk membuat tabel di database:
   ```bash
   php artisan migrate
   ```

6. **Jalankan Aplikasi**:
   Anda dapat menjalankan aplikasi menggunakan server built-in Laravel:
   ```bash
   php artisan serve
   ```

   Aplikasi akan tersedia di [http://localhost:8000](http://localhost:8000).

## Dokumentasi API

Untuk dokumentasi lengkap mengenai endpoint REST API, Anda dapat mengakses [link Postman](LINK_POSTMAN) yang berisi informasi tentang semua endpoint yang tersedia.

### Contoh Endpoint

- **Login**: `POST /api/login`
- **CRUD Barang**: 
  - `GET /api/barang`
  - `POST /api/barang`
  - `PUT /api/barang/{id}`
  - `DELETE /api/barang/{id}`
- **CRUD Mutasi**:
  - `GET /api/mutasi`
  - `POST /api/mutasi`
  - `PUT /api/mutasi/{id}`
  - `DELETE /api/mutasi/{id}`
  
Semua endpoint memerlukan autentikasi dengan Bearer Token yang dihasilkan saat login.

## Lisensi

Proyek ini bersifat open source dan dapat digunakan dan dimodifikasi sesuai kebutuhan. Silakan kunjungi [repository GitHub](https://github.com/ilhammudin34/sistem-gudang) untuk informasi lebih lanjut.
