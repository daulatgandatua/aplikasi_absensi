<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tata_usaha extends CI_controller{
	public function __construct(){  
		parent::__construct(); 
		$this->load->model('TataUsahaModel');
		$this->load->library('form_validation');	
	}

	public function matkul(){
		$data['matkul'] = $this->TataUsahaModel->getAll_matkul();
		$data['dosen'] 	= $this->TataUsahaModel->getAll_dosen();
		$data['title'] 	= "Mata Kuliah - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('tata_usaha/matkul', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_matkul(){
		$data1['title'] 	= "Tambah Matkul - Aplikasi Absensi Polibatam";
		$data = array('dosen'=> $this->TataUsahaModel->getAll_dosen()); 
		$this->load->view('templates/header', $data1);
		$this->load->view('templates/sidebar');
		$this->load->view('tata_usaha/tambah_matkul', $data);
		$this->load->view('templates/footer');
	}

	public function _rules(){
		$this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');
		$this->form_validation->set_rules('dosen', 'Dosen', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
	}

	public function tambah_matkul_aksi(){
		$this->_rules();

		if($this->form_validation->run() == FALSE){  
			$this->tambah_matkul();
		} else {
			$nama_matkul 	= $this->input->post('nama_matkul');
			$sks 			= $this->input->post('sks');
			$dosen 			= $this->input->post('dosen');
			$kelas 			= $this->input->post('kelas');

			$data 		= array(
				'nama_matkul' 	=> $nama_matkul,
				'sks' 			=> $sks,	
				'dosen' 		=> $dosen,
				'kd_kelas' 		=> $kelas
			);

			$this->TataUsahaModel->tambah_matkul($data, 'tb_matkul');
			$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" role="alert">
			  Mata kuliah berhasil ditambahkan.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');	
			redirect('tata_usaha/matkul');
		}
	}

	public function edit_matkul($kd_matkul){
		$data1['title'] 	= "Edit Mata Kuliah - Aplikasi Absensi Polibatam";
		$data 				= array('dosen'=> $this->TataUsahaModel->getAll_dosen()); 
		$where 			= array('kd_matkul'=>$kd_matkul);
		$data1['matkul'] = $this->TataUsahaModel->edit_matkul($where, 'tb_matkul')->result();
		$this->load->view('templates/header', $data1);
		$this->load->view('templates/sidebar');
		$this->load->view('tata_usaha/edit_matkul', $data, $data1);
		$this->load->view('templates/footer');
	}

	public function edit_matkul_aksi(){
		$kd_matkul 		= $this->input->post('kd_matkul');
		$nama_matkul 	= $this->input->post('nama_matkul');
		$sks 			= $this->input->post('sks');
		$dosen 			= $this->input->post('dosen');
		$kelas 		= $this->input->post('kelas');
		$no_hp 			= $this->input->post('no_hp');

		$data 		= array(
			'kd_matkul'		=> $kd_matkul,
			'nama_matkul'	=> $nama_matkul,
			'sks'			=> $sks,
			'dosen'			=> $dosen,
			'kd_kelas'			=> $kelas
		);

		$where 		= array(
			'kd_matkul'	=> $kd_matkul
		);

		$this->TataUsahaModel->update_data_matkul($where, $data, 'tb_matkul');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" role="alert">
			Data mata kuliah berhasil diperbaharui.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('tata_usaha/matkul');				
	}

	public function hapus_matkul($kd_matkul){
		$where 		= array('kd_matkul' => $kd_matkul);
		$this->TataUsahaModel->hapus_matkul($where, 'tb_matkul');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" role="alert">
			Data mata kuliah berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('tata_usaha/matkul');
	}

	public function absensi(){
		$data['matkul'] = $this->TataUsahaModel->getAll_matkul();
		$data['absensi'] 	= $this->TataUsahaModel->getAll_absensi();
		$data['title'] 	= "Absensi - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('tata_usaha/absensi', $data);
		$this->load->view('templates/footer');
	}

	public function edit_absensi($kd_absen){
		$data['title'] 	= "Edit Mata Kuliah - Aplikasi Absensi Polibatam";
		$where 			= array('kd_absen'=>$kd_absen);
		$data['absensi'] = $this->TataUsahaModel->edit_absensi($where, 'absensi')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('tata_usaha/edit_absensi', $data);
		$this->load->view('templates/footer');
	}

	public function edit_absensi_aksi(){
		$kd_absen 		= $this->input->post('kd_absen');
		$mata_kuliah 	= $this->input->post('mata_kuliah');
		$pertemuan 		= $this->input->post('pertemuan');
		$kelas 			= $this->input->post('kelas');
		$mahasiswa 		= $this->input->post('mahasiswa');
		$status 			= $this->input->post('status');

		$data 		= array(
			'kd_absen'		=> $kd_absen,
			'mata_kuliah'	=> $mata_kuliah,
			'pertemuan'		=> $pertemuan,
			'mahasiswa'		=> $mahasiswa,
			'status'		=> $status
		);

		$where 		= array(
			'kd_absen'	=> $kd_absen
		);

		$this->TataUsahaModel->update_data_absensi($where, $data, 'absensi');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" role="alert">
			Data absensi berhasil diperbaharui.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('tata_usaha/absensi');				
	}



}