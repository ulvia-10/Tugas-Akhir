<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
  
    function updateprofileanggota($upload){

          $id_profile = $this->input->post('id_profile');

          // updae data di akun_profile 
            $dataProfile = array(
              'photo'  => $upload ['file']['file_name']
            );
            $this->db->insert('akun_profile', $dataProfile);

            //  update data di informasi_profile 
            $dataInformasiProfile = [
           
              'telp'          => $this->input->post('telp'),
              'address'       => $this->input->post('address'),
              'email'         => $this->input->post('email'),
              
          ];
            // query
            $this->db->where('id_profile',$id_profile);
            $this->db->update('data_informasiprofile', $dataInformasiProfile);    

            // flash data 
            $msg = '<div class="alert alert-info">Data berhasil di dirubah <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
            $this->session->set_flashdata('pesan', $msg);
            // print_r($data);
            // redirect
            redirect('kegiatan/viewprofile');
  }
  

  public function upload(){    
        $config['upload_path'] = './assets/images/';    
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if($this->upload->do_upload('photo')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');      
            return $return;
        }else{    
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());     
            return $return;   
        }  
}

public function dataprofile(){
  // pasang session 
  $id_profile = $this->session->userdata('sess_id_profile');
  // query
  $sql="SELECT akun_profile.*, data_informasiprofile.*, master_cabang.id_cabang, master_cabang.name_cabang
  FROM akun_profile 
  JOIN data_informasiprofile ON akun_profile.id_profile = data_informasiprofile.id_profile 
  JOIN master_cabang ON master_cabang.id_cabang = akun_profile.id_cabang
  WHERE akun_profile.id_profile = '$id_profile'";
     $query = $this->db->query($sql)->row_array();
     return $query;
}
}
