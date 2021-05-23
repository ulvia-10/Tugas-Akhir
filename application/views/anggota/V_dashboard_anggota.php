<br> <br>
<div class="container-fluid">
	<div class="row">
		<div class="col-xl-6 xl-100 box-col-12">
			<div class="card">
				<div class="cal-date-widget card-body">
					<div class="row">
						<h5 class="text-primary" style="text-align:center;"><strong>Wadah Generasi Muda <br> Melunasi
								Janji Pelosok Nusantara</strong></h5>
						<div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
							<br><br>
							<div class="cal-info text-center">

								<img src="<?= base_url('assets/Home/images/hero/logo.png'); ?>" class="img-thumbnail"
									style="width: 75%;" alt="...">
								<div class="d-inline-block mt-2"><span class="b-r-dark pe-3">March</span><span
										class="ps-3">2018</span></div>
								<p class="mt-4 f-16 text-dark">Hi! <br>
									<strong><span><?php echo $this->session->userdata('sess_fullname') ?></span></strong>
									<br> Anggota Senyum Desa! <i class="fas fa-hand-holding-heart    "></i> </p>
							</div>
						</div>
						<div class="col-xl-6 col-xs-12 col-md-6 col-sm-6">
							<div class="cal-datepicker">
								<div class="datepicker-here float-sm-end" data-language="en"> </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="col-xl-5 xl-100 box-col-6">
			<div class="card">
				<div class="card-body">
					<div class="product-page-details">
						<h3>Info Event Donasi</h3>
					</div>
					<ul class="product-color m-t-15">
						<li class="bg-primary"></li>
						<li class="bg-secondary"></li>
						<li class="bg-success"></li>
						<li class="bg-info"></li>
						<li class="bg-warning"></li>
					</ul>
					<hr>
					<p>Hai Anggota Senyum Desa! <br> Yuk mari kita saling membantu saudara kita yang saat ini
						membutuhkan pertolongan dari kita semua. Mari kita Bantu mereka merajut asa kembali.</p>
					<hr> <br>
					<!-- result array -->
					<?php foreach($event AS $event ){ ?>
					<div class="col-sm-12 col-xl-6">
						<div class="card">
							<div class="card-header">
								<h5><?=$event['nama_event']?></h5>

							</div>
							<div class="card-body">
								<h6> <?= date('d-M-Y',strtotime($event['durasi_mulai']))?> sampai
									<?= date('d-M-Y',strtotime($event['durasi_berakhir']))?></h6>
								<p><?= $event['deskripsi_event']?></p>
								<br>
								<span class="badge badge-warning text-dark">Open Now Donasi!</span>
							</div>
						</div>
					</div>
					<?php } ?>
					<div class="m-t-15">

						<a style=margin-left:40%; class="btn btn-secondary"
							href="<?= base_url('donasi/riwayatdonasi'); ?>"> <i class="fa fa-heart me-1"></i> Aku Mau
							Berdonasi! </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
