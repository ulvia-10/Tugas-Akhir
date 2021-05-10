<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan extends CI_Controller
{


    function __construct()
    {

        parent::__construct();

        $this->load->model('M_keuangan');
        $this->load->model('M_master');

        $this->load->library('form_validation');

        // pengecekan sesi 
        if (empty($this->session->userdata('sess_fullname'))) {

            $this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
            redirect('login');
        }
    }


    // Tampilan keuangan  Tabel
    public function index()
    {
        $data = array(

            'namafolder'    => "keuangan",
            'namafileview'  => "V_tabelKeuangan",
            'title'         => "Kas | Senyum Desa"
        );

        $data['data_keuangan'] = $this->M_keuangan->getallkeuangan();
        if ($this->input->post('keyword')) {
            #code...
            $data['data_keuangan'] = $this->M_keuangan->cariData();
        }

        $this->load->view('templating/Template_dashboardadmin', $data);
    }

    //Tampilan Tambah 
    public function tambah()
    {

        $getDataCabang = $this->M_master->getallwilayah();

        $data = array(

            'namafolder'    => "keuangan",
            'namafileview'    => "V_tambahkeuangan",
            'title'         => "data keuangan",

            // variable
            'dataCabang'    => $getDataCabang
        );
        $this->load->view('templating/Template_dashboardadmin', $data);
    }
    //Tampilan detail
    public function detail()
    {
        $data = array(

            'namafolder'    => "keuangan",
            'namafileview'  => "V_detailkeuangan",
            'title'         => "keuangan"
        );
        $this->load->view('templating/Template_dashboardadmin', $data);
    }


    // proses sistem keuangan
    // proses tambah
    function prosesTambah()
    {

        $this->M_keuangan->processInsertKeuangan();
    }

    // proses hapus
    function hapus($id_keuangan)
    {

        $this->M_keuangan->processDeleteKeuangan($id_keuangan);
    }

    public function edit()
    {
    }
    // ANGGOTA DATA KAS TAMBAH 
    public function tambahbuktikas()
    {
      
        $data = array(

            'namafolder'    => "anggota",
            'namafileview'    => "V_tambah_buktikas",
            'title'         => "Kas | Senyum Desa",
        );
        $this->load->view('templating/Template_anggotanew', $data);
    }
    // di korwil bro ini 
    public function tambahbuktikaskorwil()
    {
        $dataanggotaCabang = $this->M_keuangan->getanggotaByCabang();
        $data = array(

            'namafolder'    => "keuangan",
            'namafileview'    => "V_tambah_buktikaskorwil",
            'title'         => "Kas | Senyum Desa",

          // // variable
          'dataAnggota'    =>   $dataanggotaCabang
        );
        $this->load->view('templating/korwil/template_korwil', $data);
    }
    // kas anggota 
    public function uploadbuktikas(){
           // helper 
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    // form validation 
    $this->form_validation->set_rules('tgl_bayar','tgl_bayar','required');
    $this->form_validation->set_rules('judul','judul','required');
    $this->form_validation->set_rules('no_rekening','no_rekening','required');
    $this->form_validation->set_rules('nominal','nominal','required');
    $this->form_validation->set_rules('deskripsi','deskripsi','required');

    if ($this->form_validation->run()==FALSE){

        echo validation_errors();
    }
    else{
        $upload = $this->M_keuangan->upload();
        if($upload ['result'] == 'success'){
            $this->M_keuangan->tambahbuktikas($upload);
            $this->session->set_flashdata('flash-data','ditambahkan');
            redirect('keuangan','refresh');
        }else{
            echo $upload['error'];
        }
    }
    }
    // di korwil ya ini buat tambah kas 
    public function uploadbuktikaskorwil(){
        // helper 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        // form validation 
        $this->form_validation->set_rules('tgl_bayar','tgl_bayar','required');
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('no_rekening','no_rekening','required');
        $this->form_validation->set_rules('nominal','nominal','required');
        $this->form_validation->set_rules('deskripsi','deskripsi','required');

        if ($this->form_validation->run()==FALSE){
            echo validation_errors();
        }
        else{
            $upload = $this->M_keuangan->upload();
            if($upload ['result'] == 'success'){
                $this->M_keuangan->tambahbuktikaskorwil($upload);
                $this->session->set_flashdata('flash-data','ditambahkan');
                redirect('keuangan','refresh');
            }else{
                echo $upload['error'];
            }
        }
        }
    public function detailkasanggota($id)
	{
		$data = array(
			'namafolder'	=> "anggota",
			'namafileview'	=> "V_detail_kas",
			'title'         => "Detail Kas | Senyum Desa"
		);

		$data['kas']= $this->M_keuangan->getKasById($id);
		$this->load->view('templating/template_anggotanew', $data);
	
	}
    public function detailkaskorwil($id_keuangan)
	{
		$data = array(
			'namafolder'	=> "anggota",
			'namafileview'	=> "V_detail_kas",
			'title'         => "Detail Kas | Senyum Desa"
		);
		$data['kas']= $this->M_keuangan->getKasById($id_keuangan);
        $this->load->view('templating/korwil/template_korwil', $data);
	}

    public function prosesedit()
    {
        $id_profile = $this->input->post('id_profile');

        $data = [
        
           'status_verif' =>$this->input->post('status_verif')
    ];
    
        //flashdata 
        print_r($data);

    }
    public function delete($id)
	{
		$this->M_keuangan->hapuskas($id);
		$this->session->set_flashdata('flash-data','Account berhasil Dihapus');
		redirect('kegiatan/historypembayaran','refresh');
	}
    public function deletekasanggota($id)
	{
		$this->M_keuangan->hapuskas($id);
		$this->session->set_flashdata('flash-data','Account berhasil Dihapus');
		redirect('kegiatan/historypembayaran','refresh');
	}

    public function editkasanggota($id){
        $data = array(
			'namafolder'	=> "anggota",
			'namafileview'	=> "V_edit_kas_anggota",
			'title'         => "Detail Kas | Senyum Desa"
		);
       		$data['kas']= $this->M_keuangan->getKasById($id);
              
		$this->load->view('templating/template_anggotanew', $data);
    }
    public function proseseditkasanggota(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        // form validation 
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('tgl_bayar','tgl_bayar','required');
        $this->form_validation->set_rules('nominal','nominal','required');
        $this->form_validation->set_rules('no_rekening','no_rekening','required');
        $this->form_validation->set_rules('deskripsi','deskripsi','required');
        
        if ($this->form_validation->run() == FALSE){
            echo validation_errors();
          }
          else{
            $upload = $this->M_keuangan->upload();
            if($upload ['result'] == 'success'){
                $this->M_keuangan->ubahkasanggota($upload);
                $this->session->set_flashdata('flash-data','ditambahkan');
                redirect('keuangan','refresh');
            }else{
                echo $upload['error'];
            }
            //session 
            $elementHTML = '<div class="alert alert-danger"><b>Pemberitahuan</b> <br> Notifikasi Kegiatan sudah dibaca pada ' . date('d F Y H.i A') . '</div>';
            $this->session->set_flashdata('msg', $elementHTML);
            // echo "<pre>";
            // echo var_dump($data);
            // echo "</pre>";
            //redirect 
            redirect('kegiatan/historypembayaran','refresh');  

    }
}
}
