<br><br>
<div class="container-fluid">


<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="card">
                <div class="card-header">
                    <h5>Tabel</h5><span>Total Keuangan Kas | Senyum Desa</span><br>
                    <a href="<?= base_url('AdminKorwil/tambahKeuangan'); ?>" class="btn btn-outline-primary"
                        type="button" data-original-title="btn btn-outline-danger-2x" style="width: 200px;" title="">
                      <i class="fa fa-plus-circle" aria-hidden="true"></i>  Tambah Data</a>
                </div>

                <div class="card-body">

                    <?php

                    $totalPemasukan    = 0;
                    $totalPengeluaran   = 0;

                    // cek masuk
                    if ($masuk != null) {

                        $totalPemasukan = $masuk->TOTAL;
                    }

                    // cek keluar 
                    if ($keluar != null) {

                        $totalPengeluaran = $keluar->TOTAL;
                    }
                    ?>
                    <div class="table-responsive">
                        <table class="display" id="API-3">
                            <thead style=" text-align: center;">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Nominal</th>
                                    <th>Jenis </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody style=" text-align:center;">
                                <?php $no = 1;
                                foreach ($data_keuangan AS $ks) { ?>
                                <tr>
                                    <td> <?= $no++; ?></td>
                                    <td> <?=  date('d/m/Y',strtotime($ks["tanggal_laporan"])); ?></td>
                                    <td><?= $ks["judul"]; ?></td>
                                    <?php
												$nominal=  $ks["nominal"]
												?>

								<td>Rp. <?= number_format($nominal, 2 ); ?></td>
                                <?php
                                $keterangan = "";
                                $warna = "";

                                if ( $ks['jenis_keuangan'] == "masuk" ) {

                                    $keterangan = "masuk";
                                    $warna      = "success";
                                } else if ( $ks['jenis_keuangan'] == "keluar" ) {
                                    $keterangan = "keluar";
                                    $warna = "secondary";
                                } 
                                ?>
                          <td> <span class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td></span>
                            
                           
                          <td>  
                             <!-- edit -->
                             <a href="<?= base_url(); ?>keuangan/editkasanggota/<?= $ks['id_keuangan']; ?>"
                                    class="badge badge-secondary">
                                 <i class="fa fa-pencil" aria-hidden="true"></i></a></a>
                             
                             <!-- detail -->
                              <a href="<?= base_url(); ?>keuangan/detailkasanggota/<?= $ks['id_keuangan']; ?>"
                                    class="badge badge-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i></a></a>

                            <!-- delete -->
                            <a href="<?= base_url(); ?>keuangan/delete/<?= $ks['id_keuangan']; ?>"
                                    class="badge badge-danger">
                                   <i class="fa fa-trash" aria-hidden="true"></i></a></a>
                            </td>

                                    <?php
                                }
                                    ?>
                                   
                            </tbody>
                            <tfoot>
                                <tr>
                                <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Judul</th>
                                    <th>Nominal</th>
                                    <th>Jenis</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tr>
                                <th colspan=2>Total Kas Masuk:</th>
                                <th >Rp. <?php echo number_format($totalPemasukan, 2) ?></th>
                                <th colspan=1> Total Kas Keluar:</th>
                                <th>Rp. <?php echo number_format($totalPengeluaran, 2) ?></th>
                                </th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>





    </div>
</div>
</div>
                            </div>