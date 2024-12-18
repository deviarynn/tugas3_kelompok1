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
    
## Arsitektur MVC
- **Model:** Mendefinisikan struktur data dan hubungan antara tabel
   Mengelola data (CRUD: Create, Read, Update, Delete).
Berinteraksi dengan database menggunakan query atau ORM (Object-Relational Mapping).
Tidak berkomunikasi langsung dengan View, tetapi memberikan data ke Controller.
    ```php
    <?php
    // app/models/User.php
    require_once '../config/database.php';
    
    class Peserta {
        private $db;
    
        public function __construct() {
            $this->db = (new Database())->connect();
        }
    
        public function getAllPeserta() {
            $query = $this->db->query("SELECT * FROM attendees");
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function find($id_peserta) {
            $query = $this->db->prepare("SELECT * FROM attendees WHERE id_peserta = :id_peserta");
            $query->bindParam(':id_peserta', $id_peserta, PDO::PARAM_INT);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    
        public function add($nama_peserta, $email, $no_telp) {
            $query = $this->db->prepare("INSERT INTO attendees (nama_peserta, email, no_telp) VALUES (:nama_peserta, :email, :no_telp)");
            $query->bindParam(':nama_peserta', $nama_peserta);
            $query->bindParam(':email', $email);
            $query->bindParam(':no_telp', $no_telp);
            return $query->execute();
        }
    
        // Update user data by ID
        public function update($id_peserta, $data) {
            $query = "UPDATE attendees SET nama_peserta = :nama_peserta, email = :email, no_telp = :no_telp WHERE id_peserta = :id_peserta";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nama_peserta', $data['nama_peserta']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':no_telp', $data['no_telp']);
            $stmt->bindParam(':id_peserta', $id_peserta);
            return $stmt->execute();
        }
    
        // Delete user by ID
        public function delete($id_peserta) {
            $query = "DELETE FROM attendees WHERE id_peserta = :id_peserta";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_peserta', $id_peserta);
            return $stmt->execute();
        }
    }
    ```
- **View:** Menyediakan tampilan antarmuka pengguna (UI) untuk berinteraksi dengan sistem
  Menampilkan data yang diberikan oleh Controller.
Tidak memiliki logika bisnis atau interaksi dengan database.
File ini biasanya berupa HTML, CSS, dan PHP (atau menggunakan template engine seperti Blade di Laravel).

  **Create**
    ```html
    <html lang="en">
    <head>
        <title>Tambah Peserta</title>
    </head>
    <body>
        <h1>Tambah Peserta Baru</h1>
        <!-- app/views/user/create.php -->
            <form action="/user/store" method="POST">
                <label for="name">Nama :</label>
                <input type="text" name="nama_peserta" id="nama_peserta" required">
    
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required">
    
                <label for="email">No Telp:</label>
                <input type="nummber" name="no_telp" id="no_telp" required required">
                  
                <button type="submit" name="submit" id="submit"> Simpan</button>
            </form>
    </body>
    </html>
    ```
  **Edit**
    ```html
    
    <html lang="en">
    <head>
        <title>Edit Peserta</title>
    </head>
        <body>
            <!-- app/views/user/edit.php -->
            <form action="/user/update/<?php echo $Attend['id_peserta']; ?>" method="POST">
                    <h1 class="text-2xl font-bold mb-5 text-center text-blue-700 border-b-2 pb-7 border-blue-700 ">Edit Peserta</h1>
                      <label for="npm">Nama :</label>
                      <input type="text" id="nama" name="nama_peserta" value="<?php echo $Attend['nama_peserta']; ?>" required>
    
                      <label for="nama">Email :</label>
                      <input type="email" id="email" name="email" value="<?php echo $Attend['email']; ?>" required>
    
                      <label for="alamat">No Telp :</label>
                      <input type="no_telp" id="no_telp" name="no_telp" value="<?php echo $Attend['no_telp']; ?>" required >
    
                      <a href="/user/index">Batal</a>
                      <button type="submit" name="submit">Simpan</button>
             </form>
        </body>
    </html>
    ```
  **Data Table**
    ```html
    <html lang="en">
    
    <head>
        <title>Data Peserta</title>
    </head>
    <body>
                    <h1>Daftar Peserta</h1>
                    <a href="/user/create">TambahPeserta Baru</a>
                    <table>
                        <tr>
                            <th>Id Peserta</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Handphone</th>
                            <th>Opsi</th>
                        </tr>

                        <!-- app/views/user/index.php -->
                        <?php foreach ($Attends as $peserta): ?>
                        <tr>
                            <td><?= htmlspecialchars($peserta['id_peserta']) ?></td>
                            <td><?= htmlspecialchars($peserta['nama_peserta']) ?></td>
                            <td><?= htmlspecialchars($peserta['email']) ?> </td>
                            <td><?= htmlspecialchars($peserta['no_telp']) ?></td>
                            <td>
                                <a href="/user/edit/<?php echo $peserta['id_peserta']; ?>">Edit</a>
                                <a href="/user/delete/<?php echo $peserta['id_peserta']; ?>"onclick="return confirm('Are you sure?')">Hapus</a>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                    </table>
    </body>
    </html>
    ```
- **Controller:** Mengatur alur data antara Model dan View, serta menangani logika bisnis
  Menerima input dari pengguna (biasanya dari URL atau formulir).
Memproses logika bisnis dengan memanggil Model.
Mengirimkan data ke View untuk ditampilkan

    ```php
    <?php
    // app/controllers/AttendsController.php
    require_once '../app/models/Peserta.php';
    
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
## Tabel:
    1. Event: Menyimpan informasi acara
    2. Organizers: Menyimpan informasi penyelenggara
    3. Attendees: Menyimpan informasi peserta
    4. Sponsorship: Menyimpan informasi sponsor
    
## Fitur Utama
- **Event:** Tambah, Edit,Hapus dan lihat detail acara Seni Tari dan Budaya
- **Organizers:** Tambah, Edit,Hapus dan lihat detail Data Organizers
- **Attendees:** Tambah, Edit,Hapus dan lihat detail Data Peserta
- **Sponsorship:** Tambah, Edit,Hapus dan lihat detail Data Sponsorship


## Dasboard UI
- **Tampilan Event**
- **Tampilan Organizers**
  
  <img src ='https://github.com/user-attachments/assets/644c92c2-8f4a-485e-98ea-3ddc20b7d157'>

- **Tampilan Attendees**
- ![image](https://github.com/user-attachments/assets/86fd84ef-291d-4c4e-8d7b-4f57bb431af8)

- **Tampilan Sponsorship**
