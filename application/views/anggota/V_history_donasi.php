<br>
<div class="container-fluid">
    <div class="page-title">
   
        <div class="row">
            <div class="col-12" >
            <div>
                <h5 style="margin-left: 320px;">  Pembayaran Donasi <i class="fa fa-clipboard" aria-hidden="true"></i> </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12" >
    
    <div class="card">
        
        <div class="card-body">
        <!-- flash data  -->

        <a href="<?= base_url(); ?>donasi/tambahbuktidonasi/" class="btn btn-secondary btn-sm mb-3">
                    <i class="fa fa-plus" aria-hidden="true"></i>Upload Bukti</a>
                    <?php echo $this->session->flashdata('msg') ?> 
                    <?php echo $this->session->flashdata('pesan') ?> 
                    
            <div class="table-responsive">
                <table class="display" id="basic-1" style="text-align:center;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Via</th>
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
                      
                            <!-- <td> Rp.<?php
                                $nominal=  $ds["jml_donasi"]
                                ?>
                                <?= number_format($nominal, 2 ); ?> </td> -->
                                <td><span class=" badge badge-primary"><?= $ds["via"]; ?></span></td>
                           <?php
                                $keterangan = "";
                                $warna = "";

                                if ( $ds['status_verif'] == "baru" ) {

                                    $keterangan = "Success";
                                    $warna      = "success";
                                } else if ( $ds['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "Pending";
                                    $warna = "secondary";

                                } 
                                ?>
                            <td>  <span class="badge badge-<?php echo $warna ?>">
                                <?php echo $keterangan?></span></td>
                            <td>
                                <!-- edit -->
                                <a href="<?= base_url(); ?>donasi/editdonasianggota/<?= $ds['Id_donasi']; ?>"
                                    class="badge badge-success">
                                    <i class="fa fa-pencil" aria-hidden="true"></i></a></a>
                                <!-- detail -->
                                <a href="<?= base_url(); ?>donasi/detaildonasianggota/<?= $ds['Id_donasi']; ?>"
                                    class="badge badge-primary">
                                    <i class="fa fa-eye" aria-hidden="true"></i></a></a>
                                <!-- hapus -->
                                <!-- <a href="<?= base_url(); ?>donasi/hapusdonasi/<?= $ds['Id_donasi']; ?>"
                                    class="badge badge-info">
                                    <i class="fa fa-trash" aria-hidden="true"></i></a></a> -->
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
