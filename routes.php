<?php
// routes.php

require_once 'app/controllers/SponsorController.php';

$controller = new SponsorController();
$url = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($url == '/sponsor/index') {
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
}elseif ($url == '/'){
    $controller->dashboard();
} else {
    http_response_code(404);
    echo "404 Not Found";
}
