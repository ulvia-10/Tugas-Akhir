<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_donasi extends CI_Model
{
    //tampilan Donasi
    public function getallDonasi()
    {
        $this->db->select('data_donasi.Id_donasi, data_donasi.no_rekening, data_donasi.nama_donatur, data_donasi.tgl_donasi, master_cabang.id_cabang, master_cabang.name_cabang')
            ->from('data_donasi')
            ->join('master_cabang', 'data_donasi.id_cabang = master_cabang.id_cabang');
        return $this->db->get();
    }
    public function getallDonasinon()
    {
       $sql = "SELECT data_donasi.*,master_cabang.name_cabang
       FROM data_donasi 
       JOIN master_cabang on master_cabang.id_cabang = data_donasi.id_cabang
       WHERE data_donasi.tipe = 'non anggota'AND data_donasi.status_verif = 'baru'";
        return $this->db->query($sql)->result_array();
    }
    //tampilan Cari Data
    public function cariData()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('nama_donatur', $keyword);
        $this->db->or_like('Id_donasi', $keyword);
        return $this->db->get('data_donasi')->result_array();
    }

    // Proses Tambah Donasi
    function processInsertDonasi()
    {

        $data = array(

            'id_cabang'  => $this->input->post('cabang'),
            'no_rekening'   => $this->input->post('no_rekening'),
            'nama_donatur'   => $this->input->post('nama_donatur'),
            'status' => $this->input->post('status'),
            'jml_donasi' => $this->input->post('jml_donasi'),

        );

        $this->db->insert('data_donasi', $data);


        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        // redirect
        redirect('Donasi');
    }

    // Menunjukan Semua Detail DOnasi
    function getallDetail()
    {
        $this->db->select('*');
        $this->db->from('data_donasi');
        $this->db->join('master_cabang', 'data_donasi.Id_donasi=master_cabang.id_cabang');
        $query = $this->db->get();
        //return $query->result();
    }

    // hapus Donasi
    function processDeleteDonasi($Id_donasi)
    {
        $this->db->where('Id_donasi', $Id_donasi);
        $this->db->delete('data_donasi');
        // flashdata
        $elementHTML = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> Data Donasi berhasil dihapus pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('msg', $elementHTML);
        // redirect
        redirect('donasi/riwayatdonasi');
    }

    // delete di korwil 
    function processDeleteDonasikorwil($Id_donasi)
    {
        $this->db->where('Id_donasi', $Id_donasi);
        $this->db->delete('data_donasi');
        // flashdata
        $elementHTML = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> Data Donasi berhasil dihapus pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);
        // redirect
        redirect('donasi/datadonasi');
    }
    //edit donasi
    /**===========================================================*/
    /** Fungsi UPDATE */
    function processDeleteDonasinonkorwil($Id_donasi)
    {
        $this->db->where('Id_donasi', $Id_donasi);
        $this->db->delete('data_donasi');
        // flashdata
        $elementHTML = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> Data Donasi berhasil dihapus pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);
        // redirect
        redirect('donasi_non/datadonasinonanggota');
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);

        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);
    }
    /**===========================================================*/

    // donasi sesuai id cabang dan id profile 
    public function getdatadonasi(){
        $id_profile = $this->session->userdata('sess_id_profile');
        $sql ="SELECT data_donasi.*
        FROM data_donasi
        WHERE data_donasi.id_profile = '$id_profile'";
        return $this->db->query($sql)->result_array();
    }

    // insert bukti donasi di anggota 
    public function tambahbuktidonasi($upload){

        $id_profile = $this->session->userdata('sess_id_profile');
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $data = array
        (
            'id_profile' => $id_profile,
            'id_cabang' => $id_cabang,
            'nama_bank'  => $this->input->post('nama_bank'),
            'via'         =>  "transfer",
            'tipe'      => "anggota",
            'no_rekening'  => $this->input->post('no_rekening'),
            'tgl_donasi'   => $this->input->post('tgl_donasi'),
            'jml_donasi'   => $this->input->post('jml_donasi'),
            'bukti_donasi'  => $upload ['file']['file_name']
            
        );
        
        $this->db->insert('data_donasi', $data);

        // flashdata
        $elementHTML = '<div class="alert alert-secondary"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . ' Silahkan menunggu verifikasi lebih lanjut</div>';
        $this->session->set_flashdata('msg', $elementHTML);

        // redirect
        redirect('donasi/riwayatdonasi');
    }
    // di korwil bro 
    public function tambahbuktidonasikorwil($upload){

        $id_profile = $this->session->userdata('sess_id_profile');
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $data = array
        (
            'id_profile'  => $id_profile,
            'id_cabang' => $id_cabang,
            'status_verif' => "baru",
            'via'  => $this->input->post('via'),
            'nama_bank'  => $this->input->post('nama_bank'),
            // 'id_profile'  => $this->input->post('full_name'),
            // 'no_rekening'  => $this->input->post('no_rekening'),
            'tgl_donasi'   => $this->input->post('tgl_donasi'),
            'jml_donasi'   => $this->input->post('jml_donasi'),
            'bukti_donasi'  => $upload ['file']['file_name']
        );
        
        $this->db->insert('data_donasi', $data);

        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        // redirect
        redirect('donasi/datadonasi');
    }
    // donasi non anggota tambah bukti upload 
    public function tambahbuktidonasinon($upload){
        $data = array
        (
            'id_cabang'   => $this->input->post('name_cabang'),
            'nama_donatur'  => $this->input->post('nama_donatur'),
            'tipe'          => "non anggota",
            'no_rekening'  => $this->input->post('no_rekening'),
            'tgl_donasi'   => $this->input->post('tgl_donasi'),
            'email_donatur'   => $this->input->post('email_donatur'),
            'telp_donatur'   => $this->input->post('telp_donatur'),
            'jml_donasi'   => $this->input->post('jml_donasi'),
            'bukti_donasi'  => $upload ['file']['file_name']
            
        );
        
        $this->db->insert('data_donasi', $data);

        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . '';
        $this->session->set_flashdata('pesan', $elementHTML);
        // print_r($data);
        // // redirect
        redirect('donasi_non/donasinonanggota');
    }

    public function upload(){    
        $config['upload_path'] = './assets/images/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('bukti_donasi')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());     
             return $return;   
        }  
    }
    
    public function getDonasiById($id){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql="SELECT  data_donasi.*, master_cabang.id_cabang, master_cabang.*, akun_profile.id_profile, akun_profile.full_name
        FROM data_donasi
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
        WHERE data_donasi.Id_donasi = '$id' AND master_cabang.id_cabang = '$id_cabang'";
        return $this->db->query($sql)->row_array();
    }
    public function getalldatadonasi(){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql="SELECT data_donasi.*, master_cabang.id_cabang,akun_profile.full_name
        FROM data_donasi 
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang 
        JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
        WHERE data_donasi.id_cabang = '$id_cabang'";
          return $this->db->query($sql)->result_array();
    }
    // untuk anggota ya ini 
    public function datadonasi($status){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql =" SELECT data_donasi.*,master_cabang.id_cabang, akun_profile.full_name
        FROM data_donasi
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
        WHERE data_donasi.id_cabang = '$id_cabang' AND data_donasi.status_verif= '$status'";
        return $this->db->query($sql)->result_array();
    }

    // ini untuk yg non anggota 
    public function datadonasinon($status){
        // session
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql =" SELECT data_donasi.*,master_cabang.id_cabang
        FROM data_donasi
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        WHERE data_donasi.id_cabang = '$id_cabang' AND data_donasi.status_verif = '$status' AND data_donasi.tipe = 'non anggota'";
        return $this->db->query($sql)->result_array();
    }
    // get all data donasi non anggota 
    public function getalldonasinonanggota(){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql="SELECT data_donasi.*,master_cabang.id_cabang
        FROM data_donasi    
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        WHERE  data_donasi.id_cabang = '$id_cabang' AND data_donasi.tipe = 'non anggota'";
        return $this->db->query($sql)->result_array();
    }
    //ubah data di admin korwil 
    public function ubahdata()
    {
        $data = [
            "status"=>$this->input->post('status',true),
            "status_verif"   => $this->input->post('status_verif', true)
            ];
        $this->db->where('Id_donasi', $this->input->post('Id_donasi'));
        $this->db->update('data_donasi', $data);      
        // show flash data 
   
        $msg = '     <div class="alert alert-success" role="alert">
        Data berhasil di verifikasi! </div>';
        $this->session->set_flashdata('pesan', $msg);

        // redirect 
        redirect('donasi/datadonasi/');
      
    }
    // ubah data donasi non anggota di korwil 
    public function ubahdatanondonasi()
    {
        $data = [
            "status"=>$this->input->post('status',true),
            "status_verif"   => $this->input->post('status_verif', true)
            ];
        $this->db->where('Id_donasi', $this->input->post('Id_donasi'));
        $this->db->update('data_donasi', $data);      
        // show flash data 
   
        $msg = '     <div class="alert alert-success" role="alert">
        Data berhasil di verifikasi! </div>';
        $this->session->set_flashdata('pesan', $msg);
        
        // redirect 
        redirect('donasi_non/datadonasinonanggota/');
      
    }
    public function updatedonasianggota(){
        // post data 
        $data = [
            "tgl_donasi"=>$this->input->post('tgl_donasi',true),
            "tipe"      =>"anggota",
            "via"       =>"transfer",
            "nama_bank"=>$this->input->post('nama_bank',true),
            "no_rekening"=>$this->input->post('no_rekening',true),
            "jml_donasi"=>$this->input->post('jml_donasi',true),
            'bukti_donasi'  => $upload ['file']['file_name']
            ];
        // query
        $this->db->where('Id_donasi', $this->input->post('Id_donasi'));
        $this->db->update('data_donasi', $data);      
        // flash data 
        $msg = '<div class="alert alert-info">Data berhasil di verifikasi! <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
        $this->session->set_flashdata('pesan', $msg);
        // redirect
        redirect('donasi/riwayatdonasi/');
    }
    // tambah donasi non anggota di masing" korwil 
    public function tambahbuktidonasinonkorwil($upload){
        $id_profile = $this->session->userdata('sess_id_profile');
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $data = array
        (
            'id_profile'    => $id_profile,
            'id_cabang'     => $id_cabang,
            'nama_donatur'  => $this->input->post('nama_donatur'),
            'tipe'          => "non anggota",
            "jenis"         => "masuk",
            "nama_bank"     =>$this->input->post('nama_bank', true),
            'status_verif'  => "baru",
            // 'no_rekening'   => $this->input->post('no_rekening'),
            'tgl_donasi'    => $this->input->post('tgl_donasi'),
            'email_donatur' => $this->input->post('email_donatur'),
            'telp_donatur'  => $this->input->post('telp_donatur'),
            'jml_donasi'    => $this->input->post('jml_donasi'),
            'bukti_donasi'  => $upload ['file']['file_name']
            
        );
        
        $this->db->insert('data_donasi', $data);

        // flashdata
        $elementHTML = '<div class="alert alert-secondary"><strong>Success</strong> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . '';
        $this->session->set_flashdata('pesan', $elementHTML);
        // print_r($data);
        // // redirect
        redirect('donasi_non/datadonasinonanggota');
    }
    
}

    
