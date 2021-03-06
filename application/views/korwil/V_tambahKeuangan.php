<div class="container-fluid">
	<br> <br>
	<div class="card col-sm-6" style="margin-left:200px;">
		<div class="card-header">
			<h6 class="text-success" style="text-align:center;">Tambah Keuangan Senyum Desa</h6>
		</div>
		<form class="form theme-form" action="<?php echo base_url('adminkorwil/prosesTambahKeuangan') ?>" method="POST" enctype="multipart/form-data">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="judul">Judul</label>
							<input class="form-control form-control-lg" name="judul" id="judul" type="text"
								placeholder="Masukan judul" required="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="tipe">Tipe</label>
							<select class="form-select form-control-lg digits" name="tipe" id="tipe" required="">
								<option selected="" disabled="" value="">Pilih Tipe</option>
								<option value="pendaftaran">Pendaftaran</option>
								<option value="sosialisasi">sosialisasi</option>
								<option value="raker">Rapat Kerja</option>
								<option value="danadarurat">Dana Darurat</option>
							</select>
						</div>
					</div>
				</div>
                
            <!-- jenis keuangan  -->
				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="jenis_keuangan">Jenis Keuangan</label>
							<select class="form-select form-control-lg digits" name="jenis_keuangan" id="jenis_keuangan"
								required="">
								<option selected="" disabled="" value="">Pilih Jenis Kas</option>
								<option value="masuk">Masuk</option>
								<option value="keluar">Keluar</option>
							</select>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="nominal">Nominal</label>
							<input class="form-control form-control-sm" name="nominal" id="nominal" type="number"
								placeholder="Masukan Nominal" required="">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="deskripsi">Deskripsi</label>
							<textarea class="form-control form-control-lg" name="deskripsi" id="deskripsi" type="text"
								placeholder="Masukan deskripsi" required=""></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="mb-3">
							<label class="form-label" for="bukti_bayar">Foto Bukti</label>
							<input class="form-control form-control-lg" name="bukti_bayar" id="bukti_bayar" type="file"
								placeholder="Masukan deskripsi" required=""></textarea>
						</div>
					</div>
				</div>

			</div>
			<div class="card-footer">
				<button class="btn btn-primary" type="submit">Submit</button>
				<input class="btn btn-warning" type="reset" value="Reset">
				<a href="<?= base_url('Adminkorwil/tabelKeuangan'); ?>" class="btn btn-light" type="submit">Cancel</a>
			</div>
		</form>
	</div>
</div>

<!-- Container-fluid Ends-->
