<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superuser extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

		if(!$this->session->userdata('authmember')){
			redirect('main');
		}
		$this->blade->sebarno('ctrl', $this);
		$this->load->library('session');
		$this->load->model('m_config');
		$this->load->model('m_bidang');
		$this->load->model('m_peserta');
		$this->load->model('m_user');
		$this->load->model('m_kelompok');
		$this->data['config'] = $this->m_config->ambil('config',1)->row();
	}

	public function index()
	{	
		$data            = $this->data;
		$data['menu']    = "dashboard";
		$where           = array('peserta.id_user' => $this->session->userdata('authmember_id'));
		
		if($this->session->userdata('authmember_role')=='admin' || $this->session->userdata('authmember_role')=='kominfo' ){
			$where        = array('id_user' => $this->session->userdata('authmember_id'));
			$data['user'] = $this->m_user->detail($where,'user')->row();
			echo $this->blade->nggambar('admin.home',$data);
		}else{
			$where           = array('peserta.id_user' => $this->session->userdata('authmember_id'));
			$data['bidang']  = $this->m_bidang->tampil_data('bidang')->result();
			$data['peserta'] = $this->m_peserta->detail($where,'peserta')->row();
			echo $this->blade->nggambar('admin.peserta.biodata',$data);
		}
		
	}
	
	// Start Config
	public function config ($type=null){
		$data         = $this->data;
		// $data         = $this->data;
		$data['menu'] = "config";

		if ($this->input->is_ajax_request()) {

			switch ($type) {

				case 'update':					

					$logoname 		= $data['config']->logo;
					$iconname 		= $data['config']->icon;

					if (!empty($_FILES['logo']['name'])) {
						$upload 	= $this->upload('./assets/images/website/config/logo/','logo','logo');

						if($upload['auth']	== false){
							echo goResult(false,$upload['msg']);
							return;
						}

						$logoname 	= $upload['msg']['file_name'];
						if(!empty($logoname)){remFile(base_url().'assets/images/website/config/logo/'.$data['config']->logo);}
					}

					if (!empty($_FILES['icon']['name'])) {
						$upload 	= $this->upload('./assets/images/website/config/icon/','icon','icon');
						if($upload['auth']	== false){
							echo goResult(false,$upload['msg']);
							return;
						}

						$iconname 	= $upload['msg']['file_name'];
						if(!empty($iconname)){remFile(base_url().'assets/images/website/config/icon/'.$data['config']->icon);}
					}
					
					$id             = 1;
					$name           = $this->input->post('name');
					$email          = $this->input->post('email');
					$phone          = $this->input->post('phone');
					$facebook       = $this->input->post('facebook');
					$instagram      = $this->input->post('instagram');
					$address        = $this->input->post('address');
					$description    = $this->input->post('description');
					$meta_deskripsi = $this->input->post('meta_deskripsi');
					$meta_keyword   = $this->input->post('meta_keyword');
					
					$data = array(
						'name'           => $name,
						'email'          => $email,
						'phone'          => $phone,
						'facebook'       => $facebook,
						'instagram'      => $instagram,
						'address'        => $address,
						'description'    => $description,
						'icon'           => $iconname,
						'logo'           => $logoname,
						'meta_deskripsi' => $meta_deskripsi,
						'meta_keyword'   => $meta_keyword
					);
				 
					$where = array(
						'id' => $id
					);

					if($this->m_config->update_data($where,$data,'config')){
						echo goResult(true,"Data Telah Di Perbarui");
						return;
					}

					break;
				
				default:
					echo goResult(false,"Konfigurasi Telah Di Simpan");
					return;
					break;
			}
		   return;
		}

		echo $this->blade->nggambar('admin.config.index',$data);
		return;
	}
	// End Config

	// Start Peserta
	public function peserta($url=null,$id=null)
	{
		$data         = $this->data;
		$data['menu'] = "peserta";
		$data['peserta'] = $this->m_peserta->tampil_data('peserta')->result();
		
		if ($url=="verified") {
			$where = array(
					'id_peserta' => $id 
				);
			
			$peserta = $this->m_peserta->detail($where,'peserta')->row();
			$bidang  = $this->m_bidang->detail(array('id_bidang' => $peserta->id_bidang),'bidang')->row();
			$kuota   = $bidang->kuota - 1;
			$data = array(
					'kuota' => $kuota
				);

			$this->m_bidang->update_data(array('id_bidang' => $peserta->id_bidang),$data,'bidang');		

			$data = array(
					'status' => 1
				);
			if($this->m_peserta->update_data($where,$data,'peserta')){
				echo goResult(true,"Data Telah Di Verifikasi");
				return;
			}

		} else if ($url=="unverified") {
			$where = array(
					'id_peserta' => $id 
				);

			$peserta = $this->m_peserta->detail($where,'peserta')->row();
			$bidang  = $this->m_bidang->detail(array('id_bidang' => $peserta->id_bidang),'bidang')->row();
			$kuota = $bidang->kuota + 1;
			$data = array(
					'kuota' => $kuota
				);

			$this->m_bidang->update_data(array('id_bidang' => $peserta->id_bidang),$data,'bidang');

			$data = array(
					'status' => 0
				);
			if($this->m_peserta->update_data($where,$data,'peserta')){
				echo goResult(true,"Data Telah Di Verifikasi");
				return;
			}
		}else if($url=="updated"){
			$surat 		= time().$_FILES['surat']['name'];
			$surat 		= str_replace(' ', '_', $surat);

			$proposal 		= time().$_FILES['proposal']['name'];
			$proposal 		= str_replace(' ', '_', $proposal);

			$nama          = $this->input->post('nama');
			$telephone     = $this->input->post('telephone');
			$email         = $this->input->post('email');
			$jenjang       = $this->input->post('jenjang');
			$sekolah       = $this->input->post('sekolah');
			$program_studi = $this->input->post('program_studi');
			$bidang        = $this->input->post('bidang');
			$awal          = $this->input->post('awal');
			$akhir         = $this->input->post('akhir');


			$where = array(
					'id_peserta' => $id 
			);

			if (!empty($_FILES['surat']['name'])) {
					$upload 	= $this->upload('./assets/files/surat/','surat',$surat);
					if($upload['auth']	== false){
						echo goResult(false,$upload['msg']);
						return;
					}
					$data = array(
						'nm_peserta'         => $nama,
						'telephone'          => $telephone,
						'jenjang_pendidikan' => $jenjang,
						'nm_sekolah'         => $sekolah,
						'program_studi'      => $program_studi,
						'id_bidang'          => $bidang,
						'awal_magang'        => $awal,
						'akhir_magang'       => $akhir,
						'surat_magang'       => $surat
					);

					if (!empty($_FILES['proposal']['name'])) {
						$upload1 	= $this->upload1('./assets/files/proposal/','proposal',$proposal);
						if($upload1['auth']	== false){
							echo goResult(false,$upload1['msg']);
							return;
						}
						$data = array(
							'nm_peserta'         => $nama,
							'telephone'          => $telephone,
							'jenjang_pendidikan' => $jenjang,
							'nm_sekolah'         => $sekolah,
							'program_studi'      => $program_studi,
							'id_bidang'          => $bidang,
							'awal_magang'        => $awal,
							'akhir_magang'       => $akhir,
							'surat_magang'       => $surat,
							'proposal_magang'    => $proposal

						);
					}else{

						$data = array(
							'nm_peserta'         => $nama,
							'telephone'          => $telephone,
							'jenjang_pendidikan' => $jenjang,
							'nm_sekolah'         => $sekolah,
							'program_studi'      => $program_studi,
							'id_bidang'          => $bidang,
							'awal_magang'        => $awal,
							'akhir_magang'       => $akhir,
							'surat_magang'       => $surat
						);
					}

				}else{
					if (!empty($_FILES['proposal']['name'])) {
						$upload1 	= $this->upload1('./assets/files/proposal/','proposal',$proposal);
						if($upload1['auth']	== false){
							echo goResult(false,$upload1['msg']);
							return;
						}
						$data = array(
							'nm_peserta'         => $nama,
							'telephone'          => $telephone,
							'jenjang_pendidikan' => $jenjang,
							'nm_sekolah'         => $sekolah,
							'program_studi'      => $program_studi,
							'id_bidang'          => $bidang,
							'awal_magang'        => $awal,
							'akhir_magang'       => $akhir,
							'proposal_magang'    => $proposal

						);
					}else{

						$data = array(
							'nm_peserta'         => $nama,
							'telephone'          => $telephone,
							'jenjang_pendidikan' => $jenjang,
							'nm_sekolah'         => $sekolah,
							'program_studi'      => $program_studi,
							'id_bidang'          => $bidang,
							'awal_magang'        => $awal,
							'akhir_magang'       => $akhir
						);
					}

					// $data = array(
					// 	'nm_peserta'         => $nama,
					// 	'telephone'          => $telephone,
					// 	'jenjang_pendidikan' => $jenjang,
					// 	'nm_sekolah'         => $sekolah,
					// 	'program_studi'      => $program_studi,
					// 	'id_bidang'          => $bidang,
					// 	'awal_magang'        => $awal,
					// 	'akhir_magang'       => $akhir
					// );
				}

			if($this->m_peserta->update_data($where,$data,'peserta')){
				echo goResult(true,"Data Telah Di Update");
				return;
			}

		}else{	
			echo $this->blade->nggambar('admin.peserta.index',$data);
			return;
		}

	}
	// End Peserta
	

	// Start Anggota
	public function anggota($url=null,$id=null){
		$data            = $this->data;
		$data['menu']     = "anggota";
		$data['peserta']  = $this->m_peserta->tampil_data('peserta')->row();
		$data['anggota']  = $this->m_kelompok->tampil_data_detail('detail_kelompok')->result();
		$data['kelompok'] = $this->m_kelompok->detail(array('id_ketua' => $this->session->userdata('authmember_id')),'kelompok')->row();
		if ($url=="create") {
			$data['type']			= "create";
			echo $this->blade->nggambar('admin.peserta.anggota.content',$data);
			return;
		}else if ($url=="created" && $this->input->is_ajax_request() == true){
			
			$namas  = $this->input->post('namaAnggota[]');
			
			$data = array(
					'id_ketua'      => $this->session->userdata('authmember_id'),
					'id_pembimbing' => $this->m_user->randomData(array('role' => 'kominfo'),'user')->row()->id_user
			);
			$kelompok = $this->m_kelompok->input_data($data,'kelompok');
			
			foreach ($namas as $value) {
				$data = array(
						'nm_anggota'       => $value,
						'id_kelompok'	   => $kelompok
						);
				$this->m_kelompok->input_data($data,'detail_kelompok');
			}

			if ($kelompok) {
				echo goResult(true,"Data Telah Di Tambahkan");
				return;
			}
		}
		else if ($url=="update" ) {
			$data['type']			= "update";
			$data['kelompok']		= $this->m_kelompok->detail(array('id_ketua' => $this->session->userdata('authmember_id')),'kelompok')->row();
			$data['anggota']		= $this->m_kelompok->tampil_data_detail('detail_kelompok')->result();

			echo $this->blade->nggambar('admin.peserta.anggota.content',$data);
			return;
		}else if ($url=="updated" && $id!=null && $this->input->is_ajax_request() == true) {
			$namas  = $this->input->post('namaAnggota[]');
			$where = array(
					'id_kelompok'	   => $id
			); 

			$this->m_kelompok->hapus_data($where,'detail_kelompok');
				foreach ($namas as $value) {
					$data = array(
							'nm_anggota'       => $value,
							'id_kelompok'	   => $id
							);
					$this->m_kelompok->input_data($data,'detail_kelompok');
				}
			
			echo goResult(true,"Data Telah Di Perbarui");
			return;			
		}
		else{	
			echo $this->blade->nggambar('admin.peserta.anggota.index',$data);
			return;
		}
	}
	// End Anggota


	// Start Bidang
	public function bidang($url=null,$id=null)
	{
		$data             = $this->data;
		$data['menu']     = "bidang";
		$data['bidang'] = $this->m_bidang->tampil_data('bidang')->result();

		if ($url=="create") {
			$data['type']			= "create";
			echo $this->blade->nggambar('admin.bidang.content',$data);	
			return;
		}
		else if ($url == "created" && $this->input->is_ajax_request() == true) {
			
			$nama  = $this->input->post('nama');
			$kuota = $this->input->post('kuota');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
		
			$data = array(
				'nm_bidang'       => $nama,
				'kuota'   => $kuota,
				'bulan' => $bulan,
				'tahun' => $tahun
			);

			if($this->m_bidang->input_data($data,'bidang')){
				echo goResult(true,"Data Telah Di Tambahkan");
				return;
			}
		}
		else if ($url=="update" && $id!=null) {
			$data['type']    = "update";
			$where           = array('id_bidang' => $id);
			$data['bidang'] = $this->m_bidang->detail($where,'bidang')->row();
			echo $this->blade->nggambar('admin.bidang.content',$data);
		}
		else if ($url=="updated" && $id!=null && $this->input->is_ajax_request() == true) {
			$where           = array('id_bidang' => $id);

			$nama  = $this->input->post('nama');
			$kuota = $this->input->post('kuota');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');
		
			$data = array(
				'nm_bidang' => $nama,
				'kuota'     => $kuota,
				'bulan'     => $bulan,
				'tahun'     => $tahun
			);

			if($this->m_bidang->update_data($where,$data,'bidang')){
				echo goResult(true,"Data Telah Di Tambahkan");
				return;
			}
		}
		else if ($url=="deleted" && $id != null) {
			$where           = array('id_bidang' => $id);
			if ($this->m_bidang->hapus_data($where,'bidang')) {
			
			}
			redirect('superuser/bidang/');
		}
		else {
			echo $this->blade->nggambar('admin.bidang.index',$data);	
			return;
		}
	}
	// End Bidang 




	//---------------------------------------------------------------------
	//--------------------------------------------------------fungsi global
	private function upload($dir,$name ='userfile',$filename=null){
		$config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['max_size']         = 8000;
        $config['encrypt_name'] 	= FALSE;
        $config['file_name'] 		= $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {		
        		$data['auth'] 	= false;
                $data['msg'] 	= $this->upload->display_errors();
                return $data;
        }
        else
        {
        		$data['auth']	= true;
        		$data['msg']	= $this->upload->data();
        		return $data;
        }
	}

	private function upload1($dir,$name ='user',$filename=null){
		// echo $filename;
		$config['upload_path']      = $dir;
        $config['allowed_types']    = 'gif|jpg|png|jpeg|docx|doc|pdf';
        $config['max_size']         = 8000;
        $config['encrypt_name'] 	= FALSE;
        $config['file_name'] 		= $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($name))
        {		
        		$data['auth'] 	= false;
                $data['msg'] 	= $this->upload->display_errors();
                return $data;
        }
        else
        {
        		$data['auth']	= true;
        		$data['msg']	= $this->upload->data();
        		return $data;
        }
	}

	private function upload_files($path,$files){
        
        $config = array(
            'upload_path'   => $path,
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size'		=> '10000',
            'overwrite'     => false,
            'encrypt_name'  => FALSE    
        );

        $this->load->library('upload', $config);

        $images 		= array();
        $data['msg']	= array();
        $data['auth']	= false;
        foreach ($files['name'] as $key => $image) {
			$_FILES['images[]']['name']     = $files['name'][$key];
			$_FILES['images[]']['type']     = $files['type'][$key];
			$_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
			$_FILES['images[]']['error']    = $files['error'][$key];
			$_FILES['images[]']['size']     = $files['size'][$key];

			$value 		= str_replace(' ', '_', $_FILES['images[]']['name']);
            $config['file_name'] 		= $value;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
            	$data['auth']		= true;
            	array_push($data['msg'],$this->upload->data());
            } else {
            	$data['auth']		= ($data['auth']==true) ? true : false;
            	array_push($data['msg'],$this->upload->display_errors());
            }
        }

        return $data;
    }

    private function isImage($file){
		if ((($_FILES[$file]['type'] == 'image/gif') || ($_FILES[$file]['type'] == 'image/jpeg') || ($_FILES[$file]['type'] == 'image/png'))){
			return true;
		}
		else {
			return false;
		}
	} 
}
