<?php
class Session 
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function set_userdata($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function userdata($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function unset_userdata($key)
    {
        unset($_SESSION[$key]);
    }

    // Untuk MENYIMPAN pesan flash (membutuhkan 2 argumen: nama key & isi pesan)
    public function set_flashdata($key, $value = '')
    {
        $_SESSION['_flash'][$key] = $value;
    }

    // Untuk MENGAMBIL pesan flash
    public function flashdata($key)
    {
        $userdata = $_SESSION['_flash'][$key] ?? null;
        unset($_SESSION['_flash'][$key]);
        return $userdata;
    }
}