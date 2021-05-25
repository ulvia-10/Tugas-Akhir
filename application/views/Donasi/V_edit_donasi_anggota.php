<br> <br>
<div class="col-xl-7 box-col-9" style="margin-left: 150px;">
	<div class="card">
		<div class="card-header">
			<h5 style="text-align:center; margin-left:20px;"> Edit Bukti Donasi <i class="fa fa-address-book"
					aria-hidden="true"></i> </h5>
		</div>
		<form class="form theme-form"
			action="<?php echo base_url('donasi/proseseditdonasianggota/'. $donasi['Id_donasi']) ?>" method="POST"
			enctype="multipart/form-data">
			<div class="card-body">
        <!-- input hidden id -->
				<input class="form-control form-control-lg" name="Id_donasi" id="Id_donasi" value="<?= $donasi['Id_donasi'];?>" type="hidden">
				<div class="row">
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Tanggal Donasi</label>
							<div class="col-sm-9">
								<input class="form-control" type="date" name="tgl_donasi" value="<?php echo date('Y-m-d')?>">
							</div>
						</div>
					</div>
				</div>

        <!-- nama event  -->
		<div class="row">
						<div class="col">
							<div class="mb-3 row">
								<label class="col-sm-3 col-form-label">Nama Event</label>
								<div class="col-sm-9">
									<select name="nama_event" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="nama_event">-- Pilih Nama Event --</option>
										
										<!-- foreach rsult array nama event donasi  -->
										<?php
                        
										$tanggal_sekarang = (date('Y-m-d H:i:s'));
	  
										foreach($event AS $event){

											$tanggal_awal = ($event['durasi_mulai']);
											$tanggal_akhir = ($event['durasi_berakhir']);

											// echo 'apakah '. $tanggal_sekarang.' >= '.$tanggal_awal.' dan '. $tanggal_sekarang.' <= '. $tanggal_akhir; 

											// echo ( ($tanggal_sekarang >= $tanggal_awal) && ($tanggal_sekarang <= $tanggal_akhir) ) ? " |tampilkan" : " |expired";


											if ( ($tanggal_sekarang >= $tanggal_awal) && ($tanggal_sekarang <= $tanggal_akhir)  ) {

																			echo '<option value="' . $event['id_event'] . '">' . $event['nama_event'] . '</option>';
																		}
																	}
									 	 ?>



									</select>
								</div>
							</div>
						</div>
					</div>
				<br>

				<!-- upload bukti -->
				<div class="row">
					<div class="col">
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label">Upload Bukti</label>
							<div class="col-sm-9">
								<input class="form-control" type="file" name="bukti_donasi" value="<?= $donasi['bukti_donasi'] ;?>">
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="card-footer" style="margin-left:210px;">
				<button class="btn btn-secondary" type="submit">Submit</button>
				<input class="btn btn-light" type="reset" value="Cancel">
			</div>
		</form>
	</div>
</div>
