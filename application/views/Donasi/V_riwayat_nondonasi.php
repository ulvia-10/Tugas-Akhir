<div class="col-sm-9" style="margin-left: 150px;">
<div class="card">
<div class="card-body">
                    <div class="table-responsive" >
                      <table class="display" id="basic-1"style="text-align:center;">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tanggal Donasi</th>
                            <th>Nama Donatur</th>
                            <th>Jumlah Donasi</th>
                            <th>Nama Cabang Bayar</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
						  		foreach ($donasi AS $dns) { ?>
                          <tr>
                        	<td><?=$no++?></td>
                          <td><?= date('d-m-Y',strtotime($dns["tgl_donasi"])); ?></td> 
                          <td><?= $dns["nama_donatur"]; ?></td>
                          <td>Rp. <?= $dns["jml_donasi"]; ?></td>
                          <td><?= $dns["name_cabang"];?></td>
                          
							          	<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $dns['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "success";
                                } else if ( $dns['status_verif'] == "belum verifikasi" ) {
                                    $keterangan = "Failed";
                                    $warna = "info";
                                } 
                                ?>
                          <td> <span class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td></span>
                         
                          </tr>
                        </tbody>
                        <?php
                        }
                            ?>
                      </table>
                    </div>
                  </div>
                  </div>
                  </div>