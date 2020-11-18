<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DosenModel extends CI_Model { 
    function __construct(){
        parent::__construct();
    }

    public function getAll_matkul(){
        $where = $this->session->userdata('sess_nama');
        $this->db->select('*');
        $this->db->from('tb_matkul');
        $this->db->where('dosen', $where);
        $query = $this->db->get();
        return $query->result();   
    }
  
    public function get_mahasiswa(){
        $where = $this->input->get('kd_kelas');
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->order_by('nama');
        $this->db->where('kd_kelas', $where);
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_kelas(){
        $where = $this->input->get('kd_kelas');
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $this->db->where('kd_kelas', $where);
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_matkul(){
        $where = $this->input->get('mata_kuliah');
        $this->db->select('*');
        $this->db->from('tb_matkul');
        $this->db->where('nama_matkul', $where);
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_pertemuan(){
        $where = $this->input->get('pertemuan');
        $this->db->select('*');
        $this->db->from('tb_pertemuan');
        $this->db->where('detail', $where);
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_absen(){
        $pertemuan  = $this->session->userdata('sess_pertemuan');
        $matkul  = $this->session->userdata('sess_matkul');
        $where = array('pertemuan' => $pertemuan, 'mata_kuliah' => $matkul);
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();   
    }

    public function cek_data_absen($pertemuan, $matkul){
        $query = $this->db->query("SELECT * FROM absensi WHERE pertemuan ='$pertemuan' AND mata_kuliah = '$matkul'");
        return $query;
    }

    public function get_row_matkul(){
        $where = $this->session->userdata('sess_nama'); 
        $query = $this->db->query("SELECT * FROM tb_matkul WHERE dosen ='$where' LIMIT 1");
        return $query;
    }



}


