<div class="container-fluid">
	<div class="page-title">
		<br>
		<div class="row">
			<div class="col-5" style="margin-left:300px;">
				<h5>Detail Kas <i class="fas fa-clipboard-check    "></i></h5>
			</div>
			<br> <br> <br><br> <br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-body">
						<!-- <img src="<?= base_url('./assets/images/' . $kas['bukti_bayar']); ?>" alt="Maaf bukti_donasi tidak tersedia" style="width:50%; height:45%; margin-left:90px;"> -->
						<p class="card-text">
							<label for="judul"><b> Judul :</b></label>
							<?= $kas['judul']; ?>
						</p>
						<p class="card-text">
							<label for="judul"><b> Nama :</b></label>
							<?= $kas['full_name']; ?>
						</p>
						<p class="card-text">
							<label for="tgl_bayar"><b> Tanggal Donasi: </b></label>
							<?= date('d-m-Y',strtotime( $kas['tgl_bayar'])); ?>
						</p>
						<p class="card-text">
							<label for="no_rekening"><b>No Rekening: </b></label>
							<?= $kas['no_rekening']; ?>
						</p>
						<p class="card-text">
							<?php
                                $nominal= $kas["nominal"]
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
                                $keterangan = "";
                                $warna = "";

                                if ( $kas['via'] == "tunai" ) {
                                    $keterangan = "tunai";
                                    $warna      = "success";
                                } else if ( $kas['via'] == "transfer" ) {
                                    $keterangan = "transfer";
                                    $warna = "warning";

                                } 
                                ?>
						<p class="card-text">
							<label for="status"><b>Pembayaran Via: </b></label>
							<span class="badge badge-<?php echo $warna ?>"> <?php echo $keterangan?></span>
						</p>
						<p class="card-text">
							<label for="judul"><b> Nama Bank :</b></label>
							<b>BANK <?= $kas['nama_bank']; ?></b>
						</p>
						<p class="card-text">
							<label for="created_"><b>Upload pada: </b></label>
							<?= date('d-m-Y H:i:s',strtotime($kas['created_at'])); ?>
						</p>
						</p>
					</div>
				</div>
			</div>
			<br>
			<div class="col-sm-5">
				<div class="card">
					<div class="card-header">
						<h6 style="margin-left:90px;">Bukti Bayar <i class="fa fa-picture-o" aria-hidden="true"></i>
						</h6>

					</div>
					<div class="card-body">
						<img src="<?= base_url('./assets/images/' . $kas['bukti_bayar']); ?>"
							alt="Maaf bukti pembayaran tidak tersedia" style="width:50%; height:45%; margin-left:90px;">
						<!-- <?php
                        $src = 'https://pertaniansehat.com/v01/wp-content/uploads/2015/08/default-placeholder.png';

                        if ($kas['bukti_bayar']) {

                            $src = "";
                            $checkDataPhoto = explode(',', $kas['bukti_bayar']);

                            // apakah bukti_donasi tsb lebih dari 1 ?
                            if (count($checkDataPhoto) > 1) {

                                foreach ($checkDataPhoto as $rowPhoto) {

                                    echo '<img src="' . base_url('./assets/images/' . $rowPhoto) . '" style="width: 100px; height:100%;"> <hr>';
                                }
                            } else { // bukti_donasi hanya 1

                                echo '<img src="' . base_url('./assets/images/' . $kas['bukti_bayar']) . '" style="width: 100px"; height:100%;>';
                            }
                        }

                        ?> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
