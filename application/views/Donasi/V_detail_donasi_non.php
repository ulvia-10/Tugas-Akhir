<div class="container-fluid">
	<div class="page-title">
		<br>
		<div class="row">
			<div class="col-5" style="margin-left:300px;">
				<h5>Detail Donasi <i class="fa fa-check-circle" aria-hidden="true"></i></h5> <br>
			</div>
			<br> <br> <br><br> <br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-body">
					<h6 style="text-align:center;">Keterangan</h6>
					<hr>
						<!-- <img src="<?= base_url('./assets/images/' . $donasi['bukti_donasi']); ?>" alt="Maaf bukti_donasi tidak tersedia" style="width:50%; height:45%; margin-left:90px;"> -->
						<p class="card-text">
							<label for="full_name"><b>Nama Donatur: </b></label>
							<?= $donasi['nama_donatur']; ?>
						</p>
						<p class="card-text">
							<label for="name_cabang"><b>Nama Cabang: </b></label>
							<?= $donasi['name_cabang']; ?>
						</p>
						<p class="card-text">
							<label for="tgl_bayar"><b> Tanggal Donasi: </b></label>
							<?= date('d-m-Y',strtotime( $donasi['tgl_donasi'])); ?>
						</p>
						<!-- <?= $donasi['no_rekening']; ?> -->
						<p class="card-text">
							<?php
                                $nominal= $donasi["jml_donasi"]
                                ?>

							<label for="jml_donasi"><b>Nominal: </b></label>
							Rp.<?=  number_format($nominal, 2 ); ?>
						</p>
						<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $donasi['status_verif'] == "baru" ) {

                                    $keterangan = "Success";
                                    $warna      = "success";
                                } else if ( $donasi['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "Pending";
                                    $warna = "info";

                                } 
                                ?>
						  <p class="card-text">
								<label for="status"><b>Status Verifikasi: </b></label>
								<span class="badge badge-<?php echo $warna ?>">  <?php echo $keterangan?></span>	
							</p>
							<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $donasi['status'] == "Belum Lunas" ) {

                                    $keterangan = "tidak lunas";
                                    $warna      = "primary";
                                } else if ( $donasi['status'] == "Lunas" ) {

                                    $keterangan = "lunas";
                                    $warna = "secondary";

                                } else if ( $donasi['status'] == "Kadaluwarsa" ) {

                                    $keterangan = "Kadaluwarsa";
                                    $warna = "warning";
								}
                                ?>
						<p class="card-text">
							<label for="status"><b>Status Pembayaran: </b></label>
							<span class="badge badge-<?php echo $warna ?>"> <?php echo $keterangan?></span>
						</p>
						<p class="card-text">
							<label for="no_rekening"><b>Via Pembayaran: </b></label>
							<span class="badge badge-success"><?= $donasi['via']; ?></span>
						</p>
						<p class="card-text">
							<label for="no_rekening"><b>Nama Bank: </b></label>
							<span class="badge badge-primary">BANK <?= $donasi['nama_bank']; ?></span>
						</p>
						<p class="card-text">
							<label for="no_rekening"><b>Nama Event: </b></label>
							 <?= $donasi['nama_event']; ?>
						</p>
						<p class="card-text">
							<label for="created_"><b>Upload pada: </b></label>
							<?= date('d-m-Y H:i:s',strtotime($donasi['created_at'])); ?>
						</p>
					</div>
				</div>
			</div>
			<br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h6 style="margin-left:90px;">Bukti Bayar</h6>
						<hr>

					</div>
					<div class="card-body">
						<img src="<?= base_url('./assets/images/' . $donasi['bukti_donasi']); ?>"
							alt="Maaf bukti pembayaran tidak tersedia" style="width:50%; height:85%; margin-left:50px;"> <br> 
					</div>
					<div class="card-footer">
					<label for="ket_upload"><b>Kesalahan Upload: </b></label>
					<?php
														
														$ket = "-";
														if ( $donasi['ket_upload'] ){
															$ket = $donasi['ket_upload'];
														}
													?>
							<?= $ket ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
