<br><br>
<div class="col-xl-8 box-col-9" style="margin-left: 150px;">
<div class="card">
	<div class="card-header" >
	<h5 style="margin-left:150px;">Tambah Kas Anggota <i class="fa fa-users" aria-hidden="true"></i> </h5>
	</div>
	<form class="form theme-form" action="<?php echo base_url('keuangan/uploadbuktikaskorwil') ?>" method="POST" enctype="multipart/form-data" >
	<div class="card-body" style="margin-left:20px;">
		<div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Judul</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="judul" placeholder="Masukkan judul">
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
		<div class="row">
			<div class="mb-2 row">
				<label class="col-sm-3 col-form-label">Nama Anggota</label>
				<div class="col-sm-9">
					<select name="full_name" class="form-select digits" id=""
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
						<label class="col-sm-3 col-form-label">Tanggal Bayar</label>
						<div class="col-sm-5">
							<input class="form-control" type="date" name="tgl_bayar" value="<?php echo date('Y-m-d')?>">
						</div>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Nominal</label>
						<div class="col-sm-5">
							<input class="form-control" type="number" maxlength="6" name="nominal" min="0" placeholder="Masukkan nominal">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
						<label class="col-sm-3 col-form-label">Via Pembayaran</label>
						<div class="col-sm-9">
							<div class="m-checkbox-inline custom-radio-ml">
								<div class="form-check form-check-inline radio radio-primary">
								<input class="form-check-input" id="radioinline4" type="radio" name="via"
										id="via" value="transfer" required="Via harap Diisi">
									<label class="form-check-label mb-0" for="radioinline4"><span class="digits">
											Transfer</span></label>
								</div>
								<div class="form-check form-check-inline radio radio-primary">
								<input class="form-check-input" id="radioinline5" type="radio" name="via"
										id="via" value="tunai">
									<label class="form-check-label mb-0" for="radioinline5"><span class="digits">
									Tunai</label>
								</div>
							</div>
						</div>
				<!-- nama bank  -->
				<div class="form-group" id="element-wilayah" >
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
		
			<!-- <div class="row"  >
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">No Rekening</label>
							<div class="col-sm-5">
								<input class="form-control" type="number" maxlength="6" name="no_rekening"
									placeholder=" No rekening">
							</div>
						</div>
					</div>
				</div> -->
			
            <div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Bukti Bayar</label>
						<div class="col-sm-5">
							<input class="form-control" type="file" name="bukti_bayar">
						</div>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Keterangan</label>
						<div class="col-sm-5">
						<textarea class="form-control" name="deskripsi" placeholder="Keterangan..."></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer" style="margin-left:250px;">
			<button class="btn btn-info" type="submit">Submit</button>
			<input class="btn btn-light" type="reset" value="Reset">
		</div>
	</form>
</div>
</div>
<!-- wilayah -->
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