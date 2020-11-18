<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model { 
    function __construct(){
        parent::__construct();
    }

//Cek nik dan password dosen
    public function auth_dosen($id, $password){
        $query = $this->db->query("SELECT * FROM tb_dosen WHERE nip ='$id' AND password=md5('$password') LIMIT 1");
        return $query;
    }

//Cek nik dan password mahasiswa
   public function auth_mahasiswa($id, $password){
        $query = $this->db->query("SELECT * FROM tb_mahasiswa WHERE nim ='$id' AND password=md5('$password') LIMIT 1");
        return $query;
    }

//Cek nik dan password admin
    public function auth_admin($id, $password){
        $query = $this->db->query("SELECT * FROM tb_admin WHERE nip ='$id' AND password=md5('$password') LIMIT 1");
        return $query;
    }


//Cek nik dan password admin
    public function auth_tata_usaha($id, $password){
        $query = $this->db->query("SELECT * FROM tb_tata_usaha WHERE nip ='$id' AND password=md5('$password') LIMIT 1");
        return $query;
    }

//Menampilkan seluruh data user admin
    public function getAll_admin(){
        $this->db->select('*');
        $this->db->from('tb_admin');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result();   
    }

//MAHASISWA
    public function getAll_mahasiswa(){
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_nim_mahasiswa($nim){
        $this->db->where('nim', $nim); 
        $result = $this->db->get('tb_mahasiswa')->row();
        return $result;
    }

    public function tambah_mahasiswa($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_mahasiswa($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data_mahasiswa($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_mahasiswa($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

//DOSEN
    public function getAll_dosen(){
        $this->db->select('*');
        $this->db->from('tb_dosen');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_nip_dosen($nip){
        $this->db->where('nip', $nip); 
        $result = $this->db->get('tb_dosen')->row();
        return $result;
    }

    public function tambah_dosen($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_dosen($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data_dosen($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_dosen($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }


//TATA USAHA
    public function getAll_tata_usaha(){
        $this->db->select('*');
        $this->db->from('tb_tata_usaha');
        $this->db->order_by('nama');
        $query = $this->db->get();
        return $query->result();   
    }

    public function get_nip_tata_usaha($nip){
        $this->db->where('nip', $nip); 
        $result = $this->db->get('tb_tata_usaha')->row();
        return $result;
    }

    public function tambah_tata_usaha($data, $table){
        $this->db->insert($table, $data);
    }

    public function edit_tata_usaha($where, $table){
        return $this->db->get_where($table, $where);
    }

    public function update_data_tata_usaha($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_tata_usaha($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }

//Absensi
    public function getAll_absensi(){
        $where = $this->session->userdata('sess_nama');
        $this->db->select('*');
        $this->db->from('absensi');
        $this->db->where('mahasiswa', $where);
        $query = $this->db->get();
        return $query->result();   
    }


}