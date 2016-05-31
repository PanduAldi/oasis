<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('user_agent', 'pagination'));
		$this->load->model('m_web');
	}

	public function index()
	{
		$data = array(
						"title" => "Home",
						"berita" => $this->m_web->get_home_berita(),
						"event" => $this->m_web->get_home_event(),
						"galeri" => $this->m_web->get_home_galeri(),
						"produk" => $this->m_web->get_home_produk()
					);
		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/home', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	/**
	 * Profil Kami 
	 */
	public function profil()
	{
		$id = "1";
		$data = array(
						"title" => "Profil Kami",
						"profil" => $this->m_web->get_id('info', 'id', $id)
					 );

		//show time
		$this->load->view('frontend/template/header_profil', $data);
		$this->load->view('frontend/profil', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}
	//End

	public function berita($offset=null)
	{

		$limit  = 5;

		$data  = array(
						 "title" => "Berita Properti",
						 "berita" => $this->m_web->get_berita($limit, $offset)->result()
					  );

		$config['base_url'] = site_url('berita-property');
		$config['total_rows'] = $this->m_web->get_count('info');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$data['page'] =  $this->pagination->create_links();

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/berita/index', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	public function detail_berita()
	{
		$ex = explode("_", $this->uri->segment(2));
		$id = $ex[0];

		$get = $this->m_web->get_id('info', 'id', $id);

		$data = array(
						"title" => "Berita - ".$get->nama_info,
						"b" => $get
					);

		//show time
		$this->load->view('frontend/template/header_berita', $data);
		$this->load->view('frontend/berita/detail', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	/**
	 * Event page
	 */
	public function event($offset=null)
	{

		$limit  = 5;

		$data  = array(
						 "title" => "Berita Properti",
						 "event" => $this->m_web->get_all('event', $limit, $offset, 'kd_event')->result()
					  );

		$config['base_url'] = site_url('event-kami');
		$config['total_rows'] = $this->m_web->get_count('event');
		$config['per_page'] = $limit;
		$config['uri_segment'] = 2;
		$config['num_links'] = 2;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		$data['page'] =  $this->pagination->create_links();

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/event/index', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');	
	}

	public function detail_event()
	{
		$ex = explode("_", $this->uri->segment(2));
		$id = $ex[0];

		$get = $this->m_web->get_id('event', 'kd_event', $id);

		$data = array(
						"title" => "Berita - ".$get->jenis_event,
						"b" => $get
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/event/detail', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	//end

	/**
	 * Gallery
	 */

	public function gallery()
	{
		$data  = array(
						 "title" => "Gallery Kami",
						 "galeri" => $this->m_web->get_all('t_galeri', null, null, 'id_galeri')->result()
					  );

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/gallery/index', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	public function detail_gallery()
	{
		$ex = explode("_", $this->uri->segment(2));
		$id = $ex[0];

		$data = array(
						"title" => "Gallery ".$ex[1],
						"gal" => $this->m_web->get_detail_gallery('t_detail_galeri', 'id_galeri', $id)->result()
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view("frontend/gallery/detail", $data);
		$this->load->view("frontend/template/sidebar", $data);
		$this->load->view("frontend/template/footer", $data);
	}

	public function zoom_img_gallery()
	{
		$id = $this->input->post('id');

		$get_data = $this->m_web->get_id('t_detail_galeri', 'id_detail', $id);

		echo  $get_data->nama."|".$get_data->gambar;
	}
	//end

	/**
	 * Page Kontak 
	 */

	public function kontak()
	{
		$data  = array("title" => "Kontak Kami");

		//show
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/kontak');
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}


	/**
	 * Page List Rumah 
	 */

	public function produk_kami()
	{
		$data = array(
						"title" => "Produk Kami",
						"produk" => $this->m_web->get_home_produk()
					);
		
		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/produk/index', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');

	}

	public function detail_blok()
	{
		$ex = explode("_", $this->uri->segment(3));
		$id = $ex[0];
		$data = array(
						"title" => "Detail Blok ".$ex[1],
						"blok" => $this->m_web->get_detail_blok($id)->row(),
						"rumah" => $this->m_web->get_detail_rumah($id)
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/produk/detail', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	// END

	/**
	 * Feature Section
	 */
	public function cek_login()
	{
		if ($this->session->userdata('login_member') == false) 
		{
			redirect('home','refresh');
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */