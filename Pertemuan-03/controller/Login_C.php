<?php
class Login_C extends Controller
{
    public function index()
    {
       $isipns['pns'] = $this->session->set_flashdata('pns');
       $this->load->view('login', $isipns);
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
            $this->session->set_flashdata('pesan', 'Gagal : Silahkan cek username, password atau status akun anda...');
            redirect('Login_C/index');
        }
    }
}