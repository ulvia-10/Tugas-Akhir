<br><br>
<div class="col-xl-8 box-col-9" style="margin-left: 150px;">
<div class="card">
	<div class="card-header" >
		<h5 style="margin-left:150px;">Edit Bukti Transfer Kas <i data-feather="upload"></i> </h5>
	</div>
	<form class="form theme-form" action="<?php echo base_url('keuangan/proseseditkasanggota/'. $kas['id_keuangan']) ?>" method="POST" enctype="multipart/form-data">
		<div class="card-body" style="margin-left: 50px;">
		<input class="form-control form-control-lg" name="id_keuangan" id="id_keuangan" value="<?= $kas['id_keuangan'];?>" type="hidden">
		<div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Judul</label>
						<div class="col-sm-5">
							<input class="form-control" type="text" name="judul" placeholder="Masukkan judul" value="<?= $kas['judul'] ;?>">
						</div>
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
							<input class="form-control" type="number" maxlength="6" name="nominal" min="0" placeholder="Masukkan nominal"  value="<?= $kas['nominal'] ;?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Nomor Rekening</label>
						<div class="col-sm-5">
							<input class="form-control" type="number" maxlength="6" name="no_rekening" placeholder=" No rekening" value="<?= $kas['no_rekening'] ;?>">
						</div>
					</div>
				</div>
			</div>
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
			<br>
			
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
							<textarea class="form-control" name="deskripsi"  value="<?= $kas['deskripsi'] ;?>"></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer" style="margin-left:250px;">
			<button class="btn btn-success" type="submit">Submit</button>
			<input class="btn btn-light" type="reset" value="Reset">
		</div>
	</form>
</div>
</div>
