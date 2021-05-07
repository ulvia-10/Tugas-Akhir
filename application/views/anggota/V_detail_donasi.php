<div class="container-fluid">
	<div class="page-title">
		<br>
		<div class="row">
			<div class="col-5" style="margin-left:300px;">
				<h5>Detail Donasi <i class="fa fa-check-circle" aria-hidden="true"></i></h5>
			</div>
			<br> <br> <br><br> <br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-body">
						<!-- <img src="<?= base_url('./assets/images/' . $donasi['bukti_donasi']); ?>" alt="Maaf bukti_donasi tidak tersedia" style="width:50%; height:45%; margin-left:90px;"> -->
						
						<p class="card-text">
							<label for="tgl_bayar"><b> Tanggal Donasi: </b></label>
							<?= date('d-m-Y',strtotime( $donasi['tgl_donasi'])); ?>
						</p>
						<p class="card-text">
							<label for="no_rekening"><b>No Rekening: </b></label>
							<?= $donasi['no_rekening']; ?>
						</p>
						<p class="card-text">
							<label for="full_name"><b>Nama Donatur: </b></label>
							<?= $donasi['full_name']; ?>
						</p>
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

                                if ( $donasi['jenis'] == "masuk" ) {

                                    $keterangan = "masuk";
                                    $warna      = "primary";
                                } else if ( $donasi['jenis'] == "keluar" ) {

                                    $keterangan = "keluar";
                                    $warna = "warning";

                                } 
                                ?>
						  <p class="card-text">
								<label for="status"><b>Jenis: </b></label>
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
							<label for="via"><b>Via Pembayaran: </b></label>
							<?= $donasi['via']; ?>
						</p>
						<p class="card-text">
							<label for="nama_bank"><b>Nama Bank: </b></label>
							<b><?= $donasi['nama_bank']; ?></b>
						</p>
						<p class="card-text">
							<label for="created_"><b>Upload pada: </b></label>
							<?= date('d-m-Y H:i:s',strtotime($donasi['created_at'])); ?>
						</p>
						<!-- <p class="card-text">
							<a href="<?= base_url('kegiatan/historypembayaran'); ?>" class="btn btn-secondary" type="submit">
								<i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
						</p> -->
					</div>
				</div>
			</div>
			<br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h6 style="margin-left:90px;">Bukti Bayar</h6>

					</div>
					<div class="card-body">
						<img src="<?= base_url('./assets/images/' . $donasi['bukti_donasi']); ?>"
							alt="Maaf bukti pembayaran tidak tersedia" style="width:50%; height:45%; margin-left:90px;">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
