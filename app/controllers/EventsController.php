<?php
// app/controllers/EventController.php
require_once '../app/models/events.php';

class EventsController {
    private $EventsModel;

    public function __construct() {
        $this->EventsModel = new Events();
    }

    public function index() {
        $events = $this->EventsModel->getAllEvents();
        require_once '../app/views/event/index.php';

    }

    public function dashboard(){
    require_once '../app/views/hlm-utama.php';
    }

    public function create() {
        $organizers = $this->EventsModel->getAllOrganizers();
        $sponsors = $this->EventsModel->getAllSponsorship();
        $Attends = $this->EventsModel->getAllPeserta();

        // var_dump($Attends);
        // var_dump($sponsors);
        // var_dump($organizers);

        require_once __DIR__ . '/../views/event/create.php';
    }

    public function store() {
        $acara = $_POST['acara'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal = $_POST['tanggal'];
        $lokasi = $_POST['lokasi'];
        $id_peserta = $_POST['id_peserta'];
        $id_sponsor = $_POST['id_sponsor'];
        $id_penyelenggara = $_POST['id_penyelenggara'];
        $this->EventsModel->add($acara, $deskripsi, $tanggal, $lokasi, $id_peserta, $id_sponsor, $id_penyelenggara);
        header('Location: /event/index');
    }
    // Show the edit form with the event data
    public function edit($id_event) {
        $event = $this->EventsModel->find($id_event); // Assume find() gets event by ID
        $organizers = $this->EventsModel->getAllOrganizers();
        $sponsors = $this->EventsModel->getAllSponsorship();
        $Attends = $this->EventsModel->getAllPeserta();

        // var_dump($Attends);
        // var_dump($sponsors);
        // var_dump($organizers);

        require_once __DIR__ . '/../views/event/edit.php';
    }

    public function update($id_event) {
    // Ambil data dari form POST
    $acara = $_POST['acara'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = $_POST['tanggal'];
    $lokasi = $_POST['lokasi'];
    $id_peserta = $_POST['id_peserta'];
    $id_sponsor = $_POST['id_sponsor'];
    $id_penyelenggara = $_POST['id_penyelenggara'];

    // Panggil model untuk update
    $updated = $this->EventsModel->update($id_event, $acara, $deskripsi, $tanggal, $lokasi, $id_peserta, $id_sponsor, $id_penyelenggara);
    
    if ($updated) {
        header("Location: /event/index");
    } else {
        echo "Failed to update event.";
    }
}


    // Process delete request
    public function delete($id_event) {
        $deleted = $this->EventsModel->delete($id_event);
        if ($deleted) {
            header("Location: /event/index"); // Redirect to event list
        } else {
            echo "Failed to delete event.";
        }
    }
}
?>