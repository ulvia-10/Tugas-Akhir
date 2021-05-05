<div class="container">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="card"style="width:130%;">
        <div class="card-body" >
          <div>
            <h2><span class="font-w-4 d-block">Mari Berdonasi</span> sedekah mudah & berkah</h2>
            <p class="lead">Yuk upload bukti donasimu disini!</p>
          </div>
          <?php echo $this->session->flashdata('pesan') ?>
          <form id="contact-form" class="row" method="post" action="<?php echo base_url('donasi_non/prosestambahdonasinon') ?>" enctype="multipart/form-data" >
            <div class="messages"></div>
            <div class="form-group col-md-6">
              <input id="form_name" type="text" name="nama_donatur" class="form-control" placeholder="Nama " required="required" data-error="Name is required.">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_name1" type="text" name="no_rekening" class="form-control" placeholder="No Rekening" required="required" data-error="Nama wajib diisi">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_tgl_donasi" type="date" name="tgl_donasi" class="form-control" placeholder="Tanggal Donasi" required="required" data-error="Tanggal Donasi wajib diisi">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_email" type="email" name="email_donatur" class="form-control" placeholder="Email" required="required" data-error="Email wajib diisi.">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_phone" type="tel" name="telp_donatur" class="form-control" placeholder="Phone" required="required" data-error="No Telepon Wajib diisi">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_subject" type="file" name="bukti_donasi" class="form-control" placeholder="Upload Bukti Donasi" required="required" data-error="Bukti Donasi wajib diisi">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
              <input id="form_nominal_donasi" type="number" name="jml_donasi" class="form-control" placeholder="Nominal Donasi" required="required" data-error="Nominal Donasi wajib diisi">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group col-md-6">
            <select name="name_cabang" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="name_cabang">-- Pilih salah satu --</option>

										<?php


                                        foreach ($data_master->result_array() as $cabang) {

                                            echo '<option value="' . $cabang['id_cabang'] . '">' . $cabang['name_cabang'] . '</option>';
                                        }
                                        ?>
									</select>
            </div>
            <br><br> <br>
            <div class="divider"></div>
            <div class="col mt-4" style="margin-left:400px;">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
        </div>
      </div>
      <br>
      <div class="col-12 col-lg-4 ms-auto mt-5 mt-lg-0">
        <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded mb-3">
          <div class="me-3">
            <div class="f-icon-s p-3 rounded" data-bg-color="#d0faec"> <i class="fa fa-map" aria-hidden="true"></i>
            </div>
          </div>
          <div>
            <h5 class="mb-1">Address:</h5>
            <span class="text-black">Road Wordwide Country, USA</span>
          </div>
        </div>
        <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded mb-3">
          <div class="me-3">
            <div class="f-icon-s p-3 rounded" data-bg-color="#d0faec"> <i class="fa fa-envelope" aria-hidden="true"></i>
            </div>
          </div>
          <div>
            <h5 class="mb-1">Email Us:</h5>
            <a class="btn-link" href="mailto:themeht23@gmail.com"> themeht23@gmail.com</a>
          </div>
        </div>
        <div class="d-flex align-items-center bg-white p-3 shadow-sm rounded">
          <div class="me-3">
            <div class="f-icon-s p-3 rounded" data-bg-color="#d0faec"> <i class="fa fa-phone" aria-hidden="true"></i>
            </div>
          </div>
          <div>
            <h5 class="mb-1">Call Us:</h5>
            <a class="btn-link" href="tel:+912345678900">+91-234-567-8900</a>
          </div>
        </div>
      </div>
    </div>
    <section class="bg-pos-r" data-bg-img="assets/images/bg/01.png">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <div class="mb-5">
          <h2><span class="font-w-4 d-block">You can see our clients</span> feedback what you say?</h2>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div id="testimonial" class="testimonial-carousel carousel slide testimonial z-index-1" data-bs-ride="carousel" data-bs-interval="2500">
          <!-- Wrapper for slides -->
          <div class="row justify-content-center text-center">
            <div class="col-md-7">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="<?php echo base_url() ?>assets/images/testimonial/01.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Raymond Lee</h5>
                        <small class="text-muted font-italic">- Founder</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="<?php echo base_url() ?>assets/images/testimonial/02.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Dani Karie</h5>
                        <small class="text-muted font-italic">- Supervisor</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="<?php echo base_url() ?>assets/images/testimonial/03.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Karlo Bond</h5>
                        <small class="text-muted font-italic">- Manager</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="http://themeht.com/winck/ltr/assets/images/testimonial/04.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Rain Meeta</h5>
                        <small class="text-muted font-italic">- Ceo</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="http://themeht.com/winck/ltr/assets/images/testimonial/05.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Aubee Dion</h5>
                        <small class="text-muted font-italic">- Ceo</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="http://themeht.com/winck/ltr/assets/images/testimonial/06.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Mark Beele</h5>
                        <small class="text-muted font-italic">- Ceo</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="http://themeht.com/winck/ltr/assets/images/testimonial/07.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Nicole James</h5>
                        <small class="text-muted font-italic">- Ceo</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card p-2 p-md-5 border-0">
                    <div class="mb-3">
                      <img alt="Image" src="http://themeht.com/winck/ltr/assets/images/testimonial/08.jpg" class="shadow-primary img-fluid rounded-circle d-inline">
                    </div>
                    <div class="card-body p-0">
                      <p class="lead font-w-5">Winck Amazing Landing Page All-in-one, clean code, Crative &amp; Modern design Professional Recommended crofessional and great experience, Nam pulvinar vitae neque et porttitor, Praesent sed nisi eleifend, adipisicing elit.</p>
                      <div>
                        <h5 class="text-primary d-inline">Lena Shea</h5>
                        <small class="text-muted font-italic">- Ceo</small>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Item -->
              </div>
              <!-- End Carousel Inner -->
            </div>
          </div>
          <div class="controls">
            <ul class="nav justify-content-md-between justify-content-center">
              <li data-bs-target="#testimonial" data-bs-slide-to="0" class="active">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="<?php echo base_url() ?>assets/images/testimonial/01.jpg" alt="">
                </a>
              </li>
              <li class="mt-3" data-bs-target="#testimonial" data-bs-slide-to="1">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="<?php echo base_url() ?>assets/images/testimonial/02.jpg" alt="">
                </a>
              </li>
              <li data-bs-target="#testimonial" data-bs-slide-to="2">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="<?php echo base_url() ?>assets/images/testimonial/03.jpg" alt="">
                </a>
              </li>
              <li class="mt-3" data-bs-target="#testimonial" data-bs-slide-to="3">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="http://themeht.com/winck/ltr/assets/images/testimonial/04.jpg" alt="">
                </a>
              </li>
              <li data-bs-target="#testimonial" data-bs-slide-to="4">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="http://themeht.com/winck/ltr/assets/images/testimonial/05.jpg" alt="">
                </a>
              </li>
              <li class="mt-3" data-bs-target="#testimonial" data-bs-slide-to="5">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="http://themeht.com/winck/ltr/assets/images/testimonial/06.jpg" alt="">
                </a>
              </li>
              <li data-bs-target="#testimonial" data-bs-slide-to="6">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="http://themeht.com/winck/ltr/assets/images/testimonial/07.jpg" alt="">
                </a>
              </li>
              <li class="mt-3" data-bs-target="#testimonial" data-bs-slide-to="7">
                <a href="index.html#">
                  <img class="img-fluid rounded-circle shadow-primary" src="http://themeht.com/winck/ltr/assets/images/testimonial/08.jpg" alt="">
                </a>
              </li>
            </ul>
          </div>
        </div>
        <!-- End Carousel -->
      </div>
    </div>
  </div>
</section>

  </div>

