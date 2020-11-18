        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-chalkboard-teacher mr-2"></i>Kelola Dosen</h1>
          <a href="<?php echo base_url('index.php/admin/dosen/tambah_dosen') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus-circle mr-2"></i>Tambah Dosen</a>
          <?php echo $this->session->flashdata('message'); ?>
        <table class="table data mb-2 mt-3 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th> 
              <th style="width: 10%;">NIP</th>
              <th style="width: 15%;">Jurusan</th>
              <th style="width: 20%;">Nama</th>
              <th style="width: 20%;">Alamat</th>
              <th style="width: 15%;">No HP</th>
              <th style="width: 15%;">Action</th>      
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($user as $u): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 10%;" > <?php echo $u->nip ?> </td>
                <td style="width: 15%;" > <?php echo $u->fakultas ?> </td>
                <td style="width: 20%;" > <?php echo $u->nama ?> </td>
                <td style="width: 20%;"> <?php echo $u->alamat ?> </td>
                <td style="width: 15%;"> <?php echo $u->no_hp ?> </td>
                <td style="width: 15%;"> 
                  <a href="<?php echo base_url('index.php/admin/dosen/edit_dosen/'.$u->id);?>" class="btn btn-warning p-1 mr-3 btn_action" data-toogle="tooltip" title="EDIT"><i class="fas fa-edit mr-0" ></i>Edit</a>

                  <a href="<?php echo base_url('index.php/admin/dosen/hapus_dosen/'.$u->id);?>" class="btn btn-danger p-1 btn_action" data-toogle="tooltip" title="HAPUS" onclick="javascript: return confirm('Yakin menghapus dosen ini?')"><i class="fas fa-trash mr-1"></i>Hapus</a> 
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



 