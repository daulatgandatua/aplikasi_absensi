<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->library('form_validation');	
	}

	public function index(){
		$data['title'] 	= "Home - Aplikasi Absensi Polibatam";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}

	

}

?>