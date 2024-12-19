<?php
// routes.php

require_once 'app/controllers/EventsController.php';
require_once 'app/controllers/OrganizersController.php';
require_once 'app/controllers/SponsorController.php';
require_once 'app/controllers/AttendsController.php';


$controller = new EventsController();
$controller = new OrganizersController();
$controller = new AttendsController();
$controller = new SponsorController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/event/index') {
    $controller->index();
} elseif ($url == '/event/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/event/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/event\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $eventId = $matches[1];
    $controller->edit($eventId);
} elseif (preg_match('/\/event\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $eventId = $matches[1];
    $controller->update($eventId, $_POST);
} elseif (preg_match('/\/event\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $eventId = $matches[1];
    $controller->delete($eventId);
}elseif ($url == '/peserta/index') {
    $controller->index();
} elseif ($url == '/peserta/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/peserta/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/peserta\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller->edit($pesertaId);
} elseif (preg_match('/\/peserta\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $pesertaId = $matches[1];
    $controller->update($pesertaId, $_POST);
} elseif (preg_match('/\/peserta\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller->delete($pesertaId);
}elseif ($url == '/organizers/index') {
    $controller->index();
} elseif ($url == '/organizers/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/organizers/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/organizers\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id_penyelenggara = $matches[1];
    $controller->edit($id_penyelenggara);
} elseif (preg_match('/\/organizers\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id_penyelenggara = $matches[1];
    $controller->update($id_penyelenggara, $_POST);
} elseif (preg_match('/\/organizers\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id_penyelenggara = $matches[1];
    $controller->delete($id_penyelenggara);
}elseif ($url == '/sponsor/index') {
    $controller->index();
} elseif ($url == '/sponsor/create' && $requestMethod == 'GET') {
    $controller->create();
} elseif ($url == '/sponsor/store' && $requestMethod == 'POST') {
    $controller->store();
} elseif (preg_match('/\/sponsor\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->edit($userId);
} elseif (preg_match('/\/sponsor\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller->update($userId, $_POST);
} elseif (preg_match('/\/sponsor\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller->delete($userId);

} elseif($url == '/'){
    $controller->dashboard();
} else {
 http_response_code(404);
}

