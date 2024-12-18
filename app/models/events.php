<?php
// app/models/User.php
require_once '../config/database.php';

class Events {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    public function getAllEvents() {
        $query = $this->db->query("SELECT * FROM events JOIN organizers ON events.id_penyelenggara=organizers.id_penyelenggara JOIN attendees ON events.id_peserta=attendees.id_peserta JOIN sponsorship ON events.id_sponsor=sponsorship.id_sponsor");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllOrganizers(){
        $query = $this->db->query("SELECT * FROM organizers");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSponsorship(){
        $query = $this->db->query("SELECT * FROM sponsorship");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPeserta(){
        $query = $this->db->query("SELECT * FROM attendees");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id_event) {
        $query = $this->db->prepare("SELECT * FROM events WHERE id_event = :id_event");
        $query->bindParam(':id_event', $id_event, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function add($acara, $deskripsi, $tanggal, $lokasi, $id_peserta, $id_sponsor, $id_penyelenggara) {
        $query = $this->db->prepare("INSERT INTO events (acara, deskripsi, tanggal, lokasi, id_peserta, id_sponsor, id_penyelenggara) VALUES (:acara, :deskripsi, :tanggal, :lokasi, :id_peserta, :id_sponsor, :id_penyelenggara)");
        // Pastikan semua parameter sesuai dengan placeholder
        $query->bindParam(':acara', $acara);
        $query->bindParam(':deskripsi', $deskripsi);
        $query->bindParam(':tanggal', $tanggal);
        $query->bindParam(':lokasi', $lokasi);
        $query->bindParam(':id_peserta', $id_peserta);
        $query->bindParam(':id_sponsor', $id_sponsor);
        $query->bindParam(':id_penyelenggara', $id_penyelenggara);

        // Jalankan query
        return $query->execute();
    }

    // Update user data by ID
    public function update($id_event, $acara, $deskripsi, $tanggal, $lokasi, $id_peserta, $id_sponsor, $id_penyelenggara) {
        $query = "UPDATE events SET acara = :acara, deskripsi = :deskripsi, tanggal = :tanggal, lokasi = :lokasi, id_peserta = :id_peserta, id_sponsor = :id_sponsor, id_penyelenggara = :id_penyelenggara WHERE id_event = :id_event";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(':acara', $acara);
        $stmt->bindParam(':deskripsi', $deskripsi);
        $stmt->bindParam(':tanggal', $tanggal);
        $stmt->bindParam(':lokasi', $lokasi);
        $stmt->bindParam(':id_peserta', $id_peserta);
        $stmt->bindParam(':id_sponsor', $id_sponsor);
        $stmt->bindParam(':id_penyelenggara', $id_penyelenggara);
        $stmt->bindParam(':id_event', $id_event);
    
        return $stmt->execute();
    }
    // Delete user by ID
    public function delete($id_event) {
        $query = "DELETE FROM events WHERE id_event = :id_event";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_event', $id_event);
        return $stmt->execute();
    }
}

