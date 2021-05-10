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
						<form action="<?php echo base_url('C_data/exportLaporanPDF') ?>" method="GET">
							<div class="row" style="margin-left:50px;">

								<div class="form-group col-md-3">
									<label class="text-bold"for="kategori">Lihat Berdasarkan:</label> <br>
									<input type="date" class="form-control" name="start" >
								</div>
								<div class="form-group col-md-2">
									<div style="margin-top: 40px; margin-left:25px;">Sampai</div>
								</div>
								<div class="form-group col-md-3">
									<input type="date" class="form-control" name="end" style="margin-top: 35px">
								</div>
								<div class="col-md-2"><button type="submit" style="margin-top: 35px"
										class="btn btn-success">Cetak</button></div>
								<div class="col-md-2"><a href="<?php echo base_url('C_data') ?>"
										style="margin-top: 35px; margin-left:-30px; " class="btn btn-default">Reset</a>
								</div>
							</div>

						</form>
                  </div>
                  <div class="card-footer" style="margin-left:150px;">
                  <p>Silahkan mencetak laporan sesuai dengan filter yang dipilih! </p>
                  </div>
                </div>
              </div>