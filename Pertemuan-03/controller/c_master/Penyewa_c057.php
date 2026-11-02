<?php
class Penyewa_C057 extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Penyewa_M057');
        $dt['dbpenyewa'] = $cekdata->datapenyewa();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/penyewaview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_pen()
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
        $penyewa     = $this->load->model('m_master/Penyewa_M057');
        $user_plg057 = $this->load->post('user_plg057');

        if ($penyewa->cekuser($user_plg057)) {
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

        $files = [
            'ft_ktp'   => 'KTP',
            'ft_sim_a' => 'SIM_A'
        ];

        $nama_file_db = [];
        $clean_user   = str_replace([' ', '/'], '_', $user_plg057);

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
            'user_plg057'   => $user_plg057,
            'Sandi057'      => $this->load->post('Sandi057'),
            'Nik057'        => $this->load->post('Nik057'),
            'nm_lngkp057'   => $this->load->post('nm_lngkp057'),
            'no_hp057'      => $this->load->post('no_hp057'),
            'almt_lngkp057' => $this->load->post('almt_lngkp057'),
            'ft_ktp'        => $nama_file_db['ft_ktp'],
            'ft_sim_a'      => $nama_file_db['ft_sim_a']
        ];

        $simpan = $penyewa->simpan($data);

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

    public function edit($user_plg057)
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $penyewa       = $this->load->model('m_master/Penyewa_M057');
        $dt['penyewa'] = $penyewa->detailpenyewa($user_plg057);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_penyewaview057', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdatePenyewa()
    {
        $penyewa     = $this->load->model('m_master/Penyewa_M057');
        $user_plg057 = $this->load->post('user_plg057');

        $ft_ktp_asli   = $this->load->post('ft_ktp_asli');
        $ft_sim_a_asli = $this->load->post('ft_sim_a_asli');
        $target_folder = dirname(__DIR__, 2) . '/img/';

        // --- Upload foto KTP baru ---
        if (isset($_FILES['ft_ktp']) && $_FILES['ft_ktp']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_ktp']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_ktp']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'png', 'jpeg'])) {
                $ft_ktp     = 'KTP_' . $user_plg057 . '.' . $ekstensi;
                $target_dir = $target_folder . $ft_ktp;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_ktp = $ft_ktp_asli;
            }
        } else {
            $ft_ktp = $ft_ktp_asli;
        }

        // --- Upload foto SIM A baru ---
        if (isset($_FILES['ft_sim_a']) && $_FILES['ft_sim_a']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar = $_FILES['ft_sim_a']['tmp_name'];
            $ekstensi = strtolower(pathinfo($_FILES['ft_sim_a']['name'], PATHINFO_EXTENSION));
            if (in_array($ekstensi, ['jpg', 'png', 'jpeg'])) {
                $ft_sim_a   = 'SIM_A_' . $user_plg057 . '.' . $ekstensi;
                $target_dir = $target_folder . $ft_sim_a;
                move_uploaded_file($nmgambar, $target_dir);
            } else {
                $ft_sim_a = $ft_sim_a_asli;
            }
        } else {
            $ft_sim_a = $ft_sim_a_asli;
        }

        $data = [
            'user_plg057'   => $user_plg057,
            'Sandi057'      => $this->load->post('Sandi057'),
            'Nik057'        => $this->load->post('Nik057'),
            'nm_lngkp057'   => $this->load->post('nm_lngkp057'),
            'no_hp057'      => $this->load->post('no_hp057'),
            'almt_lngkp057' => $this->load->post('almt_lngkp057'),
            'ft_ktp'        => $ft_ktp,
            'ft_sim_a'      => $ft_sim_a
        ];

        $simpan = $penyewa->UbahDtPenyewa($data);
        if ($simpan) {
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
        $penyewa       = $this->load->model('m_master/Penyewa_M057');
        $dt['Penyewa'] = $penyewa->detailpenyewa($user_plg057);
        $ft_ktp   = $dt['Penyewa']['ft_ktp'];
        $ft_sim_a = $dt['Penyewa']['ft_sim_a'];

        $hapus = $penyewa->HapusDtPenyewa($user_plg057);
        if ($hapus) {
            $folder = dirname(__DIR__, 2) . '/img/';
            $gambar = [$ft_ktp, $ft_sim_a];
            foreach ($gambar as $file) {
                if (!empty($file) && file_exists($folder . $file)) {
                    unlink($folder . $file);
                }
            }
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