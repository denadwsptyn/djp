# DJP SPT Pelaporan Tahunan

Aplikasi ini dirancang untuk mempermudah pelaporan SPT tahunan menggunakan framework Laravel dengan basis data PostgreSQL. Aplikasi ini membantu wajib pajak untuk mengisi, memvalidasi, dan mengirim laporan SPT tahunan secara online.

---

## Fitur Utama

- **Autentikasi Pengguna**: Registrasi dan login pengguna dengan otentikasi yang aman.
- **Pengelolaan Data SPT**: CRUD (Create, Read, Update, Delete) untuk laporan SPT tahunan.
- **Validasi Data Otomatis**: Validasi data SPT sesuai dengan aturan DJP.
- **Ekspor dan Impor Data**: Mendukung format CSV untuk impor dan ekspor data.
- **Dashboard Interaktif**: Menyediakan analitik pelaporan SPT.
- **Notifikasi**: Pengingat untuk pelaporan sebelum tenggat waktu.

---

## Persyaratan Sistem

1. **Server**:
   - PHP >= 8.1
   - Composer
   - PostgreSQL >= 12
   - Web server seperti Apache atau Nginx

2. **Klien**:
   - Browser modern dengan JavaScript diaktifkan.

---

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/username/djp-spt-laravel.git
cd djp-spt-laravel
```

### 2. Instal Dependensi

```bash
composer install
npm install
```

### 3. Konfigurasi Lingkungan

Salin file `.env.example` menjadi `.env` dan sesuaikan dengan konfigurasi Anda:

```bash
cp .env.example .env
```

Atur variabel berikut di file `.env`:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=nama_database
DB_USERNAME=nama_user
DB_PASSWORD=password
```

### 4. Generate Key Aplikasi

```bash
php artisan key:generate
```

### 5. Migrasi dan Seed Database

```bash
php artisan migrate --seed
```

### 6. Jalankan Server Lokal

```bash
php artisan serve
```

Aplikasi akan tersedia di `http://localhost:8000`.

---

## Panduan Penggunaan

1. **Registrasi Pengguna**:
   - Buat akun baru atau login dengan akun yang sudah ada.
2. **Pengisian Data SPT**:
   - Isi formulir SPT tahunan sesuai petunjuk.
3. **Validasi Data**:
   - Periksa kesalahan pada data sebelum mengirim laporan.
4. **Kirim Laporan**:
   - Kirim laporan SPT dan dapatkan bukti pengiriman.

---

## Teknologi yang Digunakan

- **Framework**: Laravel
- **Basis Data**: PostgreSQL
- **Frontend**: Blade Template + Tailwind CSS
- **Manajemen Paket**: Composer, NPM

---

## Kontribusi

1. Fork repository ini.
2. Buat branch fitur baru:
   ```bash
   git checkout -b fitur-baru
   ```
3. Commit perubahan Anda:
   ```bash
   git commit -m "Menambahkan fitur baru"
   ```
4. Push branch ke repository Anda:
   ```bash
   git push origin fitur-baru
   ```
5. Buat Pull Request di repository ini.

---

## Lisensi

Proyek ini dilisensikan di bawah [MIT License](LICENSE).

---

## Kontak

Untuk pertanyaan lebih lanjut, silakan hubungi:

- **Email**: support@djpapp.com
- **Website**: [www.djpapp.com](http://www.djpapp.com)
