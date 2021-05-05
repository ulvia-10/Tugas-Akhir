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
				<div class="row">
				<div class="mb-2">
                        <div class="col-form-label">Status</div>
                        <select class="form-select form-control-primary" name="status" value="<?$kas['status'];?>"> 
						  <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
                                <option value="Kadaluwarsa">Kadaluwarsa</option>
                        </select>
                      </div> <br>
					<label class=" col-form-label">Status Verifikasi</label>
					<div class="col-sm-9">
						<div class="m-checkbox-inline custom-radio-ml">
                        <div class="form-check form-check-inline radio radio-primary">
								<input class="form-check-input" id="radioinline8" type="radio" name="status_verif" value="belum verifikasi">
								<label class="form-check-label mb-0" for="radioinline8"><span class="digits">
										Pending</span></label>
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
			</div>
			<div class="card-footer" style="margin-left:250px;">
				<button class="btn btn-info" type="submit">Submit</button>
				<input class="btn btn-light" type="reset" value="Cancel">
			</div>
		</form>
	</div>
</div>
