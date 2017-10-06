<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_config');
		$this->data['config'] 			= $this->m_config->ambil('config',1)->row();
		$this->load->model('m_member');
		$this->load->library('session');
		$this->load->library('magicmailer');
		$this->blade->sebarno('controller', $this);
	}

	public function index()
	{
		redirect('main');
	}



	public function register($type){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		$data 	= $this->data;


		switch ($type) {
			default:
				if($this->session->userdata('authmember')){
					echo goResult(false,"Anda Telah Masuk Akun Member Silahkan Keluar Untuk Mendaftar");
					return;
				}

				$rules = [
						    'required' 	=>	[
						    					['username'],['email'],['password'],['alamat'],['kelamin'],['passwordconf'],['agree'],['phone']
						    				],
						   	'email' 	=> [
						   						['email']
						   	],
						   	'lengthMin' => [
						        ['password', 8],
						        ['passwordconf', 8]
						    ]
						];
						
				if(!$this->validate($rules,'post')){
					echo goResult(false,"Opps! Form Tidak Benar");
					return;
				}

				if($this->input->post('password') != $this->input->post('passwordconf')){
					echo goResult(false,"Opps! Password Dan Konfirmasi Password Tidak Cocok");
					return;
				}


				$where 	= array(
							'email' 	=> $this->input->post('email'),
						  );


				$check		= $this->m_member->detail($where,'member')->row();

				if(isset($check->id_member)){
						echo goResult(false,"Opps! Email Yang Anda Pakai , Telah Di Gunakan");
						return;	
						if($check->status == 0 ){
								echo goResult(false,"Anda Belum Menkonfirmasi Email Anda");
								return;	
						}
				}

				$data_member = array(
					'name'          => $this->input->post('username'),
					'email'         => $this->input->post('email'),
					'phone'         => $this->input->post('phone'),
					'gender'        => $this->input->post('kelamin'),
					'password'      => sha1(md5($this->input->post('password'))),
					'address'       => $this->input->post('alamat'),
					'lastlog'       => date('Y-m-d H:i:s '),
					'ipaddress'     => $this->input->ip_address()
				);

				if($member=$this->m_member->input_data($data_member,'member')){
					$where = array('id_member' => $member );
					$mail 					= new Magicmailer;
					$email['config']		= $data['config'];
					$email['member']		= $this->m_member->detail($where,'member')->row();
				    $mail->addAddress($this->input->post('email'), $this->input->post('name'));
				    $mail->Body    			= $this->blade->nggambar('email.member.register',$email);	
				    $mail->Subject 			= 'Email Konfirmasi Pendaftaran Member';
			    	$mail->AltBody 			= 'Email Konfirmasi Pendaftaran Member - '.$data['config']->name;
					if($mail->send()){
						if(isset($check->id_member)){
							if($check->status==0){
								$this->m_member->hapus_data($check->id_member,'member');
							}
						}	
						echo goResult(true,'Pendaftaran Behasil , Silahkan Cek Inbox / Spam Email Anda Untuk Konfirmasi');	
						return;
					}
						else {
							$where = array('id_member' => $member );
							$this->m_member->hapus_data($where,'member');
							echo goResult(false,'Opps! Email Konfirmasi Tidak Terkirim Silahkan Coba Kembali');	
							return;
						}
				}
				else {
					echo goResult(false,'Ada Yang Salah Silahkan Coba Kembali Nanti');						
					return;
				}
					return;
					break;
					break;
				}


	}

	public function confirmation($type,$token){
		switch ($type) {
			default:
				if($this->session->userdata('authmember')){
					exit("Logout Akun Member Anda Terlebih Dahulu");
					return;
				}


				$where 			= array(
									'id_member' 		=> $token,
									'status' 	=> 0,
								  );

				$member			= $this->m_member->detail($where,'member')->row();

				if(!isset($member->id_member)){
					exit("Opps! Akun Member Tidak Di Temukan");
				}

				$data_member = array(
					'lastlog'       => date('Y-m-d H:i:s '),
					'ipaddress'     => $this->input->ip_address(),
					'status' 		=> 1
				);

				$this->m_member->update_data($where,$data_member,'member');

				$newdata = array(
								   'authmember_name'	=>  $member->name,
								   'authmember_email'	=>	$member->email,
								   'authmember'			=>	TRUE,
								   'authmember_id'		=> 	$member->id_member,
		               		);
				$this->session->set_userdata($newdata);

				redirect('main');
				break;
		}
	}

	public function go($type){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		switch ($type) {
			
			default:
					if($this->session->userdata('authmember')){
					echo goResult(false,"Anda Telah Masuk Akun Member");
					return;
				}

				$rules = [
						    'required' 	=>	[
						    					['email'],
						    					['password'],
						    				]
						];
						
				if(!$this->validate($rules,'post')){
					echo goResult(false,"Opps! Form Tidak Benar");
					return;
				}


				$where 	= array(
							'email' 	=> $this->input->post('email'),
							'password'	=> sha1(md5($this->input->post('password'))),
						  );


				$authmember	= $this->m_member->detail($where,'member')->row();
				
		
				if(!isset($authmember->id_member)){
					echo goResult(false,"Opps! Authentication Gagal , check Email Dan Password!");
					return;
				}
				
				if($authmember->status == 0){
					echo goResult(false,"Konfirmasikan Email Anda Terlebih Dahulu");
					return;
				}
				
				$data_member = array(
					'lastlog'       => date('Y-m-d H:i:s '),
					'ipaddress'     => $this->input->ip_address()
				);

				$this->m_member->update_data($where,$data_member,'member');


				$newdata = array(
								   'authmember_name'	=>  $authmember->name,
								   'authmember_email'	=>	$authmember->email,
								   'authmember'			=>	TRUE,
								   'authmember_id'		=> 	$authmember->id_member,
								   'authmember_status'		=> 	$authmember->status_member,
		               		);

				$this->session->set_userdata($newdata);

				echo goResult(true,"Authentication Berhasil , redirecting");
				return;

				break;
		}

		
	}

	public function logout($type){

		switch ($type) {
			default:
				if(!$this->session->userdata('authmember')){
					redirect('main');
					return;
				}

				$this->session->sess_destroy();
				redirect('main');
				break;
		}
	}

	private function validate($rules,$type){
		if($type=="post"){
			$v = new Valitron\Validator($_POST);
		}
		else {
			$v = new Valitron\Validator($_GET);		
		}
		$v->rules($rules);
		if(!$v->validate()){
			return false;
		}
		else {
			return true;
		}
	}

}

/* End of file Autentication.php */
/* Location: ./application/controllers/Autentication.php */