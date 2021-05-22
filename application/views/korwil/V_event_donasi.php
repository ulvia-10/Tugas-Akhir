<!-- Hover styles-->
<br><br>
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Data Event Donasi </h5>
                  </div>
                  <div class="card-body">
                  <a href="<?= base_url(); ?>donasi/tambaheventdonasi/" class="btn btn-square btn-dark btn-sm mb-3">
							<i class="fa fa-plus" aria-hidden="true"></i> Tambah Data</a> <br> <br>
                    <div class="table-responsive">
                      <table class="hover" id="example-style-4">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Event</th>
                            <th>Durasi Mulai</th>
                            <th>Durasi Berakhir</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
						  		foreach ($event AS $evt) { ?>
                          <tr>
                          <td><?=$no++?></td>
                          <td><?= $evt['nama_event'];?></td>
                          <td><?= date('d-M-Y',strtotime($evt['durasi_mulai']));?></td>
                          <td><?= date('d-M-Y',strtotime($evt['durasi_berakhir']));?></td>
                          <td><span class="badge badge-danger"><?= $evt['status_event'];?></td></span>
                          <td>
                          
                          <a href="<?= base_url(); ?>donasi/detaileventdonasi/<?= $evt['id_event']; ?>" class="badge badge-primary">		<i class="fa fa-eye" aria-hidden="true"></i></a></a>
                          <a href="<?= base_url(); ?>donasi/editeventdonasi/<?= $evt['id_event']; ?>" class="badge badge-info">		<i class="fa fa-pencil-square" aria-hidden="true"></i></a></a>
                          <a href="<?= base_url(); ?>donasi/hapuseventdonasi/<?= $evt['id_event']; ?>" class="badge badge-warning">	<i class="fa fa-trash" aria-hidden="true"></i></a></a>
                          </td>
                          </tr>
                          <?php
                        }
                            ?>
                        </tbody>
                        <tfoot>
                          <tr>
                          <th>No</th>
                            <th>Nama Event</th>
                            <th>Durasi Mulai</th>
                            <th>Durasi Berakhir</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Hover Ends-->