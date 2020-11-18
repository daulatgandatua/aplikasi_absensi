        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-book-reader mr-2"></i>Mata Kuliah</h1>
          <a href="<?php echo base_url('index.php/tata_usaha/tambah_matkul') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus-circle mr-2"></i>Tambah Mata Kuliah</a>
          <?php echo $this->session->flashdata('message'); ?>
        <table class="table data mb-2 mt-3 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 25%;">Mata Kuliah</th>
              <th style="width: 10%;">SKS</th>
              <th style="width: 25%;">Dosen</th>
              <th style="width: 20%;">Kelas</th>
              <th style="width: 15%;">Action</th>      
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($matkul as $m): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 10%;" > <?php echo $m->nama_matkul ?> </td>
                <td style="width: 10%;" > <?php echo $m->sks ?> </td>
                <td style="width: 25%;" > <?php echo $m->dosen ?> </td>
                <?php if($m->kd_kelas == '1'){ ?>
                  <td style="width: 20%;">Reguler</td>
                <?php } else if($m->kd_kelas == '2'){ ?>
                  <td style="width: 20%;">Malam</td>
                <?php } else { ?>
                  <td style="width: 20%;">Karyawan</td>
                <?php } ?>

                <td style="width: 15%;"> 
                  <a href="<?php echo base_url('index.php/tata_usaha/edit_matkul/'.$m->kd_matkul);?>" class="btn btn-warning p-1 mr-3 btn_action" data-toogle="tooltip" title="EDIT"><i class="fas fa-edit mr-0" ></i>Edit</a>
                  <a href="<?php echo base_url('index.php/tata_usaha/hapus_matkul/'.$m->kd_matkul);?>" class="btn btn-danger p-1 btn_action" data-toogle="tooltip" title="HAPUS" onclick="javascript: return confirm('Yakin menghapus dosen ini?')"><i class="fas fa-trash mr-1"></i>Hapus</a> 
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



