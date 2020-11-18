<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller{
	public function __construct(){ 
		parent::__construct(); 
		$this->load->library('form_validation');	
	}

	public function index(){
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('admin/user');
		$this->load->view('templates/footer');
	}

}

?>