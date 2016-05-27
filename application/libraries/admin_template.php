<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_template
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function display($template, $data=null)
	{
		$data['content'] = $this->ci->load->view($template, $data, true);
		$data['nav'] = $this->ci->load->view('backend/template/nav', $data, true);
		$this->ci->load->view('backend/template/base', $data);
	}

	public function notif_display($template, $data=null)
	{
		$data['content'] = $this->ci->load->view($template, $data, true);
		$this->ci->load->view('backend/template/notif_template', $data);
	}
	
	public function upload_display($template, $data=null)
	{
		$data['content'] = $this->ci->load->view($template, $data, true);
		$this->ci->load->view('backend/template/upload_template', $data);
	}
}

/* End of file admin_template.php */
/* Location: ./application/libraries/admin_template.php */