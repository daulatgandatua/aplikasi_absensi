        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-plus-circle mr-2"></i>Tambah Mahasiswa</h1>

          <a href="<?php echo base_url('index.php/admin/mahasiswa') ?>" style="margin-left: 110px;"><i class="fas fa-arrow-circle-left mr-1"></i>Kembali</a>

          <form method="POST" action="<?php echo base_url('index.php/admin/mahasiswa/tambah_mahasiswa_aksi') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto mb-4" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nim" class="mt-1">NIM</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="number" name="nim" id="nim" class="form-control" placeholder="Masukkan NIM disini..">
                    <?php echo $this->session->flashdata('message'); ?>
                    <?php echo form_error('nim', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="password" class="mt-1">Password</label>
                  </div>
                  <div class="col-md-9">
                    <input type="password" name="password" id="password" class="form-control" value="123456" readonly>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nama" class="mt-1">Nama</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama disini..">
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
                      <option value="">-- Pilih Jenis Kelamin --</option>
                      <option value="Laki - Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin', '<small class="text-danger pl-1">','</small>') ?>
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
                      <option value="">-- Pilih Jurusan --</option>
                      <option value="Teknik Informatika">Teknik Informatika</option>
                      <option value="Teknik Robotika">Teknik Robotika</option>
                      <option value="Teknik Elektronika">Teknik Elektronika</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknik Geomatika">Teknik Geomatika</option>
                    </select>
                    <?php echo form_error('jurusan', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="no_hp" class="mt-1">No HP</label>
                  </div>
                  <div class="col-md-9 no_hp">
                    <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan no hp disini..">
                    <?php echo form_error('no_hp', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="kelas" class="mt-1">Kelas</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="kelas" name="kelas">
                      <option value="">-- Pilih Kelas --</option>
                      <option value="1">Reguler</option>
                      <option value="2">Malam</option>
                      <option value="3">Karyawan</option>
                    </select>
                    <?php echo form_error('kelas', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
               
              <button type="submit" name="submit" class="btn btn-primary p-1 mt-2 mb-0 mr-3 ml-2" style="width: 48%;" onclick="javascript: return confirm('Data yang diisi sudah benar? Klik OKE untuk melanjutkan')"><i class="fas fa-sign-in-alt mr-2"></i><strong>Submit</strong></button>
              <button type="reset" class="btn btn-danger p-1 mt-2 mb-0" style="width: 46%;" onclick="javascript: return confirm('Klik OKE untuk mereset')"><i class="fas fa-redo-alt mr-2"></i><strong>Reset</strong></button>
            </form>
            
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 