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
        $info['nm_user'] = explode('@', $this->session->userdata('username'))[0];
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar', $info);
        $this->load->view('v_master/create_mobilview');
        $this->load->view('layout/footer');
    }
    
    public function simpan()
    {
        $mobil = $this->load->model('m_master/Mobil_M');
        if ($mobil->cekplat($this->input->post('no_plat'))){
            echo "<script>
            alert('No Plat sudah ada, silahkan gunakan No Plat lain');
            window.history.back();
            </script>";
            exit;
        }

        $ft_depan    = 'Depan' . $this->input->post('no_plat');
        $ft_blkg     = 'Belakang' . $this->input->post('no_plat');
        $ft_interior = 'Interior' . $this->input->post('no_plat');

        // --- BAGIAN YANG DITAMBAHKAN DARI GAMBAR ---
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
        // -------------------------------------------

        $data = [
            'no_plat'     => $this->input->post('no_plat'),
            'nm_mobil'    => $this->input->post('nm_mobil'),
            'nkursi'      => $this->input->post('nkursi'),
            'nbagasi'     => $this->input->post('nbagasi'),
            'jns_mobil'   => $this->input->post('jns_mobil'),
            'transmisi'   => $this->input->post('transmisi'),
            'thn_buat'    => $this->input->post('thn_buat'),
            'ft_depan'    => $ft_depan,
            'ft_blkg'     => $ft_blkg,
            'ft_interior' => $ft_interior,
            'hrg_hari'    => $this->input->post('hrg_hari'),
            'cttn_unit'   => $this->input->post('cttn_unit'),
            'status_unit' => $this->input->post('status_unit')
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
}