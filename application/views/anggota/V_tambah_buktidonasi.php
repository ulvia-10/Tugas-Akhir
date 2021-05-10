<br> <br>
<div class="col-xl-7 box-col-9" style="margin-left: 150px;">
<div class="card">
                  <div class="card-header">
                    <h5 style="text-align:center; margin-left:20px;"> Bukti Donasi  <i class="fa fa-address-book" aria-hidden="true"></i> </h5>
                  </div>
                  <form class="form theme-form" action="<?php echo base_url('donasi/uploadbuktidonasi') ?>" method="POST"  enctype="multipart/form-data" >
                    <div class="card-body">
                    <!-- tanggal donasi -->
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
                        <!-- no rekening -->
                        <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">No Rekening</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number" minlength="16" maxlength="20" name="no_rekening" placeholder="Masukkan no rekening">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- nama bank -->
					<div class="form-group" id="element-wilayah">
				<div class="row">
					<div class="mb-2 row">
						<label class="col-sm-3 col-form-label">Nama Bank</label>
						<div class="col-sm-6">
							<select name="nama_bank" class="form-select digits" 
								required="Nama Anggota harus diisi ">
								<option value="nama_bank" disable>-- Pilih nama bank--</option>
								<option value="BRI">BANK BRI </option>
								<option value="BNI">BANK BNI</option>
								<option value="MANDIRI">BANK MANDIRI</option>
								<option value="BCA">BANK BCA</option>
							</select>
						</div>
					</div>
				</div>
				</div>
			<br>
                         <!-- no rekening -->
                         <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number" name="jml_donasi" placeholder="Masukkan nominal donasi">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- jumlah donasi  -->
                      
                      <!-- upload bukti -->
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Upload Bukti</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="bukti_donasi" >
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