        <!-- Begin Page Content -->
        <div class="container-fluid">

          <h1 class="h4 mb-4 mt-4 text-center text-gray-800 ml-2"><i class="fas fa-edit mr-2"></i>Edit Absensi</h1>

          <a href="<?php echo base_url('index.php/tata_usaha/absensi') ?>" style="margin-left: 110px;"><i class="fas fa-arrow-circle-left mr-1"></i>Kembali</a>

          <?php foreach($absensi as $m){?>
          <form method="POST" action="<?php echo base_url('index.php/tata_usaha/edit_absensi_aksi') ?>" class="mt-4 shadow p-5 d-block ml-auto mr-auto" style="width: 80%;">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="mata_kuliah" class="mt-1">Mata Kuliah</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="text" name="mata_kuliah" id="mata_kuliah" class="form-control" value="<?php echo $m->mata_kuliah ?>" readonly>
                    <input type="hidden" name="kd_absen" id="kd_absen" class="form-control" value="<?php echo $m->kd_absen ?>">
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="pertemuan" class="mt-1">Pertemuan</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="text" name="pertemuan" id="pertemuan" class="form-control" value="<?php echo $m->pertemuan ?>" readonly>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="kelas" class="mt-1">Kelas</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="kelas" name="kelas" disabled>
                      <option value="1" <?php if($m->kd_kelas == '1'){ echo 'selected'; } ?> >Reguler</option>
                      <option value="2" <?php if($m->kd_kelas == '2'){ echo 'selected'; } ?> >Malam</option>
                      <option value="3" <?php if($m->kd_kelas == '3'){ echo 'selected'; } ?> >Karyawan</option>
                    </select>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="mahasiswa" class="mt-1">Mahasiswa</label>
                  </div>
                  <div class="col-md-9 nim">
                    <input type="text" name="mahasiswa" id="mahasiswa" class="form-control" value="<?php echo $m->mahasiswa ?>"readonly>
                  </div>
                </div> 
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-3">
                    <label for="status" class="mt-1">Status</label>
                  </div>
                  <div class="col-md-9">
                    <select class="form-control" id="status" name="status">
                      <option value="Hadir" <?php if($m->status == 'Hadir'){ echo 'selected'; } ?> >Hadir</option>
                      <option value="Tidak Hadir" <?php if($m->status == 'Tidak hadir'){ echo 'selected'; } ?> >Tidak Hadir</option>
                      <option value="Izin" <?php if($m->status == 'Izin'){ echo 'selected'; } ?> >Izin</option>
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



 