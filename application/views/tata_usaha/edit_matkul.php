        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-edit mr-2"></i>Edit Mata Kuliah</h1>

          <a href="<?php echo base_url('index.php/tata_usaha/matkul') ?>" style="margin-left: 110px;"><i class="fas fa-arrow-circle-left mr-1"></i>Kembali</a>

          <?php foreach($matkul as $m){?>
          <form method="POST" action="<?php echo base_url('index.php/tata_usaha/edit_matkul_aksi') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="nama_matkul" class="mt-1">Nama Mata Kuliah</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="text" name="nama_matkul" id="nama_matkul" class="form-control" value="<?php echo $m->nama_matkul ?>">
                    <input type="hidden" name="kd_matkul" id="kd_matkul" class="form-control" value="<?php echo $m->kd_matkul ?>">
                    <?php echo form_error('nama_matkul', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="sks" class="mt-1">SKS</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="number" name="sks" id="sks" class="form-control" value="<?php echo $m->sks ?>">
                    <?php echo form_error('sks', '<small class="text-danger pl-1">','</small>') ?>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="dosen" class="mt-1">Dosen</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="dosen" name="dosen">
                      <option value="">-- Pilih Dosen --</option>
                      <?php foreach($dosen as $d) { ?>
                        <option value="<?php echo $d->nama;?>"><?php echo $d->nama;?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('dosen', '<small class="text-danger pl-1">','</small>') ?>
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
                      <option value="1" <?php if($m->kd_kelas == '1'){ echo 'selected'; } ?> >Reguler</option>
                      <option value="2" <?php if($m->kd_kelas == '2'){ echo 'selected'; } ?> >Malam</option>
                      <option value="3" <?php if($m->kd_kelas == '3'){ echo 'selected'; } ?> >Karyawan</option>
                    </select>
                    <?php echo form_error('kelas', '<small class="text-danger pl-1">','</small>') ?>
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



 