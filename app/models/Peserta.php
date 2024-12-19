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
