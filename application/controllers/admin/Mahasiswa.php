<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('UserModel');
		$this->load->library('form_validation');	
	}

	public function index(){
		$data['user'] 	= $this->UserModel->getAll_mahasiswa();
		$data['title'] 	= "Kelola Mahasiswa - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_mahasiswa(){
		$data['title'] 	= "Tambah Mahasiswa - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/tambah_mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function _rules(){
		$this->form_validation->set_rules('nim', 'NIM', 'required|exact_length[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[10]');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
	}

	public function tambah_mahasiswa_aksi(){
		$nim 		= $this->input->post('nim');
		$user 		= $this->UserModel->get_nim_mahasiswa($nim);
		$this->_rules();

		if($this->form_validation->run() == FALSE){  
			$this->tambah_mahasiswa();
		} else {
			if(!empty($user)){
				$this->session->set_flashdata('message', '<small class="text-danger pl-1">NIM sudah terdaftar</small>');
				redirect('admin/mahasiswa/tambah_mahasiswa');
			} else {
				$nim 			= $this->input->post('nim');
				$password 		= md5($this->input->post('password'));
				$nama 			= $this->input->post('nama');
				$jenis_kelamin	= $this->input->post('jenis_kelamin');
				$jurusan		= $this->input->post('jurusan');
				$no_hp			= $this->input->post('no_hp');
				$kd_kelas		= $this->input->post('kelas');
				
				$data 		= array(
					'nim' 			=> $nim,
					'password' 		=> $password,	
					'nama' 			=> $nama,
					'jenis_kelamin' => $jenis_kelamin,
					'jurusan' 		=> $jurusan,
					'no_hp' 		=> $no_hp,
					'kd_kelas' 		=> $kd_kelas
				);

				$this->UserModel->tambah_mahasiswa($data, 'tb_mahasiswa');
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;"  role="alert">
			  	Mahasiswa berhasil ditambahkan.
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
				</div>');	
				redirect('admin/mahasiswa');
			}	
		}
	}

	public function edit_mahasiswa($id){
		$data['title']	= "Edit Mahasiswa - Aplikasi Absensi Polibatam";
		$where 			= array('kd_mahasiswa'=>$id);
		$data['user'] 	= $this->UserModel->edit_mahasiswa($where, 'tb_mahasiswa')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/edit_mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	public function edit_mahasiswa_aksi(){
		$id 			= $this->input->post('id');
		$nim 			= $this->input->post('nim');
		$nama 			= $this->input->post('nama');
		$jenis_kelamin 	= $this->input->post('jenis_kelamin');
		$jurusan 		= $this->input->post('jurusan');
		$no_hp 			= $this->input->post('no_hp');
		$kd_kelas 		= $this->input->post('kelas');

		$data 		= array(
			'kd_mahasiswa'	=> $id,
			'nim'			=> $nim,
			'nama'			=> $nama,
			'jenis_kelamin'	=> $jenis_kelamin,
			'jurusan'		=> $jurusan,
			'no_hp'			=> $no_hp,
			'kd_kelas'		=> $kd_kelas
		);

		$where 		= array(
			'kd_mahasiswa'	=> $id
		);

		$this->UserModel->update_data_mahasiswa($where, $data, 'tb_mahasiswa');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;" role="alert">
			Data mahasiswa berhasil diperbaharui.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/mahasiswa');				
	}

	public function hapus_mahasiswa($id){
		$where 		= array('kd_mahasiswa' => $id);
		$this->UserModel->hapus_mahasiswa($where, 'tb_mahasiswa');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;" role="alert">
			Data mahasiswa berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/mahasiswa');
	}
	
}

?>