<br> <br>
<div class="container-fluid">
<div class="row">
<div class="col-sm-12 col-lg-6 col-xl-6 xl-50 col-md-6 box-col-6" style="margin-left: 20%;">

	<div class="card height-equal">
		
		<div class="contact-form card-body">
		<div class="card-header" style="text-align:center">
			<h5 class="text-success">Edit Profile <i class="fa fa-user-circle" aria-hidden="true"></i></h5>
		</div>
			<form class="theme-form" action="<?php echo base_url('profile/editprofileanggota/'. $profile['id_profile']) ?>" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="id_profile">
				<!-- email  -->
				<div class="mb-2">
					<label class="col-form-label" for="email" >Email</label>
					<input name="email"class="form-control" type="text" rows="3" cols="50" placeholder="Masukkan Email baru " >
				</div>
				<!-- telp -->
				<div class="mb-3">
					<label class="col-form-label" for="telepon">Telepon</label>
					<input name="telp" class="form-control" type="number" rows="3" cols="50" placeholder="Masukkan telepon Baru" >
				</div>
				<!-- alamat  -->
				<div class="mb-3">
					<label class="col-form-label" for="address" >Alamat</label>
					<input name="address" class="form-control" type="text" rows="3" cols="50" placeholder="Masukkan Alamat Baru"  >
				</div>
				<!-- foto -->
				<div class="mb-2">
					<label class="col-form-label" for="photo" >Foto</label>
					<input name="photo" class="form-control" type="file" rows="3" cols="50">
				</div>
				<!--  button edit -->
				<div class="text-sm-end">
					<button class="btn btn-success">Edit</button>
				</div>
			</form>

		</div>
	</div>
</div>
</div>
</div>
