
<br><br>
<div class="col-sm-12 col-xl-6" style="margin-left: 200px;">
                <div class="card card-absolute">
                  <div class="card-header bg-success">
                    <h5 class="text-white">Edit Profile</h5>
                  </div>
                  <div class="card-body">
                  <form class="theme-form" action="<?php echo base_url('profile/proseseditprofilpusat/'. $profile['id_profile']) ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id_profile">
				<!-- email  -->
				<div class="mb-2">
					<label class="col-form-label" for="email" >Email</label>
					<input name="email"class="form-control" type="text" rows="3" cols="50" placeholder="Masukkan Email baru " value="<?=$profile['email']?>">
				</div>
				<!-- telp -->
				<div class="mb-3">
					<label class="col-form-label" for="telepon">Telepon</label>
					<input name="telp" class="form-control" type="number" rows="3" cols="50" placeholder="Masukkan telepon Baru" value="<?=$profile['telp']?>">
				</div>
				<!-- alamat  -->
				<div class="mb-3">
					<label class="col-form-label" for="address" >Alamat</label>
					<textarea name="address" class="form-control" type="text" rows="3" cols="50" placeholder="Masukkan Alamat Baru" value="<?=$profile['address']?>" > </textarea>
				</div>
				<!-- foto -->
				<div class="mb-2">
					<label class="col-form-label" for="photo" >Foto</label>
					<input name="photo" class="form-control" type="file" rows="3" cols="50">
				</div>
				<!--  button edit -->
				<div class="text-sm-end">
					<button class="btn btn-success">Submit <i class="fa fa-check-circle" aria-hidden="true"></i> </button>
				</div>
			</form>
    <div>



                  </div>
                </div>
              </div>
</div>