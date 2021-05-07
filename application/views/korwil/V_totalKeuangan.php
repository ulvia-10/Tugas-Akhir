
<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php echo $this->session->flashdata('pesan') ?>
            <div class="card">
                <div class="card-header">
                    <h5>Tabel Data Keuangan</h5><span>Total Keuangan Kas | Senyum Desa</span><br>
                    <a href="<?= base_url('AdminKorwil/tambahKeuangan'); ?>" class="btn btn-outline-primary"
                        type="button" data-original-title="btn btn-outline-danger-2x" style="width: px;" title=""> <i class="fa fa-plus" aria-hidden="true"></i>
                        Tambah Data </a>
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
                        <table class="display" id="API-3" >
                            <thead style=" text-align:center;">
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Kas</th>
                                    <th>Judul</th>
                                    <th>Nominal</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  
                                </tr>
                            </thead>
                            <tbody style=" text-align:center;">
                                <?php $no = 1;
                                foreach ($data_keuangan as $ks) { ?>
                                <tr>
                                    <td> <?= $no++; ?></td>
                                    <td><?= date('d-m-Y',strtotime($ks["tgl_bayar"])); ?></td>
                                    <td><?= $ks["judul"]; ?></td>
                                    <?php
                                            $nominal=  $ks["nominal"]
                                            ?>
												<td> Rp.<?= number_format($nominal, 2 ); ?></td>
                                    <?php
										$keterangan = "";
										$warna = "";

										if ( $ks["jenis_keuangan"] == "masuk" ) {

											$keterangan = "masuk";
											$warna      = "primary";
										} else if ( $ks["jenis_keuangan"] == "keluar" ) {

											$keterangan = "keluar";
											$warna = "info";
										} 
										?>
												<td> <span class="badge badge-<?php echo $warna ?>">
														<?php echo $keterangan?></span></td>
                                                <td>
                                                <!-- detail  -->
                                                <a href="<?= base_url(); ?>keuangan/detailkaskorwil/<?= $ks['id_keuangan'];?>"
														class="badge badge-secondary">
														<i class="fa fa-eye" aria-hidden="true"></i></a></a>
                                                <!-- delete -->
                                                <a href="#" data-bs-toggle="modal"
														data-bs-target="#aksi-hapus-<?php echo $ks['id_keuangan'] ?>"
														class="badge badge-warning "> <i class="fa fa-trash"
															aria-hidden="true"></i></a>
                                                
                                                </td>

                                    <?php
                                }
                                    ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                 
                                </tr>
                            </tfoot>
                            <tr>
                                <th colspan=2>Total Kas Masuk: </th>
                                <th>Rp. <?php echo number_format($totalPemasukan, 2) ?></th> <br>
                                <th colspan=1>Total Kas Keluar: </th>
                                <th >Rp. <?php echo number_format($totalPengeluaran, 2) ?>
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