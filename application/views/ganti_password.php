        <!-- Begin Page Content -->
        <div class="container-fluid"> 

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-key mr-2"></i>Ganti Password</h1> 

            <form method="POST" action="<?php echo base_url('index.php/auth/ganti_password') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="current_password" class="mt-1">Password Lama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="current_password" id="current_password" class="form-control" placeholder="Ketikkan password lama anda">
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo form_error('current_password', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div>  
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="new_password" class="mt-1">Password Baru</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="new_password" id="new_password" class="form-control" placeholder="Ketikkan password baru anda">
                    <?php echo form_error('new_password', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="confirm_password" class="mt-1">Konfirmasi Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ulangi password baru anda">
                    <?php echo form_error('confirm_password', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                  </div>
                  <div class="col-md-9">
                    <input type="checkbox" onclick="showPassword()" class="showPassword" id="showpassword"> <label for="showpassword">Lihat Password</label>
                    <script>
                      function showPassword() {
                      var x = document.getElementById("current_password");
                      var y = document.getElementById("new_password");
                      var z = document.getElementById("confirm_password");
                      if (x.type === "password" && y.type === "password") {
                        x.type = "text";
                        y.type = "text";
                        z.type = "text";
                      } else {
                        x.type = "password";
                        y.type = "password";
                        z.type = "password";
                        }
                        }
                    </script>
                  </div>
                </div> 
              </div>
              <button type="submit" name="submit" class="btn btn-primary p-1 mt-0 mb-0 mr-3 ml-2" style="width: 48%;" onclick="javascript: return confirm('Yakin untuk mengganti password? Klik OKE untuk melanjutkan')"><i class="fas fa-sign-in-alt mr-2"></i><strong>Submit</strong></button>

              <button type="reset" class="btn btn-danger p-1 mt-0 mb-0" style="width: 46%;" onclick="javascript: return confirm('Klik OKE untuk mereset')"><i class="fas fa-redo-alt mr-2"></i><strong>Reset</strong></button>
            
            </form>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 