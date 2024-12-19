<?php
// app/models/User.php
require_once '../config/database.php';

class Sponsorship {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllSponsorship() {
        $query = $this->db->query("SELECT * FROM sponsorship");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_sponsor) {
        $query = $this->db->prepare("SELECT * FROM sponsorship WHERE id_sponsor = :id_sponsor");
        $query->bindParam(':id_sponsor', $id_sponsor, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($nama_sponsor, $nilai_sponsor, $jenis_sponsor) {
        $query = $this->db->prepare("INSERT INTO sponsorship (nama_sponsor, nilai_sponsor, jenis_sponsor) VALUES (:nama_sponsor, :nilai_sponsor, :jenis_sponsor)");
        $query->bindParam(':nama_sponsor', $nama_sponsor);
        $query->bindParam(':nilai_sponsor', $nilai_sponsor);
        $query->bindParam(':jenis_sponsor', $jenis_sponsor);
        return $query->execute();
    }

    // Update user data by ID
    public function update($id_sponsor, $data) {
        $query = "UPDATE sponsorship SET nama_sponsor = :nama_sponsor, nilai_sponsor = :nilai_sponsor, jenis_sponsor = :jenis_sponsor WHERE id_sponsor = :id_sponsor";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nama_sponsor', $data['nama_sponsor']);
        $stmt->bindParam(':nilai_sponsor', $data['nilai_sponsor']);
        $stmt->bindParam(':jenis_sponsor', $data['jenis_sponsor']);
        $stmt->bindParam(':id_sponsor', $id_sponsor);
        return $stmt->execute();
        
    }

    // Delete user by ID
    public function delete($id_sponsor) {
        $query = "DELETE FROM sponsorship WHERE id_sponsor = :id_sponsor";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_sponsor', $id_sponsor);
        return $stmt->execute();
    }
}
