<?php
class Login_C extends Controller
{
    public function index()
    {
        $this->load->view('login');
    }
    public function CekLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $cekdata = $this->load->model('Login_M');
        $datauser = $cekdata->ambildata($email, $password);
        if ($datauser){
            $this->session->set_userdata('emailuser', $email);
            echo '<script>alert("Login Berhasil sebagai" '. $this->session->userdata('emailuser') . '");</script>';
        } else {
            echo '<script>alert("Gagal : Silakan cek email,password, atau status akun anda...");</script>';
        }
    }
}