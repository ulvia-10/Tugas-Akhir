
                    <h5 class="text-white"> <i class="fa fa-print" aria-hidden="true"></i> Filter Cetak Data</h5>
                  </div>
                  <div class="card-body">
				  <h5 class="text-primary" style="text-align:center;">Laporan Laba Rugi <i class="fa fa-spin fa-cog"></i></h5>      
				  <br><br>
                  <?php echo $this->session->flashdata('flash-data') ?>
						<form action="<?php echo base_url('C_data/exportLaporanPDF') ?>" method="GET">
							<div class="row">
							<div class="row" style="margin-left:50px;">

								<div class="form-group col-md-3">
									<label class="text-bold"for="kategori">Lihat berdasarkan</label> <br>
									<input type="date" class="form-control" name="start">
									<label class="text-bold"for="kategori">Lihat Berdasarkan:</label> <br>
									<input type="date" class="form-control" name="start" >
								</div>
								<div class="form-group col-md-2">
									<div style="margin-top: 40px">Sampai</div>
									<div style="margin-top: 40px; margin-left:25px;">Sampai</div>
								</div>
								<div class="form-group col-md-3">
									<input type="date" class="form-control" name="end" style="margin-top: 35px">


						</form>
                  </div>
                  <div class="card-footer">
                  
                  <p>SIlahkan mencetak sesuai filter yang ada</p>
                  <div class="card-footer" style="margin-left:150px;">
                  <p>Silahkan mencetak laporan sesuai dengan filter yang dipilih! </p>
                  </div>
                </div>
              </div>