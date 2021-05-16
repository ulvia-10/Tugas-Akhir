// Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();
    $id_cabang = $this->session->userdata('sess_id_cabang');
    // $bulan     = date('F'); // default bulan ini 
    $bulan     = "January"; // default bulan ini 
    // $bulan = $this->input->post('bulan');
    // pengelolaan 
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

    // bulan 
    echo '<h2>Per-bulan '.$bulan.'</h2> <hr>';
    // Set document properties
    $spreadsheet->getProperties()->setCreator('UL')
                ->setLastModifiedBy('Hayoloo')
                ->setTitle('Office 2007 XLSX Test Document')
                ->setSubject('Office 2007 XLSX Test Document')
                ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
                ->setKeywords('office 2007 openxml php')
                ->setCategory('Test result file');

    // Cntoh memberikan set nilai di kolom A1 dengan nilai "Mencoba"
    $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', 'Mencoba');
    $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
    $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // set font


     // Cntoh memberikan set nilai di kolom A1 dengan nilai "Mencoba"
     $spreadsheet->setActiveSheetIndex(0)->setCellValue('A2', $jumlahAsset);
     $spreadsheet->getActiveSheet()->mergeCells('A1:M1');
     $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // set bold
     $spreadsheet->getActiveSheet()->getStyle('A1')->getFont()->setSize(14); // set font


    echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';

    echo '&emsp;&emsp;&emsp; Kas = '.$jumlahAsset.'<br><br>';
    

    echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';
    // // pengelolaan 
    // echo '<h2>Per-bulan '.$bulan.'</h2> <hr>';

    echo '&emsp;&emsp;&emsp; Asset Tetap = 0 <br><br>';
    echo '<b>Jumlah Asset</b> Rp '.number_format($jumlahAsset, 2).'<br><br>';


    // kewajiban
    echo '&emsp;&emsp;<b>Kewajiban</b> <br>';
    echo '&emsp;&emsp;&emsp; Utang = '.$jumlahKewajiban.'<br><br>';
    // echo '<b>Asset</b> <br><br>';

    // echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';

    // echo '&emsp;&emsp;&emsp; Kas = '.$jumlahAsset.'<br><br>';


    // echo '&emsp;&emsp;<b>Asset Lancar</b> <br>';

    // echo '&emsp;&emsp;&emsp; Asset Tetap = 0 <br><br>';
    // echo '<b>Jumlah Asset</b> Rp '.number_format($jumlahAsset, 2).'<br><br>';


    // // kewajiban
    // echo '&emsp;&emsp;<b>Kewajiban</b> <br>';
    // echo '&emsp;&emsp;&emsp; Utang = '.$jumlahKewajiban.'<br><br>';


    // $bersih = $jumlahAsset - $jumlahKewajiban;
    // echo '<b>Jumlah Asset Bersih dan Kewajiban</b>&emsp;Rp '.number_format( $bersih, 2 ).'<br>';



        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('RPRT '.date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="RPRT.xlsx"');
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
