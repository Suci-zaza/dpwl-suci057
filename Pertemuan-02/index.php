<?php
require_once 'config/routes.php';
$url = $_GET['url'] ?? '/';
if ($url == '') {
    $url = $route['default_controller'] . '/index';
}
$url = trim($url, '/');
$url = explode('/', $url);
$controller = $segments[0] ?? $route['default_controller']; 
$method = $segments[1] ?? 'index';
$parameter = $segments[2] ?? null;   

$controllerName = ucfirst($controller);
$controllerFile = 'controller/' . $controllerName . '.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $objController = new $controllerName();
    if (method_exists($objController, $method)) {
        if ($parameter !== null) {
            $objController->$method($parameter);
        } else {
            $objController->$method();
        }
    } else {
        echo "Method tidak ditemukan.";
    } else {
        echo "Controller tidak ditemukan.";
    }