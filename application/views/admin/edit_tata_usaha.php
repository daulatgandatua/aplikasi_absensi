        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-edit mr-2"></i>Edit Data Tata Usaha</h1>

          <a href="<?php echo base_url('index.php/admin/tata_usaha') ?>" style="margin-left: 110px;"><i class="fas fa-arrow-circle-left mr-1"></i>Kembali</a>

          <?php foreach($user as $u){?>
          <form method="POST" action="<?php echo base_url('index.php/admin/tata_usaha/edit_tata_usaha_aksi') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nip" class="mt-1">NIP</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="number" name="nip" id="nip" class="form-control" value="<?php echo $u->nip ?>" readonly>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $u->id ?>">
                    <?php echo form_error('nip', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nama" class="mt-1">Nama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $u->nama ?>" required>
                    <?php echo form_error('nama', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="alamat" class="mt-1">Alamat</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $u->alamat ?>" required>
                    <?php echo form_error('alamat', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="no_hp" class="mt-1">No HP</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="no_hp" id="no_hp" class="form-control" value="<?php echo $u->no_hp ?>" required>
                    <?php echo form_error('no_hp', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              
              <button type="submit" name="update" class="btn btn-primary p-1 mt-2 mb-0 mr-3 ml-2" style="width: 48%;" onclick="javascript: return confirm('Data yang diisi sudah benar? Klik OKE untuk melanjutkan')"><i class="fas fa-sign-in-alt mr-2"></i><strong>Update</strong></button>
              <button type="reset" class="btn btn-danger p-1 mt-2 mb-0" style="width: 46%;" onclick="javascript: return confirm('Klik OKE untuk mereset')"><i class="fas fa-redo-alt mr-2"></i><strong>Reset</strong></button>
            </form>
            <?php } ?>
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 