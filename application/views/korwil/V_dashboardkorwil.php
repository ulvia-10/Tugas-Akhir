<div class="container-fluid">
	<div class="page-title">
		<div class="row">
			<div class="col-6" style="margin-left: 250px;">
				<h3>WELCOME ADMIN KORWIL <?=$nama['name_cabang']?> </h3>
			</div>

		</div>
	</div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">

	<div class="col-xl-12 xl-100 chart_data_left box-col-12">
		<div class="card">
			<div class="card-body p-0">
				<div class="row m-0 chart-main">
					<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
						<div class="media align-items-center">
							<div class="hospital-small-chart">
								<div class="small-bar">
									<div class="small-chart flot-chart-container"></div>
								</div>
							</div>
							<div class="media-body">
								<div class="right-chart-content">
									<h4><?= $getProfile; ?></h4><span>Total Jumlah Anggota</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
						<div class="media align-items-center">
							<div class="hospital-small-chart">
								<div class="small-bar">
									<div class="small-chart1 flot-chart-container"></div>
								</div>
							</div>
							<div class="media-body">
								<div class="right-chart-content">
									<h4><?= $getKeuangan; ?></h4><span>Total Laporan Data Keuangan</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
						<div class="media align-items-center">
							<div class="hospital-small-chart">
								<div class="small-bar">
									<div class="small-chart2 flot-chart-container"></div>
								</div>
							</div>
							<div class="media-body">
								<div class="right-chart-content">
									<h4><?= $getWilayah; ?></h4><span>Total Cabang Wilayah</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6">
						<div class="media border-none align-items-center">
							<div class="hospital-small-chart">
								<div class="small-bar">
									<div class="small-chart3 flot-chart-container"></div>
								</div>
							</div>
							<div class="media-body">
								<div class="right-chart-content">
									<h4><?= $getKegiatan; ?></h4><span>Data Kegiatan</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>





	<div class="row second-chart-list third-news-update">
		<div class="col-xl-4 col-lg-12 xl-50 morning-sec box-col-12">
			<div class="card o-hidden profile-greeting">
				<div class="card-body">
					<div class="media">
						<div class="badge-groups w-100">
							<div class="badge f-12"><i class="me-1" data-feather="clock"></i><span id="txt"></span>
							</div>
							<div class="badge f-12"><i class="fa fa-spin fa-cog f-14"></i></div>
						</div>
					</div>
					<div class="greeting-user text-center">
						<p><span>
								<h5 class="text-light"> Hello! <?php echo $this->session->userdata('sess_fullname') ?>
								</h5>
							</span>
						</p>
						<div class="profile-vector"><img class="img-fluid" width="200px" height="200px"
								src="<?php echo base_url('assets/images/' . $this->session->userdata('sess_foto')) ?>"
								alt="">
						</div>
						<h4 class="f-w-600"><span id="greeting">Good Morning</span> <span class="right-circle"><i
									data-feather="loader">
								</i> </span></h4>

						<div class="whatsnew-btn"><a href="<?= base_url('profile/profilkorwil'); ?>"
								class="btn btn-primary">My Profile</a></div>

					</div>
				</div>
			</div>
		</div>



		<div class="col-xl-4 col-lg-12 xl-50 calendar-sec box-col-6">
			<div class="card gradient-primary o-hidden">
				<div class="card-body">
					<div class="setting-dot">
						<div class="setting-bg-primary date-picker-setting position-set pull-right"><i
								class="fa fa-spin fa-cog"></i></div>
					</div>
					<div class="default-datepicker">
						<div class="datepicker-here" data-language="en"></div>
					</div><span class="default-dots-stay overview-dots full-width-dots"><span class="dots-group"><span
								class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
								class="dots dots3 dot-small"></span><span class="dots dots4 dot-medium"></span><span
								class="dots dots5 dot-small"></span><span class="dots dots6 dot-small"></span><span
								class="dots dots7 dot-small-semi"></span><span
								class="dots dots8 dot-small-semi"></span><span class="dots dots9 dot-small">
							</span></span></span>
				</div>
			</div>
		</div>

		<div class="col-xl-3 risk-col xl-100 box-col-12">
			<div class="card total-users">
				<div class="card-header card-no-border">
					<h5>Info Donasi Masuk </h5> <br>
					<div style="text-align:center;">
						<h6 class="font-primary">Sampai Saat ini</h6>
						<h6 class="f-w-400"><?=date('l, d-M-Y ')?></h6>

					</div>

					<hr>
					<div class="card-header-right">
						<ul class="list-unstyled card-option">
							<li><i class="fa fa-spin fa-cog"></i></li>
							<li><i class="view-html fa fa-code"></i></li>
							<li><i class="icofont icofont-maximize full-card"></i></li>
							<li><i class="icofont icofont-minus minimize-card"></i></li>
							<li><i class="icofont icofont-refresh reload-card"></i></li>
							<li><i class="icofont icofont-error close-card"></i></li>
						</ul>
					</div>
				</div>
				<div class="card-body pt-0">

					<?php
                      $tanggal_sekarang = (date('Y-m-d H:i:s'));
                    foreach ($donasimasuk AS $jadwal){
                        
                        
          $tanggal_awal = ($jadwal['durasi_mulai']);
          $tanggal_akhir = ($jadwal['durasi_berakhir']);
          
          if ( ($tanggal_sekarang >= $tanggal_awal) && ($tanggal_sekarang <= $tanggal_akhir)  ) {
          ?>
					<div class="apex-chart-container goal-status text-center row">
						<div class="rate-card col-xl-12">
							<div class="goal-chart">
								<div id="riskfactorchart"></div>
							</div>
							<div class="goal-end-point">
								<ul>

									<li>
										<h5 class="font-primary">Event <?=$jadwal['nama_event'];?></h5> <br>
										<h6 class="mb-2 f-w-400">Total Dana</h6>
										<h5 class="mb-0">Rp. <?=number_format($jadwal['totaldonasi'], 2 );?></h5>
									</li>
								</ul>
							</div>
						</div>
						<ul class="col-xl-12">
							<li>
								<div class="goal-detail">
									<h6> <span class="font-primary">Tanggal Mulai :
										</span><?= date('d-M-Y', strtotime($jadwal['durasi_mulai']))?></h6>
									<div class="progress sm-progress-bar progress-animate">
										<div class="progress-gradient-primary" role="progressbar" style="width: 60%"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="goal-detail mb-0">
									<h6><span class="font-primary">Tanggal Berakhir:
										</span><?= date('d-M-Y', strtotime($jadwal['durasi_berakhir']))?></h6>
									<div class="progress sm-progress-bar progress-animate">
										<div class="progress-gradient-primary" role="progressbar" style="width: 50%"
											aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</li>
							<!-- <li>
                          <div class="btn-download btn btn-gradient f-w-500">Download details</div>
                        </li> -->
						</ul>
					</div>
					<br>
					<hr>
					<br>
					<?php
                 }
                }
                ?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Container-fluid Ends-->
