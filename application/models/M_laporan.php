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

    $id_cabang = $this->session->userdata('sess_id_cabang');
    $sql="SELECT data_donasi.*,master_cabang.*,akun_profile.full_name
            FROM data_donasi
            JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
            JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
            WHERE data_donasi.id_cabang = '$id_cabang' AND data_donasi.tipe = 'anggota'
            ORDER BY data_donasi.id_donasi ASC";
            return $this->db->query($sql)->result();
}
// non donasi 
public function listingdonasinonanggota(){
    $id_cabang = $this->session->userdata('sess_id_cabang');
    $sql="SELECT data_donasi.*,master_cabang.*,akun_profile.full_name
    FROM data_donasi
    JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
    JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
    WHERE data_donasi.id_cabang = '$id_cabang' AND data_donasi.tipe = 'non anggota'
    ORDER BY data_donasi.id_donasi ASC";
    return $this->db->query($sql)->result();
}
// asset kas
function assetKas($bulan, $id_cabang, $jenis) {

    $sql = 'SELECT * FROM `data_keuangan` 
            WHERE MONTHNAME(tgl_bayar) = "'.$bulan.'" AND 
            id_cabang = '.$id_cabang.' AND jenis_keuangan = "'.$jenis.'"';
    return $this->db->query($sql)->result();

}
// asset donasi 
function assetDonasi($bulan, $id_cabang, $jenis){
    $sql = 'SELECT * FROM `data_donasi` 
    WHERE MONTHNAME(tgl_donasi) = "'.$bulan.'" AND 
    id_cabang = '.$id_cabang.' AND jenis = "'.$jenis.'"';
    return $this->db->query($sql)->result();
}
}

/* End of file Provinsi_model.php */
/* Location: ./application/models/Provinsi_model.php */
