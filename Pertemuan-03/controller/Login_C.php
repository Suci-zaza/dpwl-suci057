<?php
class Login_C extends Controller
{
    public function index()
    {
        $this->load->view('login');
    }

    public function CekLogin()
    {
        // Pastikan request datang dari pengiriman form (POST)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $cekdata = $this->load->model('Login_M');
            $datauser = $cekdata->ambildata($username, $password);

            if ($datauser) {
                $this->session->set_userdata('username', $username);
                $userSession = $this->session->userdata('username');
                echo '<script>alert("Login Berhasil sebagai ' . $userSession . '");</script>';
            } else {
                echo '<script>alert("Gagal : Silakan cek username, password, atau status akun");</script>';
            }
        } else {
            // Jika diakses langsung tanpa submit form, arahkan kembali ke form login
            $this->index();
        }
    }
}