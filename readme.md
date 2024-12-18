# Praktikum Pemrograman Web 2 - Sistem Manajemen Acara Seni dan Budaya

## Informasi Umum
Proyek ini merupakan bagian dari tugas UAS Mata Kuliah Praktikum Web 2 yang dilakukan oleh Kelompok 1 dari kelas TI-2C Politeknik Negeri Cilacap yang beranggotakan 
1. Devi Aryani (230102057)
2. Galih Fitria Fijar Rofiqoh (230302060)
3. Muhammad Abi Adzan
4. Revano Augustofa (230102071)

## Deskripsi Proyek
Proyek ini merupakan aplikasi web sederhana yang menerapkan arsitektur Model-View-Controller (MVC) dengan menggunakan konsep Pemrograman Berorientasi Objek (OOP). Sistem Informasi Berbasis Web ini merupakan contoh yang menerapkan MVC.

## Tujuan
Tujuan dari praktikum ini adalah untuk memberikan pemahaman yang lebih baik tentang arsitektur MVC dalam pengembangan aplikasi web dan untuk meningkatkan kemampuan mahasiswa dalam menerapkan konsep OOP serta melakukan operasi CRUD (Create, Read, Update, Delete) pada data.

## Fitur Utama
- **Event:** Tambah, Edit,Hapus dan lihat detail acara Seni Tari dan Budaya
- **Organizers:** Tambah, Edit,Hapus dan lihat detail Data Organizers
- **Attendees:** Tambah, Edit,Hapus dan lihat detail Data Peserta
- **Sponsorship:** Tambah, Edit,Hapus dan lihat detail Data Sponsorship

## Arsitektur MVC
- **Model:** Mendefinisikan struktur data dan hubungan antara tabel
  - **Tabel:**
    1. Event: Menyimpan informasi acara
    2. Organizers: Menyimpan informasi penyelenggara
    3. Attendees: Menyimpan informasi peserta
    4. Sponsorship: Menyimpan informasi sponsor
   
- **View:** Menyediakan tampilan antarmuka pengguna (UI) untuk berinteraksi dengan sistem
- **Controller:** Mengatur alur data antara Model dan View, serta menangani logika bisnis
  
## Tech Stack
- **Bahasa Pemrograman:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript, dan Tailwind
- **Version Control:** Git (GitLab)
- **Web Server:** Apache (dengan .htaccess untuk pengaturan URL)

## Struktur Proyek
```plaintext
mvc-sample/
├── app/
│   ├── controllers/
│   │   └── UserController.php         # Controller untuk mengelola logika pengguna
│   ├── models/
│   │   └── User.php                   # Model untuk mengelola data pengguna
│   └── views/
│       └── user/
│           ├── index.php              # View untuk menampilkan daftar dan manajemen pengguna
│           ├── edit.php               # Edit untuk menampilkan halaman edit pengguna            
│           └── create.php             # View untuk menampilkan form pembuatan pengguna baru
├── config/
│   └── database.php                   # Konfigurasi database
├── public/
│   ├── .htaccess                      # Pengaturan URL rewrite
│   └── index.php                      # Entry point aplikasi
├── .htaccess                          # Pengaturan URL rewrite
└── routes.php                         # Mendefinisikan rute untuk aplikasi
```
## Dasboard UI
- **Tampilan Event**
- **Tampilan Organizers**
- **Tampilan Attendees**
- **Tampilan Sponsorship**
