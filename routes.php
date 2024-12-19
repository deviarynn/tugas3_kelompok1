<?php
// routes.php

require_once 'app/controllers/EventsController.php';
require_once 'app/controllers/OrganizersController.php';
require_once 'app/controllers/SponsorController.php';
require_once 'app/controllers/AttendsController.php';


$controller1 = new EventsController();
$controller2 = new AttendsController();
$controller3 = new OrganizersController();
$controller4 = new SponsorController();

$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/event/index') {
    $controller1->index();
} elseif ($url == '/event/create' && $requestMethod == 'GET') {
    $controller1->create();
} elseif ($url == '/event/store' && $requestMethod == 'POST') {
    $controller1->store();
} elseif (preg_match('/\/event\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $eventId = $matches[1];
    $controller1->edit($eventId);
} elseif (preg_match('/\/event\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $eventId = $matches[1];
    $controller1->update($eventId, $_POST);
} elseif (preg_match('/\/event\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $eventId = $matches[1];
    $controller1->delete($eventId);
} elseif ($url == '/peserta/index') {
    $controller2->index();
} elseif ($url == '/peserta/create' && $requestMethod == 'GET') {
    $controller2->create();
} elseif ($url == '/peserta/store' && $requestMethod == 'POST') {
    $controller2->store();
} elseif (preg_match('/\/peserta\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller2->edit($pesertaId);
} elseif (preg_match('/\/peserta\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $pesertaId = $matches[1];
    $controller2->update($pesertaId, $_POST);
} elseif (preg_match('/\/peserta\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $pesertaId = $matches[1];
    $controller2->delete($pesertaId);
} elseif ($url == '/organizers/index') {
    $controller3->index();
} elseif ($url == '/organizers/create' && $requestMethod == 'GET') {
    $controller3->create();
} elseif ($url == '/organizers/store' && $requestMethod == 'POST') {
    $controller3->store();
} elseif (preg_match('/\/organizers\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id_penyelenggara = $matches[1];
    $controller3->edit($id_penyelenggara);
} elseif (preg_match('/\/organizers\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $id_penyelenggara = $matches[1];
    $controller3->update($id_penyelenggara, $_POST);
} elseif (preg_match('/\/organizers\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $id_penyelenggara = $matches[1];
    $controller3->delete($id_penyelenggara);
} elseif ($url == '/sponsor/index') {
    $controller4->index();
} elseif ($url == '/sponsor/create' && $requestMethod == 'GET') {
    $controller4->create();
} elseif ($url == '/sponsor/store' && $requestMethod == 'POST') {
    $controller4->store();
} elseif (preg_match('/\/sponsor\/edit\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller4->edit($userId);
} elseif (preg_match('/\/sponsor\/update\/(\d+)/', $url, $matches) && $requestMethod == 'POST') {
    $userId = $matches[1];
    $controller4->update($userId, $_POST);
} elseif (preg_match('/\/sponsor\/delete\/(\d+)/', $url, $matches) && $requestMethod == 'GET') {
    $userId = $matches[1];
    $controller4->delete($userId);
} elseif ($url == '/') {
    $controller4->dashboard();
} else {
    http_response_code(404);
}
