<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->blade->sebarno('ctrl', $this);
		$this->load->model('m_profil');
		$this->load->model('m_config');
		$this->load->model('m_header');
		$this->load->model('m_artikel');
		$this->load->model('m_kategori');
		$this->load->model('m_album');
		$this->load->model('m_gambar');
		$this->load->model('m_potensi');
		$this->load->model('m_produk');
		$this->load->model('m_pejabat');
		$this->load->model('m_slider');
		$this->load->model('m_pesan');

		$this->data['config'] 			= $this->m_config->ambil('config',1)->row();
		$this->data['profil'] 			= $this->m_profil->ambil('profil',1)->row();
		$this->data['header'] 			= $this->m_header->ambil('header',1)->row();
	}

	public function index()
	{
		$data                = $this->data;
		$data['artikelBaru'] = $this->m_artikel->tampil_dataBaru('artikel')->result();
		$data['artikelPop']  = $this->m_artikel->tampil_dataPop('artikel')->result();
		$data['produk']      = $this->m_produk->tampil_dataBaru('produk')->result();
		$data['potensi']     = $this->m_produk->tampil_dataBaru('potensi')->result();
		$data['gambar']      = $this->m_gambar->tampil_dataBaru('gambar_album')->result();
		$data['album']       = $this->m_album->tampil_data('album')->result();
		$data['slider']      = $this->m_slider->tampil_data('slider')->result();
		$data['menu']        = "home";
		echo $this->blade->nggambar('main.home',$data);
	}

	public function profil()
	{
		$data            = $this->data;
		$data['menu']    = "profil";
		$data['pejabat'] = $this->m_pejabat->tampil_dataPri('pejabat')->result();
		echo $this->blade->nggambar('main.profil',$data);
	}

	public function gallery()
	{
		$data           = $this->data;
		$data['menu']   = "gallery";
		$data['gambar'] = $this->m_gambar->tampil_dataBaruAll('gambar_album')->result();
		$data['album']  = $this->m_album->tampil_data('album')->result();
		echo $this->blade->nggambar('main.gallery',$data);
	}

	public function contact()
	{
		$data         = $this->data;
		$data['menu'] = "contact";
		echo $this->blade->nggambar('main.contact',$data);
	}

	public function pesan()
	{
		if ($this->input->is_ajax_request()) {
			$nama           = $this->input->post('nama');
			$email          = $this->input->post('email');
			$pesan          = $this->input->post('pesan');

			$data = array(
				'nama'           => $nama,
				'email'          => $email,
				'pesan'          => $pesan,
			);

			if($this->m_pesan->input_data($data,'pesan')){
				echo goResult(true,"Pesan Telah Dikirim");
				return;
			}

		}else{
			echo goResult(false,"no reques available");
			return;
		}
	}

	public function artikel($id=null,$kategori=null)
	{
		$data                = $this->data;
		$data['menu']        = "artikel";
		$data['artikelBaru'] = $this->m_artikel->tampil_dataBaru('artikel')->result();
		$data['artikelPop']  = $this->m_artikel->tampil_dataPop('artikel')->result();
		$data['kategori']    = $this->m_kategori->tampil_data('kategori')->result();

		if ($id!=null && $id!='kategori' && !$this->input->post('cari', FALSE)) {
			$data['menu']    = "detail";
			$where           = array('id_artikel' => $id );
			$data['artikel'] = $this->m_artikel->detail($where,'artikel')->row();
			$view            = array('view' => $data['artikel']->view + 1);
			$this->m_artikel->update_data($where,$view,'artikel');
			echo $this->blade->nggambar('main.artikel.detail',$data);
		}else if ($id=='kategori'){
			$data['menu']    = "kategori";
			$where           = array('artikel.id_kategori' => $kategori );
			$data['artikelBaru'] = $this->m_artikel->detail($where,'artikel')->result();
			echo $this->blade->nggambar('main.artikel.index',$data);
		}else if ($id=='cari'){
			$data['menu']        = "cari";
			$where               = array('judul' => $this->input->post('cari'));
			$data['artikelBaru'] = $this->m_artikel->cari($where,'artikel')->result();
			echo $this->blade->nggambar('main.artikel.index',$data);
		}
		else{
			echo $this->blade->nggambar('main.artikel.index',$data);
		}
	}

	public function produk($id=null)
	{
		$data               = $this->data;
		$data['menu']       = "produk";
		$data['produkBaru'] = $this->m_produk->tampil_dataBaru('produk')->result();
		$data['produkPop']  = $this->m_produk->tampil_dataPop('produk')->result();
		$data['produkRand'] = $this->m_produk->tampil_dataRand('produk')->result();
		if ($id!=null && !$this->input->post('cari', FALSE)) {
			$data['menu']   = "detail";
			$where          = array('id_produk' => $id );
			$data['produk'] = $this->m_produk->detail($where,'produk')->row();
			$view           = array('view' => $data['produk']->view + 1);
			$this->m_produk->update_data($where,$view,'produk');

			echo $this->blade->nggambar('main.produk.detail',$data);
		}else if ($id=='cari'){
			$data['menu']        = "cari";
			$where               = array('judul' => $this->input->post('cari'));
			$data['produkBaru'] = $this->m_produk->cari($where,'produk')->result();
			echo $this->blade->nggambar('main.produk.index',$data);
		}
		else{
			echo $this->blade->nggambar('main.produk.index',$data);
		}
	}

	public function potensi($id=null)
	{
		$data               = $this->data;
		$data['menu']       = "potensi";
		$data['potensiBaru'] = $this->m_potensi->tampil_dataBaru('potensi')->result();
		$data['potensiPop']  = $this->m_potensi->tampil_dataPop('potensi')->result();
		if ($id!=null) {
			$data['menu']    = "detail";
			$where           = array('id_potensi' => $id );
			$data['potensi'] = $this->m_potensi->detail($where,'potensi')->row();
			$view            = array('view' => $data['potensi']->view + 1);
			$this->m_potensi->update_data($where,$view,'potensi');
			echo $this->blade->nggambar('main.potensi.detail',$data);
		}else {	
			echo $this->blade->nggambar('main.potensi.index',$data);
		}
	}

	public function email($type){
		$data 		= $this->data;

		switch ($type) {
			case 'register':
				$data             	 = $this->data;
				$where = array(
					'id_member' => '2039'
				);
				$data['member']		= $this->m_member->detail($where,'member')->row();
				echo $this->blade->nggambar('email.member.register',$data);	
				break;
			default:
				exit('opps');
				break;
		}
		
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */