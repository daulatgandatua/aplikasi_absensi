        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-list mr-2"></i>Absen</h1>

          <?php echo $this->session->flashdata('message'); ?>
          <form class="shadow p-4 mt-2 d-block mr-auto ml-auto" style="width: 30%" method="GET" action="<?php echo base_url('index.php/dosen/absen_aksi') ?>">

              <select class="form-control" id="mata_kuliah" name="mata_kuliah" required>
                <option value="">--------- Pilih Mata Kuliah  ----------</option>
              </select>
              <select id="pertemuan" name="pertemuan" class="form-control mt-4 mb-4" required>
                <option value="">--------- Pilih Pertemuan ----------</option>
              </select>
          <button type="submit" class="btn btn-primary d-block mr-auto ml-auto mt-4">ABSEN</button>
            
          </form>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 