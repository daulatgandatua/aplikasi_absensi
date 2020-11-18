<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_controller{
	
	public function __construct(){ 
		parent::__construct(); 
		$this->load->model('DosenModel');
		$this->load->library('form_validation');	
	}

	public function absen(){
		$data1['title'] 	= "Absen - Aplikasi Absensi Polibatam";
		$data = array('matkul'=> $this->DosenModel->getAll_matkul());
		$where = $this->session->userdata('sess_nama'); 
		$data2 = $this->DosenModel->get_row_matkul($where);
		if($data2->num_rows() > 0){
			$this->load->view('templates/header', $data1);
			$this->load->view('templates/sidebar');
			$this->load->view('dosen/absen', $data);
			$this->load->view('templates/footer');
		} else{
			$this->session->set_flashdata('message','<div class="alert alert-danger text-center d-block mr-auto ml-auto mb-3 mt-0" style="width:30%;" role="alert">
			  DATA MATA KULIAH TIDAK ADA !  
			</div>');

			$this->load->view('templates/header', $data1);
			$this->load->view('templates/sidebar');
			$this->load->view('dosen/absen_tdk_ada');
			$this->load->view('templates/footer');
		}		
	}

	public function absen_aksi(){
		$pertemuan =htmlspecialchars($this->input->get('pertemuan',TRUE),ENT_QUOTES);
		$matkul =htmlspecialchars($this->input->get('mata_kuliah',TRUE),ENT_QUOTES);
		$cek = $this->DosenModel->cek_data_absen($pertemuan, $matkul);
		if($cek->num_rows() > 0){
			$this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible fade show text-center d-block mr-auto ml-auto mb-3 mt-0" style="width: 30%;" role="alert">
			  Data sudah ada.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
			redirect('dosen/absen');
		} 
		else{
		$data['title'] 	= "Absen - Aplikasi Absensi Polibatam";
		$data1 			= array('mahasiswa'=> $this->DosenModel->get_mahasiswa(), 
								'kelas'=> $this->DosenModel->get_kelas(), 
								'matkul'=> $this->DosenModel->get_matkul(),
								'pertemuan'=> $this->DosenModel->get_pertemuan());
		$where 			= $this->session->userdata('sess_nama'); 

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('dosen/absen_aksi', $data1, $where);
		$this->load->view('templates/footer');
		}
	}

	public function simpan_absen(){
      	$result = array();
      	foreach ($_GET['mata_kuliah'] as $key => $val) {
         $result[] = array(             
            'mata_kuliah' => $_GET['mata_kuliah'][$key],
            'kd_kelas' => $_GET['kelas'][$key],  
            'pertemuan' => $_GET['pertemuan'][$key],
            'mahasiswa' => $_GET['mahasiswa'][$key], 
            'status' => $_GET['absen'][$key]   
         );      
      	}      
      	$this->db->insert_batch('absensi',$result);

      	$pertemuan  = $this->input->get('pertemuan1');
        $matkul  = $this->input->get('mata_kuliah1');

        $this->session->set_userdata('sess_matkul',$matkul);
        $this->session->set_userdata('sess_pertemuan',$pertemuan);

      	$this->session->set_flashdata('message1','<div class="alert alert-success alert-dismissible fade show text-center d-block mr-auto ml-auto mb-3 mt-0" style="width: 30%;" role="alert">
			  Absensi Berhasil.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>');
		redirect('dosen/hasil_absen');
				
	}

	public function hasil_absen(){
		$data1['title'] 	= "Absensi Mahasiswa - Aplikasi Absensi Polibatam";
		$data2 = array('absen'=> $this->DosenModel->get_absen()); 
		$this->load->view('templates/header', $data1);
		$this->load->view('templates/sidebar');
		$this->load->view('dosen/hasil_absen', $data2);
		$this->load->view('templates/footer');
	}

	
}

?>