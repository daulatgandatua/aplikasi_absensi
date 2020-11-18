<body id="page-top"> 

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <h5 class="text-white text-center mr-3 mt-3 mb-0"><strong>APLIKASI</strong></h5>
      <h5 class="text-white text-center mr-3 mt-1 mb-4"><strong>ABSENSI</strong></h5>      
      <!-- Divider -->
      <hr class="sidebar-divider my-0 text-dark">
      <hr class="sidebar-divider d-none d-md-block"> 

      <!-- Nav Item - Dashboard -->
      <li class="nav-item menu">
        <a class="nav-link ml-2" href="<?php echo base_url('index.php/home') ?>">
          <i class="fas fa-home"></i>
          <span>Home</span></a>
      </li>

      
      <?php 
        if($this->session->userdata('akses') =='1') { ?>
            <li class="nav-item menu">
              <a class="nav-link ml-2" href="<?php echo base_url('index.php/admin/tata_usaha') ?>">
                <i class="fas fa-users-cog"></i>
                <span>Kelola Tata Usaha</span>
              </a>
            </li>

            <li class="nav-item menu">
              <a class="nav-link ml-2" href="<?php echo base_url('index.php/admin/dosen') ?>">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Kelola Dosen</span>
              </a>
            </li>

            <li class="nav-item menu">
              <a class="nav-link ml-2" href="<?php echo base_url('index.php/admin/mahasiswa') ?>">
                <i class="fas fa-user-graduate"></i>
                <span>Kelola Mahasiswa</span>
              </a>
            </li>   
          <?php }
          elseif($this->session->userdata('akses') =='2') { ?>
              <li class="nav-item menu">
                <a class="nav-link ml-2" href="<?php echo base_url('index.php/tata_usaha/matkul') ?>">
                  <i class="fas fa-book-reader"></i>
                  <span>Mata Kuliah</span>
                </a>
              </li>

              <li class="nav-item menu">
                <a class="nav-link ml-2" href="<?php echo base_url('index.php/tata_usaha/absensi') ?>">
                  <i class="fas fa-list"></i>
                  <span>Absensi Mahasiswa</span>
                </a>
              </li> 
            <?php }

            elseif($this->session->userdata('akses') =='3') { ?>
              <li class="nav-item menu">
                <a class="nav-link ml-2" href="<?php echo base_url('index.php/dosen/absen') ?>">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Absen</span>
                </a>
              </li> 
            <?php }

          elseif ($this->session->userdata('akses') =='4') { ?>
              <li class="nav-item menu">
                <a class="nav-link ml-2" href="<?php echo base_url('index.php/mahasiswa/absensi') ?>">
                  <i class="fas fa-clipboard-list"></i>
                  <span>Lihat Absensi</span>
                </a>
              </li>

            <?php } ?>  
      
      <li class="nav-item menu">
        <a class="nav-link ml-2" href="<?php echo base_url('index.php/auth/ganti_password') ?>">
          <i class="fas fa-key"></i>
          <span>Ganti Password</span></a>
      </li>

      <li class="nav-item menu">
        <a class="nav-link ml-2" href="<?php echo base_url('index.php/auth/logout'); ?>" onclick="javascript: return confirm('Yakin untuk Log Out?')">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Sidebar Toggler (Sidebar) -->
     
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background-color: white;">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar -->
          <img class="ml-0" src="<?php echo base_url('assets/img/poltek.jpg') ?>" alt="logo-poltek" style="width: 500px; height: 55px;">

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow pt-1">
              <p class="mr-4 d-none d-lg-inline text-gray-600 small"><i class="fas fa-user mr-2"></i><?php echo $this->session->userdata('sess_nama') ?> | <?php echo $this->session->userdata('sess_nip') ?> </p>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
