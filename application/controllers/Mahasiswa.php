<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('UserModel');
		$this->load->library('form_validation');	
	} 

	public function absensi(){
		$data['absensi'] 	= $this->UserModel->getAll_absensi();
		$data['title'] 	= "Lihat Absensi - Aplikasi Absensi Polibatam";
		$where = $this->session->userdata('sess_nama');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('absensi', $data);
		$this->load->view('templates/footer');
	}


	
}

?>