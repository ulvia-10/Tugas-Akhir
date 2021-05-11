<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_keuangan extends CI_Model
{
    public function getallkeuangan()
    {
        $sql="SELECT data_keuangan.*, master_cabang.*,akun_profile.id_profile,akun_profile.full_name
            FROM data_keuangan
            JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
            JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile";
            return $this->db->query($sql)->result_array();
    }

    // proses  cari data
    public function cariData()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('judul', $keyword);
        $this->db->or_like('id_keuangan', $keyword);
        return $this->db->get('data_keuangan')->result_array();
    }

    // proses detail
    public function detailKeuangan($id_keuangan)
    {
        return $this->db->table('data_keuangan')
            ->join('master_cabang', 'master_cabang.id_cabang = data_keuangan.id_keuangan', 'Left')
            ->join('akun_profile', 'akun_profile.id_profile = data_keuangan.id_keuangan', 'left')
            ->where('id_keuangan', $id_keuangan)
            ->get()
            ->getResultArray();
    }

    // proses insert/tambah data
    function processInsertKeuangan()
    {

        $id_profile = $this->session->userdata('sess_id_profile');

        $data = array(
            'id_cabang'  => $this->input->post('cabang'),
            'id_profile' => $id_profile,
            'judul'   => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'jenis_keuangan' => $this->input->post('jenis_keuangan'),
            'nominal' => $this->input->post('nominal'),
            'tipe' => $this->input->post('tipe'),
        );
        $this->db->insert('data_keuangan', $data);


        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Keuangan berhasil ditambahkan pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        // redirect
        redirect('Keuangan');
    }



    // hapus data
    function processDeleteKeuangan($id_keuangan)
    {


        $this->db->where('id_keuangan', $id_keuangan);
        $this->db->delete('data_keuangan');

        // flashdata
        $elementHTML = '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> Data keuangan berhasil dihapus pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        // redirect
        redirect('keuangan');
    }


    //proses Edit
    public function edit($data)
    {
        $this->db->table('data_keuangan')
            ->where('id_keuangan', $data['id_keuangan'])
            ->update($data);
    }
    //function ubah data kas id
    public function ubahdata()
    {
        $id_keuangan = $this->input->post('id_keuangan');
        $data = [
            "status"=>$this->input->post('status',true),
            "status_verif"   => $this->input->post('status_verif', true)
            ];
        $this->db->where('id_keuangan', $this->input->post('id_keuangan'));
        $this->db->update('data_keuangan', $data);      
        // flash data 
        $msg = '<div class="alert alert-info">Informasi pelaporan berhasil diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
        $this->session->set_flashdata('flash-data', $msg);

        print_r($data);
        echo $id_keuangan;
        // redirect('adminkorwil/Kas' . $id_keuangan);
      
    }

    // anggota kas 
    public function tambahbuktikas($upload){

        $id_profile = $this->session->userdata('sess_id_profile');
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $data = array
        (
            'id_profile' => $id_profile,
            'id_cabang' => $id_cabang,
            'via'       => "transfer",
            'judul'  => $this->input->post('judul'),
            'no_rekening'  => $this->input->post('no_rekening'),
            'nama_bank'  => $this->input->post('nama_bank'),
            'tgl_bayar'   => $this->input->post('tgl_bayar'),
            'nominal'   => $this->input->post('nominal'),
            'bukti_bayar'  => $upload ['file']['file_name'],
            'deskripsi'   => $this->input->post('deskripsi')
        );
             $this->db->insert('data_keuangan', $data);
    
    
            // flashdata
            $elementHTML = '<div class="alert alert-primary"><b>Pemberitahuan</b> <br> Data Kas berhasil ditambahkan pada ' . date('d F Y H.i A') . ' Silahkan menunggu verifikasi lebih lanjut</div>';
            $this->session->set_flashdata('flash-data', $elementHTML);
    
            // redirect
            redirect('kegiatan/historypembayaran');
    }
    // korwil kas 
    public function tambahbuktikaskorwil($upload){

        $id_profile = $this->session->userdata('sess_id_profile');
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $data = array
        (
            'id_profile' => $this->input->post('full_name'),
            'id_cabang' => $id_cabang,
            'judul'  => $this->input->post('judul'),
            'nama_bank'  => $this->input->post('nama_bank'),
            'via'  => $this->input->post('via'),
            'status_verif' => "baru",
            'no_rekening'  => $this->input->post('no_rekening'),
            'tgl_bayar'   => $this->input->post('tgl_bayar'),
            'nominal'   => $this->input->post('nominal'),
            'bukti_bayar'  => $upload ['file']['file_name'],
            'deskripsi'   => $this->input->post('deskripsi')
        );
             $this->db->insert('data_keuangan', $data);
    
    
            // flashdata
            $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil ditambahkan pada ' . date('d F Y H.i A') . ' Silahkan menunggu verifikasi lebih lanjut</div>';
            $this->session->set_flashdata('pesan', $elementHTML);
    
            // redirect
            redirect('adminkorwil/kas/');
    }
        public function upload(){    
            $config['upload_path'] = './assets/images/';    
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if($this->upload->do_upload('bukti_bayar')){
                $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
                return $return;
            }else{    
                $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());     
                 return $return;   
            }  
        }
        public function getKasById($id_keuangan){
            $sql="SELECT akun_profile.*, data_keuangan.*,master_cabang.id_cabang, master_cabang.name_cabang,MONTHNAME(tgl_bayar) as bulan
            FROM data_keuangan
            JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
            JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
            WHERE data_keuangan.id_keuangan = '$id_keuangan'";
            return $this->db->query($sql)->row_array();
        }

        // keuangan kas di admin korwil $status
        public function datakeuangan( $status ){
            $id_cabang = $this->session->userdata('sess_id_cabang');
            $sql =" SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
            FROM data_keuangan
            JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
            JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
            WHERE data_keuangan.id_cabang = '$id_cabang' AND data_keuangan.status_verif = '$status'";
            return $this->db->query($sql)->result_array();
        }
        public function getalldatakeuangan(){
            $id_cabang = $this->session->userdata('sess_id_cabang');
            $sql ="  SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
            FROM data_keuangan
            JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
            JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
            WHERE data_keuangan.id_cabang = '$id_cabang'";
            return $this->db->query($sql)->result_array();
        }

        public function getkeuanganById($id){
            $sql = "SELECT data_keuangan.*
            FROM data_keuangan
            WHERE data_keuangan.id_keuangan = '$id'";
            return $this->db->query($sql)->row_array();
           }

        public function hapuskas($id){
            $this->db->where('id_keuangan',$id);
            $this->db->delete('data_keuangan');
            
             //flashdata 
             $elementHTML = '<div class="alert alert-info"><b>Pemberitahuan</b> <br> Data kas berhasil dihapus </div>';
             $this->session->set_flashdata('flash-data', $elementHTML);
 
            //redirect
            redirect('kegiatan/historypembayaran','refresh');
        }
        public function hapuskaskorwil($id){
            $this->db->where('id_keuangan',$id);
            $this->db->delete('data_keuangan');
            
             //flashdata 
             $elementHTML = '<div class="alert alert-info"><b>Pemberitahuan</b> <br> Data kas berhasil dihapus </div>';
             $this->session->set_flashdata('flash-data', $elementHTML);
 
            //redirect
            redirect('adminkorwil/kas','refresh');
        }
        public function getanggotaByCabang(){
            $id_cabang = $this->session->userdata('sess_id_cabang');
            $sql=" SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
            FROM data_keuangan
            JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
            JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
            WHERE data_keuangan.id_cabang = '$id_cabang' AND akun_profile.level = 'anggota'";
            return $this->db->query($sql)->result_array();
        }

        public function ubahkasanggota($upload){
            $data = [
                "judul"=>$this->input->post('judul',true),
                "tgl_bayar"=>$this->input->post('tgl_bayar',true),
                "nominal"=>$this->input->post('nominal',true),
                "via" => "transfer",
                "nama_bank"=>$this->input->post('nama_bank',true),
                "no_rekening"=>$this->input->post('no_rekening',true),
                "deskripsi"=>$this->input->post('deskripsi',true),
                'bukti_bayar'  => $upload ['file']['file_name']
                ];

            // query
            $this->db->where('id_keuangan', $this->input->post('id_keuangan'));
            $this->db->update('data_keuangan', $data);      
            // flash data 
    
            $msg = '<div class="alert alert-info">Data kas anggota berhasil diperbarui <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
            $this->session->set_flashdata('flash-data', $msg);
            
            redirect('kegiatan/historypembayaran');
        }

}
