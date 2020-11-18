        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-edit mr-2"></i>Edit Data Mahasiswa</h1>

          <a href="<?php echo base_url('index.php/admin/mahasiswa') ?>" style="margin-left: 110px;"><i class="fas fa-arrow-circle-left mr-1"></i>Kembali</a>

          <?php foreach($user as $u){?>
          <form method="POST" action="<?php echo base_url('index.php/admin/mahasiswa/edit_mahasiswa_aksi') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nim" class="mt-1">NIM</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="number" name="nim" id="nim" class="form-control" value="<?php echo $u->nim ?>" readonly>
                    <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $u->kd_mahasiswa ?>">
                    <?php echo form_error('nim', '<small class="text-danger pl-1">','</small>') ?>
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
                    <label for="jenis_kelamin" class="mt-1">Jenis Kelamin</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                      <option value="Laki - Laki" <?php if($u->jenis_kelamin == 'Laki - Laki'){ echo 'selected'; } ?> >Laki - Laki</option>
                      <option value="Perempuan" <?php if($u->jenis_kelamin == 'Perempuan'){ echo 'selected'; } ?> >Perempuan</option>
                    </select>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row"> 
                  <div class="col-md-3">
                    <label for="jurusan" class="mt-1">Jurusan</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="jurusan" name="jurusan">
                      <option value="Teknik Informatika" <?php if($u->jurusan == 'Teknik Informatika'){ echo 'selected'; } ?> >Teknik Informatika</option>
                      <option value="Teknik Robotika" <?php if($u->jurusan == 'Teknik Robotika'){ echo 'selected'; } ?> >Teknik Robotika</option>
                      <option value="Teknik Elektronika" <?php if($u->jurusan == 'Teknik Elektronika'){ echo 'selected'; } ?> >Teknik Elektronika</option>
                      <option value="Teknik Mesin" <?php if($u->jurusan == 'Teknik Mesin'){ echo 'selected'; } ?> >Teknik Mesin</option>
                      <option value="Teknik Geomatika" <?php if($u->jurusan == 'Teknik Geomatika'){ echo 'selected'; } ?> >Teknik Geomatika</option>
                    </select>
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
              <div class="form-group">
                <div class="row"> 
                  <div class="col-md-3">
                    <label for="kelas" class="mt-1">Jenis Kelamin</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="kelas" name="kelas">
                      <option value="1" <?php if($u->kd_kelas == '1'){ echo 'selected'; } ?> >Reguler</option>
                      <option value="2" <?php if($u->kd_kelas == '2'){ echo 'selected'; } ?> >Malam</option>
                      <option value="3" <?php if($u->kd_kelas == '3'){ echo 'selected'; } ?> >Karyawan</option>  
                    </select>
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



 