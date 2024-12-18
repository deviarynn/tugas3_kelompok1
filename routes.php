<?php
// routes.php

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

