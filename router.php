<?php

$routes = [
    '/' => 'controllers/index.php',
    // '/view' => 'controllers/view.php',
    '/create' => 'controllers/create.php',
    '/update' => 'controllers/update.php',
    '/delete' => 'controllers/delete.php',
];

function route($url, $routes)
{
    if (isset($routes[$url]) && file_exists($routes[$url])) {
        require $routes[$url];
    } else {
        http_response_code(404);
        require 'controllers/404.php';
        die();
    }
}

$url = parse_url($_SERVER['REQUEST_URI'])['path'];
route($url, $routes);
