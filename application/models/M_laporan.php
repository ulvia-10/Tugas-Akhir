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
    $id_cabang = $this->session->userdata('sess_id_cabang');
    $bulan = "May";

    $sql ="SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
    FROM data_keuangan
    JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
    JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
    WHERE data_keuangan.id_cabang = '$id_cabang' AND MONTHNAME(tgl_bayar)= '$bulan' ORDER BY data_keuangan.id_keuangan ASC";

    return $this->db->query($sql)->result();
}
// listing donasi 
public function listingdonasi()
{
    $id_cabang = $this->session->userdata('sess_id_cabang');
    $bulan = "May";

    $sql="SELECT data_donasi.*,master_cabang.*,akun_profile.full_name
    FROM data_donasi
    JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
    JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
    WHERE data_donasi.id_cabang = '$id_cabang' AND MONTHNAME(tgl_donasi)= '$bulan' ORDER BY data_donasi.id_donasi ASC";

    return $this->db->query($sql)->result();
}
public function jumlahdonasi()
{
    $id_cabang = $this->session->userdata('sess_id_cabang');
    $bulan = "May";
    $sql="SELECT * FROM data_donasi
    WHERE data_donasi.id_cabang = '$id_cabang' AND MONTHNAME(tgl_donasi)= '$bulan'";
    // 
    return $this->db->query($sql);
}

function assetKas($bulan, $id_cabang, $jenis) {

    $sql = 'SELECT * FROM `data_keuangan` 
            WHERE MONTHNAME(tgl_bayar) = "'.$bulan.'" AND  id_cabang = '.$id_cabang.' AND jenis_keuangan = "'.$jenis.'"';
    return $this->db->query($sql);
}

function dataassetKas($bulan, $id_cabang, $jenis) {

    $sql = 'SELECT * FROM `data_keuangan` 
            WHERE MONTHNAME(tgl_bayar) = "'.$bulan.'" AND  id_cabang = '.$id_cabang.' AND jenis_keuangan = "'.$jenis.'"';
    return $this->db->query($sql)->result_array();
}
// asset donasi 
function assetDonasi($bulan, $id_cabang){
    $sql = "SELECT * FROM `data_donasi` 
    WHERE MONTHNAME(tgl_donasi) = '.$bulan.'AND id_cabang = '.$id_cabang.'";
    return $this->db->query($sql);
}

function dataKasKeluar($bulan, $id_cabang){
    $sql="SELECT * FROM data_keuangan 
    WHERE data_keuangan.jenis_keuangan = 'keluar' AND data_keuangan.id_cabang = '$id_cabang' AND MONTHNAME(tgl_bayar) = '.$bulan.'";
    return $this->db->query($sql)->result();
}

// function labarugi($bulan, $id_cabang, $jenis){
//     // session id_cabang 
//     $id_cabang = $this->session->userdata('sess_id_cabang');

//     $sql="SELECT data_donasi.*,master_cabang.*
//     FROM data_donasi 
//     JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang 
//     WHERE master_cabang.id_cabang = '$id_cabang' AND MONTHNAME(tgl_donasi) = '.$bulan.'";
//     return $this->db->query($sql);
// }
}
