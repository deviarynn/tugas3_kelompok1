<?php
// routes.php
require_once 'app/controllers/OrganizersController.php';

$controller = new OrganizersController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/organizers/index') {
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
} elseif ($url == '/') {
    $controller->dashboard();
} else {
    http_response_code(404);
    echo "404 Not Found";
}

require_once 'app/controllers/EventsController.php';

$controller = new EventsController();
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
} elseif($url == '/'){
    $controller->dashboard();
} else {
    http_response_code(404);
}


require_once 'app/controllers/AttendsController.php';

$controller = new AttendsController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/peserta/index') {
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
} elseif ($url == '/') {
    $controller->dashboard();
} else {
    http_response_code(404);
    echo "404 Not Found";
}