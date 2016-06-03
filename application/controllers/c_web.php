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
						"blok" => $this->m_web->get_detail_blok($id)->row_array(),
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
	 * member control
	 */

	# Registrasi
	public function register()
	{
		$data = array(
						"title" => "Registrasi",
						"id_konsumen" => $this->m_web->auto_number('konsumen', 'id_konsumen', 3, "KSM"), 
						"id_user" => $this->m_web->auto_number('user', 'id_user', 3, "USR")
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/register', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');


		if (isset($_POST['register'])) 
		{
			$id_user = $this->input->post('id_user');
			$id_konsumen = $this->input->post('id_konsumen');

			$record_user = array(
									"id_user" => $id_user,
									"email" => $this->input->post('email'),
									"username" => $this->input->post('username'),
									"password" => md5($this->input->post('password')),
									"level" => "3",
									"tgl_register" => date('Y-m-d'),
									"keterangan" => "konsumen"
 								);	

			$record_konsumen = array(
										"id_konsumen" => $id_konsumen,
										"no_ktp" => $this->input->post('no_ktp'),
										"nama" => $this->input->post('nama'),
										"jk" => $this->input->post('jk'),
										"alamat" => $this->input->post('alamat'),
										"kota" => $this->input->post('kota'),
										"provinsi" => $this->input->post('provinsi'),
										"kode_pos" => $this->input->post('kode_pos'),
										"telp" => $this->input->post('telp'),
										"id_user" => $id_user
									);

			$this->m_web->insert_data('user', $record_user);
			$this->m_web->insert_data('konsumen', $record_konsumen);
			redirect('register-berhasil','refresh');
		}
	}

	public function register_success()
	{
		$data = array(
						"title" => "Registrasi Berhasil"
					);

		//show 
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/register_berhasil');
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	#END

	#Profil User
	public function profil_user()
	{
		$this->cek_login();

		$id  = $this->session->userdata('id_user');

		$data  = array(
						"title" => "Profil Anda",
						"konsumen" => $this->m_web->get_id('konsumen', 'id_user', $id),
						"user" => $this->m_web->get_id('user', 'id_user', $id)
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/profil_user', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');

		if (isset($_POST['edit_konsumen'])) 
		{
			$record  = array(
								"no_ktp" => $this->input->post('no_ktp'),
								"nama" => $this->input->post('nama'),
								"alamat" => $this->input->post('alamat'),
								"jk" => $this->input->post('jk'),
								"kota" => $this->input->post('kota'),
								"provinsi" => $this->input->post('provinsi'),
								"kode_pos" => $this->input->post('kode_pos'),
								"telp" => $this->input->post('telp')
							);
			$this->m_web->update_data('konsumen', $record, 'id_user', $id);
			$this->session->set_flashdata('alert-update', '<script>$(function(){swal("Berhasil", "Update Data Profil Berhasil", "success")})</script>');
			redirect('profil-anda','refresh');
		}
		elseif (isset($_POST['edit_user'])) 
		{
			$record_user  = array(
								"email" => $this->input->post('email'),
								"username" => $this->input->post('username')
							);


			$this->m_web->update_data('user', $record_user, 'id_user', $id);
			$this->session->set_flashdata('alert-update', '<script>$(function(){swal("Berhasil", "Update Data User Berhasil", "success")})</script>');
			redirect('profil-anda','refresh');		
		}
		elseif (isset($_POST['ganti_password'])) 
		{
			$record_password = array("password" => $this->input->post('password'));
			$this->m_web->update_data('user', $record_password, 'id_user', $id);
			$this->session->set_flashdata('alert-update', '<script>$(function(){swal("Berhasil", "Ganti Password Berhasil", "success")})</script>');
			redirect('profil-anda','refresh');
		}
	}
	#END

	#Pemesanan
	public function pemesanan()
	{
		$kd_rumah = $this->input->post('id');

		//record
		$record = array(
						  "id_pemesanan" => $this->m_web->auto_number('pemesanan', 'id_pemesanan', 3, 'PMS'),
						  "kd_rumah" 	 => $kd_rumah,
						  "id_user" 	 => $this->session->userdata('id_user'),
						  "tgl_pemesanan" => date('Y-m-d'),
						  "status" => "belum dibayar"
					   );
		$this->m_web->insert_data('pemesanan', $record);
		$this->m_web->update_data('rumah', array('status' => 'dibooking'), 'kd_rumah', $kd_rumah);

	}
	
	public function pemesanan_success()
	{
		$this->cek_login();
		$data  = array('title' => 'Pemesanan Sukses');

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/pemesanan_sukses');
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}
	
	public function data_pemesanan()
	{
		$this->cek_login();
		$data = array(
						"title" => "Data Pemesanan Anda",
						"pemesanan" => $this->m_web->tampil_pemesanan($this->session->userdata('id_user'))

					);

		//showtime
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/data_pemesanan', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');
	}

	public function cara_bayar_update()
	{
		$this->m_web->update_data('pemesanan', array('cara_bayar' => $this->input->post('cara')), 'id_user', $this->session->userdata('id_user'));
		
		echo $this->input->post('cara');
	}
	#END
	
	#pembayaran
	public function pembayaran()
	{
		$this->cek_login();
		$id_pemesanan = $this->uri->segment(2);
		$data = array(
						"title" => "Form Pembayaran",
						"id_pembayaran" => $this->m_web->auto_number('pembayaran', 'id_pembayaran', 3, 'PMB'),
						"id_pemesanan" => $id_pemesanan,
						"keterangan" => $this->m_web->get_periode($id_pemesanan)->row()
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/form_pembayaran', $data);
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');

		if (isset($_POST['pembayaran'])) 
		{
			$record = array(
							  'id_pembayaran' => $this->input->post('id_pembayaran'),
							  'id_pemesanan' => $id_pemesanan,
							  'nama_bank' => $this->input->post('nama_bank'),
							  'no_rekening' => $this->input->post('no_rekening'),
							  'atas_nama' => $this->input->post('atas_nama'),
							  'tgl_pembayaran' => date('Y-m-d'),
							  'jml_pembayaran' => $this->input->post('jml_pembayaran'),
							  'keterangan' => $this->input->post('keterangan'),
							  'status' => "n"
							);

			$this->m_web->insert_data('pembayaran', $record);
			$this->m_web->update_data('pemesanan', array('status' => "sudah dibayar"), 'id_pemesanan', $id_pemesanan);
			redirect('pembayaran-sukses','refresh');
		}

	}

	public function pembayaran_success()
	{
		$data = array(
						'title' => "Pembayaran Sukses",
					);

		//show time
		$this->load->view('frontend/template/header', $data);
		$this->load->view('frontend/member/pembayaran_sukses');
		$this->load->view('frontend/template/sidebar');
		$this->load->view('frontend/template/footer');

	}
	#END

	/**
	 * Feature Section
	 */
	public function cek_login()
	{
		if ($this->session->userdata('login_member') == false) 
		{
			$this->session->set_flashdata('alert-login', '<script>$(function(){swal("Oopss!!", "Anda tidak dikenankan untuk mengakses halaman tersebut. Silahkan login terlebih dahulu", "error")})</script>');
			redirect('home','refresh');
		}
	}

}

/* End of file  */
/* Location: ./application/controllers/ */