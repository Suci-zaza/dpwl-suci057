<?php
spl_autoload_register(function ($Mobil_c) {
    $paths = ['controller/', 'model/', 'config/', 'core/','controller/c_master/'];

    foreach ($paths as $path) {
        $file = $path . $Mobil_c . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }

    echo "Class  '$Mobil_c'   tidak ditemukan.";
});