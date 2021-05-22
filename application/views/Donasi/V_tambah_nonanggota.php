<div class="container">
	<div class="row">
  <?php echo $this->session->flashdata('pesan') ?>
		<div class="col-12 col-lg-6">
			<div class="card" style="width:130%;">
   
				<div class="card-body">
					<div>
						<h2><span class="font-w-4 d-block">Mari Berdonasi</span> sedekah mudah & berkah</h2>
						<p class="lead">Yuk upload bukti donasimu disini!</p>
					</div>
			
					<form id="contact-form" class="row" method="post"
						action="<?php echo base_url('donasi_non/prosestambahdonasinon') ?>" enctype="multipart/form-data">
						<div class="messages"></div>
						<div class="form-group col-md-6">
							<input id="form_name" type="text" name="nama_donatur" class="form-control" placeholder="Nama "
								required="required" data-error="Name is required.">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group col-md-6">
							<input id="form_tgl_donasi" type="date" name="tgl_donasi" class="form-control"
								placeholder="Tanggal Donasi" required="required" data-error="Tanggal Donasi wajib diisi">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group col-md-6">
							<input id="form_email" type="email" name="email_donatur" class="form-control" placeholder="Email"
								required="required" data-error="Email wajib diisi.">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group col-md-6">
							<input id="form_phone" type="tel" name="telp_donatur" class="form-control" placeholder="Phone"
								required="required" data-error="No Telepon Wajib diisi">
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group col-md-6">
							<input id="form_subject" type="file" name="bukti_donasi" class="form-control"
								placeholder="Upload Bukti Donasi" required="required" data-error="Bukti Donasi wajib diisi">
							<div class="help-block with-errors"></div>
							<p>bukti transfer</p>
						</div>

						<div class="form-group col-md-6">
							<select name="name_cabang" class="form-select digits" id="" required="wilayah harap DiIsi">
								<option value="name_cabang">-- Pilih salah satu --</option>

								<?php


                                        foreach ($data_master->result_array() as $cabang) {

                                            echo '<option value="' . $cabang['id_cabang'] . '">' . $cabang['name_cabang'] . '</option>';
                                        }
                                        ?>
							</select>
              <div class="help-block with-errors"></div>
              <p>Pilih Nama Cabang</p>

						</div>
						<div class="form-group col-md-6" style="margin-left:250px;">
							<input type="checkbox" id="tampil" name="tampil" value="tampil"> Tampilkan sebagai anonim 
						</div>
						<br><br> <br>
						<div class="divider"></div>
						<div class="col mt-4" style="margin-left:300px;">
							<button class="btn btn-primary">Submit <i class="fa fa-check-circle" aria-hidden="true"></i> </button>
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


</div>
