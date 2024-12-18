<?php
// app/controllers/OrganizersController.php
require_once '../app/models/organizers.php';

class OrganizersController
{
    private $OrganizersModel;

    public function __construct()
    {
        $this->OrganizersModel = new Organizers();
    }

    public function index()
    {
        $organizers = $this->OrganizersModel->getAllOrganizers();
        require_once '../app/views/organizers/index.php';
    }

    public function dashboard()
    {
        require_once '../app/views/hlm-utama.php';
    }

    public function create()
    {
        require_once '../app/views/organizers/create.php';
    }

    public function store()
    {
        $id_penyelenggara = $_POST['id_penyelenggara'];
        $nama = $_POST['nama_penyelenggara'];
        $kontak = $_POST['kontak'];
        $email = $_POST['email'];

        $this->OrganizersModel->add($id_penyelenggara, $nama, $kontak, $email);
        header('Location: /organizers/index');
    }
    // Show the edit form with the user data
    public function edit($id_penyelenggara)
    {
        $organizer = $this->OrganizersModel->find($id_penyelenggara); // Assume find() gets user by ID
        require_once __DIR__ . '/../views/organizers/edit.php';
    }

    // Process the update request
    public function update($id_penyelenggara, $data)
    {
        $updated = $this->OrganizersModel->update($id_penyelenggara, $data);
        if ($updated) {
            header("Location: /organizers/index"); // Redirect to user list
        } else {
            echo "Failed to update user.";
        }
    }

    // Process delete request
    public function delete($id_penyelenggara)
    {
        $deleted = $this->OrganizersModel->delete($id_penyelenggara);
        if ($deleted) {
            header("Location: /organizers/index"); // Redirect to user list
        } else {
            echo "Failed to delete user.";
        }
    }
}
