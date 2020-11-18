        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-users-cog mr-2"></i>Kelola Tata Usaha</h1>
          <a href="<?php echo base_url('index.php/admin/tata_usaha/tambah_tata_usaha') ?>" class="btn btn-primary mb-4"><i class="fas fa-plus-circle mr-2"></i>Tambah Tata Usaha</a>
          <?php echo $this->session->flashdata('message'); ?>
        <table class="table data mb-2 mt-3 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th style="width: 15%;">NIP</th>
              <th style="width: 25%;">Nama</th>
              <th style="width: 25%;">Alamat</th>
              <th style="width: 15%;">No HP</th>
              <th style="width: 15%;">Action</th>      
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($user as $u): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 15%;" > <?php echo $u->nip ?> </td>
                <td style="width: 25%;" > <?php echo $u->nama ?> </td>
                <td style="width: 25%;"> <?php echo $u->alamat ?> </td>
                <td style="width: 15%;"> <?php echo $u->no_hp ?> </td>
                <td style="width: 15%;"> 
                  <a href="<?php echo base_url('index.php/admin/tata_usaha/edit_tata_usaha/'.$u->id);?>" class="btn btn-warning p-1 mr-3 btn_action" data-toogle="tooltip" title="EDIT"><i class="fas fa-edit mr-0" ></i>Edit</a>

                  <a href="<?php echo base_url('index.php/admin/tata_usaha/hapus_tata_usaha/'.$u->id);?>" class="btn btn-danger p-1 btn_action" data-toogle="tooltip" title="HAPUS" onclick="javascript: return confirm('Yakin menghapus tata usaha ini?')"><i class="fas fa-trash mr-1"></i>Hapus</a> 
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



 