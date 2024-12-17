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
