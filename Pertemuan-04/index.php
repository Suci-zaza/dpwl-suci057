<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';
require_once 'config/confiq.php';
require_once 'helper/url_helper.php';

// 1. Ambil URL dan bersihkan dari slash berlebih
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);

// 2. Olah segmen URL
if (empty($url)) {
    $controllerName = ucfirst($route['default_controller']);
    $method         = $route['default_method'] ?? 'index';
    $parameters     = [];
} else {
    $segment        = explode('/', $url);
    $controllerName = ucfirst($segment[0]);
    $method         = $segment[1] ?? ($route['default_method'] ?? 'index');
    $parameters     = array_slice($segment, 2); // Mengambil sisa segmen sebagai parameter
}

// 3. Panggil Autoloader secara otomatis dengan class_exists()
if (class_exists($controllerName)) {
    $objController = new $controllerName();

    if (method_exists($objController, $method)) {
        // Panggil method beserta parameternya secara dinamis
        call_user_func_array([$objController, $method], $parameters);
    } else {
        echo "Method '$method' tidak ditemukan pada Controller '$controllerName'.";
    }
} else {
    echo "Controller '$controllerName' tidak ditemukan.";
}