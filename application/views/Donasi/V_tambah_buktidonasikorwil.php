<br> <br>
<div class="col-xl-7 box-col-9" style="margin-left: 150px;">
	<div class="card">
		<div class="card-header">
			<h5 style="text-align:center; margin-left:20px;"> Bukti Donasi <i class="fa fa-address-book"
					aria-hidden="true"></i> </h5>
		</div>
		<form class="form theme-form" action="<?php echo base_url('donasi/uploadbuktidonasikorwil') ?>" method="POST"
			enctype="multipart/form-data">
			<div class="card-body">
				<!-- tanggal donasi -->
				<div class="row">
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Tanggal Donasi</label>
							<div class="col-sm-9">
								<input class="form-control" type="date" name="tgl_donasi"
									value="<?php echo date('Y-m-d')?>">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="mb-2 row">
							<label class="col-sm-3 col-form-label">Nama Anggota</label>
							<div class="col-sm-9">
								<select name="nama_anggota" class="form-select digits" id=""
									required="Nama Harap diisi ">
									<option value="full_name">-- Pilih salah satu --</option>

									<?php


							foreach ($dataAnggota AS $anggota) {

								echo '<option value="' . $anggota['id_profile'] . '">' . $anggota['full_name'] . '</option>';
							}
							?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">Nama Event</label>
								<div class="col-sm-9">
									<select name="nama_event" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="nama_event">-- Pilih Nama Event --</option>
										
										<!-- foreach rsult array nama event donasi  -->
										<?php
                        
										$tanggal_sekarang = (date('Y-m-d H:i:s'));
	  
										foreach($event AS $event){

											$tanggal_awal = ($event['durasi_mulai']);
											$tanggal_akhir = ($event['durasi_berakhir']);

											// echo 'apakah '. $tanggal_sekarang.' >= '.$tanggal_awal.' dan '. $tanggal_sekarang.' <= '. $tanggal_akhir; 

											// echo ( ($tanggal_sekarang >= $tanggal_awal) && ($tanggal_sekarang <= $tanggal_akhir) ) ? " |tampilkan" : " |expired";


											if ( ($tanggal_sekarang >= $tanggal_awal) && ($tanggal_sekarang <= $tanggal_akhir)  ) {

																			echo '<option value="' . $event['id_event'] . '">' . $event['nama_event'] . '</option>';
																		}
																	}
									 	 ?>



									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<label class="col-sm-3 col-form-label">Via Pembayaran</label>
						<div class="col-sm-9">
							<div class="m-checkbox-inline custom-radio-ml">
								<div class="form-check form-check-inline radio radio-primary">
									<input class="form-check-input" id="radioinline4" type="radio" name="via" id="via"
										value="transfer" required="Via harap Diisi">
									<label class="form-check-label mb-0" for="radioinline4"><span class="digits">
											Transfer</span></label>
								</div>
								<div class="form-check form-check-inline radio radio-primary">
									<input class="form-check-input" id="radioinline5" type="radio" name="via" id="via"
										value="tunai">
									<label class="form-check-label mb-0" for="radioinline5"><span class="digits">
											Tunai</label>
								</div>
							</div>
						</div>
					</div>

					<!-- nama bank  -->
					<!-- nama bank -->
					<div class="form-group" id="element-wilayah">
						<div class="row">
							<div class="mb-2 row">
								<label class="col-sm-3 col-form-label">Nama Bank</label>
								<div class="col-sm-6">
									<select name="nama_bank" class="form-select digits"
										required="Nama Anggota harus diisi ">
										<option value="nama_bank" disable>-- Pilih nama bank--</option>
										<option value="BRI">BANK BRI </option>
										<option value="BNI">BANK BNI</option>
										<option value="MANDIRI">BANK MANDIRI</option>
										<option value="BCA">BANK BCA</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<br>
				<!-- nominal -->
				<div class="row">
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Nominal</label>
							<div class="col-sm-9">
								<input class="form-control" type="number" name="jml_donasi"
									placeholder="Masukkan nominal">
							</div>
						</div>
					</div>
				</div>
				<!-- jumlah donasi  -->

				<!-- upload bukti -->
				<div class="row">
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Upload Bukti</label>
							<div class="col-sm-9">
								<input class="form-control" type="file" name="bukti_donasi">
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="row">
				<!-- check  -->
				<div class="form-group mb-0" style="margin-left:150px;">
					<div class="checkbox p-0">
						<input id="checkbox1" type="checkbox" name="tampil" value="anonim">
						<label class="text-dark" for="checkbox1"> <i class="fa fa-user-circle" aria-hidden="true"></i>
							Tampilkan sebagai anonim</label>
					</div>
				</div>
			</div>
			<div class="card-footer" style="margin-left:190px;">
				<button class="btn btn-secondary" type="submit">Submit</button>
				<input class="btn btn-light" type="reset" value="Cancel">
			</div>
		</form>
	</div>
</div>
<!-- script untuk element  -->
<script>
	let elementWilayah = $('#element-wilayah');

	// sembunyikan
	elementWilayah.hide();

	// perintah event on click
	$('input[name="via"]').change(function () {


		if (this.value == "tunai") {

			elementWilayah.fadeOut();
		} else {

			elementWilayah.fadeIn();
		}
	})

</script>
