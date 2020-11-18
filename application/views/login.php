<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<link rel="icon" href="<?php echo base_url('assets/img/icon-title.jpg') ?>">
		<title>Aplikasi Absensi Polibatam</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
		<style type="text/css">input[type=number]::-webkit-inner-spin-button{
			opacity: 0;} button:active { position: relative; top: 2px; box-shadow: none; }</style>
	</head>
	<body style="background: #E8E8E8;">
		<div class="p-0" style="width: 30%; height: 50px; margin: 50px auto -80px auto;">
			<?php echo $this->session->flashdata('message'); ?>
			<?php 
                if(isset($_GET['status'])){
                    $status = $_GET['status'];
                    if($status == "password-updated"){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3 mb-3 p-0" role="alert">
                        		<div class="row">
                        			<div class="col-md-11 text-center" style="padding-top:14px; font-size:14px;">
                        				Password berhasil diganti. Silahkan login kembali.
                        			</div>
                        			<div class="col-md-1">
                        				<a href="login" class="float-right btn btn-transparent" style="font-size: 24px; margin-right:7px;"><span aria-hidden="true">&times;</span></a> 
                        			</div>
                        		</div>	
                              </div>';
                    }else {
                    	redirect('auth/login');
                    }
                } 
                ?>

		</div>
		<a href="<?php echo base_url('auth/login');?>"></a>
		<div class="card pt-3" style="width: 30%; background: white; box-shadow: 1px 2px 8px rgba(0, 0, 0, 0.65); margin: 100px auto; border-radius: 8px;" >
			<img src="<?php echo base_url('assets/img/poltek.png') ?>" style="height: 80px;" class="ml-3 mr-3">
			<h5 style="font-size: 16px;" class="text-center mt-3 mb-3"><strong>APLIKASI ABSENSI</strong></h5>
			<form  action="<?php echo base_url('index.php/auth/login_aksi'); ?>" method="post" style="background: transparent; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.6); border-radius: 4px; margin: 0 50px 20px 50px; border-radius: 8px;">
				<p class="text-center mt-3" style="font-size: 15px;">Silahkan Login</p>
				<div class="form-group pr-5 pl-5">
					<input type="id" name="id" id="id" placeholder="Masukkan NIM / NIP" class="form-control" style="font-size: 14px;" required>
				</div>
				<div class="form-group pr-5 pl-5">
					<input type="password" name="password" id="password" placeholder="Masukkan Password" class="form-control" style="font-size: 14px;" required>
				</div>
				<button type="submit" class="btn btn-primary p-1 mb-3 mr-2" style="width: 65%; margin-left: 53px;">Login</button>
			</form>
			<p class="text-center mb-4 mt-2" style="font-size: 13px;">Aplikasi Absensi Polibatam &#169; 2020</p>

		</div>

	<script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
  	<script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
	</body>
</html>