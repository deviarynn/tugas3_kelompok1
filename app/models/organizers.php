<?php
// app/models/organizers.php
require_once '../config/database.php';

class Organizers
{
    private $db;

    //mengkoneksikan database pada file database.phps
    public function __construct()
    {
        $this->db = (new Database())->connect();
    }

    //untuk menampilkan semua yang ada didalam tabel
    public function getAllOrganizers()
    {
        $query = $this->db->query("SELECT * FROM organizers");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    //Mengambil data dari tabel organizers pada database yang menggunakan id_penyelenggaran
    //bindParam untuk mengikat parameter yaitu variable id dengan $ id
    public function find($id_penyelenggara)
    {
        $query = $this->db->prepare("SELECT * FROM organizers WHERE id_penyelenggara = :id_penyelenggara");
        $query->bindParam(':id_penyelenggara', $id_penyelenggara, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    //method untuk menambahkan data pada tabel yang berisikan id, nama, kontak dan email
    public function add($id_penyelenggara, $nama, $kontak, $email)
    {
        $query = $this->db->prepare("INSERT INTO organizers (id_penyelenggara, nama_penyelenggara, kontak, email) VALUES (:id_penyelenggara, :nama_penyelenggara, :kontak, :email)");
        $query->bindParam(':id_penyelenggara', $id_penyelenggara);
        $query->bindParam(':nama_penyelenggara', $nama);
        $query->bindParam(':kontak', $kontak);
        $query->bindParam(':email', $email);
        return $query->execute();
    }

    // Update Organizers data by ID
    public function update($id_penyelenggara, $data)
    {
        $query = "UPDATE organizers SET nama_penyelenggara = :nama_penyelenggara, kontak = :kontak, email = :email WHERE id_penyelenggara = :id_penyelenggara";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_penyelenggara', $data['nama_penyelenggara']);
        $stmt->bindParam(':kontak', $data['kontak']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':id_penyelenggara', $id_penyelenggara);
        return $stmt->execute();
    }

    // Delete Organizers by ID
    public function delete($id_penyelenggara)
    {
        $query = "DELETE FROM organizers WHERE id_penyelenggara = :id_penyelenggara";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_penyelenggara', $id_penyelenggara);
        return $stmt->execute();
    }
}
