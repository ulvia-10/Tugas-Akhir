<br><br>
<div class="container-fluid">


	<!-- Container-fluid starts-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<?php echo $this->session->flashdata('pesan') ?>
				<div class="card">
					<div class="card-header">
						<h5>List Data Kas</h5><span>Data Kas Masuk dan Keluar | Senyum Desa</span><br>
						<a href="<?= base_url('AdminKorwil/tambahKeuangan'); ?>" class="btn btn-outline-primary"
							type="button" data-original-title="btn btn-outline-danger-2x" style="width: 200px;"
							title="">
							<i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a>
						<?php

                    $totalPemasukan    = 0;
                    $totalPengeluaran   = 0;

                    // cek masuk
                    if ($masuk != null) {

                        $totalPemasukan = $masuk->TOTAL;
                    }

                    // cek keluar 
                    if ($keluar != null) {

                        $totalPengeluaran = $keluar->TOTAL;
                    }
                    ?>
						<tr>

							<div class="col-sm-4" style="margin-left:550px;">
								<!-- <p class="text-primary" style="text-align:center;"><b>Filter Jumlah Kas</b></p> -->
								
								<!-- <form action="">
									<select name="bulan" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="Tahun" disable="disable">-- Pilih bulan --</option>
										<option value="January">Januari</option>
										<option value="February">Februari</option>
										<option value="March">Maret</option>
										<option value="April">April</option>
										<option value="May">Mei</option>
										<option value="June">Juni</option>
										<option value="July">Juli</option>
										<option value="August">Agustus</option>
										<option value="September">September</option>
										<option value="October">Oktober</option>
										<option value="November">November</option>
										<option value="December">Desember</option>
									</select> <br>
									<select name="tahun" class="form-select digits" id=""
										required="wilayah harap DiIsi">
										<option value="tahun">-- Pilih tahun --</option>
										<?php for($i=0; $i<sizeof($tahun); $i++){	?>
										<option value="<?php echo $tahun[$i]?>">
											<?php echo $tahun[$i]?>
										</option>
										<?php } ?>
									</select>
                                            <br>
                                            <div class="text-sm-end">
					<button class="btn btn-primary">Submit  </button>
				</div>
								</form> -->
								<br>
								<!-- tahun -->
								<strong>
									<th colspan=4> Total Kas Masuk:</th>
									<th>Rp. <?php echo number_format($totalPemasukan, 2) ?></th> <br>
									<th colspan=1> Total Kas Keluar:</th>
									<th>Rp. <?php echo number_format($totalPengeluaran, 2) ?></th>
									</th>
								</strong>
							</div>
						</tr>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<table class="display" id="API-3">
								<thead style=" text-align: center;">
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Judul</th>
										<th>Nominal</th>
										<th>Jenis </th>
										<th> Action</th>
									</tr>
								</thead>
								<tbody style=" text-align:center;">
									<?php $no = 1;
                                foreach ($data_keuangan AS $ks) { ?>
									<tr>
										<td> <?= $no++; ?></td>
										<td> <?=  date('d/m/Y',strtotime($ks["tanggal_laporan"])); ?></td>
										<td><?= $ks["judul"]; ?></td>
										<?php
												$nominal=  $ks["nominal"]
												?>

										<td>Rp. <?= number_format($nominal, 2 ); ?></td>
										<?php
                                $keterangan = "";
                                $warna = "";

                                if ( $ks['jenis_keuangan'] == "masuk" ) {

                                    $keterangan = "masuk";
                                    $warna      = "success";
                                } else if ( $ks['jenis_keuangan'] == "keluar" ) {
                                    $keterangan = "keluar";
                                    $warna = "secondary";
                                } 
                                ?>
										<td> <span class="badge badge-<?=$warna;?>"><?= $keterangan; ?></span></td>
										<td>
											<a href="<?= base_url(); ?>keuangan/detailkasanggota/<?= $ks['id_keuangan']; ?>"
												class="badge badge-primary">
												<i class="fa fa-eye" aria-hidden="true"></i></a></a>

										</td>

										<?php
                                }
                                    ?>

								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Judul</th>
										<th>Nominal</th>
										<th>Jenis</th>
									</tr>
								</tfoot>

							</table>
						</div>
					</div>
				</div>
			</div>





		</div>
	</div>
</div>
</div>
