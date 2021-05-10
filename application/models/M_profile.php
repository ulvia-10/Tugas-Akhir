<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
  function updateprofileanggota(){
    $data = [
        'photo'  => $upload ['file']['file_name']
        ];
    // query
    $this->db->where('id_profile', $this->input->post('id_profile'));
    $this->db->update('akun_profile', $data);      
    // flash data 
    $msg = '<div class="alert alert-info">Data berhasil di dirubah <br><small>Pada tanggal ' . date('d F Y H.i A') . '</small></div>';
    $this->session->set_flashdata('pesan', $msg);
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
}
