<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('UserModel');
		$this->load->library('form_validation');	
	}

	public function index(){
		$data['user'] 	= $this->UserModel->getAll_dosen();
		$data['title'] 	= "Kelola Dosen - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/dosen', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_dosen(){
		$data['title'] 	= "Tambah Dosen - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/tambah_dosen', $data);
		$this->load->view('templates/footer');
	}

	public function _rules(){
		$this->form_validation->set_rules('nip', 'NIP', 'required|exact_length[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[10]');
	}

	public function tambah_dosen_aksi(){
		$nip 		= $this->input->post('nip');
		$user 		= $this->UserModel->get_nip_dosen($nip);
		$this->_rules();

		if($this->form_validation->run() == FALSE){  
			$this->tambah_dosen();
		} else {
			if(!empty($user)){
				$this->session->set_flashdata('message', '<small class="text-danger pl-1">NIP sudah terdaftar</small>');
				redirect('admin/dosen/tambah_dosen');
			} else {
				$nip 			= $this->input->post('nip');
				$password 		= md5($this->input->post('password'));
				$fakultas 		= $this->input->post('fakultas');
				$nama 			= $this->input->post('nama');
				$alamat 		= $this->input->post('alamat');
				$no_hp			= $this->input->post('no_hp');

				$data 		= array(
					'nip' 			=> $nip,
					'password' 		=> $password,	
					'fakultas' 		=> $fakultas,
					'nama' 			=> $nama,
					'alamat' 		=> $alamat,
					'no_hp' 		=> $no_hp
				);

				$this->UserModel->tambah_dosen($data, 'tb_dosen');
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;"  role="alert">
			  	Dosen berhasil ditambahkan.
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
				</div>');	
				redirect('admin/dosen');
			}	
		}
	}

	public function edit_dosen($id){
		$data['title']	= "Edit Dosen - Aplikasi Absensi Polibatam";
		$where 			= array('id'=>$id);
		$data['user'] 	= $this->UserModel->edit_dosen($where, 'tb_dosen')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/edit_dosen', $data);
		$this->load->view('templates/footer');
	}

	public function edit_dosen_aksi(){
		$id 			= $this->input->post('id');
		$nip 			= $this->input->post('nip');
		$fakultas 			= $this->input->post('fakultas');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$no_hp 			= $this->input->post('no_hp');

		$data 		= array(
			'id'			=> $id,
			'nip'			=> $nip,
			'fakultas'		=> $fakultas,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'no_hp'			=> $no_hp
		);

		$where 		= array(
			'id'	=> $id
		);

		$this->UserModel->update_data_dosen($where, $data, 'tb_dosen');

		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;"  role="alert">
			Data dosen berhasil diperbaharui.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/dosen');				
	}

	public function hapus_dosen($id){
		$where 		= array('id' => $id);
		$this->UserModel->hapus_dosen($where, 'tb_dosen');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;"  role="alert">
			Data dosen berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/dosen');
	}
	
}

?>