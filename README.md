# UMKMGO! — Website E-Commerce UMKM

Website e-commerce sederhana untuk UMKM dengan fitur katalog produk, keranjang belanja, autentikasi pengguna, dan manajemen transaksi. Dibangun menggunakan PHP native dan MySQL.

## Fitur

- **Katalog Produk** — tampil produk dengan gambar, kategori, harga, dan deskripsi
- **Detail Produk** — halaman per produk dengan informasi lengkap
- **Keranjang Belanja** — tambah/hapus produk, ringkasan belanja
- **Transaksi** — proses pembelian, detail transaksi, dan struk (receipt)
- **Autentikasi** — registrasi, login, logout berbasis session
- **Upload Produk** — admin dapat mengunggah produk beserta foto
- **Profil Pengguna** — halaman akun user

## Tech Stack

- PHP (native, tanpa framework)
- MySQL
- HTML / CSS / JavaScript

## Instalasi

### Prasyarat

- PHP >= 7.4
- MySQL
- Web server (XAMPP, Laragon, atau `php -S`)

### Langkah-langkah

```bash
# 1. Clone repo
git clone https://github.com/abiekaputra/Website-UMKM.git
cd Website-UMKM

# 2. Buat database dan tabel
mysql -u root -p < schema.sql

# 3. Sesuaikan konfigurasi database
#    Edit config.php — ubah DB_HOST, DB_USER, DB_PASS, DB_NAME sesuai environment lokal

# 4. Jalankan server
php -S localhost:8000
```

Buka `http://localhost:8000` di browser.

## Konfigurasi

Semua konfigurasi database terpusat di `config.php`:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'umkm');
```

## Struktur File

```
├── config.php              # Konfigurasi & koneksi database
├── schema.sql              # Skema database (jalankan sekali saat setup)
├── index.php               # Halaman utama
├── products_page.php       # Katalog produk
├── productDetail.php       # Detail produk
├── product_db.php          # Handler upload produk
├── cart.php                # Keranjang belanja
├── addCart.php             # Aksi tambah ke keranjang
├── transactionDetail.php   # Detail transaksi
├── receipt.php             # Struk pembelian
├── prosesLogin.php         # Handler login
├── register.php            # Handler registrasi
├── logout.php              # Handler logout
├── assets/                 # Gambar dan font
├── style/                  # CSS
└── upload_images/          # Folder hasil upload produk
```

## Lisensi

Proyek ini dibuat untuk keperluan akademis dan pengembangan portofolio.
