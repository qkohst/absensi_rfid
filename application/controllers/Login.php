<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->library('bcrypt');
    }

	public function index()
	{
		$this->load->view('v_login');
	
	}

	public function logincheck(){
		if (isset($_POST['username']) && isset($_POST['pass'])) {
			
			$username = $this->input->post('username');
			$pass = $this->input->post('pass');
			$hash = $this->bcrypt->hash_password($pass);	//encrypt password

			if(isset($_POST["remember"])){
	        	$hour = time() + 3600 * 24 * 30;
	        	setcookie('username', $username, $hour);
	            setcookie('password', $pass, $hour);
	        }

			//ambil data dari database
			$check = $this->m_login->prosesLogin($username);
			$hasil = 0;
			if(isset($check)){
				$hasil++;
			}

			//echo $pass;
			//echo "<br>";
			if($hasil > 0){
				$data = $this->m_login->viewDataByID($username); 
				foreach ($data as $dkey) {
					$passDB = $dkey->password;
					//$role = $dkey->role;
					$avatar = $dkey->avatar;
					//$idusr = $dkey->id;
				}
				//echo $this->bcrypt->check_password($pass, $passDB);
				if ($this->bcrypt->check_password($pass, $passDB))
				{
					// Password match
					$this->session->set_userdata('userlogin',$username);
					$this->session->set_userdata('avatar',$avatar);

					redirect(base_url().'admin/dashboard');
					
				}else{
					// Password does not match
					$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Gagal Login, password salah</div>");
					redirect(base_url().'login');
				}
			}else {
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-remove\"></i> Gagal Login, username tidak ditemukan</div>");
				redirect(base_url().'login');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login');
	}

	// menambah user baru => http://absensi.test/login/adduser?username=admin&pass=123456
	 public function adduser(){
		// if (isset($_GET['username']) && isset($_GET['pass'])) {
		// 	$username = $this->input->get('username');
		// 	$pass = $this->input->get('pass');
		// 	$hash = $this->bcrypt->hash_password($pass);	//encrypt password

		// 	echo $username;
		// 	echo "<br>";
		// 	echo $pass;
		// 	echo "<br>";

		// 	$data = array('username' => $username, 'password' => $hash);

		// 	if($this->m_login->adduser($data)){
		// 		echo "add user berhasil";
		// 	}else{
		// 		echo "gagal add user";
		// 	}
		// }else{
		// 	echo "salah parameter";
		// }
	 }


}
