<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload'));
		$this->load->model('m_admin');

		if ($this->session->userdata('islogin') == false) 
		{
			redirect('panel_login','refresh');
		}

	}

	public function index()
	{
		$data['title'] = "Dashboard";

		$this->admin_template->display('backend/dashboard', $data);

	}

	public function 

}

/* End of file  */
/* Location: ./application/controllers/ */