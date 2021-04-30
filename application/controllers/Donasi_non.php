<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Donasi_non extends CI_Controller
{
    function __construct()
    {

        parent::__construct();
        $this->load->model('M_korwil');
        $this->load->model('M_master');
        $this->load->model('M_kegiatan');
        $this->load->model('M_keuangan');
        $this->load->model('M_donasi');
    }
//index donas non anggota 
    public function donasinonanggota()
    {
        // $data['donasi'] = $this->M_donasi->getDetailDonasi();
        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'  => "V_tambah_nonanggota",
            'title'         => "Tambah Donasi | Senyum Desa"
        );
        $this->load->view('templating/template_donasinon', $data);
        $this->load->view('templating/template_headerpage', $data);
    }
}
