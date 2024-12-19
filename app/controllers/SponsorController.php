<?php
// app/controllers/UserController.php
require_once '../app/models/Sponsor.php';

class SponsorController {
    private $sponsorModel;

    public function __construct() {
        $this->sponsorModel = new Sponsorship();
    }

    public function index() {
        $sponsors = $this->sponsorModel->getAllSponsorship();
        require_once '../app/views/sponsor/index.php';

    }

    public function dashboard(){
        require_once '../app/views/hlm-utama.php';
    }

    public function create() {
        require_once '../app/views/sponsor/create.php';
    }

    public function store() {
        $nama_sponsor = $_POST['nama_sponsor'];
        $nilai_sponsor = $_POST['nilai_sponsor'];
        $jenis_sponsor = $_POST['jenis_sponsor'];
        $this->sponsorModel->add($nama_sponsor, $nilai_sponsor, $jenis_sponsor);
        header('Location: /sponsor/index');
    }
    // Show the edit form with the user data
    public function edit($id_sponsor) {
        $sponsor = $this->sponsorModel->find($id_sponsor); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/sponsor/edit.php';
    }

    // Process the update request
    public function update($id_sponsor, $data) {
        $updated = $this->sponsorModel->update($id_sponsor, $data);
        if ($updated) {
            header("Location: /sponsor/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id_sponsor) {
        $deleted = $this->sponsorModel->delete($id_sponsor);
        if ($deleted) {
            header("Location: /sponsor/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
?>