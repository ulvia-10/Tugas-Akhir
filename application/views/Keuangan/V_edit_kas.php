<br><br>
<div class="col-xl-8 box-col-9" style="margin-left: 150px;">
	<div class="card">
		<div class="card-header">
			<h5 style="margin-left:150px;">Verifikasi Bukti Kas <i class="fa fa-check-circle" aria-hidden="true"></i> </h5>
		</div>
		<form class="form theme-form" action="<?php echo base_url('adminkorwil/proseseditkas/' . $kas['id_keuangan']) ?>" method="POST"	enctype="multipart/form-data">
			<div class="card-body" style="margin-left:50px;">
				<!-- radio button  -->
				<div class="row">
                <div class="col">
                    <div class="mb-3">
							<input type="hidden" name="id_keuangan" value="<?= $kas['id_keuangan'];?>">	
                    </div>
                </div>
            </div>
			<!-- status verifikasi  -->
			<div class="row">
				
				<label class=" col-form-label">Pilih Status Verifikasi: </label>
				<div class="col-sm-9" style="margin-left:180px;">
					<div class="m-checkbox-inline custom-radio-ml">
					<div class="form-check form-check-inline radio radio-primary">
							<input class="form-check-input" id="radioinline8" type="radio" name="status_verif" value="belum verifikasi">
							<label class="form-check-label mb-0" for="radioinline8">
							<span class="digits text">  Pending</span></label>
						</div>
						<div class="form-check form-check-inline radio radio-primary">
							<input class="form-check-input" id="radioinline7" type="radio" name="status_verif" value=
							"baru">
							<label class="form-check-label mb-0" for="radioinline7"><span class="digits"> Verified
								</span></label>
						</div>

					</div>
				</div>
				</div>
				<br>
				<!--alasan kesalahan  -->
				<div class="form-group" id="element-kesalahan">
						<label for="ket_upload">Kesalahan: </label>
						<textarea name="ket_upload" class="form-control"></textarea>
					</div>
			
			<div class="col" id="judul">
					<div class="mb-3 row" >
						<label class="col-sm-3 col-form-label">Judul</label>
						<div class="col-sm-5">
							<input class="form-control" type="text"" name="judul"  placeholder="Masukkan judul">
						</div>
					</div>
				</div>
					   <div class="row">
				<div class="col" id="element">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Nominal</label>
						<div class="col-sm-5">
							<input class="form-control" type="number" name="nominal"  placeholder="Masukkan nominal">
						</div>
					</div>
				</div>
			</div> 
					<!-- nama bank -->
					<div class="form-group" id="bank">
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
					
					<!-- tambah keterangan  -->
					
						<!-- status -->
						<div class="mb-3 row"id="status"  >
                        <div class="col-form-label">Status</div>
						<div class="col-sm-5">
                        <select class="form-select form-control-primary" name="status" value="<?$kas['status'];?>"> 
						  <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                        </select>
                      </div> 
					  </div>

					  <!-- catatan  -->
					  <div class="form-group" id="catatan">
						<label for="catatan">Catatan: </label>
						<textarea name="catatan" class="form-control"></textarea>
					</div>
				
			
			<div class="card-footer" style="margin-left:200px;">
				<button class="btn btn-info" type="submit">Submit</button>
				<input class="btn btn-light" type="reset" value="Cancel">
			</div>
		</form>
	</div>
</div>
</div>
<script>

// JAVA SCRIPT UNTUK HIDE 
	let elementWilayah = $('#element-kesalahan');

		// sembunyikan
		elementWilayah.hide();

		// perintah event on click
		$('input[name="status_verif"]').change(function () {


			if (this.value == "baru") {

				elementWilayah.fadeOut();
			} else {

				elementWilayah.fadeIn();
			}
		})

		let element = $('#element');


		// sembunyikan
		element.hide();

		// perintah event on click
		$('input[name="status_verif"]').change(function () {


			if (this.value == "belum verifikasi") {

				element.fadeOut();
			} else {

				element.fadeIn();
			}
		})


		//judul 
		let elementjudul = $('#judul');
		// sembunyikan
		elementjudul.hide();

		$('input[name="status_verif"]').change(function () {


		if (this.value == "belum verifikasi") {

			elementjudul.fadeOut();
		} else {

			elementjudul.fadeIn();
		}
		})


		// bank
		let elementbank = $('#bank');
		// sembunyikan
		elementbank.hide();

		$('input[name="status_verif"]').change(function () {


		if (this.value == "belum verifikasi") {

			elementbank.fadeOut();
		} else {

			elementbank.fadeIn();
		}
		})


		// status 
		let elementstatus = $('#status');
		// sembunyikan
		elementstatus.hide();

		$('input[name="status_verif"]').change(function () {


		if (this.value == "belum verifikasi") {

			elementstatus.fadeOut();
		} else {

			elementstatus.fadeIn();
		}
		})

// catatan untuk anggota 
let elementcatatan = $('#catatan');
		// sembunyikan
		elementcatatan.hide();

		$('input[name="status_verif"]').change(function () {


		if (this.value == "belum verifikasi") {

			elementcatatan.fadeOut();
		} else {

			elementcatatan.fadeIn();
		}
		})



</script>
