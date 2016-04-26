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
		$data['sidebar'] = $this->ci->load->view('backend/template/sidebar', $data, true);
		$this->ci->load->view('backend/template/base', $data);
	}

}

/* End of file admin_template.php */
/* Location: ./application/libraries/admin_template.php */