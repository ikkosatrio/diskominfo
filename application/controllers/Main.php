<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->blade->sebarno('ctrl', $this);
		$this->load->model('m_peserta');
		$this->load->model('m_bidang');
		$this->load->model('m_config');

		$this->data['config'] = $this->m_config->ambil('config',1)->row();
	}

	public function index()
	{
		$data           = $this->data;
		$data['bidang'] = $this->m_bidang->tampil_data('bidang')->result();
		$data['menu']   = "home";
		echo $this->blade->nggambar('main.home',$data);
	}

	public function daftar()
	{
		$data         = $this->data;
		$data['menu'] = "daftar";
		echo $this->blade->nggambar('main.daftar',$data);
	}

	public function kuota()
	{
		$data           = $this->data;
		$data['menu']   = "kuota";
		$data['bidang'] = $this->m_bidang->tampil_data('bidang')->result();
		echo $this->blade->nggambar('main.kuota',$data);
	}

	public function alur()
	{
		$data           = $this->data;
		$data['menu']   = "alur";
		echo $this->blade->nggambar('main.alur',$data);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */