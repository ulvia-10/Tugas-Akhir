<br><br>
<div class="col-xl-8 box-col-9" style="margin-left: 150px;">
	<div class="card">
		<div class="card-header">
			<h5 style="margin-left:150px;">Edit Bukti Transfer <i data-feather="upload"></i> </h5>
		</div>
		<form class="form theme-form" action="<?php echo base_url('adminkorwil/editKas') ?>" method="POST"	enctype="multipart/form-data">
			<div class="card-body">
				<!-- radio button  -->
				<div class="row">

					<label class="col-sm-3 col-form-label">Status Verifikasi</label>
					<div class="col-sm-9">
						<div class="m-checkbox-inline custom-radio-ml">
                        <div class="form-check form-check-inline radio radio-primary">
								<input class="form-check-input" id="radioinline8" type="radio" name="status_verif"
									value="belum verifikasi">
								<label class="form-check-label mb-0" for="radioinline8"><span class="digits">
										Pending</span></label>
							</div>
							<div class="form-check form-check-inline radio radio-primary">
								<input class="form-check-input" id="radioinline7" type="radio" name="status_verif"
									value="baru">
								<label class="form-check-label mb-0" for="radioinline7"><span class="digits"> Sudah
										Verifikasi
									</span></label>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-info" type="submit">Submit</button>
				<input class="btn btn-light" type="reset" value="Cancel">
			</div>
		</form>
	</div>
</div>
