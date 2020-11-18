        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center">Absensi <?php echo $this->session->userdata('sess_matkul') ?> <?php echo $this->session->userdata('sess_pertemuan') ?></h1>

        <a href="<?php echo base_url('index.php/dosen/absen') ?>"><i class="fas fa-arrow-circle-left mr-1"></i><strong>Kembali</strong></a>
        <br> <br>
        <table class="table data mb-2 mt-2 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 20%;">Mata Kuliah</th>
              <th style="width: 15%;">Pertemuan</th>
              <th style="width: 20%;">Kelas</th>
              <th style="width: 25%;">Mahasiswa</th>
              <th style="width: 15%;">Status</th>  
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($absen as $a): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 20%;" > <?php echo $a->mata_kuliah ?> </td>
                <td style="width: 15%;" > <?php echo $a->pertemuan ?> </td>
                <?php if($a->kd_kelas == '1'){ ?>
                  <td style="width: 20%;">Reguler</td>
                <?php } else if($a->kd_kelas == '2'){ ?>
                  <td style="width: 20%;">Malam</td>
                <?php } else { ?>
                  <td style="width: 20%;">Karyawan</td>
                <?php } ?>
                <td style="width: 25%;"> <?php echo $a->mahasiswa ?> </td>
                <td style="width: 15%;"> <?php echo $a->status ?> </td>
            </tr> 
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      



 