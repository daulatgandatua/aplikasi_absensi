        <!-- Begin Page Content -->
        <div class="container-fluid">
          <h1 class="h4 mb-4 mt-4 text-gray-800 ml-2 text-center"><i class="fas fa-clipboard-list mr-2"></i>Lihat Absensi</h1>

        <table class="table data mb-2 mt-3 tb_tata_usaha">
          <thead class="text-center">
            <tr>
              <th style="width: 5%;">No</th>
              <th>Mata Kuliah</th>
              <th>Pertemuan</th>
              <th>Status</th>     
            </tr> 
          </thead>
          <tbody class="text-center">
            <?php $no = 1; foreach($absensi as $a): ?>
            <tr>
                <td style="width: 5%;" ><?php echo $no++ ?> </td>
                <td style="width: 15%;" > <?php echo $a->mata_kuliah ?> </td>
                <td style="width: 15%;" > <?php echo $a->pertemuan ?> </td>
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



 