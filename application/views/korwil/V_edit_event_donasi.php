<br><br>
<div class="col-sm-12 col-xl-9" style="margin-left:100px;">
                <div class="card">
                  <div class="card-header b-l-primary">
                    <h5>Edit Event Donasi</h5>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo base_url('donasi/proseseditevent/'.$event['id_event']) ?>"  method="POST" enctype="multipart/form-data">

                    <input class="form-control form-control-lg" name="id_event" id="id_Event" value="<?= $event['id_event'];?>" type="hidden">
                    <!-- NAMA EVENT  -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Nama Event: </label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="text" name="nama_event" placeholder="Masukkan Nama event" value=  "<?=$event['nama_event'];?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tanggal Mulai  -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Tanggal Event Mulai : </label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="date" name="durasi_mulai" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- tanggal berakhir -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label">Tanggal Event Berakhir : </label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="date" name="durasi_berakhir" >
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- gambar event  -->

                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label"> Gambar Event: </label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" name="gambar_event" >
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- tanggal berakhir -->
                    <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-4 col-form-label"> Deskripsi Event: </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" type="date" name="deskripsi_event" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- status -->
                    <label class=" col-form-label" >Pilih Status Event: </label>
				<div class="col-sm-9" >
					<div class="m-checkbox-inline custom-radio-ml">
					<div class="form-check form-check-inline radio radio-primary">
							<input class="form-check-input" id="radioinline8" type="radio" name="status_event" value="active">
							<label class="form-check-label mb-0" for="radioinline8">
							<span class="digits text"> Aktif </span></label>
						</div>
						<div class="form-check form-check-inline radio radio-primary">
							<input class="form-check-input" id="radioinline7" type="radio" name="status_event" value=
							"inactive">
							<label class="form-check-label mb-0" for="radioinline7"><span class="digits"> Tidak Aktif
								</span></label>
						</div>
                        </div>
                    <div class="card-footer" style="margin-left:350px;">
                        <button class="btn btn-dark" type="submit">Submit</button>
                    </div>
                    
                    </form>
                  </div>
                </div>
              </div>
              </div>
              </div>