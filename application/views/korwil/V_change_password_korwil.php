<div class="page-wrapper">
      <div class="container-fluid p-0">
        <div class="row">
          <div class="col-12">     
            <div class="login-card">
              <div>
                <div class="login-main"> 
                  <form class="theme-form" action="<?= ('profile/editpassword/'. $profile['id_profile']) ?>"  method="POST" enctype="multipart/form-data">
                    <h4 style="text-align:center;">Change Password <i class="fa fa-key" aria-hidden="true"></i> </h4> <br><br>
                    <!-- username -->
                    <div class="form-group">
                      <label class="col-form-label">Username</label>
                      <input class="form-control" type="password" name="username" required="" placeholder="Masukkan username">
                
                    </div>
                    <!-- NEW PASSWORD  -->
                    <div class="form-group">
                      <label class="col-form-label">New Password</label>
                      <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                      <div class="show-hide"><span class="show"></span></div>
                    </div>
                    <!-- TYPE PASSWORD BARU
                    <div class="form-group">
                      <label class="col-form-label">Retype Password</label>
                      <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                    </div> -->
                    
                    <br><br>
                    <div class="form-group mb-0" style="margin-left:140px;">
                      <button class="btn btn-primary btn-block" type="submit">Change  <i class="fa fa-lock" aria-hidden="true"></i> </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>