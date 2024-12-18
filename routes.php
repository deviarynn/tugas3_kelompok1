<?php
// routes.php

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