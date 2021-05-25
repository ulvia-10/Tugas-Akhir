<div class="container-fluid">
	<div class="page-title">
		<br>
		<div class="row" style="margin-left:50px;">
			<div class="col-5" style="margin-left:300px;">
				<h5 >Detail Kas <i class="fa fa-clipboard" aria-hidden="true"></i></h5>
			</div>
			<br> <br> <br><br> <br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h6 style="margin-left:90px;">Bukti Bayar <i class="fa fa-picture-o" aria-hidden="true"></i>
						</h6>

					</div>
					<div class="card-body">
						<img src="<?= base_url('./assets/images/' . $kas['bukti_bayar']); ?>"
							alt="Maaf bukti pembayaran tidak tersedia" style="width:50%; height:45%; margin-left:90px;">
		
					</div>
					<div class="card-footer">
					<p class="card-text">

					<?php
														
														$salah = "-";
														if ( $kas['ket_upload'] ){
															$salah = $kas['nama_bank'];
														}
													?>
							<label for="ket_upload"><b> Kesalahan Upload:</b></label>
							<?= $kas['ket_upload']; ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-body">
						<!-- <img src="<?= base_url('./assets/images/' . $kas['bukti_bayar']); ?>" alt="Maaf bukti_donasi tidak tersedia" style="width:50%; height:45%; margin-left:90px;"> -->
						<p class="card-text">
							<label for="full_name"><b> Nama Lengkap :</b></label>
							<?= $kas['full_name']; ?>
						</p>
						<!-- <p class="card-text">
							<label for="full_name"><b> Judul :</b></label>
							<?= $kas['judul']; ?>
						</p> -->
						<p class="card-text">
							<label for="name_cabang"><b> Nama Cabang:</b></label>
							<?= $kas['name_cabang']; ?>
						</p>
					
						<!-- <p class="card-text">
							<label for="judul"><b> Judul :</b></label>
							<?= $kas['judul']; ?>
						</p> -->
						<?php
														
														$tanggal = "-";
														if ( $kas['tgl_bayar'] ){

															$tanggal = date('d/m/Y',strtotime($kas['tgl_bayar']));
														}
													?>
        
						<p class="card-text">
							<label for="tgl_bayar"><b> Tanggal Bayar Kas: </b></label>
							<?= $tanggal ?>
						</p>
						<!-- <p class="card-text">
							<label for="no_rekening"><b>No Rekening: </b></label>
						
						</p> -->
						<!-- <?= $kas['no_rekening']; ?> -->
						<p class="card-text">
							<?php
								
                                $nominal= $kas['nominal']
                                ?>

							<label for="nominal"><b>Nominal: </b></label>
							Rp.<?=  number_format($nominal, 2 ); ?>
						</p>
						<p class="card-text">
							<label for="deskripsi"><b>Keterangan: </b></label>
							<?= $kas['deskripsi']; ?>
						</p>
						<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $kas['status_verif'] == "baru" ) {

                                    $keterangan = "Success";
                                    $warna      = "success";
                                } else if ( $kas['status_verif'] == "belum verifikasi" ) {

                                    $keterangan = "Pending";
                                    $warna = "info";

                                } 
                                ?>
						<p class="card-text">
							<label for="status"><b>Status Verifikasi: </b></label>
							<span class="badge badge-<?php echo $warna ?>"> <?php echo $keterangan?></span>
						</p>
						<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $kas['status'] == "belum lunas" ) {

                                    $keterangan = "tidak lunas";
                                    $warna      = "primary";
                                } else if ( $kas['status'] == "lunas" ) {

                                    $keterangan = "lunas";
                                    $warna = "secondary";

                                } 
                                ?>
						<p class="card-text">
							<label for="status"><b>Status Pembayaran: </b></label>
							<span class="badge badge-<?php echo $warna ?>"> <?php echo $keterangan?></span>
						</p>
						<?php
														
														$bank = "-";
														if ( $kas['nama_bank'] ){
															$bank = $kas['nama_bank'];
														}
													?>
						<p class="card-text">
							<label for="deskripsi"><b>Nama Bank: </b></label>
						<span class="badge badge-success"> <?= $bank ?></span>

						<?php
														
														$catatan = "-";
														if ( $kas['catatan'] ){
															$catatan = $kas['via'];
														}
													?>
						<!-- catatan  -->
						<p class="card-text">
							<label for="catatan"><b> Catatan Pembayaran:  </b></label>
							<?= $catatan; ?>
						</p>
						<?php
														
														$via = "-";
														if ( $kas['via'] ){
															$via = $kas['via'];
														}
													?>
        
						<p class="card-text">
							<label for="tgl_bayar"><b> Via Pembayaran:  </b></label>
							<?= $via; ?>
						</p>
						
					
						</p>
					</div>
				</div>
			</div>
			<br>
		
		</div>
	</div>
</div>
