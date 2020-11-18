<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller { 
  public function __construct(){ 
    parent::__construct(); 
    $this->load->model('UserModel');
    $this->load->library('form_validation');
  }   

  public function authenticated(){ // Fungsi untuk memeriksa user udah login atau belum.
    if($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != ''){
      if( !$this->session->userdata('authenticated')) // kalau belum login
        redirect('auth'); // diarahkan ke halaman login
    }
  }

  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('home'); // Redirect ke page home
    $this->load->view('login'); // Load view login.php
  }

  public function login(){
    $this->load->view('login');
  }
 
  public function login_aksi(){
    $id =htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
    $password =htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

    $dosen = $this->UserModel->auth_dosen($id, $password); // Cek user dosen
    $mahasiswa = $this->UserModel->auth_mahasiswa($id, $password);
    $admin = $this->UserModel->auth_admin($id, $password);
    $tata_usaha = $this->UserModel->auth_tata_usaha($id, $password);

    if($dosen->num_rows() > 0){ //JIKA LOGIN DOSEN
      $data=$dosen->row_array();
  
      $this->session->set_userdata('authenticated',true);
      $this->session->set_userdata('akses','3');
      $this->session->set_userdata('sess_id',$data['id']);
      $this->session->set_userdata('sess_nip',$data['nip']);
      $this->session->set_userdata('sess_nama',$data['nama']);
      $this->session->set_userdata('sess_password',$data['password']);

      redirect('home'); // Redirect ke halaman home
    }

    else if($mahasiswa->num_rows() > 0){
      $data=$mahasiswa->row_array();
      $this->session->set_userdata('authenticated',true);
      $this->session->set_userdata('akses','4');
      $this->session->set_userdata('sess_id',$data['kd_mahasiswa']);
      $this->session->set_userdata('sess_nip',$data['nim']);
      $this->session->set_userdata('sess_nama',$data['nama']);
      $this->session->set_userdata('sess_password',$data['password']);
      $this->session->set_userdata('sess_kd_kelas',$data['kd_kelas']);
      
      redirect('home'); // Redirect ke halaman home
    }

    else if($admin->num_rows() > 0){
      $data=$admin->row_array();
      $this->session->set_userdata('authenticated',true);
      $this->session->set_userdata('akses','1');
      $this->session->set_userdata('sess_id',$data['id']);
      $this->session->set_userdata('sess_nip',$data['nip']);
      $this->session->set_userdata('sess_nama',$data['nama']);
      $this->session->set_userdata('sess_password',$data['password']);
      
      redirect('home'); // Redirect ke halaman home
    }

    else if($tata_usaha->num_rows() > 0){
      $data=$tata_usaha->row_array();
      $this->session->set_userdata('authenticated',true);
      $this->session->set_userdata('akses','2');
      $this->session->set_userdata('sess_id',$data['id']);
      $this->session->set_userdata('sess_nip',$data['nip']);
      $this->session->set_userdata('sess_nama',$data['nama']);
      $this->session->set_userdata('sess_password',$data['password']);
      
      redirect('home'); // Redirect ke halaman home
    }

    else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mt-3 mb-3" role="alert">User/Password Salah !<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
        redirect('auth');
    }
        
  }
  
  public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('auth'); // Redirect ke halaman login
  }

  public function ganti_password(){
    $data['title'] = "Ganti Password - Aplikasi Controlling Aktiva Tetap";

    if($this->session->userdata('akses') == 1){
      $data['user']  = $this->db->get_where('tb_admin', ['nip' => $this->session->userdata('sess_nip')])->row_array();

      $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
      $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[6]|matches[confirm_password]');
      $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[new_password]');

      if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('ganti_password', $data);
        $this->load->view('templates/footer');
      }//tutup if kedua
      else{
        $current_password = md5($this->input->post('current_password'));
        $new_password = md5($this->input->post('new_password'));
        if($current_password !== $this->session->userdata('sess_password')){
          $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Lama salah.</small>');
          redirect('auth/ganti_password');
        }//tutup if ketiga
          else{
            if($current_password == $new_password){
            $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Baru tidak boleh sama dengan password lama.</small>');
            redirect('auth/ganti_password');
          } //tutup if ke empat
          else{
            $this->db->set('password', $new_password);
            $this->db->where('nip', $this->session->userdata('sess_nip'));
            $this->db->update('tb_admin');

            $this->session->sess_destroy(); // Hapus semua session  
            redirect('auth/login?status=password-updated'); // Redirect ke halaman login  
          }//tutup else ketiga

          } //tutup else kedua

      } //tutup else
    }//tutup if pertama  

    else if($this->session->userdata('akses') == 2){
      $data['user']  = $this->db->get_where('tb_tata_usaha', ['nip' => $this->session->userdata('sess_nip')])->row_array();

      $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
      $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[6]|matches[confirm_password]');
      $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[new_password]');

      if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('ganti_password', $data);
        $this->load->view('templates/footer');
      }//tutup if kedua
      else{
        $current_password = md5($this->input->post('current_password'));
        $new_password = md5($this->input->post('new_password'));
        if($current_password !== $this->session->userdata('sess_password')){
          $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Lama salah.</small>');
          redirect('auth/ganti_password');
        }//tutup if ketiga
          else{
            if($current_password == $new_password){
            $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Baru tidak boleh sama dengan password lama.</small>');
            redirect('auth/ganti_password');
          } //tutup if ke empat
          else{
            $this->db->set('password', $new_password);
            $this->db->where('nip', $this->session->userdata('sess_nip'));
            $this->db->update('tb_tata_usaha');

            $this->session->sess_destroy(); // Hapus semua session  
            redirect('auth/login?status=password-updated'); // Redirect ke halaman login  
          }//tutup else ketiga

          } //tutup else kedua

      } //tutup else
    }//tutup if pertama  

    else if($this->session->userdata('akses') == 3){
      $data['user']  = $this->db->get_where('tb_dosen', ['nip' => $this->session->userdata('sess_nip')])->row_array();

      $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
      $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[6]|matches[confirm_password]');
      $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[new_password]');

      if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('ganti_password', $data);
        $this->load->view('templates/footer');
      }//tutup if kedua
      else{
        $current_password = md5($this->input->post('current_password'));
        $new_password = md5($this->input->post('new_password'));
        if($current_password !== $this->session->userdata('sess_password')){
          $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Lama salah.</small>');
          redirect('auth/ganti_password');
        }//tutup if ketiga
          else{
            if($current_password == $new_password){
            $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Baru tidak boleh sama dengan password lama.</small>');
            redirect('auth/ganti_password');
          } //tutup if ke empat
          else{
            $this->db->set('password', $new_password);
            $this->db->where('nip', $this->session->userdata('sess_nip'));
            $this->db->update('tb_dosen');

            $this->session->sess_destroy(); // Hapus semua session  
            redirect('auth/login?status=password-updated'); // Redirect ke halaman login  
          }//tutup else ketiga

          } //tutup else kedua

      } //tutup else
    }//tutup if pertama 

    else if($this->session->userdata('akses') == 4){
      $data['user']  = $this->db->get_where('tb_mahasiswa', ['nim' => $this->session->userdata('sess_nip')])->row_array();

      $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
      $this->form_validation->set_rules('new_password', 'Password Baru', 'required|trim|min_length[6]|matches[confirm_password]');
      $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[new_password]');

      if($this->form_validation->run() == false){
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('ganti_password', $data);
        $this->load->view('templates/footer');
      }//tutup if kedua
      else{
        $current_password = md5($this->input->post('current_password'));
        $new_password = md5($this->input->post('new_password'));
        if($current_password !== $this->session->userdata('sess_password')){
          $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Lama salah.</small>');
          redirect('auth/ganti_password');
        }//tutup if ketiga
          else{
            if($current_password == $new_password){
            $this->session->set_flashdata('message', '<small class="text-danger pl-1">Password Baru tidak boleh sama dengan password lama.</small>');
            redirect('auth/ganti_password');
          } //tutup if ke empat
          else{
            $this->db->set('password', $new_password);
            $this->db->where('nim', $this->session->userdata('sess_nip'));
            $this->db->update('tb_mahasiswa');

            $this->session->sess_destroy(); // Hapus semua session  
            redirect('auth/login?status=password-updated'); // Redirect ke halaman login  
          }//tutup else ketiga

          } //tutup else kedua

      } //tutup else
    }//tutup if pertama

    else{
      $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show text-center mt-3 mb-3" role="alert">Gagal Ganti Password!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div>');
        redirect('auth/ganti_password');
    } 









  }//tutup function ganti_password


}