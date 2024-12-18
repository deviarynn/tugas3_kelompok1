# Praktikum Pemrograman Web 2 - Sistem Manajemen Acara Seni dan Budaya

## Informasi Umum
Proyek ini merupakan bagian dari tugas UAS Mata Kuliah Praktikum Web 2 yang dilakukan oleh Kelompok 1 dari kelas TI-2C Politeknik Negeri Cilacap yang beranggotakan 
1. Devi Aryani (230102057)
2. Galih Fitria Fijar Rofiqoh (230302060)
3. Muhammad Abi Adzan (230202068)
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

## Controller 
Fungsi: Bertindak sebagai penghubung antara Model dan View.

Tugas:

Menerima input dari pengguna (biasanya dari URL atau formulir).
Memproses logika bisnis dengan memanggil Model.
Mengirimkan data ke View untuk ditampilkan
```php
class AttendsController{
    private $AttModel;

    public function __construct() {
        $this->AttModel = new Peserta();
    }

    public function index() {
        $Attends = $this->AttModel->getAllPeserta();
        require_once '../app/views/user/index.php';
    }

    public function create() {
        require_once '../app/views/user/create.php';
    }

    public function store() {
        $nama_peserta = $_POST['nama_peserta'];
        $email = $_POST['email'];
        $no_telp = $_POST['no_telp'];
        $this->AttModel->add($nama_peserta, $email, $no_telp);
        header('Location: /user/index');
    }
    // Show the edit form with the user data
    public function edit($id_peserta) {
        $Attend = $this->AttModel->find(id_peserta: $id_peserta); // Assume find() gets user by ID_peserta
        require_once __DIR__ . '/../views/user/edit.php';
    }

    // Process the update request
    public function update($id_peserta, $data) {
        $updated = $this->AttModel->update($id_peserta, $data);
        if ($updated) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id_peserta) {
        $deleted = $this->AttModel->delete(id_peserta: $id_peserta);
        if ($deleted) {
            header("Location: /user/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
```
## View
Fungsi: Bertanggung jawab atas tampilan (user interface).

Tugas:

Menampilkan data yang diberikan oleh Controller.
Tidak memiliki logika bisnis atau interaksi dengan database.
File ini biasanya berupa HTML, CSS, dan PHP (atau menggunakan template engine seperti Blade di Laravel).
## Models
Fungsi: Berisi logika bisnis dan interaksi dengan database.

Tugas:

Mengelola data (CRUD: Create, Read, Update, Delete).
Berinteraksi dengan database menggunakan query atau ORM (Object-Relational Mapping).
Tidak berkomunikasi langsung dengan View, tetapi memberikan data ke Controller.
