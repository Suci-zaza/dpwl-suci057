<?php
class Mobil_c extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dbmobil'] = $cekdata->datamobil();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function create_mobil()
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }
    
    public function simpan()
    {
        $mobil   = $this->load->model('m_master/Mobil_M');
        $no_plat = $this->load->post('no_plat');

        if ($mobil->cekplat($no_plat)) {
            echo "<script>
                alert('No Plat sudah ada, silahkan gunakan No Plat lain');
                window.history.back();
            </script>";
            exit;
        }

        $target_folder = dirname(__DIR__, 2) . '/img/';
        if (!is_dir($target_folder)) {
            mkdir($target_folder, 0777, true);
        }

        $files = [
            'ft_depan'    => 'Depan',
            'ft_blkg'     => 'Belakang',
            'ft_interior' => 'Interior'
        ];

        $nama_file_db = [];
        $clean_plat   = str_replace([' ', '/'], '_', $no_plat);

        foreach ($files as $field_name => $prefix) {
            if (isset($_FILES[$field_name]) && $_FILES[$field_name]['error'] == 0) {
                $nmgambar = $_FILES[$field_name]['tmp_name'];
                $ekstensi = strtolower(pathinfo($_FILES[$field_name]['name'], PATHINFO_EXTENSION));
                $allowed  = ['jpg', 'jpeg', 'png'];

                if (in_array($ekstensi, $allowed)) {
                    $filename   = $prefix . '_' . $clean_plat . '.' . $ekstensi;
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
            'no_plat'     => $no_plat,
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => $this->load->post('nkursi'),
            'nbagasi'     => $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => $this->load->post('thn_buat'),
            'ft_depan'    => $nama_file_db['ft_depan'],
            'ft_blkg'     => $nama_file_db['ft_blkg'],
            'ft_interior' => $nama_file_db['ft_interior'],
            'hrg_hari'    => $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->simpan($data);

        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil disimpan!');
                window.location.href = '" . base_url('Mobil_c/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal disimpan!');
                window.history.back();
            </script>";
        }
    }

    public function edit($no_plat)
    {
        $email = $this->session->userdata('emailuser') ?? $this->session->userdata('username') ?? '';
        $info['nm_user'] = !empty($email) ? explode('@', $email)[0] : 'User';

        $mobil = $this->load->model('m_master/Mobil_M');
        $dt['mobil'] = $mobil->detailmobil($no_plat);
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/update_mobilview', $dt);
        $this->load->view('layout/footer');
    }

    public function UpdateMobil()
    {
        $mobil = $this->load->model('m_master/Mobil_M');

        $ft_depan      = 'Depan' . $this->load->post('no_plat');
        $ft_depan_asli = $this->load->post('ft_depan_asli');

        // upload gambar baru -----------------------------------------------
        if (isset($_FILES['ft_depan']) && $_FILES['ft_depan']['error'] != UPLOAD_ERR_NO_FILE) {
            $nmgambar   = $_FILES['ft_depan']['tmp_name'];
            $ekstensi   = explode(".", $_FILES["ft_depan"]["name"]);
            $ekstensi   = end($ekstensi);
            $ft_depan   = $ft_depan . '.' . $ekstensi;
            $target_dir = dirname(__DIR__, 2) . '/img/' . $ft_depan;

            if ($ekstensi != "jpg" && $ekstensi != "png" && $ekstensi != "jpeg") {
                echo "<script>alert('Gagal simpan gambar depan, format jpg, png, dan jpeg..!');</script>";
            } else {
                move_uploaded_file($nmgambar, $target_dir);
            }
        } else {
            $ft_depan = $ft_depan_asli;
            echo "<script>alert('Tidak ada gambar depan yang dipilih');</script>";
        }
        // end upload gambar baru -------------------------------------------

        $data = [
            'no_plat'     => $this->load->post('no_plat'),
            'nm_mobil'    => $this->load->post('nm_mobil'),
            'nkursi'      => $this->load->post('nkursi'),
            'nbagasi'     => $this->load->post('nbagasi'),
            'jns_mobil'   => $this->load->post('jns_mobil'),
            'transmisi'   => $this->load->post('transmisi'),
            'thn_buat'    => $this->load->post('thn_buat'),
            'ft_depan'    => $ft_depan,
            'hrg_hari'    => $this->load->post('hrg_hari'),
            'cttn_unit'   => $this->load->post('cttn_unit'),
            'status_unit' => $this->load->post('status_unit')
        ];

        $simpan = $mobil->UbahDtMobil($data);
        if ($simpan) {
            echo "<script>
                alert('Data mobil berhasil diubah!');
                window.location.href = '" . base_url('Mobil_c/index') . "';
            </script>";
        } else {
            echo "<script>
                alert('Data mobil gagal diubah!');
                window.history.back();
            </script>";
        }
    }
}