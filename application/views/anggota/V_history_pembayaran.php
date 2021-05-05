<br> 
 <div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12" >
            <h5  style="margin-left: 320px;">Pembayaran Kas <i class="fa fa-id-card" aria-hidden="true"></i> </h5>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12" >
    <div class="card">
        <div class="card-body">
        <!-- alert action -->
        <a href="<?= base_url(); ?>keuangan/tambahbuktikas/" class="btn btn-primary btn-sm mb-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>Upload Bukti</a>
            <div class="table-responsive">
            <!-- flash data -->
                <?php echo $this->session->flashdata('flash-data')?>
                <table class="display" id="basic-1" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal </th>
                            <th>Judul</th>
                            <th>Verifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                        foreach ($kas->result_array() as $ks) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <?php
														
														$tanggal = "-";
														if ( $ks['tanggal_laporan'] ){

															$tanggal = date('d-m-Y',strtotime($ks['tanggal_laporan']));
														}
													?>
                            <td><?= $tanggal ?></td>

                          
                                <?php
                                $nominal= $ks["nominal"]
                                ?>
                                 <td> Rp. <?= number_format($nominal, 2 ); ?></td>

                            <td><?= $ks["judul"]; ?></td>
                               <?php
                                $keterangan = "";
                                $warna = "";

                                if ( $ks['status_verif'] == "baru" ) {

                                    $keterangan = "Success";
                                    $warna      = "success";
                                } else if ( $ks['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "Pending";
                                    $warna = "info";

                                } 
                                ?>
                            <td> <span class="badge badge-<?php echo $warna ?>">
                                <?php echo $keterangan?></span></td>
                                <!-- detail -->
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
                        </tr> 

                </table>
            </div>
        </div>
    </div>
</div>
