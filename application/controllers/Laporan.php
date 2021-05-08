<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Load library phpspreadsheet
require('./excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Laporan extends CI_Controller {

// Load model
public function __construct()
{
    parent::__construct();
    $this->load->model('M_laporan');
    $this->load->model('M_login');
}

// Main page
public function index()
{
    $provinsi = $this->M_laporan->listing();
    $data = array( 'title' => 'Laporan Kas Masuk - Senyum Desa',
    'kas' => $provinsi
);
    $this->load->view('keuangan/V_laporan_kas', $data, FALSE);
}
// donasi page 
    public function indexdonasi()
    {
        $provinsi = $this->M_laporan->listingdonasi();
        $data = array( 'title' => 'Laporan Donasi Masuk - Senyum Desa',
        'donasi' => $provinsi
    );
        $this->load->view('donasi/V_laporan_donasi', $data, FALSE);
    }
    public function donasinon(){
        $provinsi = $this->M_laporan->listingdonasinon();
        $data = array( 'title' => 'Laporan Donasi Non  - Senyum Desa',
        'donasinon' => $provinsi
    );
        $this->load->view('donasi/V_laporan_donasi', $data, FALSE);
    }
   public function laporanneraca(){
    $data = array(

        'namafolder'    => "keuangan",
        'namafileview'    => "V_laporan_neraca",
        'title'         => "Donasi Anggota | Senyum Desa",

    );
    $this->load->view('templating/korwil/Template_korwil', $data);
}
    //laporan donasi 
    public function laporandonasi(){
        $data=array(
            'namafolder'    => "donasi",
            'namafileview'    => "V_filter_donasi",
            'title'         => "Filter Donasi | Senyum Desa",
        );
    // load templating 
    $this->load->view('templating/korwil/Template_korwil', $data);
}
    // laporan laba rugi 
    public function laporanlabarugi(){
        $data = array(

            'namafolder'    => "keuangan",
            'namafileview'    => "V_laporan_labarugi",
            'title'         => "Donasi Anggota | Senyum Desa",
        );
        // template korwil load 
        $this->load->view('templating/korwil/Template_korwil', $data);
    }
   
// Export ke excel
public function export()
{
        $provinsi = $this->M_laporan->listing();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Admin Korwil - Senyum Desa')
        ->setLastModifiedBy('Admin Korwil - Senyum Desa')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'No')
        ->setCellValue('B1', 'Judul')
        ->setCellValue('C1', 'Tanggal Kas Masuk')
        ->setCellValue('D1', 'No Rekening')
        ->setCellValue('E1', 'Nominal')
        ->setCellValue('F1', 'Status')
        ->setCellValue('G1', 'Deskripsi')
        ;

        // Miscellaneous glyphs, UTF-8
        $no = 1;
        $i=2; 
        foreach($provinsi as $provinsi) {
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'.$i, $no++)
        ->setCellValue('B'.$i, $provinsi->judul)
        ->setCellValue('C'.$i, $provinsi->tanggal_laporan)
        ->setCellValue('D'.$i, $provinsi->no_rekening)
        ->setCellValue('E'.$i, $provinsi->nominal)
        ->setCellValue('F'.$i, $provinsi->status)
        ->setCellValue('G'.$i, $provinsi->deskripsi);
        $i++;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kas Masuk '.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Kas Masuk.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
}

// export donasi
// Export ke excel
public function exportdonasi()
{
    $provinsi = $this->M_laporan->listingdonasi();
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Set document properties
    $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
    ->setLastModifiedBy('Andoyo - Java Web Medi')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

    // Add some data
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'No')
    ->setCellValue('B1', 'Tanggal Donasi')
    ->setCellValue('C1', 'Nama Donatur')
    ->setCellValue('D1', 'No Rekening')
    ->setCellValue('E1', 'Nominal Donasi')
    ->setCellValue('F1', 'Email Donatur')
    ->setCellValue('G1', 'Telp Donatur')
    ->setCellValue('H1', 'Status')
    ;

    // Miscellaneous glyphs, UTF-8
    $no = 1;
    $i=2; 
    foreach($provinsi as $provinsi) {
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $no++)
    ->setCellValue('B'.$i, $provinsi->tgl_donasi)
    ->setCellValue('C'.$i, $provinsi->nama_donatur)
    ->setCellValue('D'.$i, $provinsi->no_rekening)
    ->setCellValue('E'.$i, $provinsi->jml_donasi)
    ->setCellValue('F'.$i, $provinsi->email_donatur)
    ->setCellValue('G'.$i, $provinsi->telp_donatur)
    ->setCellValue('H'.$i, $provinsi->status);
    $i++;
    }
    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Laporan Donasi '.date('d-m-Y H'));

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Donasi.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: '. gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
    }

    function exportdatadonasinon(){
        $provinsi = $this->M_laporan->listingdonasinonanggota();
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Set document properties
    $spreadsheet->getProperties()->setCreator('Andoyo - Java Web Media')
    ->setLastModifiedBy('Andoyo - Java Web Medi')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');

    // Add some data
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'No')
    ->setCellValue('B1', 'Tanggal Donasi')
    ->setCellValue('C1', 'Nama Donatur')
    ->setCellValue('D1', 'No Rekening')
    ->setCellValue('E1', 'Nominal Donasi')
    ->setCellValue('F1', 'Email Donatur')
    ->setCellValue('G1', 'Telp Donatur')
    ->setCellValue('H1', 'Bayar di Cabang')
    ->setCellValue('I1', 'Status')
    ;

    // Miscellaneous glyphs, UTF-8
    $no = 1;
    $i=2; 
    foreach($provinsi as $provinsi) {
    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A'.$i, $no++)
    ->setCellValue('B'.$i, $provinsi->tgl_donasi)
    ->setCellValue('C'.$i, $provinsi->nama_donatur)
    ->setCellValue('D'.$i, $provinsi->no_rekening)
    ->setCellValue('E'.$i, $provinsi->jml_donasi)
    ->setCellValue('F'.$i, $provinsi->email_donatur)
    ->setCellValue('G'.$i, $provinsi->telp_donatur)
    ->setCellValue('H'.$i, $provinsi->name_cabang)
    ->setCellValue('I'.$i, $provinsi->status);
    $i++;
    }
    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Laporan Donasi '.date('d-m-Y H'));

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Laporan Donasi.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: '. gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;
    }


function exportNeraca() {
            $id_cabang = $this->session->userdata('sess_id_cabang');
            // $bulan     = date('F'); // default bulan ini 
            $bulan     = "January"; // default bulan ini 
            $bulan = $this->input->post('bulan');


            $ambilAssetMasuk = $this->M_laporan->assetKas($bulan, $id_cabang, "masuk");
            $ambilAssetKeluar = $this->M_laporan->assetKas($bulan, $id_cabang, "keluar");

            $jumlahAsset = 0;
            $jumlahKewajiban = 0;


            if ( $ambilAssetMasuk->num_rows() > 0 ) {

                foreach ( $ambilAssetMasuk->result_array() AS $asset ) {

                    $jumlahAsset = $jumlahAsset + $asset['nominal'];
                }
                
            }


            if ( $ambilAssetKeluar->num_rows() > 0 ) {

                foreach ( $ambilAssetKeluar->result_array() AS $kewajiban ) {

                    $jumlahKewajiban = $jumlahKewajiban + $kewajiban['nominal'];
                }
            }




            // pengelolaan 
            echo '<h2>Per-bulan '.$bulan.'</h2> <hr>';



            echo '<b>Asset</b> <br><br>';

            echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';

            echo '&emsp;&emsp;&emsp; Kas = '.$jumlahAsset.'<br><br>';


            echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';

            echo '&emsp;&emsp;&emsp; Asset Tetap = 0 <br><br>';
            echo '<b>Jumlah Asset</b> Rp '.number_format($jumlahAsset, 2).'<br><br>';


            // kewajiban
            echo '&emsp;&emsp;<b>Kewajiban</b> <br>';
            echo '&emsp;&emsp;&emsp; Utang = '.$jumlahKewajiban.'<br><br>';


            $bersih = $jumlahAsset - $jumlahKewajiban;
            echo '<b>Jumlah Asset Bersih dan Kewajiban</b>&emsp;Rp '.number_format( $bersih, 2 ).'<br>';


    }
    // laporan laba rugi 
   function exportlabarugi(){
           // Create new Spreadsheet object
     $spreadsheet = new Spreadsheet();
         // Set document properties
    $spreadsheet->getProperties()->setCreator('Ulvia Yulianti - Senyum Desa')
    ->setLastModifiedBy('Ulvia Yulianti - Senyum Desa')
    ->setTitle('Office 2007 XLSX Test Document')
    ->setSubject('Office 2007 XLSX Test Document')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    ->setKeywords('office 2007 openxml php')
    ->setCategory('Test result file');
    $id_cabang = $this->session->userdata('sess_id_cabang');
 
    $bulan     = "May"; // default bulan ini 
    // $bulan = $this->input->post('bulan');

    $ambilDonasiMasuk = $this->M_laporan->assetDonasi($bulan, $id_cabang, "masuk");
    $ambilDonasiKeluar = $this->M_laporan->assetDonasi($bulan, $id_cabang, "keluar");

    $jumlahDonasi = 0;
    $jumlahPengeluaran = 0;

    // donasi masuk 
    if ( $ambilDonasiMasuk->num_rows() > 0 ) {

        foreach ( $ambilDonasiMasuk->result_array() AS $donasi ) {

            $jumlahDonasi = $jumlahDonasi + $donasi['jml_donasi'];
        }
    }
    
    // donasi keluar
    if ( $ambilDonasiKeluar->num_rows() > 0 ) {

        foreach ( $ambilDonasiKeluar->result_array() AS $keluar ) {

            $jumlahPengeluaran = $jumlahPengeluaran + $keluar['jml_donasi'];
        }
    }

 
    echo '&emsp;&emsp;<b>YAYASAN SOSIAL SENYUM DESA INDONESIA </b> <br>';
    echo '&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>LABA RUGI</b> <br>';
    // laporan laba rugi 
    echo '<h2>Per-bulan '.$bulan.'</h2> <hr>';
    echo '&emsp;&emsp;&emsp; Pendapatan Sumbangan = '.$jumlahDonasi.'<br><br>';
    echo '&emsp;&emsp;&emsp; Jumlah Pendapatan = '.$jumlahDonasi.'<br><br>';
    echo '&emsp;&emsp;&emsp; <b> Beban Operasional </b> <br> <br>';
    echo '&emsp;&emsp;&emsp; <b> Jumlah Beban </b> = '.$jumlahPengeluaran.'<br><br>';
    $total = $jumlahDonasi - $jumlahPengeluaran;
    echo '&emsp;&emsp;&emsp; <b> Laba Operasional </b> = '.$total.'<br><br>';
    echo '&emsp;&emsp;&emsp; <b> Saldo Akhir Bersih </b> = '.$total.'<br><br>';



   // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Laba Rugi'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Donasi.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: '. gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/Laporan.php */