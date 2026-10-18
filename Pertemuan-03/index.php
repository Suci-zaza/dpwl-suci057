<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';
$url = $_GET['url'] ?? $route['default_controller'] . '/' . $route['default_method'];
//if ($url === '') {
 //   $url = $route['default_controller'] . '/index';
//}
//$url = trim($url, '/');
$segment = explode('/', $url);
//$controller = $segment[0] ?? $route['default_controller'];
$method = $segment[1] ?? 'index';
$parameter = $segment[2] ?? null;

$Latihan1Controller = ucfirst($controller);
$controllerFile = 'controller/' . $Latihan1Controller . '.php';

//if (file_exists($controllerFile)) {
   // require_once $controllerFile;
    $objController = new $Latihan1Controller();

    if (method_exists($objController, $method)) {
        if ($parameter != null) {
            $objController->$method($parameter);
        } else {
            $objController->$method();
        }
    } else {
        echo "Method tidak ditemukan.";
    }
//} else {
//    echo "Controller tidak ditemukan.";
//}