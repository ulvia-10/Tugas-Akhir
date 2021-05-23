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


            // pengecekan sesi 
        //     if (empty($this->session->userdata('sess_fullname'))) {

        //         $this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
        //         redirect('login');
        //     }
    }
//index donas non anggota 
    public function donasinonanggota()
    {
        
        $dataMasterCabang = $this->M_master->getallwilayah();

        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'  => "V_tambah_nonanggota",
            'title'         => "Tambah Donasi | Senyum Desa",
            // // variable
			'data_master'	=> $dataMasterCabang
        );
        // status 
       $data['event'] = $this->M_donasi->getjadwaldonasi();

        // redirect 
        $this->load->view('templating/template_headerpage', $data);
        

    }
    public function datadonasinonanggota()
    {
        // $data['donasi'] = $this->M_donasi->getDetailDonasi();
        $data = array(

            'namafolder'    => "Donasi",
            'namafileview'  => "V_verif_donasinon.php",
            'title'         => "Tambah Donasi | Senyum Desa"
        );

        // variabel donasi
        $data['donasinon_sudah_verifikasi'] = $this->M_donasi->datadonasinon("baru");
        $data['donasinon_baru'] = $this->M_donasi->datadonasinon("belum verifikasi");
        $data['donasi']=$this->M_donasi->getalldonasinonanggota();
        // redirect
        $this->load->view('templating/korwil/template_korwil', $data);
        

    }
    public function prosestambahdonasinon(){
        // helper 
     $this->load->helper(array('form', 'url'));
     $this->load->library('form_validation');
     // form validation 
     $this->form_validation->set_rules('nama_donatur','nama_donatur','required');
     $this->form_validation->set_rules('email_donatur','email_donatur','required');
     $this->form_validation->set_rules('telp_donatur','telp_donatur','required');
 
     if ($this->form_validation->run()==FALSE){
         echo validation_errors();
     }
     else{
         $upload = $this->M_donasi->upload();
         if($upload ['result'] == 'success'){
             $this->M_donasi->tambahbuktidonasinon($upload);
             $this->session->set_flashdata('flash-data','ditambahkan');
             redirect('donasi_non/donasinonanggota/','refresh');
         }else{
             echo $upload['error'];
         }
     }
  }
  public function riwayatdonasinonanggota()
{
  
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'    => "V_riwayat_nondonasi",
        'title'         => "Donasi Non Anggota | Senyum Desa",
    );

    $data['donasi'] = $this->M_donasi->getallDonasinon();
    $data['donasi_anggota'] = $this->M_donasi->getDonasiAnggota();
    $data['anonim'] = $this->M_donasi->getalldonasinonanonim();
    
    $this->load->view('templating/template_donasinon' , $data);
  
}

public function jadwaleventdonasi(){
    $data = array(

        'namafolder'    => "donasi",
        'namafileview'    => "V_jadwal_event_donasi",
        'title'         => "Jadwal Event Donasi | Senyum Desa",

    );
    // get variable 
    $data['jadwal'] = $this->M_donasi->getjadwaldonasi();
    // redirect 
    $this->load->view('templating/template_headerpage', $data);
    $this->load->view('templating/template_footerpage', $data);
}


// hapus donasi non anggota di korwil 
public function hapusdonasikorwil($Id_donasi){
    $this->M_donasi->processDeleteDonasinonkorwil($Id_donasi);
    $this->session->set_flashdata('flash-data','Account berhasil Dihapus');
    redirect('donasi_non/datadonasinonanggota','refresh');
}
public function editdonasinonverif($id){
    $data = array(
        'namafolder'    => "donasi",
        'namafileview'    => "V_edit_donasinon_verif",
        'title'         => "Donasi Non Anggota | Senyum Desa",
    );
    $data['donasi'] = $this->M_donasi->getallDonasinon();
    $this->load->view('templating/korwil/template_korwil', $data);
}

public function proseseditdonasinonverif(){
    
    $this->form_validation->set_rules('status_verif','status_verif','required');
     
      if ($this->form_validation->run() == FALSE){
        echo validation_errors();
      }
      else{
        //run ke model 
        $this->M_donasi->ubahdatanondonasi();
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
public function tambahbuktidonasinonkorwil(){
    // loading page 
    $data = array(
        'namafolder'    => "donasi",
        'namafileview'    => "V_tambah_donasinon_korwil",
        'title'         => "Donasi Non Anggota | Senyum Desa",
    );
    $data['event'] = $this->M_donasi->getjadwaldonasi();
    
    // var_dump($data);
    // //templating 
    $this->load->view('templating/korwil/template_korwil', $data);
}
// proses tambah donasi non anggota di koriwil 
public function tambahdonasinonanggotakorwil(){
       // helper 
       $this->load->helper(array('form', 'url'));
       $this->load->library('form_validation');
       // form validation 
       $this->form_validation->set_rules('tgl_donasi','tgl_donasi','required');
       $this->form_validation->set_rules('nama_donatur','nama_donatur','required');
       $this->form_validation->set_rules('email_donatur','email_donatur','required');
       $this->form_validation->set_rules('email_donatur','email_donatur','required');
       $this->form_validation->set_rules('telp_donatur','telp_donatur','required');
       $this->form_validation->set_rules('jml_donasi','jml_donasi','required');
    //    $this->form_validation->set_rules('bukti_donasi','bukti_donasi','required');
   
       if ($this->form_validation->run()==FALSE){
           echo validation_errors();
       }
       else{
           $upload = $this->M_donasi->upload();
           if($upload ['result'] == 'success'){
               $this->M_donasi->tambahbuktidonasinonkorwil($upload);
               $this->session->set_flashdata('flash-data','ditambahkan');
               redirect('donasi_non/datadonasinonanggota','refresh');  
           }else{
               echo $upload['error'];
           }
           redirect('donasi_non/datadonasinonanggota','refresh');  
       }
}
}
