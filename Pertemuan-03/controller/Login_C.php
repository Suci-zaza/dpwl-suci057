<?php
class Login_C extends Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function CekLogin()
    {
        $email = $_POST['username'];
        $password = $_POST['password'];

        // Bagian yang dilingkari:
        $cekdata = $this->load->model('Login_M');
        $datauser = $cekdata->ambildata($username);
        if ($datauser && password_verify($password, $datauser['password'])) {
            $this->session->set_userdata('username', $datauser['username']);
            echo '<script>alert("Login berhasil sebagai ' . $this->session->userdata('username') . '");</script>';
        } else {
            echo '<script>alert("Gagal: silahkan cek email, password, atau status akun Anda...");</script>';
        }
    }
}