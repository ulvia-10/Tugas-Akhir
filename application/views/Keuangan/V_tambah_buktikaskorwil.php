<br><br>
<div class="col-xl-8 box-col-9" style="margin-left: 150px;">
<div class="card">
	<div class="card-header" >
		<h5 style="margin-left:150px;">Upload Bukti Transfer <i data-feather="upload"></i> </h5>
	</div>
	<form class="form theme-form" action="<?php echo base_url('keuangan/uploadbuktikaskorwil') ?>" method="POST" enctype="multipart/form-data" >
		<div class="card-body">
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

<div class="row" id="element-wilayah">
	<div class="mb-2 row">
		<label class="col-sm-3 col-form-label">Nama Anggota</label>
		<div class="col-sm-6">
			<select name="name_cabang" class="form-select digits" id=""
				required="wilayah harap DiIsi">
				<option value="full_name">-- Pilih nama anggota--</option>

				<?php

				foreach ($dataAnggota as $anggota) {

					echo '<option value="' . $anggota['id_keuangan'] . '">' . $anggota['full_name'] . '</option>';
				}
				?>
			</select>
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
							<input class="form-control" type="number" maxlength="6" name="nominal" min="0" placeholder="Masukkan nominal">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="mb-3 row">
						<label class="col-sm-3 col-form-label">Nomor Rekening</label>
						<div class="col-sm-5">
							<input class="form-control" type="number" maxlength="6" name="no_rekening" placeholder=" No rekening">
						</div>
					</div>
				</div>
			</div>
			
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
							<textarea class="form-control" name="deskripsi"></textarea>
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
