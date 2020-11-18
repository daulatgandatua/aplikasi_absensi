        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-list mr-2"></i>Absen</h1>

          <?php echo $this->session->flashdata('message'); ?>
          
          <form class="shadow p-4 mt-2 d-block mr-auto ml-auto" style="width: 30%" method="GET" action="<?php echo base_url('index.php/dosen/absen_aksi') ?>">

              <select class="form-control" id="mata_kuliah" name="mata_kuliah" required>
                <option value="">--------- Pilih Mata Kuliah  ----------</option>
                <?php foreach($matkul as $m) { ?>
                  <option value="<?php echo $m->nama_matkul;?>"><?php echo $m->nama_matkul;?></option>
                <?php } ?>
              </select>
              <select id="pertemuan" name="pertemuan" class="form-control mt-4 mb-4" required>
                <option value="">--------- Pilih Pertemuan ----------</option>
                <option value="Minggu 1">Minggu 1</option>
                <option value="Minggu 2">Minggu 2</option>
                <option value="Minggu 3">Minggu 3</option>
                <option value="Minggu 4">Minggu 4</option>
                <option value="Minggu 5">Minggu 5</option>
                <option value="Minggu 6">Minggu 6</option>
                <option value="Minggu 7">Minggu 7</option>
                <option value="Minggu 8">Minggu 8</option>
                <option value="Minggu 9">Minggu 9</option>
                <option value="Minggu 10">Minggu 10</option>
                <option value="Minggu 11">Minggu 11</option>
                <option value="Minggu 12">Minggu 12</option>
                <option value="Minggu 13">Minggu 13</option>
                <option value="Minggu 14">Minggu 14</option>
              </select>
              <input type="hidden" name="kd_kelas" id="kd_kelas" class="form-control" value="<?php echo $m->kd_kelas ?>"> 
          <button type="submit" class="btn btn-primary d-block mr-auto ml-auto mt-4">ABSEN</button>
            
          </form>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 