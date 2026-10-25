<?php
class Login_C extends Controller
{
    public function index()
    {
        $data['psn'] = $this->session->flashdata('psn');
        $this->load->view('login', $data);
    }

    public function CekLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $cekdata = $this->load->model('Login_M');
            $datauser = $cekdata->ambildata($username, $password);

            if ($datauser) {
                $this->session->set_userdata('username', $username);
                $userSession = $this->session->userdata('username');

                // PERBAIKAN: Tambahkan window.location.href untuk pindah ke controller/halaman tujuan setelah OK diklik
                echo '<script>
                    alert("Login Berhasil sebagai ' . $userSession . '");
                    window.location.href = "' . base_url('Dashboard_C') . '"; 
                </script>';
            } else {
                echo '<script>
                    alert("Gagal : Silakan cek username, password, atau status akun");
                    window.location.href = "' . base_url('Login_C') . '";
                </script>';
            }
        } else {
            $this->index();
        }
    }
}