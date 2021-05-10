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
    
        $data = array(

            'namafolder'    => "anggota",
            'namafileview'    => "V_tambah_buktidonasi",
            'title'         => "Donasi",
        );
        $this->load->view('templating/Template_anggotanew', $data);
    }
    public function tambahbuktidonasikorwil()
    {
        // $getDataCabang = $this->M_master->getallwilayah();
        
        $data = array(

            'namafolder'    => "donasi",
            'namafileview'    => "V_tambah_buktidonasikorwil",
            'title'         => "Donasi",
        );
      
        $this->load->view('templating/korwil/Template_korwil', $data);
    }

// riwayat donasi non anggota

// data donasi di korwil
public function datadonasi(){
    
    $data = array(

        'namafolder'    => "Donasi",
        'namafileview'    => "V_donasi",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    // variabel
    $data['donasi_sudah_verifikasi'] = $this->M_donasi->datadonasi("baru");
    $data['donasi_baru'] = $this->M_donasi->datadonasi("belum verifikasi");
    $data['donasi']=$this->M_donasi-> getalldatadonasi();
    // redirect 
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
    $this->form_validation->set_rules('nama_bank','nama_bank','required');
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

//bukti donasi korwil 
public function uploadbuktidonasikorwil(){
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
            $this->M_donasi->tambahbuktidonasikorwil($upload);
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('donasi/datadonasi','refresh');
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
    // get variable 
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    // redirect 
    $this->load->view('templating/Template_anggotanew', $data);
}
// detail donasi di korwil
public function detaildonasikorwil($id){
 
    $data = array(

        'namafolder'    => "anggota",
        'namafileview'  => "V_detail_donasi",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    
    $this->load->view('templating/korwil/Template_korwil', $data);
}
// hapus donasi di anggota 
public function hapusdonasi($Id_donasi){
    $this->M_donasi->processDeleteDonasi($Id_donasi);
    $this->session->set_flashdata('msg','Data Donasi berhasil Dihapus!');
    redirect('donasi/riwayatdonasi','refresh');
}
public function hapusdonasikorwil($Id_donasi){
    $this->M_donasi->processDeleteDonasikorwil($Id_donasi);
    $this->session->set_flashdata('flash-data','Account berhasil Dihapus');
    redirect('donasi/datadonasi','refresh');
}
//DONASI EDIT BAGI ANGGOTA 
public function editdonasianggota($id){
 
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'  => "V_edit_donasi_anggota",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    
    $this->load->view('templating/Template_anggotanew', $data);
}

public function proseseditdonasianggota(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    
    // form validation 
    $this->form_validation->set_rules('tgl_donasi','tgl_donasi','required');
    $this->form_validation->set_rules('no_rekening','no_rekening','required');
    $this->form_validation->set_rules('jml_donasi','jml_donasi','required');
    $this->form_validation->set_rules('nama_bank','nama_bank','required');
    
    if ($this->form_validation->run() == FALSE){
        echo validation_errors();
      }
      else{
        $upload = $this->M_donasi->upload();
        if($upload ['result'] == 'success'){
            $this->M_donasi->updatedonasianggota();
            redirect('donasi','refresh');
        }else{
            echo $upload['error'];
        }
        redirect('donasi/riwayatdonasi','refresh');  
}

}

// DONASI VERIFIKASI DI KORWIL
 public function editdonasiverif($id){
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'  => "V_edit_donasi_verif",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    $this->load->view('templating/korwil/Template_korwil', $data);
 }

 public function editdonasinonverif($id){
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'  => "V_edit_donasinon_verif",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $data['donasi'] = $this->M_donasi->getDonasiById($id);
    $this->load->view('templating/korwil/Template_korwil', $data);
 }


public function proseseditdonasiverif($id){

    $this->form_validation->set_rules('status','status','required');
    $this->form_validation->set_rules('status_verif','status_verif','required');
     
      if ($this->form_validation->run() == FALSE){
        echo validation_errors();
      }
      else{
        //run ke model 
        $this->M_donasi->ubahdata();

        // echo "<pre>";
        // echo var_dump($data);
        // echo "</pre>";
        //redirect 
        redirect('donasi/datadonasi','refresh');  
}
}
public function proseseditdonasinonverif($id){

    $this->form_validation->set_rules('status','status','required');
    $this->form_validation->set_rules('status_verif','status_verif','required');
     
      if ($this->form_validation->run() == FALSE){
        echo validation_errors();
      }
      else{
        //run ke model 
        $this->M_donasi-> ubahdatanondonasi();
        //session 
        $elementHTML = '<div class="alert alert-danger"><b>Pemberitahuan</b> <br> Notifikasi Kegiatan sudah dibaca pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('msg', $elementHTML);
        // echo "<pre>";
        // echo var_dump($data);
        // echo "</pre>";
        //redirect 
        redirect('donasi_non/datadonasinonanggota','refresh');  
}
}
 
}