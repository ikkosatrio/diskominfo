<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->blade->sebarno('ctrl', $this);
		$this->load->model('m_config');
		$this->load->model('m_header');
		$this->load->model('m_artikel');
		$this->load->model('m_kategori');
		$this->load->model('m_album');
		$this->load->model('m_gambar');
		$this->load->model('m_potensi');
		$this->load->model('m_produk');
		$this->load->model('m_slider');

		$this->data['config'] 			= $this->m_config->ambil('config',1)->row();
		$this->data['header'] 			= $this->m_header->ambil('header',1)->row();
	}

	public function index()
	{
		$data['artikelBaru'] = $this->m_artikel->tampil_dataBaru('artikel')->result();
		$data['produk']      = $this->m_produk->tampil_dataBaru('produk')->result();
		$data['potensi']     = $this->m_produk->tampil_dataBaru('potensi')->result();
		$data['gambar']      = $this->m_gambar->tampil_dataBaru('gambar_album')->result();
		$data['slider']      = $this->m_slider->tampil_data('slider')->result();
		echo $this->blade->nggambar('v_sitemap',$data);
	}

}

/* End of file Sitemap.php */
/* Location: ./application/controllers/Sitemap.php */