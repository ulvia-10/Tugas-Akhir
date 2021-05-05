<br> <br>
<div class="col-xl-7 box-col-9" style="margin-left: 150px;">
<div class="card">
                  <div class="card-header">
                    <h5 style="text-align:center; margin-left:20px;"> Tambah Bukti Donasi <i class="fa fa-id-card" aria-hidden="true"></i> </h5>
                  </div>
                  <form class="form theme-form" action="<?php echo base_url('donasi_non/tambahdonasinonanggotakorwil') ?>" method="POST"  enctype="multipart/form-data" >
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
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Donatur</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="nama_donatur" placeholder="Masukkan Nama Donatur">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- email donatur  -->
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Email Donatur</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="email"  name="email_donatur" placeholder="Masukkan Email Donatur">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- telp donatur  -->
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Telp Donatur</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number"  maxlength="12" name="telp_donatur" placeholder="Masukkan No Telp Donatur">
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
                              <input class="form-control" type="number" minlength="16" maxlength="20" name="no_rekening" placeholder="Masukkan No Rekening">
                            </div>
                          </div>
                        </div>
                      </div>
                      
                         <!-- no rekening -->
                         <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
      
                              <input class="form-control" type="number" name="jml_donasi" placeholder="Masukkan Nominal">
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- jumlah donasi  -->
                      
                      <!-- upload bukti -->
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label"> Bukti Donasi</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="bukti_donasi">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="card-footer" style="margin-left:250px;">
                      <button class="btn btn-primary" type="submit">Submit</button>
                      <input class="btn btn-light" type="reset" value="Cancel">
                    </div>
                  </form>
                </div>
                </div>