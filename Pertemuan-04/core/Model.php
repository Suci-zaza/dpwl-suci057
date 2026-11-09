<?php
class Model
{
    protected $db;

    public function __construct()
    {
        // Gunakan require (bukan require_once) agar variabel lokal selalu dimuat
        require __DIR__ . '/../config/database.php';

        $this->db = new mysqli(
            $dbhost, 
            $dbusername, 
            $dbpassword, 
            $dbname, 
            $dbport
        );

        if ($this->db->connect_error) {
            die("Koneksi database gagal: " . $this->db->connect_error);
        }

        $this->db->set_charset("utf8mb4");
    }
}