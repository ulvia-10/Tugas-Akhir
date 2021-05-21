<br> <br>
<div class="card">
	<div class="card-header">
		<h5 class="pull-left">Data Donasi Non Anggota  </h5>
	</div>
	<div class="card-body">
		<div class="tabbed-card">
			<ul class="pull-right nav nav-pills nav-secondary" id="top-tabdanger" role="tablist">
				<li class="nav-item"><a class="nav-link" id="top-home-danger" data-bs-toggle="tab"
						href="#top-homedanger" role="tab" aria-controls="top-homedanger" aria-selected="true"> <i
							class="fa fa-list" aria-hidden="true"></i> Pending </a></li>
				<li class="nav-item"><a class="nav-link active" id="profile-top-danger" data-bs-toggle="tab"
						href="#top-profiledanger" role="tab" aria-controls="top-profiledanger" aria-selected="false"><i
							class="icofont icofont-man-in-glasses"></i>Verified</a></li>
				<li class="nav-item"><a class="nav-link" id="contact-top-danger" data-bs-toggle="tab"
						href="#top-contactdanger" role="tab" aria-controls="top-contactdanger" aria-selected="false"><i
							class="icofont icofont-contacts"></i>All Data</a></li>
			</ul>
			<div class="tab-content" id="top-tabContentdanger">
				<div class="tab-pane fade" id="top-homedanger" role="tabpanel" aria-labelledby="top-home-tab">
				<!--  showing flash data -->
					<!-- show flash data from model M_donasi  -->
					
					<div class="table-responsive">
					<?php echo $this->session->flashdata('pesan') ?>
						<table class="display" id="basic-3" style="text-align:center;">
					</div>

					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal Donasi</th>
							<th>Nama Donatur</th>
							<th>Via</th>
							<th>Verifikasi</th>
							<th>Action</th>

						</tr>

					</thead>
					<tbody>
						<?php $no = 1;
						  		foreach ($donasinon_baru AS $db) { ?>
						<tr>
							<td><?=$no++?></td>
							<td><?= date('d-m-Y',strtotime($db["tgl_donasi"])); ?></td>
							<td><?= $db['nama_donatur'];?></td>
							<!-- <?php
								$nominal=  $db["jml_donasi"]
							?>
							<td>Rp. <?= number_format($nominal, 2 ); ?></td> -->
							<td> <span class="badge badge-primary"><?= $db['via'];?></span></td>
							<td><span class="badge badge-secondary"><?= $db["status_verif"]; ?></span></td>
							<td>
								<!-- edit -->
								<a href="<?= base_url(); ?>donasi/editdonasinonverif/<?=$db['Id_donasi'];?>" class="badge badge-success">
									<i class="fa fa-pencil" aria-hidden="true"></i></a></a>
								<!-- detail -->
								<a href="<?= base_url(); ?>donasi/detaildonasikorwil/<?=$db['Id_donasi'];?>" class="badge badge-secondary">
									<i class="fa fa-eye" aria-hidden="true"></i></a></a>
								<!-- hapus -->
								<a href="#" data-bs-toggle="modal"
									data-bs-target="#aksi-hapus-<?php echo $db['Id_donasi'] ?>"
									class="badge badge-warning "> <i class="fa fa-trash" aria-hidden="true"></i></a>
								<!-- pop up  -->
								<div class="modal fade" id="aksi-hapus-<?php echo $db['Id_donasi'] ?>" tabindex=" -1"
									role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<h4>Hapus Akun</h4>
												<p>Apakah anda yakin ingin menghapus
													donasi
													<b><?php echo $db['tgl_donasi'] ?></b>.
												</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-primary btn-sm" type="button"
													data-bs-dismiss="modal">Batal</button>
												<a href="<?php echo base_url('donasi_non/hapusdonasikorwil/'. $db['Id_donasi']) ?>"
													class="btn btn-danger btn-sm" type="button"><i
														class="fa fa-trash"></i> Hapus</a>
											</div>
										</div>

							</td>
						</tr>
						<?php
                        }
                            ?>
					</tbody>
					</table>
				
				</div>
			</div>
			<div class="tab-pane fade active show" id="top-profiledanger" role="tabpanel"
				aria-labelledby="profile-top-tab">
					<!-- show flash data from model M_donasi  -->
				<div class="table-responsive">
				<!-- <?php echo $this->session->flashdata('pesan') ?> -->
					<table class="display" id="basic-2" style="text-align:center;">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Donasi</th>
								<th>Nama Donatur</th>
								<th>Nominal</th>
								<th>Tanggal Berakhir</th>
								<th>Action</th>

							</tr>

						</thead>
						<tbody>
						<?php $no = 1;
						  		foreach ($donasinon_sudah_verifikasi AS $dv) { ?>
						<tr>
							<td><?=$no++?></td>
							<td><?= date('d-m-Y',strtotime($dv["tgl_donasi"])); ?></td>
							<td><?= $dv['nama_donatur'];?></td>
							<?php
							$nominal=  $dv["jml_donasi"]
							?>
							<td>Rp. <?= number_format($nominal, 2 ); ?></td>
							<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $dv['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "primary";
                                } else if ( $dv['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "belum verifikasi";
                                    $warna = "info";
                                } 
                                ?>
							 <td> <span class="badge badge-<?php echo $warna ?>">
                                <?php echo $keterangan?></span></td>
							<td>
								<!-- detail -->
								<a href="<?= base_url(); ?>donasi/detaildonasikorwil/<?= $dv['Id_donasi']; ?>" class="badge badge-secondary">
									<i class="fa fa-eye" aria-hidden="true"></i></a></a>
								<!-- hapus -->
								<a href="#" data-bs-toggle="modal"
									data-bs-target="#aksi-hapus-<?php echo $dv['Id_donasi'] ?>"
									class="badge badge-warning "> <i class="fa fa-trash" aria-hidden="true"></i></a>
								<!-- pop up  -->
								<div class="modal fade" id="aksi-hapus-<?php echo $dv['Id_donasi'] ?>" tabindex=" -1"
									role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<h4>Hapus Akun</h4>
												<p>Apakah anda yakin ingin menghapus
													donasi
													<b><?php echo $dv['tgl_donasi'] ?></b>.
												</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-primary btn-sm" type="button"
													data-bs-dismiss="modal">Batal</button>
												<a href="<?php echo base_url('donasi_non/hapusdonasikorwil/' . $dv['Id_donasi']) ?>"
													class="btn btn-danger btn-sm" type="button"><i
														class="fa fa-trash"></i> Hapus</a>
											</div>
										</div>

							</td>
						</tr>
						<?php
                        }
                            ?>
					</tbody>

					</table>

				</div>
			</div>
			<div class="tab-pane fade" id="top-contactdanger" role="tabpanel" aria-labelledby="contact-top-tab">
				<div class="table-responsive">
					<!-- show flash data from model M_donasi  -->
					<!-- <?php echo $this->session->flashdata('pesan') ?> -->
					
					<a href="<?= base_url(); ?>donasi_non/tambahbuktidonasinonkorwil/" class="btn btn-secondary btn-sm mb-3">
							<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a> <br>
							<!-- <a href="<?= base_url(); ?>laporan/exportdonasi/" class="btn btn-success mb-3" style="margin-left:700px;">
						<i class="fa fa-print" aria-hidden="true"></i> Cetak Data</a> <br> -->
					<table class="display" id="basic-1" style="text-align:center;">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Donasi</th>
								<th>Nama Donatur</th>
								<th>Nominal</th>
								<th>Verifikasi</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
						  		foreach ($donasi AS $dn) { ?>
							<tr>
								<td><?=$no++?></td>
								<td><?= date('d-m-Y',strtotime($dn["tgl_donasi"])); ?></td>
								<td><?= $dn['nama_donatur'];?></td>
								<?php
												$nominal=  $dn["jml_donasi"]
												?>

								<td>Rp. <?= number_format($nominal, 2 ); ?></td>


								<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $dn['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "primary";
                                } else if ( $dn['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "belum verifikasi";
                                    $warna = "secondary";
                                } 
                                ?>
                            <td> <span class="badge badge-<?php echo $warna ?>">
                                <?php echo $keterangan?></span></td>
								<td>
								<a href="<?= base_url(); ?>donasi/detaildonasikorwil/<?= $dn['Id_donasi']; ?>" class="badge badge-secondary">
									<i class="fa fa-eye" aria-hidden="true"></i></a></a>
									<!-- hapus -->
									<a href="<?= base_url(); ?>donasi_non/hapusdonasikorwil/<?= $dn['Id_donasi']; ?>" class="badge badge-success">
									<i class="fa fa-trash" aria-hidden="true"></i></a></a>

								</td>
							</tr>
							<?php
                        }
                            ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
