<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa_C123 extends CI_Controller
{
    public function index()
    {
        $this->load->model('m_master/Penyewa_M123');
        $dt['dbpenyewa'] = $this->Penyewa_M123->datapenyewa();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/penyewaview123', $dt);
        $this->load->view('layout/footer');
    }

    public function create_penyewa()
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_penyewaview057');
        $this->load->view('layout/footer');
    }

    public function simpan()
    {
        $this->load->model('m_master/Penyewa_M057');
        $username = $this->input->post('user_plg057');

        // Cek apakah username sudah terdaftar
        if ($this->Penyewa_M057->cekuser($username)) {
            echo "<script>
                alert('Username sudah ada, silahkan gunakan Username lain');
                window.history.back();
            </script>";
            exit;
        }

        $target_folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($target_folder)) {
            mkdir($target_folder, 0777, true);
        }

        // Upload berkas KTP dan SIM A
        $files = [
            'ft_ktp123'   => 'KTP',
            'ft_sim_a123' => 'SIM_A'
        ];

        $nama_file_db = [];
        $clean_user   = str_replace([' ', '/'], '_', $username);

        foreach ($files as $field_name => $prefix) {
            if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
                $nmgambar = $_FILES[$field_name]['tmp_name'];
                $ekstensi = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
                $allowed  = ['jpg', 'jpeg', 'png'];

                if (in_array($ekstensi, $allowed)) {
                    $filename   = $prefix . '_' . $clean_user . '.' . $ekstensi;
                    $target_dir = $target_folder . $filename;

                    move_uploaded_file($nmgambar, $target_dir);
                    $nama_file_db[$field_name] = $filename;
                } else {
                    echo "<script>
                        alert('Format file $prefix harus JPG, JPEG, atau PNG!');
                        window.history.back();
                    </script>";
                    exit;
                }
            } else {
                $nama_file_db[$field_name] = '';
            }
        }

        $data = [
            'user_plg057'   => $username,
            'Sandi057'      => $this->input->post('Sandi057'),
            'Nik057'        => $this->input->post('Nik057'),
            'nm_lngkp057'   => $this->input->post('nm_lngkp057'),
            'no_hp057'      => $this->input->post('no_hp057'),
            'almt_lngkp057' => $this->input->post('almt_lngkp057'),
            'ft_ktp057'     => $nama_file_db['ft_ktp057'],
            'ft_sim_a123'   => $nama_file_db['ft_sim_a123']
        ];

        $simpan = $this->Penyewa_M123->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data penyewa berhasil disimpan!');
                window.location.href = '" . base_url('Penyewa_C057/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($user_plg)
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $this->load->model('m_master/Penyewa_M057');
        $dt['penyewa'] = $this->Penyewa_M057->detailpenyewa($user_plg);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview057', $dt);
        $this->load->view('layout/footer');
    }

    public function update()
    {
        $this->load->model('m_master/Penyewa_M057');
        $user_plg = $this->input->post('user_plg057');

        // Upload Foto KTP Baru
        $ft_ktp_asli = $this->input->post('ft_ktp_asli');
        if (isset($_FILES['ft_ktp057']) && $_FILES['ft_ktp057']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_ktp057']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_ktp057']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
                $ft_ktp     = 'KTP_' . $user_plg . '.' . $ekstensi;
                $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_ktp;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_ktp = $ft_ktp_asli;
            }
        } else {
            $ft_ktp = $ft_ktp_asli;
        }

        // Upload Foto SIM A Baru
        $ft_sim_asli = $this->input->post('ft_sim_a_asli');
        if (isset($_FILES['ft_sim_a057']) && $_FILES['ft_sim_a057']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_sim_a057']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_sim_a057']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'jpeg', 'png'])) {
                $ft_sim_a   = 'SIM_A_' . $user_plg . '.' . $ekstensi;
                $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_sim_a;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_sim_a = $ft_sim_asli;
            }
        } else {
            $ft_sim_a = $ft_sim_asli;
        }

        $data = [
            'user_plg057'   => $user_plg,
            'Sandi057'      => $this->input->post('Sandi057'),
            'Nik057'        => $this->input->post('Nik057'),
            'nm_lngkp057'   => $this->input->post('nm_lngkp057'),
            'no_hp057'      => $this->input->post('no_hp057'),
            'almt_lngkp057' => $this->input->post('almt_lngkp057'),
            'ft_ktp057'     => $ft_ktp,
            'ft_sim_a057'   => $ft_sim_a
        ];

        $update = $this->Penyewa_M057->UbahDtPenyewa($data);
        if ($update) {
            echo "<script>
                alert('Data penyewa berhasil diubah!');
                window.location.href = '" . base_url('Penyewa_C057/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal diubah!');
                window.history.back();
            </script>";
        }
    }

    public function hapus($user_plg057)
    {
        $this->load->model('m_master/Penyewa_M057');
        $hapus = $this->Penyewa_M057->HapusPenyewa($user_plg057);

        if ($hapus) {
            echo "<script>
                alert('Data penyewa berhasil dihapus!');
                window.location.href = '" . base_url('Penyewa_C057/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data penyewa gagal dihapus!');
                window.history.back();
            </script>";
        }
    }
}