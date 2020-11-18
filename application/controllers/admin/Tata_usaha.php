<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tata_usaha extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('UserModel');
		$this->load->library('form_validation');	
	}

	public function index(){
		$data['user'] 	= $this->UserModel->getAll_tata_usaha();
		$data['title'] 	= "Kelola Tata Usaha - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/tata_usaha', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_tata_usaha(){
		$data['title'] 	= "Tambah Tata Usaha - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/tambah_tata_usaha', $data);
		$this->load->view('templates/footer');
	}

	public function _rules(){
		$this->form_validation->set_rules('nip', 'NIP', 'required|exact_length[10]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_hp', 'No HP', 'required|min_length[10]');
	}

	public function tambah_tata_usaha_aksi(){
		$nip 		= $this->input->post('nip');
		$user 		= $this->UserModel->get_nip_tata_usaha($nip);
		$this->_rules();

		if($this->form_validation->run() == FALSE){  
			$this->tambah_tata_usaha();
		} else {
			if(!empty($user)){
				$this->session->set_flashdata('message', '<small class="text-danger pl-1">NIP sudah terdaftar</small>');
				redirect('admin/tata_usaha/tambah_tata_usaha');
			} else {
				$nip 			= $this->input->post('nip');
				$password 		= md5($this->input->post('password'));
				$nama 			= $this->input->post('nama');
				$alamat 		= $this->input->post('alamat');
				$no_hp			= $this->input->post('no_hp');

				$data 		= array(
					'nip' 			=> $nip,
					'password' 		=> $password,	
					'nama' 			=> $nama,
					'alamat' 		=> $alamat,
					'no_hp' 		=> $no_hp
				);

				$this->UserModel->tambah_tata_usaha($data, 'tb_tata_usaha');
				$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;" role="alert">
			  	Tata Usaha berhasil ditambahkan.
			  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    	<span aria-hidden="true">&times;</span>
			  	</button>
				</div>');	
				redirect('admin/tata_usaha');
			}	
		}
	}

	public function edit_tata_usaha($id){
		$data['title']	= "Edit Tata Usaha - Aplikasi Absensi Polibatam";
		$where 			= array('id'=>$id);
		$data['user'] 	= $this->UserModel->edit_tata_usaha($where, 'tb_tata_usaha')->result();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('admin/edit_tata_usaha', $data);
		$this->load->view('templates/footer');
	}

	public function edit_tata_usaha_aksi(){
		$id 			= $this->input->post('id');
		$nip 			= $this->input->post('nip');
		$nama 			= $this->input->post('nama');
		$alamat 		= $this->input->post('alamat');
		$no_hp 			= $this->input->post('no_hp');

		$data 		= array(
			'id'	=> $id,
			'nip'			=> $nip,
			'nama'			=> $nama,
			'alamat'		=> $alamat,
			'no_hp'			=> $no_hp
		);
		$where 		= array(
			'id'	=> $id
		);
		$this->UserModel->update_data_tata_usaha($where, $data, 'tb_tata_usaha');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;" role="alert">
			Data tata usaha berhasil diperbaharui.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/tata_usaha');				
	}

	public function hapus_tata_usaha($id){
		$where 		= array('id' => $id);
		$this->UserModel->hapus_tata_usaha($where, 'tb_tata_usaha');
		$this->session->set_flashdata('message','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto" style="width:40%;" role="alert">
			Data tata usaha berhasil dihapus.
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			   	<span aria-hidden="true">&times;</span>
			</button></div>');
		redirect('admin/tata_usaha');
	}
	
}

?>