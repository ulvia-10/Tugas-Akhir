<br><br>
<section class="pt-0 mt-n8">
  <div class="container">
    <!-- / .row -->
    <div class="row">
      <div class="col">
        <!-- Blog Card -->
        <?php foreach($jadwal AS $jdw){ ?>
        <div class="card border-0 flex-md-row align-items-center">
          <div class="col-md-4">
            <img class="img-fluid" style="width:50%; margin-left:120px;" src="<?= base_url('./assets/images/' . $jdw['gambar_event']); ?> "alt="Image">
          </div>
          <div class="card-body col-md-6">
            <div>
              <div class="d-inline-block bg-light text-center px-2 py-1 rounded me-2">
              <span class="text-primary"><?=date('d-M-Y', strtotime($jdw['durasi_mulai']))?>
              </span>
                    -</div> 
                <a class="d-inline-block btn-link" ><?=date('d-M-Y', strtotime($jdw['durasi_berakhir']))?></a>
            </div>
            <h2 class="h5 my-3">
                <a class="link-title" href="blog-single.html"><?=$jdw['nama_event'];?></a>
              </h2>
              <br>
            <ul class="list-inline mb-0">
              <li class="list-inline-item pe-3"> <a href="index-3.html#" class="list-group-item-action"><i class="lar la-user-circle me-1 text-primary ic-1x"></i> Deskripsi</a>
              <br>
              <p><?=$jdw['deskripsi_event'];?></p>
              </li>

            </ul>
          </div>
          <div class="col-md-2"> <a href="<?= base_url('donasi_non/donasinonanggota/')?>" class="btn btn-primary">
                Donasi <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
              </a>
          </div>
        </div>
        <br>
        <!-- End Blog Card -->
        <?php }?> 
      
        <!-- End Blog Card -->
      </div>
    </div>
  </div>
</section>
