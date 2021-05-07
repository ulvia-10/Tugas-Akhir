<br><br>
<div class="col-sm-12 col-xl-10" style="margin-left:90px;">
                <div class="card b-r-0">
                  <div class="card-header">
                    <h6 class="text-primary"> <i class="fa fa-print" aria-hidden="true"></i> Filter Cetak Data</h6>
                    <div class="card-header-right">
                      <ul class="list-unstyled card-option">
                        <li><i class="fa fa-spin fa-cog"></i></li>
                        <li><i class="view-html fa fa-code"></i></li>
                        <li><i class="icofont icofont-maximize full-card"></i></li>
                        <li><i class="icofont icofont-minus minimize-card"></i></li>
                        <li><i class="icofont icofont-refresh reload-card"></i></li>
                        <li><i class="icofont icofont-error close-card"></i></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body">
                	<?php echo $this->session->flashdata('flash-data') ?>
						<form action="<?php echo base_url('C_data/exportLaporanPDF') ?>" method="GET">
							<div class="row">

								<div class="form-group col-md-3">
									<label class="text-bold"for="kategori">Lihat berdasarkan</label> <br>
									<input type="date" class="form-control" name="start">
								</div>
								<div class="form-group col-md-2">
									<div style="margin-top: 40px">Sampai</div>
								</div>
								<div class="form-group col-md-3">
									<input type="date" class="form-control" name="end" style="margin-top: 35px">
								</div>
								<div class="col-md-2"><button type="submit" style="margin-top: 35px"
										class="btn btn-primary">Cetak</button></div>
								<div class="col-md-2"><a href="<?php echo base_url('C_data') ?>"
										style="margin-top: 35px; margin-left:-30px; " class="btn btn-default">Reset</a>
								</div>
							</div>

						</form>

                  </div>
                </div>
              </div>