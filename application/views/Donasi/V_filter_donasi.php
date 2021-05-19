<br><br>
<div class="col-sm-12 col-xl-10" style="margin-left:50px;">
	<div class="card card-absolute">
		<div class="card-header bg-success">
			<h5 class="text-white"> <i class="fa fa-search" aria-hidden="true"></i> Filter Cetak Laporan</h5>
		</div>
		<div class="card-body">
			<h5 class="text-success" style="text-align:center;">Laporan Donasi<i class="fa fa-spin fa-spinner"></i></h5>
			<br><br>
			<?php echo $this->session->flashdata('flash-data') ?>
			<form action="<?php echo base_url('laporan/exportDonasi/') ?>" method="POST">
				<div class="row" style="margin-left:50px;">
					<div class="form-group" style="margin-left:100px;">
						<div class="row">
							<div class="mb-2 row">
								<label class="col-sm-2 col-form-label">Bulan:</label>
								<div class="col-sm-5">
									<select name="bulan" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="Tahun" disable="disable">-- Pilih salah satu --</option>
										<option value="January">Januari</option>
										<option value="February">Februari</option>
										<option value="March">Maret</option>
										<option value="April">April</option>
										<option value="May">Mei</option>
										<option value="June">Juni</option>
										<option value="July">Juli</option>
										<option value="August">Agustus</option>
										<option value="September">September</option>
										<option value="October">Oktober</option>
										<option value="November">November</option>
										<option value="December">Desember</option>
									</select>
								</div>
							</div>
						</div>

					</div>
					<br> <br>
					<!-- tahun -->
					<div class="form-group" style="margin-left:100px;">

						<div class="row">
							<div class="mb-2 row">
								<label class="col-sm-2 col-form-label">Tahun:</label>
								<div class="col-sm-5">
									<select name="tahun" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="tahun">-- Pilih salah satu --</option>
										<?php for($i=0; $i<sizeof($tahun); $i++){	?>
										<option value="<?php echo $tahun[$i]?>">
										<?php echo $tahun[$i]?>
										</option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-2">
					<button type="submit" style="margin-top: 35px; margin-left: 400px;"
						class="btn btn-success">Cetak</button>

				</div>
				<div class="col-md-2">
					<a style="margin-left:500px; margin-top:-55px;" href="<?php echo base_url('laporan/indexdonasi') ?>"
						class="btn btn-default">Reset</a>
				</div>
		</div>

		</form>

		<div class="card-footer" style="margin-left:150px;">
			<p>Silahkan mencetak laporan sesuai dengan filter yang dipilih! </p>
		</div>
	</div>
</div>
