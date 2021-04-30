<br> 
 <div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12" >
            <h5 style="margin-left: 300px;">Pembayaran Kas <i class="fa fa-id-card" aria-hidden="true"></i> </h5>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12" >
    <div class="card">
        <div class="card-body">
        <?php echo $this->session->flashdata('msg') ?> 
        <a href="<?= base_url(); ?>keuangan/tambahbuktikas/" class="btn btn-primary btn-sm mb-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>Upload Bukti</a>
            <div class="table-responsive">
                <?php echo $this->session->flashdata('msg') ?>
                <table class="display" id="basic-1" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bayar</th>
                            <th>Nominal </th>
                            <th>Judul</th>
                            <th>Status</th>
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
                            <td> 
                                <?php
                                $nominal= $ks["nominal"]
                                ?>
                                <?= number_format($nominal, 2 ); ?></td>
                            <td><?= $ks["judul"]; ?></td>
                            <td > <span class="badge badge-info"><?=  $ks["status"]; ?></span></td>
                            <td> <span class="badge badge-secondary"><?= $ks["status_verif"]; ?></span></td>
                            <td>
                                <!-- detail -->
                                <a href="<?= base_url(); ?>keuangan/detailkasanggota/<?= $ks['id_keuangan']; ?>"
                                    class="badge badge-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i></a></a>
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
