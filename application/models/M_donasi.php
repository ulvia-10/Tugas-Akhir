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
        $this->session->set_flashdata('pesan', $elementHTML);
        // redirect
        redirect('Donasi');
    }

    //edit donasi
    /**===========================================================*/
    /** Fungsi UPDATE */

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
        $sql ="SELECT data_donasi.*,akun_profile.*
        FROM data_donasi
        JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
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
            'no_rekening'  => $this->input->post('no_rekening'),
            'tgl_donasi'   => $this->input->post('tgl_donasi'),
            'jml_donasi'   => $this->input->post('jml_donasi'),
            'bukti_donasi'  => $upload ['file']['file_name']
            
        );
        
        $this->db->insert('data_donasi', $data);


        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . ' Silahkan menunggu verifikasi lebih lanjut</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        // redirect
        redirect('donasi/riwayatdonasi');
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
        $sql="SELECT  data_donasi.*, master_cabang.*
        FROM data_donasi
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        WHERE data_donasi.Id_donasi = '$id' AND master_cabang.id_cabang = '$id_cabang'";
        return $this->db->query($sql)->row_array();
    }

    public function getalldatadonasi(){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql="SELECT data_donasi.*, master_cabang.*
        FROM data_donasi 
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang 
        WHERE data_donasi.id_cabang = '$id_cabang'";
          return $this->db->query($sql)->result_array();
    }
    public function datadonasi($status){
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $sql =" SELECT data_donasi.*,master_cabang.*
        FROM data_donasi
        JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
        WHERE data_donasi.id_cabang = '$id_cabang' AND data_donasi.status_verif= '$status'";
        return $this->db->query($sql)->result_array();
    }
}
    
