<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

public function __construct()
{
parent::__construct();
$this->load->database();
}

// Listing kas 
public function listing()
{
// $this->db->select('*');
// $this->db->from('data_keuangan');
// $this->db->order_by('id_keuangan', 'ASC');
// $query = $this->db->get();
// return $query->result(); 

// opsi query biasa 
$id_cabang = $this->session->userdata('sess_id_cabang');
$sql ="SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
FROM data_keuangan
JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
WHERE data_keuangan.id_cabang = '$id_cabang'
ORDER BY data_keuangan.id_keuangan ASC";
return $this->db->query($sql)->result();
}
// listing donasi 
public function listingdonasi()
{
// $this->db->select('*');
// $this->db->from('data_donasi');
// $this->db->order_by('id_donasi', 'ASC');
// $query = $this->db->get();
// return $query->result(); 
// query result 
$id_cabang = $this->session->userdata('sess_id_cabang');
$sql="SELECT data_donasi.*,master_cabang.*,akun_profile.full_name
FROM data_donasi
JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
WHERE data_donasi.id_cabang = '$id_cabang'
ORDER BY data_donasi.id_donasi ASC";
return $this->db->query($sql)->result();
}

}

/* End of file Provinsi_model.php */
/* Location: ./application/models/Provinsi_model.php */