<br><br> <br>
<div class="container-fluid">
	<!-- set flash data  -->
	<div class="row" style="margin-left:50px;">

		<div class="col-xl-4 box-col-10">
			<br> <br>
			<div class="card custom-card">
            <div class="card-header"><img class="img-fluid" src="http://admin.pixelstrap.com/cuba/assets/images/user-card/2.jpg" alt=""></div>
				<div class="card-profile"><img class="rounded-circle"
						src="<?= base_url('./assets/images/' . $profile['photo']); ?>" alt=""></div>
				<ul class="card-social">
					<li><a> <i class="fa fa-users" aria-hidden="true"></i></a></li>
					<li><a> <i class="fa fa-heart" aria-hidden="true"></i></a></li>
					<li><a> <i class="fa fa-sun-o" aria-hidden="true"></i> </a></li>
					<li><a><i class="fa fa-fire" aria-hidden="true"></i></a></li>

				</ul>
				<div class="text-center profile-details">
					<h4> <?= $profile['full_name']; ?></h4>
					<h6>Admin <?= $profile['level']; ?></h6>
				</div>
				<div class="card-footer row">
					<div class="col-7 col-sm-4">
						<p>Name</p>
						<h6 class="counter text-bold"><?= $profile['username']; ?></h6>
					</div>
					<div class="col-4 col-sm-4">
						<p>Status <br</p> 
                        <h6><span class="counter"><?= $profile['status_account']; ?></h6>
					</div>
					<div class="col-4 col-sm-4">
						<p>Cabang</p>
                        <h6><span class="counter"><?= $profile['name_cabang']; ?></h6>
						
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="col-xl-6 box-col-6">

			<div class="card">
				<div class="card-header" style="text-align: center;">
					<h6 class="font-success">My Profile <i class="fa fa-user-circle" aria-hidden="true"></i></h6> 

				</div>
				<div class="card-body" style="margin-left:30px;">
					<h5 class="card-title" style="text-align:center;"><?= $profile['full_name']; ?> </h5> <br>
					<p class="card-text">Email: <?= $profile['email']; ?></p>
					<p class="card-text">Telepon: <?= $profile['telp']; ?></p>
					<p class="card-text">Tempat Lahir: <?= $profile['tempat_lahir']; ?></p>
					<?php
														
														$tanggal = "-";
														if ( $profile['tanggal_lahir'] ){

															$tanggal = date('d-M-Y',strtotime($profile['tanggal_lahir']));
														}
													?>
					<p class="card-text">Tanggal Lahir: <?= $tanggal ?></p>
					<p class="card-text">Asal: <?= $profile['asal']; ?></p>
					<p class="card-text">Alamat: <?= $profile['address']; ?></p>
					<p class="card-text"> Telah diubah pada: <?= date('d-m-Y H:i',strtotime($profile['created_at'])); ?></p>
					<a href="<?= base_url('profile/editprofilpusat'); ?>" class="btn btn-success"
						style="margin-left:200px;">Edit <i class="fa fa-edit"></i></a>
				</div>
			</div>
		</div>

	</div>




</div>
