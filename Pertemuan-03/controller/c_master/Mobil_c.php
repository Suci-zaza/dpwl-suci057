<?php
class Mobil_c extends Controller
{
    public function index()
    {
        $cekdata = $this->load->model('m_master/Mobil_M');
        $dt['dbmobil'] = $cekdata->datamobil();
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('v_master/mobilview'); // <-- Ubah 'layout/mobilview' menjadi 'v_master/mobilview'
        $this->load->view('layout/footer');
    }
}