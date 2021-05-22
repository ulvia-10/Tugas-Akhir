<br><br>
<div class="row">
<div class="col-sm-12 col-xl-6">
                <div class="card card-absolute">
                  <div class="card-header bg-secondary">
                    <h5 class="text-white">Detail Event <i class="fa fa-calendar-check-o" aria-hidden="true"></i></h5>
                  </div>
                  <div class="card-body">
                  <!-- nama event  -->
                  <p class="card-text">
							<label for="nama_event"><b> Nama Event:</b></label>
							<?= $event['nama_event']; ?>
						</p>

                <!-- Tanggal Mulai -->
                <p class="card-text">
							<label for="durasi_mulai"><b>Tanggal Mulai:</b></label>
							<?= date('d-M-Y',strtotime($event['durasi_mulai'])); ?>
						</p>

                <!-- tanggal berakhir  -->
                <p class="card-text">
							<label for="durasi_berakhir"><b>Tanggal Berakhir:</b></label>
							<?= date('d-M-Y',strtotime($event['durasi_berakhir'])); ?>
						</p>
                        <p class="card-text">
							<label for="durasi"><b> Status Event:</b></label>
					<span class="badge badge-primary"><?= $event['status_event']; ?></span>		
						</p>
                        <p class="card-text">
							<label for="deskripsi_event"><b> Deskripsi:</b></label>
							<?= $event['deskripsi_event']; ?>
						</p>
                       
                    
                    
                  </div>
                </div>
              </div>
              <!-- row -->
              <div class="col-sm-12 col-xl-6">
                <div class="card card-absolute">
                  <div class="card-header bg-primary">
                    <h5 class="text-white">Gambar Event <i class="fa fa-search-plus" aria-hidden="true"></i></h5>
                  </div>
                  <div class="card-body">
                  <img src="<?= base_url('./assets/images/' . $event['gambar_event']); ?>"
							alt="Gambar Event belum terupload! " style="width:50%; height:85%; margin-left:50px;"> <br> 
                  </div>
                </div>
              </div>
              </div>