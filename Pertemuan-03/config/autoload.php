<?php
spl_autoload_register(function ($Latihan1Controller) {
    $paths = ['controller/', 'model/', 'config/'];

    foreach ($paths as $path) {
        $file = $path . $Latihan1Controller . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    echo "Class  '$Latihan1Controller'   tidak ditemukan.";
});