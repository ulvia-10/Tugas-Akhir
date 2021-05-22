<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        // load model
        $this->load->model('M_login');
        $this->load->model('M_dataakun');
        $this->load->model('M_rekruitment');
        $this->load->model('M_profile');

            // pengecekan sesi 
            if (empty($this->session->userdata('sess_fullname'))) {

                $this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
                redirect('login');
            }
        }

    // main view tampilan
    function index()
    {

        $data = array(
            'namafolder'    => "profile",
            'namafileview'  => "V_editProfile",
            'title'         => "Profile | Senyum Desa"
        );
        $data['profile']= $this->M_rekruitment->getDataProfile();
        $this->load->view('templating/template_dashboardadmin', $data);
        // templating
     
    }
    // DI KORWIL YA INI 
    // HALAMAN PROFILENYA 
    public function profilkorwil(){
        
        $data = array(
            'namafolder'    => "korwil",
            'namafileview'  => "V_profile_korwil",
            'title'         => "Profile Admin Korwil | Senyum Desa"
        );
        $data['profile']= $this->M_profile->dataprofile();
       
        // echo'<pre>';
        // var_dump($data);
        // echo'<pre>';
   
        $this->load->view('templating/korwil/template_korwil', $data);
        // templating
    }
    // HALAMAN EDIT PROFILE 
    public function editprofilkorwil(){
        
        $data = array(
            'namafolder'    => "korwil",
            'namafileview'  => "V_edit_profile_korwil",
            'title'         => "Profile Admin Korwil | Senyum Desa"
        );

        $data['profile']= $this->M_rekruitment->getDataProfile();
         
        
        $this->load->view('templating/korwil/template_korwil', $data);
        // templating
    }

    public function prosesedit($id_profile)
    {
        $data['title'] = 'Edit | Donasi';

        // $where = array('id_profile' => $id_profile);
        $data['profile']= $this->M_dataakun->getProfileByID($id);
        // $data['akun_profile'] = $this->M_profile->edit_data($where, 'akun_profile')->result();
        $this->load->view('templating/dashboardadmin/Template_dashboardadmin2');
        $this->load->view('Donasi/V_editprofile', $data);
        $this->load->view('templating/dashboardadmin/template_footer');
    }
  

    function update()
    {

        $id_profile = $this->input->post('id_profile');
        $username = $this->input->post('username');
        $full_name = $this->input->post('full_name');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $asal = $this->input->post('asal');
        $gender = $this->input->post('gender');
        $reason_join = $this->input->post('reason_join');

        $data = array(
            'username' => $username,
            'full_name' => $full_name,
            'tempat_lahir'   => $tempat_lahir,
            'asal'   => $asal,
            'reason_join'   => $reason_join,

        );

        $where = array(
            'id_profile' => $id_profile
        );

        // flashdata
        $elementHTML = '<div class="alert alert-success"><b>Pemberitahuan</b> <br> Data Donasi berhasil diupdate pada ' . date('d F Y H.i A') . '</div>';
        $this->session->set_flashdata('pesan', $elementHTML);

        $this->M_Profile->update_data($where, $data, 'akun_profile');
        redirect('Profile');
    }
    public function editprofileanggota(){
        
        // helper 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // form validation 
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('address','address','required');
        $this->form_validation->set_rules('telp','telp','required');
        // redirect 
        if ($this->form_validation->run() == FALSE){
            echo validation_errors();
        }
        else{
            $upload = $this->M_profile->upload();
            if($upload ['result'] == 'success'){
                $this->M_profile->updateprofileanggota($upload);
                redirect('kegiatan/viewprofile','refresh');
            }else{
                echo $upload['error'];
            }
            redirect('kegiatan/viewprofile','refresh');  
    }
}

    // proses 
    public function editprofilekorwil(){
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        // form validation 
        $this->form_validation->set_rules('email','email','required');
        $this->form_validation->set_rules('address','address','required');
        $this->form_validation->set_rules('telp','telp','required');
        // redirect 
        if ($this->form_validation->run() == FALSE){
            echo validation_errors();
        }
        else{
            $upload = $this->M_profile->upload();
            if($upload ['result'] == 'success'){
                $this->M_profile->updateprofilekorwil($upload);
                // print_r($upload);
                redirect('profile/profilkorwil','refresh');
            }else{
                echo $upload['error'];
            }
            redirect('profile/profilkorwil','refresh');  
    }
}

// PROSES EDIT PASSWORD
public function editpassword(){
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    // form validation 
    $this->form_validation->set_rules('username','username','required');
    $this->form_validation->set_rules('password','password','required');
             // redirect 
             if ($this->form_validation->run() == FALSE){
                echo validation_errors();
              }
              else{
                //run ke model 
                $this->M_profile->editpasswordkorwil();
        
                // echo "<pre>";
                // echo var_dump($data);
                // echo "</pre>";
                //redirect 
              redirect('profile/profilkorwil','refresh');
          
            // print_r($upload);
            // redirect('profile/profilkorwil','refresh');
}
}
}
    


