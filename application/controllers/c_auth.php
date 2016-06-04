<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('m_admin', 'm_web'));

	
		if ($this->session->userdata("is_login") == true) 
		{
			redirect('dashboard','refresh');
		}
	}

	public function index()
	{
		$data['title'] = "Panel Login";
	

		$this->load->view('backend/auth/panel_login', $data);
	}


	public function proses_auth()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->m_admin->auth($username, $password);

		if ($cek_login->num_rows() == 0) 
		{

			$this->session->set_flashdata('login_gagal', '<div class="alert alert-warning" data-animate="fadeInLeft">Login gagal. Pastikan username dan password benar</div>');
			redirect('panel_login');
		}
		else
		{
			$res = $cek_login->row();

			// session input
			$sess_data = array(
								 'id_user' => $res->id_user,
							     'username' => $username,
							     'islogin'  => true,
							     'level'    => $res->level,
							     'keterangan' => $res->keterangan
							   );
			$this->session->set_userdata($sess_data);

			redirect('panel_login/berhasil','refresh');
		}

	}

	public function auth_success()
	{
		$level;

		if ($this->session->userdata('level') == '1') 
		{
			$level = 'administrator';	
		}
		else if ( $this->session->userdata('level') == '2')
		{
			$level = 'marketing';
		}

		$data = array(
						'level' => $level,
						'title' => 'Login Berhasil',
						'username' => $this->session->userdata('username')
					);
		$this->load->view('backend/auth/sukses', $data);
	}

	public function login_member()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$cek_login = $this->m_web->auth($username, $password);

		if ($cek_login->num_rows() == 0) 
		{
				$this->session->set_flashdata('alert-login', '<script>$(function(){ swal("Login Gagal", "Username / Password Salah. Silahkan mencoba kembali. Jika anda belum registrasi, silahkan registrasi terlebih dahulu", "error") })</script>');
				redirect('home','refresh');
		}
		else
		{
			$res = $cek_login->row();

			if ($res->level == "3") 
			{
// session input
				$sess_data = array(
									 'id_user' => $res->id_user,
								     'username' => $username,
								     'login_member'  => true,
								     'level'    => $res->level,
								     'keterangan' => $res->keterangan
								   );
				$this->session->set_userdata($sess_data);

				$this->session->set_flashdata('alert-login', '<script>$(function(){ swal("Login Berhasil", "Login Berhasil. Sekarang anda dapat memanfaatkan fitur yang ada di sistem kami.", "success") })</script>');
				redirect('home','refresh');

			}
			else
			{
				$this->session->set_flashdata('alert-login', '<script>$(function(){ swal("Login Gagal", "Jika anda admin / marketing silahkan ke panel login yang berada di halaman administrator", "error") })</script>');
				redirect('home','refresh');

			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('logout_success', '<div class="alert alert-info" data-animate="fadeInLeft">Logout Sukses... </div>');
		redirect('panel_login');
	}

	public function logout_member()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('alert-login', '<script>$(function(){ swal("Logout Berhasil", "Logout Berhasil", "success") })</script>');
		redirect('home');
	}
}

/* End of file  */
/* Location: ./application/controllers/ */