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
