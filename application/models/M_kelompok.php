<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kelompok extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function tampil_data($table){
		$this->db->from($table);
		return $query = $this->db->get();
	}

	function tampil_data_detail($table){
		$this->db->from($table);
		$this->db->join('kelompok','kelompok.id_kelompok=detail_kelompok.id_kelompok');
		return $query = $this->db->get();
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function detail($where,$table){	
		$this->db->join('user','user.id_user=kelompok.id_pembimbing');
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

/* End of file M_kelompok.php */
/* Location: ./application/models/M_kelompok.php */