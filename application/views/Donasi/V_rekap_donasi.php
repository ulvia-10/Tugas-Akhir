
<br> <br> <br><div class="container-fluid" style="margin-left:50px;">
            <div class="row">
            <div class="card col-sm-10">
            <div class="card-header">
            <h5 style="text-align:center;">Rekap Data Donasi <i class="fa fa-id-card" aria-hidden="true"></i></h5> <br>
            <p style="text-align:center;">Berikut Ini adalah hasil rekapan donasi dari setiap event!</p>
            <hr>
            <div class="card-body">
            <?php foreach($rekap AS $rekap) {?> 
            <div class="col-xl-8 box-col-8 col-lg-12 col-md-8">
                    <div class="card o-hidden">
                      <div class="card-body">
                        <div class="media">
                          <div class="media-body">
                            <p class="f-w-500 font-roboto">Total Donasi<span class="badge pill-badge-primary ms-3">Event <?=$rekap['nama_event']?></span></p>
                            <div class="progress-box">
                            <p>Saat ini terkumpul: </p> 
                              <h4 class="f-w-500 mb-0 f-26">RP. <span class="counter"> <?= number_format($rekap['TOTAL'], 2)?></span></h4>
                              <br>
                              <div class="progress sm-progress-bar progress-animate app-right d-flex justify-content-end">
                                <div class="progress-gradient-primary" role="progressbar" style="width: 35%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"><span class="font-primary"></span><span class="animate-circle"></span></div>
                               
                              </div>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <?php }?>

              </div>
              </div>
              </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>

          
     