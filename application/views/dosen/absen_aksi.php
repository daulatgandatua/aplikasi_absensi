        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-list mr-2"></i>Absen</h1>

          <form class="p-4 d-block mr-auto ml-auto" style="width: 95%" method="GET" action="<?php echo base_url('index.php/dosen/simpan_absen') ?>">

            <a href="<?php echo base_url('index.php/dosen/absen') ?>" ><i class="fas fa-arrow-circle-left mr-1"></i><strong>Kembali</strong></a>

            <table class="table mb-2 mt-3 tb_tata_usaha">
              <thead class="text-center">
                <tr>
                  <th style="width: 5%;">No</th>
                  <th style="width: 20%;">Mata Kuliah</th>
                  <th style="width: 15%;">Pertemuan</th>
                  <th style="width: 10%;">Kelas</th>
                  <th style="width: 25%;">Mahasiswa</th>
                  <th style="width: 25%;">Absen</th>     
                </tr> 
              </thead> 
              <tbody class="text-center">

                <?php 
                $no = 1; foreach($mahasiswa as $p): ?>
                <tr>
                  <td><?php echo $no++ ?></td>

                  <?php foreach($matkul as $m): ?>
                  <td class="p-0">
                    <input type="text" name="mata_kuliah[]" value="<?php echo $m->nama_matkul ?>" style="width: 101%; height: 46px; " readonly>
                    <input type="hidden" name="mata_kuliah1" value="<?php echo $m->nama_matkul ?>" style="width: 101%; height: 46px; ">
                  </td>
                  <?php endforeach; ?>

                  <?php foreach($pertemuan as $o): ?>
                  <td class="p-0">
                    <input type="text" name="pertemuan[]" value="<?php echo $o->detail ?>" style="width: 101%; height: 46px;" readonly>
                    <input type="hidden" name="pertemuan1" value="<?php echo $o->detail ?>" style="width: 101%; height: 46px;" readonly>
                  </td>
                  <?php endforeach; ?>

                  <?php foreach($kelas as $k): ?>
                    <input type="hidden" name="kelas[]" value="<?php echo $k->kd_kelas ?>" style="width: 101%; height: 46px;" readonly>
                  <?php endforeach; ?>

                  <?php foreach($kelas as $k): ?>
                  <?php if($k->kd_kelas == '1'){ ?>
                    <td class="p-0"><input type="text" value="Reguler" style="width: 101%; height: 46px;" readonly></td>
                  <?php } else if($k->kd_kelas == '2'){ ?>
                    <td class="p-0"><input type="text" value="Malam" style="width: 101%; height: 46px;" readonly></td>
                  <?php } else { ?>
                    <td class="p-0"><input type="text" value="Karyawan" style="width: 101%; height: 46px;" readonly></td>
                  <?php } ?>
                  <?php endforeach; ?>

                    <td class="p-0"><input type="text" name="mahasiswa[]" value="<?php echo $p->nama ?>" style="width: 100%; height: 46px;" readonly></td>

                    <td class="p-0">
                      <select name="absen[]" style="width: 100%; height: 46px;" required>
                        <option value="">----- Pilih Status Kehadiran -----</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                        <option value="Izin">Izin</option>
                      </select>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
              <button type="submit" class="btn btn-primary d-block mr-auto ml-auto mt-4" onclick="javascript: return confirm('Data absensi sudah diisi dengan benar?')">SUBMIT</button>  
          </form>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 