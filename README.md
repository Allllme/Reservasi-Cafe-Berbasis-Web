# Cafe Reservation System

Sistem Reservasi Cafe adalah aplikasi berbasis web yang digunakan untuk mengelola reservasi meja pada sebuah cafe. Aplikasi ini menyediakan fitur pembuatan reservasi, pengelolaan daftar reservasi, perubahan status reservasi, serta pemantauan ketersediaan meja.

## Anggota Kelompok

| No | Nama | NIM |
|---|---|---|
| 1 | Febrian Theopilus Purba | H1H024011 |
| 2 | Alma Maida Wirastuti | H1H024021 |

## Teknologi

| Kategori | Teknologi |
|---|---|
| Bahasa Pemrograman | PHP, JavaScript, HTML, CSS |
| Backend | PHP Native |
| Frontend | HTML, CSS Custom, JavaScript Module |
| Arsitektur | MVC sederhana |
| Penyimpanan Data | JSON File |
| Database Opsional | MySQL |
| Web Server | PHP Built-in Server / Apache XAMPP / Laragon |
| Tools | VS Code, Browser, XAMPP/Laragon |

## Struktur Utama

```text
.vscode/
  settings.json
aplikasi/
  Config/
    AppConfig.php
  Controller/
    ApiController.php
    HomeController.php
  Domain/
    Reservation.php
  Exception/
    ValidationException.php
  Repository/
    ReservationRepository.php
  Service/
    ReservationService.php
  View/
    components/
    layout/
    pages/
    home.php
konfigurasi/
  database.sql
publik/
  css/
    base.css
    cards.css
    forms.css
    layout.css
    management.css
    responsive.css
    style.css
    tables.css
    toast.css
  images/
    cafe-detail.png
    cafe-preview.png
  js/
    app.js
    modules/
  uploads/
    README.txt
  index.php
storage/
  reservations.json
autoload.php
README.md
```

## Fungsi Folder

- `aplikasi/Config` menyimpan konfigurasi seperti jumlah meja, kapasitas meja, dan lokasi file data.
- `aplikasi/Controller` menerima request dari browser/halaman utama dan API.
- `aplikasi/Domain` berisi bentuk data reservasi.
- `aplikasi/Exception` berisi error khusus validasi.
- `aplikasi/Repository` membaca dan menulis data reservasi.
- `aplikasi/Service` memproses logika bisnis aplikasi, seperti validasi tamu dan meja.
- `aplikasi/View/layout` berisi kerangka halaman seperti head, header, navigasi, footer.
- `aplikasi/View/components` berisi bagian kecil tampilan seperti heading, form, dan panel informasi.
- `aplikasi/View/pages` berisi halaman tab reservasi, manajemen, dan status meja.
- `publik/css` memisahkan CSS berdasarkan area tampilan.
- `publik/js/modules` memisahkan JavaScript berdasarkan fitur.
- `storage/reservations.json` menyimpan data reservasi sederhana.
- `konfigurasi/database.sql` adalah rancangan tabel jika nanti ingin memakai MySQL.

### Penyimpanan Data

Secara default, data reservasi disimpan di:

storage/reservations.json

File ini digunakan sebagai database sederhana agar project dapat dijalankan tanpa konfigurasi database tambahan.

Jika ingin menggunakan MySQL, struktur awal database tersedia di:

konfigurasi/database.sql

## Status Reservasi

Aplikasi menggunakan tiga status reservasi:
- pending untuk reservasi yang masih menunggu
- confirmed untuk reservasi yang sudah dikonfirmasi
- cancelled untuk reservasi yang dibatalkan

## Kapasitas Meja

Kapasitas meja dibuat berdasarkan nomor meja:
- Meja 1 sampai 5: maksimal 2 orang
- Meja 6 sampai 10: maksimal 4 orang
- Meja 11 sampai 15: maksimal 6 orang
