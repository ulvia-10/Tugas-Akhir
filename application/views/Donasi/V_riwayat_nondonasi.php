<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-header">
					<h5>History Donasi</h5>
				</div>
				<div class="card-body">
					<div class="row">
						<?php foreach ($donasi AS $dns) { ?>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
									<p><span class="badge badge-primary"><?=$dns['nama_event']?></span></p>
										<div class="product-name">
											<h6><?= $dns["nama_donatur"]?> Telah Berdonasi </h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
											<div class="text-muted me-2">Sebesar</div>
											<?php
												$nominal=  $dns["jml_donasi"]
												?>

											<td>Rp. <?= number_format($nominal ); ?></td>

											<!-- <td>Rp. <?= $dns["jml_donasi"]; ?></td> -->
										</div>
										<div class="avaiabilty">
											<div class="text-success">
												Tanggal: <td><?= date('d/m/Y',strtotime($dns["tgl_donasi"])); ?></td>
											</div> <br>
											
										</div>
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
										<span style="margin-left: 350px;" class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td>
									</div>
								</div>
							</div>
						</div>
						<?php
                        }
                            ?>
					</div>
				</div>
			</div>
			<div class="card">
				<!-- <div class="card-header">
					<h5>Anonim Donasi</h5>
				</div> -->
				<div class="card-body">
					<div class="row">
					<?php foreach ($anonim AS $anm) { ?>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
									<p><span class="badge badge-primary"><?=$anm['nama_event']?></span></p>
										<div class="product-name">
											<h6>Anonim telah berdonasi</h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
										 <div class="text-muted me-2">Sebesar</div>
											<?php
												$nominal=  $anm["jml_donasi"]
												?>

											<td>Rp. <?= number_format($nominal ); ?></td>
										</div>
										<div class="avaiabilty">
											<div class="text-success">
												Tanggal: <td><?= date('d/m/Y',strtotime($anm["tgl_donasi"])); ?></td>
											</div>
										</div>
											<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $anm['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "success";
                                } else if ( $anm['status_verif'] == "belum verifikasi" ) {
                                    $keterangan = "Failed";
                                    $warna = "info";
                                } 
                                ?>
										<span style="margin-left: 350px;" class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td>
									
									</div>
								</div>
							</div>
						</div>
						<?php
                        }
                            ?>
					</div>
				</div>
			</div>

			<!-- untuk anggota  -->
			<div class="card">
				<div class="card-body">
					<div class="row">
					<?php foreach ($donasi_anggota AS $ang) { ?>
						<div class="col-xxl-4 col-md-6">
							<div class="prooduct-details-box">
								<div class="media"><img class="align-self-center img-fluid img-60"
										src="http://admin.pixelstrap.com/cuba/assets/images/ecommerce/product-table-6.png" alt="#">
									<div class="media-body ms-3">
									<p><span class="badge badge-primary"><?=$ang['nama_event']?></span></p>
										<div class="product-name">
											<h6><?=$ang['full_name']?> telah berdonasi</h6>
										</div>
										<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i
												class="fa fa-star"></i><i class="fa fa-star"></i></div>
										<div class="price d-flex">
										 <div class="text-muted me-2">Sebesar</div>
											<?php
												$nominal=  $ang["jml_donasi"]
												?>

											<td>Rp. <?= number_format($nominal ); ?></td>
										</div>
										<div class="avaiabilty">
											<div class="text-success">
												Tanggal: <td><?= date('d/m/Y',strtotime($ang["tgl_donasi"])); ?></td>
											</div>
										</div>
											<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $anm['status_verif'] == "baru" ) {

                                    $keterangan = "Verified";
                                    $warna      = "success";
                                } else if ( $anm['status_verif'] == "belum verifikasi" ) {
                                    $keterangan = "Failed";
                                    $warna = "info";
                                } 
                                ?>
										<span style="margin-left: 350px;" class="badge badge-<?=$warna;?>"><?= $keterangan; ?></td>
									
									</div>
								</div>
							</div>
						</div>
						<?php
                        }
                            ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
