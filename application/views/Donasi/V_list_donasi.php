<br><br>
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5 style="text-align:center;"> Daftar Data Donasi Senyum Desa</h5>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                   <!-- tambah data  -->
                   <a href="<?= base_url(); ?>donasi_non/tambahbuktidonasinonkorwil/" class="btn btn-info btn-sm ">
							<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data Keluar</a> <br> <br>
                      <table class="display" id="basic-8">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Jenis</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                          <?php $no = 1;
						  		foreach ($donasi AS $dns) { ?>
                                   <td><?=$no++?></td>
                            <td><?= date('d/m/Y',strtotime($dns["tgl_donasi"])); ?></td>
                            <td><?= $dns['full_name'];?></td>
                            <?php
												$nominal=  $dns["jml_donasi"]
												?>

								<td>Rp. <?= number_format($nominal, 2 ); ?></td>
                            <td><span class="badge badge-primary"><?= $dns['jenis'];?></span</td>
                            <td>
                            <!-- detail -->
                            <a href="<?= base_url(); ?>donasi/detaildonasikorwil/<?= $dns['Id_donasi']; ?>" class="badge badge-success">
									<i class="fa fa-eye" aria-hidden="true"></i></a></a>
                            <!-- delete  -->
                            <a href="<?php echo base_url('donasi/hapusdonasikorwil/' . $dns['Id_donasi']) ?>" data-bs-toggle="modal"
										data-bs-target="#aksi-hapus-<?php echo $dns['Id_donasi'] ?>"
										class="badge badge-warning "> <i class="fa fa-trash" aria-hidden="true"></i></a>
									<!-- pop up  -->
									<div class="modal fade" id="aksi-hapus-<?php echo $dns['Id_donasi'] ?>" tabindex=" -1"
									role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body">
												<h4>Hapus Akun</h4>
												<p>Apakah anda yakin ingin menghapus
													donasi
													<b><?php echo $dns['tgl_donasi'] ?></b>.
												</p>
											</div>
											<div class="modal-footer">
												<button class="btn btn-primary btn-sm" type="button"
													data-bs-dismiss="modal">Batal</button>
												<a href="<?php echo base_url('donasi/hapusdonasikorwil/' . $dns['Id_donasi']) ?>"
													class="btn btn-danger btn-sm" type="button"><i
														class="fa fa-trash"></i> Hapus</a>
											</div>
										</div>
                            </td>
                          
                          </tr>
                          <?php
                        }
                            ?>
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Jenis</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>