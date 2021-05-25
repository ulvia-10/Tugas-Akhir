<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

public function __construct()
{
parent::__construct();
$this->load->database();
}

// Listing kas 
public function listing($id_cabang,$bulan,$tahun)
{
    $sql ="SELECT data_keuangan.*,master_cabang.*,akun_profile.full_name
    FROM data_keuangan
    JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
    JOIN akun_profile ON akun_profile.id_profile = data_keuangan.id_profile
    WHERE data_keuangan.id_cabang = '$id_cabang' AND MONTHNAME(tgl_bayar)= '$bulan' AND YEAR(tgl_bayar)='$tahun' AND data_keuangan.status_verif ='baru'
    ORDER BY data_keuangan.id_keuangan ASC";

    return $this->db->query($sql)->result();
}
public function listdonasinon($id_cabang,$bulan,$tahun ){
    $sql=" SELECT data_donasi.*,master_cabang.*, data_event.*
    FROM data_donasi
    JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
    JOIN data_event ON data_event.id_event = data_donasi.id_event
    WHERE data_donasi.id_cabang = '$id_cabang' AND MONTHNAME(tgl_donasi)= '$bulan' 
    AND YEAR(tgl_donasi) = '$tahun' AND data_donasi.tipe = 'non anggota' 
    AND data_donasi.status_verif ='baru' ORDER BY data_donasi.id_donasi ASC";
  
    return $this->db->query($sql)->result();
}
// listing donasi 
public function listingdonasi($id_cabang, $bulan, $tahun)
{
    $sql=" SELECT data_donasi.*,master_cabang.*,akun_profile.full_name, data_event.*
    FROM data_donasi
    JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang
    JOIN akun_profile ON akun_profile.id_profile = data_donasi.id_profile
    JOIN data_event ON data_event.id_event = data_donasi.id_event
    WHERE data_donasi.id_cabang = '$id_cabang' AND MONTHNAME(tgl_donasi)= '$bulan' 
    AND YEAR(tgl_donasi) = '$tahun'
    AND data_donasi.tipe = 'anggota' 
    AND data_donasi.status_verif ='baru'
    ORDER BY data_donasi.id_donasi ASC";
    return $this->db->query($sql)->result();
}
public function jumlahdonasi($id_cabang,$bulan,$tahun)
{
    $sql="SELECT * FROM data_donasi
    WHERE data_donasi.id_cabang = '$id_cabang' 
    AND MONTHNAME(tgl_donasi)= '$bulan' 
    AND YEAR(tgl_donasi)='$tahun'
    AND data_donasi.status_verif='baru'";
    return $this->db->query($sql)->result();
}
public function jumlahdonasitahunan($id_cabang,$tahun)
{
    $sql="SELECT * FROM data_donasi
    WHERE data_donasi.id_cabang = '$id_cabang' AND YEAR(tgl_donasi)='$tahun'";
    return $this->db->query($sql)->result();
}

// jumlah donasi bulanan 


function assetKas($tahun, $id_cabang, $jenis) {

    $sql = 'SELECT * FROM `data_keuangan` 
            WHERE YEAR(tgl_bayar) = "'.$tahun.'" AND  id_cabang = '.$id_cabang.' AND jenis_keuangan = "'.$jenis.'"';
    return $this->db->query($sql);
}
function kasbulanan($bulan, $id_cabang, $jenis, $tahun){

    $sqlku = "SELECT * FROM `data_keuangan` WHERE 
            MONTHNAME(tgl_bayar) = '$bulan' AND 
            id_cabang = '$id_cabang' AND 
            jenis_keuangan = '$jenis' AND 
            YEAR(tgl_bayar) = '$tahun'";

    $query = $this->db->query( $sqlku );


    // echo $bulan.' '.$id_cabang.' '.$jenis.' '.$tahun;
    // echo " | hasil ". $query->num_rows();

    // echo '<hr>';

    return $query;
}

function dataassetKas($tahun, $id_cabang, $jenis) {

    $sql = 'SELECT * FROM `data_keuangan` 
            WHERE YEAR(tgl_bayar) = "'.$tahun.'" AND  id_cabang = '.$id_cabang.' AND jenis_keuangan = "'.$jenis.'"';
    return $this->db->query($sql)->result_array();
}
// asset donasi 
function assetDonasi($tahun, $id_cabang){
    $sql = "SELECT * FROM `data_donasi` 
    WHERE YEAR(tgl_donasi) = '.$tahun.'AND id_cabang = '.$id_cabang.'";
    return $this->db->query($sql);
}

function dataKasKeluar($bulan, $id_cabang){
    $sql= "SELECT * FROM data_keuangan 
    WHERE data_keuangan.jenis_keuangan = 'keluar' AND data_keuangan.id_cabang = '$id_cabang' AND MONTHNAME(tgl_bayar) = '.$bulan.'";
    return $this->db->query($sql)->result();
}

function Kas($tahun){
    $sql = "SELECT data_keuangan.* , master_cabang.name_cabang, master_cabang.status_cabang, SUM(data_keuangan.nominal) AS jumlah
    FROM data_keuangan 
    JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
    WHERE YEAR(tgl_bayar) = '$tahun' AND master_cabang.status_cabang = 'active'
    GROUP BY master_cabang.name_cabang";

    return $this->db->query($sql)->result();
}
function totalKas($tahun, $jenis){
    $sql="SELECT data_keuangan.* , master_cabang.name_cabang, master_cabang.status_cabang
    FROM data_keuangan 
    JOIN master_cabang ON master_cabang.id_cabang = data_keuangan.id_cabang
    WHERE YEAR(tgl_bayar) = '$tahun' AND master_cabang.status_cabang = 'active' AND data_keuangan.jenis_keuangan = '$jenis'
    GROUP BY master_cabang.name_cabang"; 
    return $this->db->query($sql);
}

// function KasKeluar(){

// }
function Donasi($tahun){
    $sql ="SELECT data_donasi.*, master_cabang.name_cabang, master_cabang.status_cabang,  SUM(data_donasi.jml_donasi) as jumlah , data_event.*
    FROM data_donasi 
    JOIN master_cabang ON master_cabang.id_cabang = data_donasi.id_cabang 
    JOIN data_event  on data_event.id_event = data_donasi.id_event
    WHERE YEAR(tgl_donasi) = '$tahun' AND master_cabang.status_cabang = 'active'
    GROUP BY master_cabang.name_cabang, data_event.id_event";
    return $this->db->query($sql);
}

function pilihBulan(){
    $sql="SELECT YEAR(tgl_donasi) as tahun, MONTHNAME(tgl_donasi) AS bulan
    FROM data_donasi";
    return $this->db->query($sql);
}

function pilihBulanKas(){
    $sql="SELECT YEAR(tgl_bayar) as tahun, MONTHNAME(tgl_bayar) AS bulan
    FROM data_keuangan";
    return $this->db->query($sql);
}

}
