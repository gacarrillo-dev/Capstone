<?php

// Get the request URI and strip the base path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_path = '/Capstone';
$uri = substr($uri, strlen($base_path));

// Define your routes
$routes = [
    '/' => 'controllers/index.php',
    '/index.php' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/login' => 'controllers/user/login.php',
    '/register' => 'controllers/user/register.php'
];

function routeToController($uri, $routes)
{
    // Find the base URI without the query string
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);