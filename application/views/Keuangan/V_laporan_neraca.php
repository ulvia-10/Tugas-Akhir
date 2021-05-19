<br><br>
<div class="col-sm-12 col-xl-10" style="margin-left:50px;">
	<div class="card card-absolute">
		<div class="card-header bg-primary">
			<h5 class="text-white"> <i class="fa fa-search" aria-hidden="true"></i> Filter Cetak Laporan</h5>
		</div>
		<div class="card-body">
			<h5 class="text-bold" style="text-align:center;">Cetak Laporan Kas <i class="fa fa-download"
					aria-hidden="true"></i> </h5>
			<br><br>
			<?php echo $this->session->flashdata('flash-data') ?>
			<form action="<?php echo base_url('laporan/exportNeraca/') ?>" method="POST">
				<div class="row" style="margin-left:50px;">
					
					<br> <br>
					<!-- tahun -->
					<div class="form-group" style="margin-left:100px;">

						<div class="row" id="element-wilayah">
							<div class="mb-2 row">
								<label class="col-sm-2 col-form-label">Tahun:</label>
								<div class="col-sm-5">
								<select name="tahun" class="form-select digits" id="" required="wilayah harap DiIsi">
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
						class="btn btn-primary">Cetak</button>

				</div>
				<div class="col-md-2">
					<a style="margin-left:500px; margin-top:-55px;" href="<?php echo base_url('laporan/index/') ?>"
						class="btn btn-default">Reset</a>
				</div>
		</div>

		</form>

		<div class="card-footer" style="margin-left:150px;">
			<p>Silahkan mencetak laporan sesuai dengan filter yang dipilih! </p>
		</div>
	</div>
</div>
