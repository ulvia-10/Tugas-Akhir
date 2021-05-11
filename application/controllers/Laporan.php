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

                    // pengecekan sesi 
                    if (empty($this->session->userdata('sess_fullname'))) {

                        $this->session->set_flashdata('msg', '<div class="alert alert-warning"><b>Pemberitahuan</b> <br> <small>Maaf anda harus login terlebih dahulu</small></div>');
                        redirect('login');
                    }
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
        ->setCellValue('A2', 'No')
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
        ->setCellValue('A2', 'No')
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


function exportNeraca() {

        $id_cabang = $this->session->userdata('sess_id_cabang');
        // $bulan     = date('F'); // default bulan ini 
        $bulan     = "May"; 
        $tahun = 2021;// default bulan ini 
        // $bulan = $this->input->post('bulan');


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

        // set borders 
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];
        $spreadsheet = new Spreadsheet();
        // Set document properties
        $spreadsheet->getProperties()->setCreator('Admin Korwil - Senyum Desa')
                    ->setLastModifiedBy('Admin Korwil - Senyum Desa')
                    ->setTitle('Office 2007 XLSX Test Document')
                    ->setSubject('Office 2007 XLSX Test Document')
                    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                    ->setKeywords('office 2007 openxml php')
                    ->setCategory('Test result file');

    // pengelolaan 
    // echo '<h2>Per-bulan '.$bulan.'</h2> <hr>';
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Yayasan Senyum Desa Indonesia');
        $spreadsheet->getActiveSheet()->mergeCells('A2:G1');
        $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // set font

        // Cntoh memberikan set nilai di kolom A2 dengan nilai "Mencoba"
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'Laporan Posisi Keuangan ');
        $spreadsheet->getActiveSheet()->mergeCells('A2:G2');
        $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', 'Per 31 Desember');
        $spreadsheet->getActiveSheet()->mergeCells('A3:G3');
        $spreadsheet->getActiveSheet()->getStyle('A3') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'ASSET');
        $spreadsheet->getActiveSheet()->getStyle('A5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B6','ASSET LANCAR ');
        $spreadsheet->getActiveSheet()->mergeCells('B6:D6');
        $spreadsheet->getActiveSheet()->getStyle('B6') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('B6')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B6')->getFont()->setSize(11); // set font

        $spreadsheet->getActiveSheet()->mergeCells('B7:B8');

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C7','Kas');
        $spreadsheet->getActiveSheet()->getStyle('C7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G7', 'Rp '.number_format($jumlahAsset, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('G7')->getFont()->setSize(11); // set font
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B9','ASSET TIDAK LANCAR ');
        $spreadsheet->getActiveSheet()->getStyle('B9') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('B9')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B9')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C10','Asset Tetap');
        $spreadsheet->getActiveSheet()->getStyle('C10') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C10')->getFont()->setSize(11); // set font
        
        $spreadsheet->getActiveSheet()->mergeCells('B10:B11');

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A12','Jumlah Asset');
        $spreadsheet->getActiveSheet()->getStyle('A12') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('A12')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A12')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G12','Rp '.number_format($jumlahAsset, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G12') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('G12')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('G12')->getFont()->setSize(11); // set font
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B13','KEWAJIBAN');
        $spreadsheet->getActiveSheet()->getStyle('B13') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('B13')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B13')->getFont()->setSize(11); // set font
        
        $spreadsheet->getActiveSheet()->mergeCells('B14:B15');
        $spreadsheet->getActiveSheet()->mergeCells('B17:B19');

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C14','Utang');
        $spreadsheet->getActiveSheet()->getStyle('C14') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C14')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G14','Rp '.number_format($jumlahKewajiban, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G14') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('G14')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B16','ASSET BERSIH');
        $spreadsheet->getActiveSheet()->getStyle('B16') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('B16')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B16')->getFont()->setSize(11); // set font
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C17','Asset Bersih Terikat Temporer');
        $spreadsheet->getActiveSheet()->getStyle('C17') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C17')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C18','Asset Bersih Tidak Terikat Temporer');
        $spreadsheet->getActiveSheet()->getStyle('C18') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C18')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C19','JUMLAH ASSET BERSIH ');
        $spreadsheet->getActiveSheet()->getStyle('C19') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('C19')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('C19')->getFont()->setSize(11); // set font

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A21','JUMLAH ASSET BERSIH DAN KEWAJIBAN  ');
        $spreadsheet->getActiveSheet()->getStyle('A21') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('A21')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A21')->getFont()->setSize(11); // set font
        
        $bersih = $jumlahAsset - $jumlahKewajiban;
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G21', 'Rp'.number_format($bersih, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G21') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $spreadsheet->getActiveSheet()->getStyle('G21')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('G21')->getFont()->setSize(11); // set font

      
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Neraca Keuangan '.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Neraca Keuangan.xlsx"');
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

// function export laba rugi 
public function exportLabarugi(){
    
    $spreadsheet = new Spreadsheet();
    // Set document properties
    $spreadsheet->getProperties()->setCreator('Admin Korwil - Senyum Desa')
                ->setLastModifiedBy('Admin Korwil - Senyum Desa')
                ->setTitle('Office 2007 XLSX Test Document')
                ->setSubject('Office 2007 XLSX Test Document')
                ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Test result file');

                $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'YAYASAN SENYUM DESA INDONESIA');
                $spreadsheet->getActiveSheet()->mergeCells('A2:C2');
                $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', 'LABA RUGI');
                $spreadsheet->getActiveSheet()->mergeCells('A3:C3');
                $spreadsheet->getActiveSheet()->getStyle('A3') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'Pendapatan Sumbangan');
                $spreadsheet->getActiveSheet()->getStyle('A5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A7', 'Jumlah Pendapatan ');
                $spreadsheet->getActiveSheet()->getStyle('A7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A9', 'Beban Operasional');
                $spreadsheet->getActiveSheet()->getStyle('A9') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A9')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A9')->getFont()->setSize(11); // set font

                // result array pengeluaran 

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A17', 'Jumlah Beban');
                $spreadsheet->getActiveSheet()->getStyle('A17') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A17')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A17')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A19', 'LABA OPERASIONAL');
                $spreadsheet->getActiveSheet()->getStyle('A19') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A19')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A19')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A21', 'Pendapatan Lain-lain');
                $spreadsheet->getActiveSheet()->getStyle('A21') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A21')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A23', 'JUmlah Pendapatan Lain-Lain');
                $spreadsheet->getActiveSheet()->getStyle('A23') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A23')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A23')->getFont()->setSize(11); // set font

                
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A26', 'SALDO AKHIR ASSET BERSIH');
                $spreadsheet->getActiveSheet()->getStyle('A26') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A26')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A26')->getFont()->setSize(11); // set font



                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Laporan Laba Rugi '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Laba Rugi.xlsx"');
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

// end OF LAPORAN.PHP ^-^
