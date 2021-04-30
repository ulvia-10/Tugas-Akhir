<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        $this->load->model('M_donasi');
        $this->load->model('M_master');
        $this->load->library('form_validation');

        // pengecekan sesi 
        if (empty($this->session->userdata('sess_fullname'))) {

            $this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
            redirect('login');
        }
    }


    // Tampilan Donasi Tabel
    public function index()
    {
        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'  => "V_tabeldonasi",
            'title'         => "Donasi | Senyum Desa"
        );

        $data['data_donasi'] = $this->M_donasi->getallDonasi();
        if ($this->input->post('keyword')) {
            #code...
            $data['data_donasi'] = $this->M_donasi->cariData();
        }

        $this->load->view('templating/Template_dashboardadmin', $data);
    }

    //Tampilan Tambah Donasi
    public function tambah()
    {
        $getDataCabang = $this->M_master->getallwilayah();
        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'    => "V_tambahdonasi",
            'title'         => "Donasi",

            'dataCabang'    => $getDataCabang
        );
        $this->load->view('templating/korwil/template_korwil', $data);
    }
    //Tampilan detail
    public function detail()
    {
        $data['data_donasi'] = $this->M_donasi->getDetailDonasi();
        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'  => "V_detaildonasi",
            'title'         => "Donasi"
        );
        $this->load->view('templating/Template_dashboardadmin', $data);
    }

 
    // proses sistem mastercabang

    // proses tambah
    function prosesTambah()
    {

        $this->M_donasi->processInsertDonasi();
    }

    // proses hapus
    function hapus($Id_donasi)
    {

        $this->M_donasi->processDeleteDonasi($Id_donasi);
    }

    /** edit dan UPDATE */
    function edit($Id_donasi)
    {
        $where = array('Id_donasi' => $Id_donasi);
        $data['data_donasi'] = $this->M_donasi->edit_data($where, 'data_donasi')->result();
        $this->load->view('templating/dashboardadmin/Template_dashboardadmin2', $data);
        $this->load->view('donasi/V_editdonasi', $data);
        $this->load->view('templating/dashboardadmin/template_footer', $data);
    }

    function update()
    {
        $Id_donasi = $this->input->post('Id_donasi');
        $no_rekening = $this->input->post('no_rekening');
        $nama_donatur = $this->input->post('nama_donatur');
        $tgl_donasi = $this->input->post('tgl_donasi');
        $status = $this->input->post('status');
        $jml_donasi = $this->input->post('jml_donasi');

        $data = array(
            'no_rekening' => $no_rekening,
            'nama_donatur' => $nama_donatur,
            'tgl_donasi' => $tgl_donasi,
            'status' => $status,
            'jml_donasi' => $jml_donasi
        );

        $where = array(
            'Id_donasi' => $Id_donasi
        );

        $this->M_donasi->update_data($where, $data, 'data_donasi');
        redirect('Donasi/index');
    }
    /**===========================================================*/
  
    // Anggota 
    //riwayat donasi anggota 
    public function riwayatdonasi()
    {

        
        $data = array(

            'namafolder'    => "anggota",
            'namafileview'    => "V_history_donasi",
            'title'         => "Donasi | Senyum Desa",
        );
        $data['donasi'] = $this->M_donasi->getdatadonasi();
        $this->load->view('templating/Template_anggotanew', $data);

    }

    // tambah donasi 
    public function tambahbuktidonasi()
    {
        // $getDataCabang = $this->M_master->getallwilayah();
        
        $data = array(

            'namafolder'    => "anggota",
            'namafileview'    => "V_tambah_buktidonasi",
            'title'         => "Donasi",
        );
        $this->load->view('templating/Template_anggotanew', $data);
    }
// riwayat donasi non anggota
public function riwayatdonasinonanggota()
{
  
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'    => "V_riwayat_nondonasi",
        'title'         => "Donasi Non Anggota | Senyum Desa",

       
    );
    $this->load->view('templating/template_loginheader', $data);
  
    
}
// data donasi di korwil
public function datadonasi(){
    
    $data = array(

        'namafolder'    => "Donasi",
        'namafileview'    => "V_donasi",
        'title'         => "Donasi Anggota | Senyum Desa",

       
    );
    $data['donasi_sudah_verifikasi'] = $this->M_donasi->datadonasi("baru");
    $data['donasi_baru'] = $this->M_donasi->datadonasi("belum verifikasi");
    $data['donasi']=$this->M_donasi->getalldatadonasi();

    $this->load->view('templating/korwil/Template_korwil', $data);
}
// bukti donasi 
public function uploadbuktidonasi(){
    // helper 
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    // form validation 
    $this->form_validation->set_rules('tgl_donasi','tgl_donasi','required');
    $this->form_validation->set_rules('no_rekening','no_rekening','required');
    $this->form_validation->set_rules('jml_donasi','jml_donasi','required');

    if ($this->form_validation->run()==FALSE){

        echo validation_errors();
    }
    else{
        $upload = $this->M_donasi->upload();
        if($upload ['result'] == 'success'){
            $this->M_donasi->tambahbuktidonasi($upload);
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('donasi','refresh');
        }else{
            echo $upload['error'];
        }
    }
}
public function detaildonasianggota($id){
 
    $data = array(

        'namafolder'    => "anggota",
        'namafileview'    => "V_detail_donasi",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    $this->load->view('templating/Template_anggotanew', $data);
}
public function detaildonasikorwil($id){
 
    $data = array(

        'namafolder'    => "anggota",
        'namafileview'  => "V_detail_donasi",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    
    $this->load->view('templating/korwil/Template_korwil', $data);
}

}
 
