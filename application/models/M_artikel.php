<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_artikel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function tampil_data($table){
		$this->db->from($table);
		$this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
		return $query = $this->db->get();
		// return $this->db->get($table);
	}

	function tampil_dataBaru($table){
		$this->db->from($table);
		$this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
		$this->db->order_by('artikel.created_at','desc');
		return $query = $this->db->get();
		// return $this->db->get($table);
	}

	function tampil_dataPop($table){
		$this->db->from($table);
		$this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
		$this->db->order_by('view','desc');
		return $query = $this->db->get();
		// return $this->db->get($table);
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	
	function cari($where,$table){	
		$this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
		$this->db->like($where);
		return $this->db->get($table);
	}

	function detail($where,$table){	
		$this->db->join('kategori','kategori.id_kategori=artikel.id_kategori');
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

/* End of file M_artikel.php */
/* Location: ./application/models/M_artikel.php */