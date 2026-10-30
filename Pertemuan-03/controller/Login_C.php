<?php
class Login_C extends Controller
{
    public function index()
    }

    public function CekLogin()
{
    $email = $this->load->post('username');
    $password = $this->load->post('password');
    $cekdata = $this->load->model('Login_M');
    $datauser = $cekdata->ambildata($username);
    if ($datauser && password_verify($password, $datauser['password'])) {
        $this->session->set_userdata('username', $username);
        $this->session->set_flashdata('pesan', 'Login berhasil sebagai ' . $this->session->userdata('username'));
        redirect('Admin_C/index');
    } else {
        $this->session->set_flashdata('pesan', 'Gagal: Silahkan cek email, password, atau status akun Anda...');
        redirect('login_C/index');
    }
}
