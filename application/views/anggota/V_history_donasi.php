<br>
<div class="container-fluid">
    <div class="page-title">
   
        <div class="row">
            <div class="col-12" >
                <h5 style="margin-left: 300px;">Pembayaran Donasi <i class="fa fa-clipboard" aria-hidden="true"></i> </h5>
                
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12" >
    
    <div class="card">
        
        <div class="card-body">
        <?php echo $this->session->flashdata('msg') ?> 
        <a href="<?= base_url(); ?>donasi/tambahbuktidonasi/" class="btn btn-secondary btn-sm mb-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>Upload Bukti</a>
            <div class="table-responsive">
                <table class="display" id="basic-1" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>No Rekening</th>
                            <th>Jumlah Donasi</th>
                            <th>Status</th>
                            <th>Verifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php $no = 1;
                        foreach ($donasi AS $ds) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <?php
														
														$tanggal = "-";
														if ( $ds['tgl_donasi'] ){

															$tanggal = date('d-m-Y',strtotime($ds['tgl_donasi']));
														}
													?>
                            <td><?= $tanggal ?></td>
                            <td><?= $ds["no_rekening"]; ?></td>
                            <td> <?php
                                $nominal=  $ds["jml_donasi"]
                                ?>
                                <?= number_format($nominal, 2 ); ?>
                            <td > <span class="badge badge-info"><?=  $ds["status"]; ?></span></td>
                            <td> <span class="badge badge-secondary"><?= $ds["status_verif"]; ?></span></td>
                            <td>
                                <!-- detail -->
                                <a href="<?= base_url(); ?>donasi/detaildonasianggota/<?= $ds['Id_donasi']; ?>"
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
