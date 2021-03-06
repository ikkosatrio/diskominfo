<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_peserta extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function tampil_data($table){
		$this->db->from($table);
		$this->db->join('bidang','bidang.id_bidang=peserta.id_bidang','left');
		$this->db->join('user','user.id_user=peserta.id_user');
		return $query = $this->db->get();
		// return $this->db->get($table);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function detail($where,$table){	
		$this->db->join('bidang','bidang.id_bidang=peserta.id_bidang','left');
		$this->db->join('user','user.id_user=peserta.id_user');
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

}

/* End of file M_peserta.php */
/* Location: ./application/models/M_peserta.php */