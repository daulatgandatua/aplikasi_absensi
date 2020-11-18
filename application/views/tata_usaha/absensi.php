        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-list mr-2"></i>Absensi Mahasiswa</h1>

        <?php echo $this->session->flashdata('message'); ?>
        <table class="table data mb-2 mt-1 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 15%;">Mata Kuliah</th>
              <th style="width: 15%;">Pertemuan</th>
              <th style="width: 20%;">Kelas</th>
              <th style="width: 20%;">Mahasiswa</th>
              <th style="width: 15%;">Status</th>
              <th style="width: 10%;">Action</th>      
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($absensi as $a): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 15%;" > <?php echo $a->mata_kuliah ?> </td>
                <td style="width: 15%;" > <?php echo $a->pertemuan ?> </td>
                <?php if($a->kd_kelas == '1'){ ?>
                  <td style="width: 20%;">Reguler</td>
                <?php } else if($a->kd_kelas == '2'){ ?>
                  <td style="width: 20%;">Malam</td>
                <?php } else { ?>
                  <td style="width: 20%;">Karyawan</td>
                <?php } ?>
                <td style="width: 20%;"> <?php echo $a->mahasiswa ?> </td>
                <td style="width: 15%;"> <?php echo $a->status ?> </td>
                <td style="width: 10%;"> 
                  <a href="<?php echo base_url('index.php/tata_usaha/edit_absensi/'.$a->kd_absen);?>" class="btn btn-warning p-1 mr-3 btn_action" data-toogle="tooltip" title="EDIT"><i class="fas fa-edit mr-0" ></i>Edit</a>
                </td>    
            </tr> 
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>
        
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



 