<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    // Load library phpspreadsheet
    require('./excel/vendor/autoload.php');

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Style\Border;
    use PhpOffice\PhpSpreadsheet\Style\Color;

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
        $data = array(

			'namafolder'	=> "keuangan",
			'namafileview'	=> "V_laporan_kas",
			'title'         => "Kas | Senyum Desa"
		);
		//disesuaikan sama dengan nama view$ 
        $data['tahun'] = range(date('Y'), 2020);
        $data['pilih'] = $this->M_laporan->pilihBulanKas();
        // load template 
		$this->load->view('templating/korwil/template_korwil', $data);
            
    }
// // donasi page 
    public function indexdonasi()
    {       
        $data = array(
			'namafolder'	=> "donasi",
			'namafileview'	=> "V_filter_donasi",
			'title'         => "Donasi | Senyum Desa"
		);
		//disesuaikan sama dengan nama view$  
        $data['tahun'] = range(date('Y'), 2020);
        $data['pilih'] = $this->M_laporan->pilihBulan();
		$this->load->view('templating/korwil/template_korwil', $data);
    }

    public function indexneraca(){
            // isi variable 
            $id_cabang = $this->session->userdata('sess_id_cabang');
            // load $data 
            $data = array(

                'namafolder'	=> "keuangan",
                'namafileview'	=> "V_laporan_neraca",
                'title'         => "Cetak Laporan Neraca | Senyum Desa"
            );
            $data['tahun'] = range(date('Y'), 2020);
            $data['pilih'] = $this->M_laporan->pilihBulan();
            $this->load->view('templating/korwil/template_korwil', $data);
    }
    // index laba rugi 
    public function indexlabarugi(){
        // isi variable 
        $id_cabang = $this->session->userdata('sess_id_cabang');
        // load $data 
        $data = array(

            'namafolder'	=> "keuangan",
            'namafileview'	=> "V_laporan_labarugi",
            'title'         => "Cetak Laporan Laba Rugi | Senyum Desa"
        );
        $data['tahun'] = range(date('Y'), 2020);
        $data['pilih'] = $this->M_laporan->pilihBulan();
        $this->load->view('templating/korwil/template_korwil', $data);
}

 public function donasitahunan(){
      // load $data 
      $data = array(

        'namafolder'	=> "keuangan",
        'namafileview'	=> "V_laporan_donasitahunan",
        'title'         => "Cetak Laporan Donasi | Senyum Desa"
    );

    $data['tahun'] = range(date('Y'), 2020);
    $this->load->view('templating/template_dashboardadmin', $data);
 }


// Export ke excel laporan kas 
// di korwil
public function export()
{       
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        
        $provinsi = $this->M_laporan->listing($id_cabang,$bulan,$tahun);

        // menampilkan jumlah 
        $ambilAssetMasuk = $this->M_laporan->kasbulanan($bulan, $id_cabang, "masuk", $tahun);
        $ambilAssetKeluar = $this->M_laporan->kasbulanan($bulan, $id_cabang, "keluar", $tahun);
        // echo '<pre>';
        // var_dump($ambilAssetMasuk, $ambilAssetKeluar);
        // echo '<pre>';

        // inisialisasi 
        $jumlahAsset = 0;
        $jumlahKewajiban = 0;

        // pengecekan apakah ada? jika iya keluar nominalnya 
        if ( $ambilAssetMasuk->num_rows() > 0 ) {

            foreach ( $ambilAssetMasuk->result_array() AS $asset ) {

                $jumlahAsset = $jumlahAsset + $asset['nominal'];
            }

        }


     

        // pengecekan asset keluar dari kas  
        if ( $ambilAssetKeluar->num_rows() > 0 ) {

            foreach ( $ambilAssetKeluar->result_array() AS $kewajiban ) {

                $jumlahKewajiban = $jumlahKewajiban + $kewajiban['nominal'];
            }
        }


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

        // style outline -> change outline 
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];

        // style all borders -> change allBorders 
        $styleBorders  = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];

        // title
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B1', 'YAYASAN SOSIAL SENYUM DESA ');
        $spreadsheet->getActiveSheet()->getStyle('B1')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->mergeCells('B1:G1');//merge cells
        $spreadsheet->getActiveSheet()->getStyle('B1') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B2', 'Laporan Kas Bulan '.$bulan.' Tahun '.$tahun.' ');
        $spreadsheet->getActiveSheet()->getStyle('B2')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->mergeCells('B2:G2');//merge cells
        $spreadsheet->getActiveSheet()->getStyle('B2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        //nomor
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'No');
        $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleBorders);

        //judul
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B4', 'Judul');
        $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B4')->applyFromArray($styleBorders);
  
        // tgl kas masuk
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('C4', 'Tanggal Kas Masuk');
        $spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('C4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C4')->applyFromArray($styleBorders);
  
        // no rekening
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D4', 'Nama Bank');
        $spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('D4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D4')->applyFromArray($styleBorders);
  
        // nominal
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E4', 'Nominal');
        $spreadsheet->getActiveSheet()->getStyle('E4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('E4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('E4')->applyFromArray($styleBorders);
  
        // status
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F4', 'Status');
        $spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('F4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F4')->applyFromArray($styleBorders);
        
        // jenis keuangan 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G4', 'Tipe');
        $spreadsheet->getActiveSheet()->getStyle('G4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('G4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G4')->applyFromArray($styleBorders);
  
        // deskripsi
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('H4', 'Deskripsi');
        $spreadsheet->getActiveSheet()->getStyle('H4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('H4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H4')->applyFromArray($styleBorders);

         // total masuk 
        // tulisan 
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('J4', 'Total Kas Masuk : ');
        $spreadsheet->getActiveSheet()->getStyle('J4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('J4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('J4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        // jumlah 
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('K4', 'Rp.'.number_format($jumlahAsset, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('K4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('K4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('K4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);

        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);

        
        // tulisan total KELUAR 
        // tulisan 
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('J5', 'Total Kas Keluar : ');
        $spreadsheet->getActiveSheet()->getStyle('J5')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('J5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('J5')->applyFromArray($styleBorders);
        

        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('K5', 'Rp.'.number_format($jumlahKewajiban, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('K5')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('K5')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('K5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
       
        //total kas bulan (input) 
        // kas masuk - kas keluar 
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('J6', 'Total Kas Saat ini : ');
        $spreadsheet->getActiveSheet()->getStyle('J6')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('J6')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('J6') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        
        // hitung 
        $bersih = $jumlahAsset - $jumlahKewajiban;
        $spreadsheet->setActiveSheetIndex(0) ->setCellValue('K6', 'Rp.'.number_format($bersih, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('K6')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('K6') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setVisible(true);
        $spreadsheet->getActiveSheet()->getStyle('K6')->applyFromArray($styleArray);
        ;

        // Miscellaneous glyphs, UTF-8
        $no = 1;
        $i=5; 

        foreach($provinsi as $provinsi) {
        // nomor
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i, $no++);
        $spreadsheet->getActiveSheet()->getStyle('A'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
        
        //judul
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$i, $provinsi->judul);
        $spreadsheet->getActiveSheet()->getStyle('B'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);

        //tanggal laporan
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$i, date('d-m-Y',strtotime($provinsi->tanggal_laporan)));
        $spreadsheet->getActiveSheet()->getStyle('C'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        
        //no rekening
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$i, $provinsi->nama_bank);
        $spreadsheet->getActiveSheet()->getStyle('D'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
    
        //nominal
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$i,    'Rp.'.number_format($provinsi->nominal, 2).'' );
        $spreadsheet->getActiveSheet()->getStyle('E'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        
        //status
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$i, $provinsi->status);
        $spreadsheet->getActiveSheet()->getStyle('F'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        
        // jenis masuk/ keluar 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$i, $provinsi->jenis_keuangan);
        $spreadsheet->getActiveSheet()->getStyle('G'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        //deskripsi
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('H'.$i, $provinsi->deskripsi);
        $spreadsheet->getActiveSheet()->getStyle('H'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('H'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $i++;
        }
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Kas'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Kas Masuk Bulan ' .$bulan.' Tahun '.$tahun.'.xlsx"');
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





























// export laporan  donasi
public function exportdonasi()
{       

        $id_cabang = $this->session->userdata('sess_id_cabang');

        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        // // $bulan     = "May";
        $provinsi = $this->M_laporan->listingdonasi($id_cabang, $bulan, $tahun);
        
        $ambildonasi = $this->M_laporan->jumlahdonasi($id_cabang,$bulan,$tahun);
        
    
        if ( sizeof($ambildonasi) > 0  ) {
            $jumlahdonasi = 0;
            for ( $i = 0; $i<sizeof($ambildonasi); $i++) {
            //    $a= (int)$ambildonasi[$i]->jml_donasi;
            //     var_dump($a);
                $jumlahdonasi = $jumlahdonasi + (int)$ambildonasi[$i]->jml_donasi;
            }

        }else{
            $jumlahdonasi = 0;
        }
        // echo '<pre>';
        // var_dump($ambildonasi, $jumlahdonasi);
        // echo '<pre>';

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('Luvia - Senyum Desa')
        ->setLastModifiedBy('Luvia - Senyum Desa')
        ->setTitle('Office 2007 XLSX Test Document')
        ->setSubject('Office 2007 XLSX Test Document')
        ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
        ->setKeywords('office 2007 openxml php')
        ->setCategory('Test result file');

        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];

        // BORDERS ALL
          // set borders all borders 
          $styleBorders = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
                ],
            ],
        ];
        
        // INITIALIZE tahun 

        // Add some data
        // title YAYASAN SENYUM DESA 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C1', 'YAYASAN SOSIAL SENYUM DESA ');
        $spreadsheet->getActiveSheet()->mergeCells('C1:F1');//merge cells
        $spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('C1') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);//set align center 
        $spreadsheet->getActiveSheet()->getStyle('C1')->getFont()->setSize(12); // set font
        
        // TITLE LAPORAN DONASI 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C2', 'LAPORAN DONASI BULAN '.$bulan.' TAHUN'.$tahun.'');
        $spreadsheet->getActiveSheet()->mergeCells('C2:F2');//merge cells
        $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('C2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);//set align center 
        $spreadsheet->getActiveSheet()->getStyle('C2')->getFont()->setSize(12); // set font

        // NOMER
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'No');
        $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('A4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        //TGL DONASI
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B4', 'Tanggal Donasi');
        $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('B4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('B4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        //NAMA DONATUR
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C4', 'Nama Donatur');
        $spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('C4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('C4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // NOMINAL DONASI
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D4', 'Nominal Donasi');
        $spreadsheet->getActiveSheet()->getStyle('D4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('D4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        //EMAIL DONATUR 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E4', 'Email Donatur');
        $spreadsheet->getActiveSheet()->getStyle('E4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('E4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('E4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        // TELP DONATUR
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F4', 'Telp Donatur');
        $spreadsheet->getActiveSheet()->getStyle('F4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('F4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // STATUS
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G4', 'Status');
        $spreadsheet->getActiveSheet()->getStyle('G4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('G4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('G4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        // TITLE 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('I4', 'Jumlah Donasi Bulan ini: ');
        $spreadsheet->getActiveSheet()->getStyle('I4')->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('I4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('I4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('J4','Rp. '.number_format($jumlahdonasi, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('J4')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('J4')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('J4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
        
        // Miscellaneous glyphs, UTF-8
        $no = 1;
        $i=5; 

        foreach($provinsi as $provinsi) {
        // set column 
        // NOMOR
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$i, $no++);
        $spreadsheet->getActiveSheet()->getStyle('A'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

        // TGL DONASI
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$i, date('d-m-Y',strtotime($provinsi->tgl_donasi)));
        $spreadsheet->getActiveSheet()->getStyle('B'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('B'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        
        // NAMA DONATUR
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$i, $provinsi->nama_donatur);
        $spreadsheet->getActiveSheet()->getStyle('C'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('C'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

        // JUMLAH DONASI 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$i, $provinsi->jml_donasi);
        $spreadsheet->getActiveSheet()->getStyle('D'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('D'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
        
        // EMAIL DONASI 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('E'.$i, $provinsi->email_donatur);
        $spreadsheet->getActiveSheet()->getStyle('E'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('E'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);

        // EMAIL DONATUR
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('F'.$i, $provinsi->telp_donatur);
        $spreadsheet->getActiveSheet()->getStyle('F'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('F'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
        
        // STATUS 
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G'.$i, $provinsi->status);
        $spreadsheet->getActiveSheet()->getStyle('G'.$i)->applyFromArray($styleBorders);
        $spreadsheet->getActiveSheet()->getStyle('G'.$i) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

        $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Laporan Donasi'.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Laporan Donasi Bulan '.$bulan.'Tahun '.$tahun.'.xlsx"');
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

// export laporan neraca 
function exportNeraca() {

        $id_cabang = $this->session->userdata('sess_id_cabang');
        // $bulan     = date('F'); // default bulan ini 
        $tahun = $this->input->post('tahun');
        // $bulan = $this->input->post('bulan');


        $ambilAssetMasuk = $this->M_laporan->assetKas($tahun, $id_cabang, "masuk");
        $ambilAssetKeluar = $this->M_laporan->assetKas($tahun, $id_cabang, "keluar");

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

        // set borders outline
        $styleArray = [
            'borders' => [
                'outline' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                    'color' => ['argb' => 'FFFF0000'],
                ],
            ],
        ];

        // set borders all borders 
        $styleBorders = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '00000000'],
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
        $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri'); //set font 
        
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Yayasan Senyum Desa Indonesia');
        $spreadsheet->getActiveSheet()->mergeCells('A1:G1');
        $spreadsheet->getActiveSheet()->getStyle('A1') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(11); // set font


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

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G7', 'Rp. '.number_format($jumlahAsset, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
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

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G12','Rp. '.number_format($jumlahAsset, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G12') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
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

        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G14','Rp.'.number_format($jumlahKewajiban, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G14') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
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
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('G21', 'Rp.'.number_format($bersih, 2).'');
        $spreadsheet->getActiveSheet()->getStyle('G21') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
        $spreadsheet->getActiveSheet()->getStyle('G21')->getFont()->setBold(true); // set bold
        $spreadsheet->getActiveSheet()->getStyle('G21')->getFont()->setSize(11); // set font

      
        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Neraca Keuangan '.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Neraca Keuangan '.$tahun.'.xlsx"');
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
        // isi variable 
        $id_cabang = $this->session->userdata('sess_id_cabang');
        $tahun = $this->input->post('tahun');
        
        // variable 
        // menampilkan total data 
        $ambilAssetKeluar = $this->M_laporan->assetKas($tahun, $id_cabang, "keluar");
        // mengambil jumlah donasi 
        $ambildonasi = $this->M_laporan->jumlahdonasitahunan($id_cabang,$tahun);
        // menampilkan datanya 
        $ambilKasKeluar = $this->M_laporan->dataassetKas($tahun, $id_cabang, "keluar");
       
        $jumlahKewajiban = 0; 
        
        if ( sizeof($ambildonasi) > 0  ) {
            $jumlahdonasi = 0;
            for ( $i = 0; $i<sizeof($ambildonasi); $i++) {
            //    $a= (int)$ambildonasi[$i]->jml_donasi;
            //     var_dump($a);
                $jumlahdonasi = $jumlahdonasi + (int)$ambildonasi[$i]->jml_donasi;
            }

        }else{
            $jumlahdonasi = 0;
        }   

        // ambil kas 
        if ( $ambilAssetKeluar->num_rows() > 0 ) {

            foreach ( $ambilAssetKeluar->result_array() AS $kewajiban ) {

                $jumlahKewajiban = $jumlahKewajiban + $kewajiban['nominal'];
            }
        }
        //ambil data kas 
      

                // set borders all borders 
                $styleBorders = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '00000000'],
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

                $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'YAYASAN SENYUM DESA INDONESIA');
                $spreadsheet->getActiveSheet()->mergeCells('A2:E2');
                $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A3', 'LABA RUGI '.$tahun.'');
                $spreadsheet->getActiveSheet()->mergeCells('A3:E3');
                $spreadsheet->getActiveSheet()->getStyle('A3') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A3')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A5', 'Pendapatan Sumbangan');
                $spreadsheet->getActiveSheet()->getStyle('A5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A5')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('A5:B6')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('A7:B7')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('C5:C7')->applyFromArray($styleBorders);

                // total jumlah donasi bulan ini  
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C5','Rp.'.number_format($jumlahdonasi, 2).'' );
                $spreadsheet->getActiveSheet()->getStyle('C5') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $spreadsheet->getActiveSheet()->getStyle('C5')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C7','Rp.'.number_format($jumlahdonasi, 2).'' );
                $spreadsheet->getActiveSheet()->getStyle('C7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('C7')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A7', 'Jumlah Pendapatan ');
                $spreadsheet->getActiveSheet()->getStyle('A7') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A7')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A9', 'Beban Operasional');
                $spreadsheet->getActiveSheet()->getStyle('A9') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A9')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A9')->getFont()->setSize(11); // set font


                // RESULT ARRAY PENGELUARAN KAS 
                //nOTE: yang di increment adalah $baris nya 
                $i = 1;
                $baris = 10; 
             
                foreach ($ambilKasKeluar as $kas){
                    // judul
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$baris, $kas["judul"]);
                    $spreadsheet->getActiveSheet()->getStyle('A8:B16')->applyFromArray($styleBorders);

                    // nominal 
                    $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$baris, 'Rp.'.number_format($kas["nominal"], 2).'');
                    $spreadsheet->getActiveSheet()->getStyle('C'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                    $spreadsheet->getActiveSheet()->getStyle('C8:C16')->applyFromArray($styleBorders);
                // increment 
                $baris++;
                }
              

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A17', 'Jumlah Beban');
                $spreadsheet->getActiveSheet()->getStyle('A17') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A17')->getFont()->setBold(true); // set bold
                
                $spreadsheet->getActiveSheet()->getStyle('A17')->getFont()->setSize(11); // set font

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C17','Rp.'.number_format($jumlahKewajiban, 2).'' );
                $spreadsheet->getActiveSheet()->getStyle('C17') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $spreadsheet->getActiveSheet()->getStyle('C17')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('C17')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('A18:B18')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('C18')->applyFromArray($styleBorders);
          

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A19', 'LABA OPERASIONAL');
                $spreadsheet->getActiveSheet()->getStyle('A19') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A19')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A19')->getFont()->setSize(11); // set font
                $spreadsheet->getActiveSheet()->getStyle('A19:B19')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('A17:B17')->applyFromArray($styleBorders);
                
                // TOTAL LABA OPERASIONAL 
                $bersih = $jumlahdonasi - $jumlahKewajiban;
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C19','Rp.'.number_format($bersih, 2).'' );
                $spreadsheet->getActiveSheet()->getStyle('C19') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $spreadsheet->getActiveSheet()->getStyle('C19')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('C19')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('C19')->applyFromArray($styleBorders);


                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A21', 'Pendapatan Lain-lain');
                $spreadsheet->getActiveSheet()->getStyle('A21') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A21')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('A20:B23')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('C20:C23')->applyFromArray($styleBorders);
                

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A23', 'Jumlah Pendapatan Lain-Lain');
                $spreadsheet->getActiveSheet()->getStyle('A23') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A23')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A23')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('A24:B25')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('C24:C25')->applyFromArray($styleBorders);

                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A26', 'SALDO AKHIR ASSET BERSIH');
                $spreadsheet->getActiveSheet()->getStyle('A26') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
                $spreadsheet->getActiveSheet()->getStyle('A26')->getFont()->setBold(true); // set bold
                $spreadsheet->getActiveSheet()->getStyle('A26')->getFont()->setSize(11); // set font

                $spreadsheet->getActiveSheet()->getStyle('A26:B26')->applyFromArray($styleBorders);

                $spreadsheet->getActiveSheet()->getStyle('C26')->applyFromArray($styleBorders);
                

                // SALDO ASSET BERSIH 
                 // TOTAL LABA OPERASIONAL 
                 $spreadsheet->setActiveSheetIndex(0)->setCellValue('C26','Rp.'.number_format($bersih, 2).'' );
                 $spreadsheet->getActiveSheet()->getStyle('C26') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                 $spreadsheet->getActiveSheet()->getStyle('C26')->getFont()->setBold(true); // set bold
                 $spreadsheet->getActiveSheet()->getStyle('C26')->getFont()->setSize(11); // set font


                // Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle('Laporan Laba Rugi '.date('d-m-Y H'));

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                $spreadsheet->setActiveSheetIndex(0);

                // Redirect output to a client’s web browser (Xlsx)
                header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                header('Content-Disposition: attachment;filename="Laporan Laba Rugi Tahun '.$tahun.'.xlsx"');
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
    // di admin pusat yang cuma 1 terdiri dari bbrp cabang 
    public function Kas(){
            // inisialisasi tahun 
             $tahun = 2021; 

            // create new spreadsheets 
            $spreadsheet = new Spreadsheet();

              // Set document properties
                $spreadsheet->getProperties()->setCreator('Admin Korwil - Senyum Desa')
                            ->setLastModifiedBy('Admin Korwil - Senyum Desa')
                            ->setTitle('Office 2007 XLSX Test Document')
                            ->setSubject('Office 2007 XLSX Test Document')
                            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                            ->setKeywords('office 2007 openxml php')
                            ->setCategory('Test result file');

            // style 
            // set borders all borders 
            $styleBorders = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ],
            ];

            $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'YAYASAN SENYUM DESA INDONESIA');
            $spreadsheet->getActiveSheet()->mergeCells('A1:K1');
            $spreadsheet->getActiveSheet()->getStyle('A1') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // set font

            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'LAPORAN KAS TAHUNAN '.$tahun );
            $spreadsheet->getActiveSheet()->mergeCells('A2:K2');
            $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(13); // set font

            // title 

            // NOMOR 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'No');
            $spreadsheet->getActiveSheet()->getStyle('A4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true); // set bold

            // NAMA CABANG 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B4', 'Nama Cabang');
            $spreadsheet->getActiveSheet()->getStyle('B4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true); // set bold

            // STATUS CABANG 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('C4', 'Status Cabang');
            $spreadsheet->getActiveSheet()->getStyle('C4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('C4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(true); // set bold

            //TOTAL KAS 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D4', 'Total Kas');
            $spreadsheet->getActiveSheet()->getStyle('D4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('D4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(true); // set bold


              // inisialisasi variabel 
            $ambilMasuk = $this->M_laporan->totalKas($tahun, "masuk");
            $ambilKeluar = $this->M_laporan->totalKas($tahun, "keluar");

            $jumlahMasuk = 0;
            $jumlahKeluar = 0;
    
    
            if ( $ambilMasuk->num_rows() > 0 ) {
    
                foreach ( $ambilMasuk->result_array() AS $asset ) {
    
                    $jumlahMasuk = $jumlahMasuk + $asset['nominal'];
                }
    
            }
    
    
            if ( $ambilKeluar->num_rows() > 0 ) {
    
                foreach ( $ambilKeluar->result_array() AS $kewajiban ) {
    
                    $jumlahKeluar = $jumlahKeluar + $kewajiban['nominal'];
                }
            }
            $bersih = $jumlahMasuk - $jumlahKeluar;
            // $ambil = $this->M_laporan->Kas($tahun);
            // SET NILAI -> result array 
            $i = 1;
            $baris = 5; 
            
            foreach($ambilMasuk->result_array() as $kas) {
             // no 
             $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$baris, $i++);
             $spreadsheet->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($styleBorders);
             $spreadsheet->getActiveSheet()->getStyle('A'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
      
              // nama cabang 
              $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$baris, $kas["name_cabang"]);
              $spreadsheet->getActiveSheet()->getStyle('B'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              $spreadsheet->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($styleBorders);

                // STATUS_CABANG 
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$baris, $kas["status_cabang"]);
                $spreadsheet->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($styleBorders);
                $spreadsheet->getActiveSheet()->getStyle('C'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

              //  TOTAL 
              $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$baris,'Rp.'.number_format($bersih, 2).'');
              $spreadsheet->getActiveSheet()->getStyle('D'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
              $spreadsheet->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($styleBorders);

            $baris++;
            } 


            // set auto size 
            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);


            
                // component 
               // Rename worksheet
               $spreadsheet->getActiveSheet()->setTitle('Kas Tahunan '.date('d-m-Y H'));

               // Set active sheet index to the first sheet, so Excel opens this as the first sheet
               $spreadsheet->setActiveSheetIndex(0);

               // Redirect output to a client’s web browser (Xlsx)
               header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
               header('Content-Disposition: attachment;filename="Laporan Kas Tahunan.xlsx"');
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

    public function Donasi(){
          // inisialisasi tahun 

          $tahun = $this->input->post('tahun');
          $ambildataDonasi = $this->M_laporan->Donasi($tahun);

            // create new spreadsheets 
            $spreadsheet = new Spreadsheet();

              // Set document properties
                $spreadsheet->getProperties()->setCreator('Admin Korwil - Senyum Desa')
                            ->setLastModifiedBy('Admin Korwil - Senyum Desa')
                            ->setTitle('Office 2007 XLSX Test Document')
                            ->setSubject('Office 2007 XLSX Test Document')
                            ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                            ->setKeywords('office 2007 openxml php')
                            ->setCategory('Test result file');

            // style 
            // set borders all borders 
            $styleBorders = [
                'borders' => [
                    'outline' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        'color' => ['argb' => '00000000'],
                    ],
                ],
            ];
              // set auto size 
              $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
              $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
              $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
              $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);

            $spreadsheet->getDefaultStyle()->getFont()->setName('Calibri');
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'YAYASAN SENYUM DESA INDONESIA');
            $spreadsheet->getActiveSheet()->mergeCells('A1:K1');
            $spreadsheet->getActiveSheet()->getStyle('A1') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(13); // set font

            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', 'LAPORAN DONASI TAHUNAN '.$tahun );
            $spreadsheet->getActiveSheet()->mergeCells('A2:K2');
            $spreadsheet->getActiveSheet()->getStyle('A2') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setBold(true); // set bold
            $spreadsheet->getActiveSheet()->getStyle('A2')->getFont()->setSize(13); // set font

            // title 

            // NOMOR 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('A4', 'No');
            $spreadsheet->getActiveSheet()->getStyle('A4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('A4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('A4')->getFont()->setBold(true); // set bold

            // NAMA CABANG 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('B4', 'Nama Cabang');
            $spreadsheet->getActiveSheet()->getStyle('B4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('B4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('B4')->getFont()->setBold(true); // set bold

            // STATUS CABANG 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('C4', 'Status Cabang');
            $spreadsheet->getActiveSheet()->getStyle('C4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('C4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('C4')->getFont()->setBold(true); // set bold

            //TOTAL KAS 
            $spreadsheet->setActiveSheetIndex(0)->setCellValue('D4', 'Total Donasi Masuk');
            $spreadsheet->getActiveSheet()->getStyle('D4') ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
            $spreadsheet->getActiveSheet()->getStyle('D4')->applyFromArray($styleBorders);
            $spreadsheet->getActiveSheet()->getStyle('D4')->getFont()->setBold(true); // set bold


            // set nilai 
            $i = 1;
            $baris = 5; 
            
            foreach($ambildataDonasi->result_array() as $kas) {
                    // no 
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('A'.$baris, $i++);
                $spreadsheet->getActiveSheet()->getStyle('A'.$baris)->applyFromArray($styleBorders);
                $spreadsheet->getActiveSheet()->getStyle('A'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        
                // nama cabang 
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('B'.$baris, $kas["name_cabang"]);

                $spreadsheet->getActiveSheet()->getStyle('B'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                $spreadsheet->getActiveSheet()->getStyle('B'.$baris)->applyFromArray($styleBorders);

                // STATUS_CABANG 
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('C'.$baris, $kas["status_cabang"]);
                $spreadsheet->getActiveSheet()->getStyle('C'.$baris)->applyFromArray($styleBorders);
                $spreadsheet->getActiveSheet()->getStyle('C'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                //  TOTAL 
                $spreadsheet->setActiveSheetIndex(0)->setCellValue('D'.$baris,'Rp.'.number_format($kas["jumlah"], 2).'');
                $spreadsheet->getActiveSheet()->getStyle('D'.$baris) ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT);
                $spreadsheet->getActiveSheet()->getStyle('D'.$baris)->applyFromArray($styleBorders);

                $baris++;
              }
              
                  // component 
                   // Rename worksheet
                   $spreadsheet->getActiveSheet()->setTitle('Donasi Tahunan '.date('d-m-Y H'));

                   // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                   $spreadsheet->setActiveSheetIndex(0);

                   // Redirect output to a client’s web browser (Xlsx)
                   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
                   header('Content-Disposition: attachment;filename="Laporan Donasi Tahunan '.$tahun.' .xlsx"');
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
