<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TataUsahaModel extends CI_Model { 
    function __construct(){
        parent::__construct();
    }

    public function get_kelas(){
        $this->db->select('*');
        $this->db->from('tb_kelas');
        $query = $this->db->get();
        return $query->result();   
    } 

    public function getAll_matkul(){
        $this->db->select('*');
        $this->db->from('tb_matkul');
        $this->db->order_by('nama_matkul');
        $query = $this->db->get();
        return $query->result();   
    }

    public function tambah_matkul($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_matkul($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data_matkul($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_matkul($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }


    public function getAll_absensi(){
        $this->db->select('*');
        $this->db->from('absensi');
        $query = $this->db->get();
        return $query->result();   
    }

    public function getAll_dosen(){
        $this->db->select('*');
        $this->db->from('tb_dosen');
        $query = $this->db->get();
        return $query->result();   
    }

    public function edit_absensi($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data_absensi($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }




}


