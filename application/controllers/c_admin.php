<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('upload', 'user_agent'));
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

	/**
	 * Profil page
	 */
	public function profil()
	{
		$data['title'] = "Profil Perusahaan";
		$data['profil'] = $this->m_admin->get_id('info', 'id', '1')->row();

		$this->admin_template->display('backend/profil/index', $data);
	}

	public function update_profil()
	{
		
		//execute profil
		$id 	= $this->input->post('id_profil');
		$judul  = $this->input->post('judul');
		$m_key  = $this->input->post('meta_keyword');
		$m_desc = $this->input->post('meta_deskripsi');
		$isi 	= $this->input->post('isi');

		$record = array(
							'nama_info' => $judul,
							'meta_keyword' => $m_key,
							'meta_deskripsi' => $m_desc,
							'deskripsi' => $isi
						);

		$update = $this->m_admin->update_data('info', $record, 'id', $id);

		if ($update) 
		{
			$data['title'] = "Update Profil Sukses";
		}
		else
		{
			$data['title'] = "Update Profil Gagal";
		}

		$this->admin_template->notif_display('backend/profil/sukses_update', $data);		
	}

	// End Profil page

	/**
	 * Produk Page
	 */

	//RUMAH 
	public function produk()
	{

		$blok = $this->m_admin->get_all('blok_rumah', null, null);

		$data = array(
						"title" 		=> "Produk",
						"menu_produk" 	=> $this->menu_produk(),
						"rumah" 		=> $this->m_admin->get_all('rumah', null, null)->result()		
					 );


		$this->admin_template->display("backend/produk/rumah/index", $data);
	}

	public function tambah_produk()
	{
		$data = array(
						"title" => "Tambah Produk",
						"kd_rumah" => $this->m_admin->auto_number('rumah', 'kd_rumah', 3, "RMH"),
						"blok_rumah" => $this->m_admin->get_all("blok_rumah", null, null)->result(),
						"menu_produk" => $this->menu_produk()
					);
		$this->admin_template->display('backend/produk/rumah/tambah_data', $data);

		if (isset($_POST['simpan'])) 
		{
			$record = array(
								"kd_rumah" => $this->input->post("kd_rumah"),
								"nama_kavling" => $this->input->post("nama_kavling"),
								"kd_blok" => $this->input->post('kd_blok'),
								"keterangan" => $this->input->post('keterangan'),
								"status" => $this->input->post('status')
							);
			$this->m_admin->insert_data('rumah', $record);
			redirect('produk/tambah_sukses','refresh');
		}
	}

	public function produk_add_success()
	{
		$data = array("title" => "Tambah Rumah Sukses", 'pesan' => "Tambah Rumah Berhasil !!");
		$this->admin_template->notif_display('backend/produk/rumah/sukses', $data);
	}

	public function edit_produk()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Edit Produk ".$id,
						"rumah" => $this->m_admin->get_id('rumah', 'kd_rumah', $id)->row(),
						"blok" => $this->m_admin->get_all('blok_rumah', null, null),
						"menu_produk" => $this->menu_produk()
					);
		$this->admin_template->display('backend/produk/rumah/edit_data', $data);

		if (isset($_POST['simpan'])) 
		{
			$record = array(
								"nama_kavling" => $this->input->post("nama_kavling"),
								"kd_blok" => $this->input->post('kd_blok'),
								"keterangan" => $this->input->post('keterangan'),
								"status" => $this->input->post('status')
							);
			$this->m_admin->update_data('rumah', $record, 'kd_rumah', $id);
			redirect('produk/edit_sukses','refresh');
		}
	}

	public function produk_edit_success()
	{
		$data = array("title" => "Edit Rumah Sukses", 'pesan' => "Edit Data Rumah Berhasil !!");
		$this->admin_template->notif_display('backend/produk/rumah/sukses', $data);
	}

	public function popup_blok()
	{
		$id = $this->uri->segment(3);
		$blok = $this->m_admin->get_id('blok_rumah', 'kd_blok', $id)->row_array();
		$data = array(
						"title" => "Detail Blok ".$id,
						"blok" => $blok,
						"booking_fee" => $this->m_admin->get_id('booking_fee', 'kd_booking', $blok['kd_booking'])->row_array()
					 );

		$this->load->view('backend/produk/rumah/detail_blok', $data);
	}

	public function hapus_produk()
	{
		$id = $this->input->post('id');
		$this->m_admin->delete_data('rumah', 'kd_rumah', $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-info"><i class="fa fa-info"></i> Data Rumah Berhasil di Hapus</div>');
	}


	//BLOK RUMAH
	public function blok_rumah()
	{
		$data = array(
						"title" => "Blok Rumah",
						"menu_produk" => $this->menu_produk(),
					  	"blok_rumah" =>  $this->m_admin->get_all("blok_rumah", null, null)
					  );

		$this->admin_template->display('backend/produk/blok_rumah/index', $data);
	}

	public function tambah_blok()
	{
		$data = array(
						"title" => "Tambah Blok",
						"menu_produk" => $this->menu_produk(),
						"kd_blok" => $this->m_admin->auto_number('blok_rumah', 'kd_blok', 2, "BLK"),
						"booking_fee" => $this->m_admin->get_all('booking_fee', null, null),
						"spesifikasi" => $this->m_admin->get_all('spesifikasi', null, null)->result()
					);
		
		if (isset($_POST['simpan'])) 
		{
			$record  = array(
								"kd_blok" => $this->input->post('kd_blok'),
								"nama_blok" => $this->input->post('nama_blok'),
								"luas_bangun" => $this->input->post('luas_bangun'),
								"luas_tanah" => $this->input->post('luas_tanah'),
								"muka" => $this->input->post('muka'),
								"panjang" => $this->input->post('panjang'),
								"gambar" => $this->input->post('gambar'),
								"denah" => $this->input->post('denah'),
								"kmr_tidur" => $this->input->post('kmr_tidur'),
								"kmr_mandi" => $this->input->post('kmr_mandi'),
								"sertifikat" => $this->input->post('sertifikat'),
								"listrik" => $this->input->post('listrik'),
								"harga" => $this->input->post('harga'),
								"uang_muka" => $this->input->post('uang_muka'),
								"kpr" => $this->input->post('kpr'),
								"5th" => $this->input->post('5th'),
								"10th" => $this->input->post('10th'),
								"15th" => $this->input->post('15th'),
								"kd_spesifikasi" => $this->input->post('kd_spesifikasi'),
								"kd_booking" => $this->input->post('kd_booking') 
							);

			$this->m_admin->insert_data('blok_rumah', $record);
			redirect('blok_rumah/tambah_sukses','refresh');
		}

		$this->admin_template->display('backend/produk/blok_rumah/tambah_data', $data);

	}

	public function blok_rumah_add_success()
	{
		$data = array("title" => "Tambah Blok Sukses", "pesan" => "Tambah Blok Rumah Berhasil");
		$this->admin_template->notif_display('backend/produk/blok_rumah/sukses', $data);
	}

	public function upload_gambar_blok()
	{
		$data = array("title" => "Upload Gambar Rumah");
		$this->admin_template->upload_display("backend/produk/blok_rumah/upload_gambar", $data);

		if (isset($_POST['upload'])) 
		{
			//upload
			$config['upload_path'] = './img/rumah/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '4024';
			$config['max_height']  = '3768';
			$config['remove_spaces'] = true;
			$config['overwrite'] = true;

			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('gambar'))
			{
				$this->session->set_flashdata('error_img', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
				redirect('blok_rumah/upload_gambar','refresh');
			}
			else
			{
				$data = $this->upload->file_name;
				redirect('blok_rumah/upload_gambar_sukses/'.$data,'refresh');
			}
		}

	}

	public function upload_gambar_success()
	{
		$data = array(
						"title" => "Upload gambar success",
						"gambar" => $this->uri->segment(3) 
					);
		$this->admin_template->upload_display('backend/produk/blok_rumah/gambar_sukses', $data);
	}

	public function upload_denah_blok()
	{
		$data = array("title" => "Upload Denah Rumah");
		$this->admin_template->upload_display("backend/produk/blok_rumah/upload_denah", $data);

		if (isset($_POST['upload'])) 
		{
			//upload
			$config['upload_path'] = './img/rumah/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']  = '10000';
			$config['max_width']  = '5024';
			$config['max_height']  = '3768';
			$config['remove_spaces'] = true;
			$config['overwrite'] = true;
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('denah'))
			{
				$this->session->set_flashdata('error_img', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
				redirect('blok_rumah/upload_denah','refresh');			
			}
			else
			{
				$data = $this->upload->file_name;
				redirect('blok_rumah/upload_denah_sukses/'.$data,'refresh');
			}
		}

	}

	public function upload_denah_success()
	{
		$data = array(
						"title" => "Upload Denah Sukses",
						"gambar" => $this->uri->segment(3) 
					);
		$this->admin_template->upload_display('backend/produk/blok_rumah/denah_sukses', $data);
	}

	public function edit_blok()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Edit Blok",
						"menu_produk" => $this->menu_produk(),
						"blok" => $this->m_admin->get_id('blok_rumah', 'kd_blok', $id)->row_array(),
						"booking_fee" => $this->m_admin->get_all('booking_fee', null, null),
						"spesifikasi" => $this->m_admin->get_all('spesifikasi', null, null)->result()
					);
		
		if (isset($_POST['edit'])) 
		{
			$record  = array(
								"nama_blok" => $this->input->post('nama_blok'),
								"luas_bangun" => $this->input->post('luas_bangun'),
								"luas_tanah" => $this->input->post('luas_tanah'),
								"muka" => $this->input->post('muka'),
								"panjang" => $this->input->post('panjang'),
								"gambar" => $this->input->post('gambar'),
								"denah" => $this->input->post('denah'),
								"kmr_tidur" => $this->input->post('kmr_tidur'),
								"kmr_mandi" => $this->input->post('kmr_mandi'),
								"sertifikat" => $this->input->post('sertifikat'),
								"listrik" => $this->input->post('listrik'),
								"harga" => $this->input->post('harga'),
								"uang_muka" => $this->input->post('uang_muka'),
								"kpr" => $this->input->post('kpr'),
								"5th" => $this->input->post('5th'),
								"10th" => $this->input->post('10th'),
								"15th" => $this->input->post('15th'),
								"kd_spesifikasi" => $this->input->post('kd_spesifikasi'),
								"kd_booking" => $this->input->post('kd_booking') 
							);

			$this->m_admin->update_data('blok_rumah', $record, 'kd_blok', $id);
			redirect('blok_rumah/edit_sukses','refresh');
		}

		$this->admin_template->display('backend/produk/blok_rumah/edit_data', $data);
	}

	public function blok_rumah_edit_success()
	{
		$data  = array(
						"title" => "Edit Blok Sukses",
						"pesan" => "Edit Blok Rumah Sukses"
					  );

		$this->admin_template->notif_display('backend/produk/blok_rumah/sukses', $data);
	}

	public function detail_blok()
	{
		$id = $this->uri->segment(3);
		$blok = $this->m_admin->get_id('blok_rumah', 'kd_blok', $id)->row_array();
		$data = array(
						"title" => "Detail Blok",
						"menu_produk" => $this->menu_produk(),
						"blok" => $blok,
						"booking_fee" => $this->m_admin->get_id('booking_fee', 'kd_booking', $blok['kd_booking'])->row_array(),
						"spesifikasi" => $this->m_admin->get_id('spesifikasi', 'kd_spesifikasi', $blok['kd_spesifikasi'])->row_array()
					);
		$this->admin_template->display('backend/produk/blok_rumah/detail_blok', $data);
	}

	public function hapus_blok()
	{
		$id = $this->input->post('id');
		$get = $this->m_admin->get_id('blok_rumah', 'kd_blok', $id)->row();

		unlink("img/rumah/".$get->gambar);
		unlink("img/rumah/".$get->gambar);

		$this->m_admin->delete_data('blok_rumah', 'kd_blok', $id);
		$this->session->set_flashdata('delete_success', '<div class="alert alert-info"><i class="fa fa-info"></i> Hapus Blok Rumah Berhasil !!!</div>');
	}

	//SPESIFIKASI
	public function spesifikasi()
	{
		$spesifikasi = $this->m_admin->get_all('spesifikasi',null, null);

		$data = array(
						"title" => "Spesifikasi",
						"menu_produk" => $this->menu_produk(),
						"spesifikasi" => $spesifikasi->result(),
						"cek_spek" => $spesifikasi->num_rows()
					  );

		$this->admin_template->display('backend/produk/spesifikasi/index', $data);
	}

	public function tambah_spesifikasi()
	{
		$data = array(
						"title" => "Spesifikasi",
						"menu_produk" => $this->menu_produk(),
						"kd_spesifikasi" => $this->m_admin->auto_number('spesifikasi', 'kd_spesifikasi', 2, 'SPK')
					  );

		if (isset($_POST['simpan'])) 
		{
			$record = array(
							  'id_spek' => '',
							  'kd_spesifikasi' => $this->input->post('kd_spesifikasi'),
							  'pondasi' => $this->input->post('pondasi'),
							  'struktur' =>  $this->input->post('struktur'),
							  'dinding' => $this->input->post('dinding'),
							  'atap' => $this->input->post('atap'),
							  'lantai_utama' => $this->input->post('lantai_utama'),
							  'lantai_toilet' => $this->input->post('lantai_toilet'),
							  'pintu' => $this->input->post('pintu'),
							  'kusen' => $this->input->post('kusen'),
							  'jendela' => $this->input->post('jendela'),
							  'plafond' => $this->input->post('plafond'),
							  'saniter' => $this->input->post('saniter'),
							  'carport' => $this->input->post('carport')

							);

			$this->m_admin->insert_data('spesifikasi', $record);
			$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-check"></i> Data Berhasil di Simpan. Klik <a href="'.site_url('spesifikasi').'">disini</a> untuk kembali.</div>');
			redirect('spesifikasi/tambah_data','refresh');
			
		}

		$this->admin_template->display('backend/produk/spesifikasi/tambah_data', $data);
	}

	public function edit_spesifikasi()
	{
		$id = $this->uri->segment(3);

		$data = array(
						"title" => "Edit Data",
						"menu_produk" => $this->menu_produk(),
						"spek"  => $this->m_admin->get_id('spesifikasi', 'kd_spesifikasi', $id)->row() 
					); 

		if (isset($_POST['edit'])) 
		{
			$record = array(
							  'pondasi' => $this->input->post('pondasi'),
							  'struktur' =>  $this->input->post('struktur'),
							  'dinding' => $this->input->post('dinding'),
							  'atap' => $this->input->post('atap'),
							  'lantai_utama' => $this->input->post('lantai_utama'),
							  'lantai_toilet' => $this->input->post('lantai_toilet'),
							  'pintu' => $this->input->post('pintu'),
							  'kusen' => $this->input->post('kusen'),
							  'jendela' => $this->input->post('jendela'),
							  'plafond' => $this->input->post('plafond'),
							  'saniter' => $this->input->post('saniter'),
							  'carport' => $this->input->post('carport')
							);

			$this->m_admin->update_data('spesifikasi', $record, 'kd_spesifikasi', $id);
			$this->session->set_flashdata('info', '<div class="alert alert-warning"> <i class="fa fa-check"></i> Data berhasil di update. Klik <a href="'.site_url('spesifikasi').'">Disini</a> untuk kembali.</div>');	
			redirect('spesifikasi/edit/'.$id,'refresh');		
		}

		$this->admin_template->display("backend/produk/spesifikasi/edit_data", $data);
	}

	public function hapus_spesifikasi()
	{
		$id = $this->input->post('id_spek');

		$this->m_admin->delete_data('spesifikasi', 'kd_spesifikasi', $id);
		$this->session->set_flashdata('info', '<div class="alert alert-success"><i class="fa fa-check"></i> Data berhasil di hapus</div>');
	}

	public function detail_spesifikasi()
	{
		$id = $this->uri->segment(3);

		$data = array(

						"title" => "Detail Spesifikasi ".$id,
						"menu_produk" => $this->menu_produk(),
						"data_detail" => $this->m_admin->get_id('spesifikasi', 'kd_spesifikasi', $id)->row() 
					 );

		$this->admin_template->display('backend/produk/spesifikasi/detail', $data);
	}

	public function booking_fee()
	{
		$data = array(
						"title" => "Booking Fee",
						"menu_produk" => $this->menu_produk(),
						"data_booking" => $this->m_admin->booking_periode(),
						"periode" 	   =>  $this->m_admin->get_all('periode', null, null),
						"kd_booking" => $this->m_admin->auto_number('booking_fee', 'kd_booking', 2, "BOK")
					  );

		$this->admin_template->display('backend/produk/booking_fee/index', $data);
	}


	public function  tambah_booking()
	{
		$record = array(
						 "kd_booking" => $this->input->post('kd_booking'),
						 "kd_periode" => $this->input->post('kd_periode'),
						 "booking_fee" => $this->input->post('booking_fee')
						);

		$this->m_admin->insert_data('booking_fee', $record);
		$periode = $this->m_admin->get_id('periode', 'kd_periode', $this->input->post('kd_periode'))->row();
		$kd_booking = $this->m_admin->auto_number('booking_fee', 'kd_booking', 2, "BOK");

		echo $kd_booking."|".$periode->periode."|".$periode->keterangan;
	}

	public function hapus_booking()
	{
		$id = $this->input->post('kd_booking');

		$this->m_admin->delete_data('booking_fee', 'kd_booking', $id);

		echo $this->m_admin->auto_number('booking_fee', 'kd_booking', 2, "BOK");
	}


	public function menu_produk()
	{
		return '<legend><small>Menu Produk :</small></legend>
				<div class="list-group">
					<a href="'.site_url('produk').'" class="list-group-item">Rumah</a>
					<a href="'.site_url('blok_rumah').'" class="list-group-item">Blok Rumah</a>
					<a href="'.site_url('spesifikasi').'" class="list-group-item">Spesifikasi</a>
					<a href="'.site_url('booking-fee').'" class="list-group-item">Booking Fee</a>
				</div>';
	}

	// End Produk Page


	/**
	 * Periode Page
	 */

	public function periode()
	{
		$data = array(
						"title" => "Periode",
						"data_periode" => $this->m_admin->get_all('periode', null, null),
						"kd_periode" => $this->m_admin->auto_number('periode', 'kd_periode', 2, "PRD")
					 );

		$this->admin_template->display('backend/periode/index', $data);
	}

	public function tambah_periode()
	{
		$record = array(
							"kd_periode" => $this->input->post('kd_periode'),
							"periode" => $this->input->post('periode'),
							"keterangan" => $this->input->post("keterangan")
						);

		$this->m_admin->insert_data('periode', $record);

		echo $this->m_admin->auto_number('periode', 'kd_periode', 2, "PRD");
	}

	public function hapus_periode()
	{
		$id = $this->input->post('kd_periode');

		$this->m_admin->delete_data('periode', 'kd_periode', $id);

		echo $this->m_admin->auto_number('periode', 'kd_periode', 2, "PRD");
	}
	// End periode

	/**
	 * Event page
	 */

	public function event()
	{
		$data = array(
						"title" => "Event",
						"data_event" => $this->m_admin->get_all('event', null, null)->result(),
						"kd_event" => $this->m_admin->auto_number('event', 'kd_event', 2, "EVN")
					);

		$this->admin_template->display('backend/event/index', $data);
		
	}

	public function tambah_event()
	{
		$data = array(
						"title" => "Tambah Event",
						"kd_event" => $this->m_admin->auto_number('event', 'kd_event', 2, "EVN"),
						"periode"  => $this->m_admin->get_all('periode', null, null)
					);

		if (isset($_POST['simpan'])) 
		{
			$config['upload_path'] = './img/event/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;

			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('img'))
			{
				$this->session->set_flashdata('error_img', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
				redirect('event/tambah_data','refresh');
			}
			else{
				$img_name = $this->upload->file_name;

				$record = array(
									'kd_event' => $this->input->post('kd_event'),
									'jenis_event' => $this->input->post('jenis_event'),
									'deskripsi_singkat' => $this->input->post('deskripsi_singkat'),
									'deskripsi' => $this->input->post('deskripsi'),
									'kd_periode' => $this->input->post('kd_periode'),
									'img' => $img_name,
									't_publish' => date('Y-m-d H:i:s')
								);
				
				$this->m_admin->insert_data('event', $record);
				redirect('event/sukses_tambah','refresh');
			}
		}

		$this->admin_template->display('backend/event/tambah_data', $data);
		
	}

	public function event_add_success()
	{
		$data['title'] = "Sukses Tambah Event";
		$data['pesan'] = "Event Sukses di Tambah";
		$this->admin_template->notif_display('backend/event/sukses.php', $data);
	}

	public function hapus_event()
	{
		$id = $this->input->post('id');

		$ambil_gambar = $this->m_admin->get_id('event', 'kd_event', $id)->row();
		unlink('img/event/'.$ambil_gambar->img);

		$this->m_admin->delete_data('event', 'kd_event', $id);
		$this->session->set_flashdata('sukses', '<div class="alert alert-info">Data Berhasil dihapus</div>');
	}

	public function edit_event()
	{
		$id = $this->uri->segment(3);
		$get_data = $this->m_admin->get_id('event', 'kd_event', $id);

		$data = array(
						"title" => "Edit Event",
						"event" => $get_data->row(),
						"periode" => $this->m_admin->get_all('periode', null, null)
					);

		if (isset($_POST['edit'])) 
		{
			//variable declare
			$jenis_event = $this->input->post('jenis_event');
			$deskripsi_singkat = $this->input->post('deskripsi_singkat');
			$deskripsi = $this->input->post('deskripsi');
			$periode = $this->input->post('kd_periode');

			//upload
			$config['upload_path'] = './img/event/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;

			$this->upload->initialize($config);	
			if ( ! $this->upload->do_upload('img')){
				
				$record = array(
									"jenis_event" => $jenis_event,
									"deskripsi_singkat" => $deskripsi_singkat,
									"deskripsi" => $deskripsi,
									"kd_periode" => $periode
								);

				$this->m_admin->update_data('event', $record, 'kd_event', $id);
				redirect('event/edit_sukses','refresh');
			}
			else{
				$img_name = $this->upload->file_name;
				$record = array(
									"jenis_event" => $jenis_event,
									"deskripsi_singkat" => $deskripsi_singkat,
									"deskripsi" => $deskripsi,
									"kd_periode" => $periode,
									"img" => $img_name
								);

				//apus gambar bro
				$get_img = $get_data->row();
				unlink("img/event/".$get_img->img);

				$this->m_admin->update_data('event', $record, 'kd_event', $id);
				redirect('event/edit_sukses','refresh');									
			}
		} 

		$this->admin_template->display('backend/event/edit_data', $data);
	}

	public function event_edit_success()
	{
		$data['title'] = "Sukses Edit Event";
		$data['pesan'] = "Edit Event Berhasil !!!";
		$this->admin_template->notif_display('backend/event/sukses.php', $data);
	}

	public function detail_event()
	{
		$id = $this->uri->segment(3);
		$event = $this->m_admin->get_id('event', 'kd_event', $id)->row();

		$data = array(
						"title" => "Detail Event",
						"ev" => $event,
						"per" => $this->m_admin->get_id('periode', 'kd_periode', $event->kd_periode)->row()
					);

		$this->admin_template->display('backend/event/detail_event', $data);
	}

	//end event

	/**
	 * Page Berita
	 */

	public function berita()
	{
		$data = array(
						"title" => "Halaman Berita",
						"berita" => $this->m_admin->get_berita()->result() 
					 );
		$this->admin_template->display('backend/berita/index', $data);
	}

	public function tambah_berita()
	{
		$data  = array(
						"title" => "Tambah Berita",
						"kd_info" => $this->m_admin->auto_number('info', 'kd_info', 2, "INF") 
					);

		//jka submit
		if (isset($_POST['simpan'])) 
		{
		
			//upload
			$config['upload_path'] = './img/berita/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('gambar_info'))
			{
				$this->session->set_flashdata('error_img', '<div class="alert alert-warning">'.$this->upload->display_errors().'</div>');
				redirect('berita/tambah_data','refresh');
			}

			else
			{

				$img_name = $this->upload->file_name;

				$record = array(
									"id" => '',
									"kd_info" => $this->input->post('kd_info'),
									"meta_keyword" => $this->input->post('meta_k'),
									"meta_deskripsi" => $this->input->post('meta_d'),
									"nama_info" => $this->input->post('judul'),
									"deskripsi"  => $this->input->post('desk'),
									"gambar_info" => $img_name,
									"label" => "berita",
									"tgl_info" => date("Y-m-d H:i:s")
								);
			}

			$this->m_admin->insert_data('info', $record);
			redirect('berita/tambah_sukses','refresh');

		}

		$this->admin_template->display('backend/berita/tambah_data', $data);
	}

	public function berita_add_success()
	{
		$data = array(
						"title" => "Tambah Sukses",
						"pesan" => "Tambah Berita Berhasil !!!"
					);
		$this->admin_template->notif_display('backend/berita/sukses', $data);
	}

	public function edit_berita()
	{
		$id = $this->uri->segment(3);
		$get_data = $this->m_admin->get_id('info', 'id', $id)->row();

		$data = array(
						"title" => "Edit Berita",
						"berita" => $get_data
					 );

		if (isset($_POST['edit'])) 
		{
			//variable declare
			$judul = $this->input->post('judul');
			$meta_k = $this->input->post('meta_k');
			$meta_d = $this->input->post('meta_d');
			$desk = $this->input->post('desk');

			//upload
			$config['upload_path'] = './img/berita/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;
			
			$this->upload->initialize($config);
			if ( ! $this->upload->do_upload('gambar_info'))
			{
				$record = array(
									"nama_info" => $judul,
									"meta_keyword" => $meta_k,
									"meta_deskripsi" => $meta_d,
									"deskripsi" => $desk 
								);


				$this->m_admin->update_data('info', $record, 'id', $id);
				redirect('berita/edit_sukses','refresh');
			}
			else
			{
				$img_name  =  $this->upload->file_name;

				$record = array(
									"nama_info" => $judul,
									"meta_keyword" => $meta_k,
									"meta_deskripsi" => $meta_d,
									"deskripsi" => $desk,
									"gambar_info" => $img_name
								);


				//hapus gambar lama
				unlink("img/berita/".$get_data->gambar_info);

				$this->m_admin->update_data('info', $record, 'id', $id);
				redirect('berita/edit_sukses','refresh');
			}
		}

		$this->admin_template->display('backend/berita/edit_data', $data);
	}

	public function berita_edit_success()
	{
		$data = array("title"=>"Edit Berhasil", "pesan" => "Edit Berita Berhasil !!!");
		$this->admin_template->notif_display('backend/berita/sukses', $data);
	}

	public function hapus_berita()
	{
		$id = $this->input->post('id');

		//hapus gambar
		$data = $this->m_admin->get_id('info', 'id', $id)->row();
		unlink('img/berita/'.$data->gambar_info);

		$this->session->set_flashdata('sukses', '<div class="alert alert-danger">Data berhasil dihapus</div>');
		$this->m_admin->delete_data('info', 'id', $id);
	}

	public function detail_berita()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Detail Berita",
						"data" => $this->m_admin->get_id('info', 'id', $id)->row()
					);
		$this->admin_template->display('backend/berita/detail_berita', $data);
	}
	// End berita

	/**
	 * Gallery Page
	 */

	public function gallery()
	{
		$data = array(
						"title" => "gallery",
						"gallery" => $this->m_admin->get_all('t_galeri', null, null)->result()
					);

		$this->admin_template->display('backend/gallery/index', $data);
	}

	public function tambah_gallery()
	{
		$data['title'] = "Tambah Gallery";

		if (isset($_POST['simpan'])) 
		{
			$record = array(
								'id_galeri' => '',
								'nama' => $this->input->post('nama')
							);

			$this->m_admin->insert_data('t_galeri', $record);
			redirect('gallery/tambah_sukses','refresh');
		}

		$this->admin_template->display('backend/gallery/tambah_data', $data);
	}

	public function gallery_add_success()
	{
		$data = array('title'=>"Tambah Sukses", 'pesan'=>"Gallery Berhhasil di Tambah");
		$this->admin_template->notif_display('backend/gallery/sukses',$data);

	}

	public function edit_gallery()
	{
		$id = $this->uri->segment(3);

		$data  = array("title" => "Edit Gallery", "gal"=> $this->m_admin->get_id('t_galeri', 'id_galeri', $id)->row());
		if (isset($_POST['edit'])) 
		{
			$record = array('nama' => $this->input->post('nama'));
			$this->m_admin->update_data('t_galeri', $record, 'id_galeri', $id);

			redirect('gallery/edit_sukses','refresh');
		}

		$this->admin_template->display('backend/gallery/edit_data', $data);
	}

	public function gallery_edit_success()
	{
		$data = array('title' => 'Edit berhasil', 'pesan'=>"Edit gallery Berhasil !!!");
		$this->admin_template->notif_display("backend/gallery/sukses", $data);
	}

	public function hapus_gallery()
	{
		$id = $this->input->post('id');

		//cari gambar
		$data = $this->m_admin->get_id('t_detail_galeri', 'id_galeri', $id);

		if ($data->num_rows() > 0) 
		{
			foreach ($data->result() as $d) 
			{
				unlink("img/gallery/".$d->gambar);

				$this->m_admin->delete_data('t_detail_galeri', 'id_detail', $d->id_detail);
			}
		}

		$this->m_admin->delete_data('t_galeri', 'id_galeri', $id);
	}

	public function detail_gallery()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Detail Gallery ".$id,
						"data" => $this->m_admin->get_id('t_detail_galeri', 'id_galeri',$id),
						"id" => $id	
					);
		$this->admin_template->display('backend/gallery/detail_gallery', $data);
	}

	public function tambah_detail_gallery()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Tambah Detail Gallery",
						"id_galeri" => $id 
					);
		$this->admin_template->display('backend/gallery/tambah_detail_gallery', $data);
	
		if(isset($_POST['simpan']))
		{
			//upload
			$config['upload_path'] = './img/gallery/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size']  = '8000';
			$config['max_width']  = '2024';
			$config['max_height']  = '1768';
			$config['remove_spaces'] = true;

			$this->upload->initialize($config);
			
			if ( ! $this->upload->do_upload('gambar')){
				$this->session->set_flashdata('img_error', '<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
				redirect('detail_gallery/tambah_gallery/'.$id,'refresh');
			}
			else
			{
				$img_name = $this->upload->file_name;
				$record = array(
									"id_detail" => '',
									'id_galeri' => $id,
									'nama' => $this->input->post('nama'),
									'gambar' => $img_name
								);

				$this->m_admin->insert_data('t_detail_galeri', $record);
				redirect('detail_gallery/sukses/'.$id,'refresh');
			}
		}
	}

	public function detail_gallery_add_success()
	{
		$id = $this->uri->segment(3);
		$data = array('title'=>"tambah gambar berhasil", "id"=>$id, "pesan" => "Tambah Gambar berhasil");
		$this->admin_template->notif_display('backend/gallery/sukses_upload', $data);
	}


	public function hapus_detail_gallery()
	{
		$id = $this->input->post('id');

		$get_data = $this->m_admin->get_id('t_detail_galeri', 'id_detail', $id)->row();
		unlink('img/gallery/'.$get_data->gambar);

		$this->m_admin->delete_data('t_detail_galeri', 'id_detail', $id);
	}

	public function zoom_img_gallery()
	{
		$id = $this->input->post('id');

		$get_data = $this->m_admin->get_id('t_detail_galeri', 'id_detail', $id)->row();

		echo  $get_data->nama."|".$get_data->gambar;
	}

	// End Gallery

	/**
	 * Page User
	 */

	public function user()
	{
		$data = array(
						"title" => "User",
						"data" => $this->m_admin->get_all('user', null, null)->result()
					);

		$this->admin_template->display('backend/user/index', $data);

	}

	public function tambah_user()
	{
		$data = array(
						"title" => "Tambah User",
						"id_user" => $this->m_admin->auto_number('user', 'id_user', 3, "USR")
					  );

		$this->admin_template->display('backend/user/tambah_data', $data);

		if (isset($_POST['simpan'])) 
		{
			$record = array(
								"id_user" => $this->input->post('id_user'),
								"email" => $this->input->post('email'),
								"username" => $this->input->post('username'),
								"password" => md5($this->input->post('password')),
								"level" => $this->input->post('level'),
								"tgl_register" => date('Y-m-d'),
								"keterangan" => $this->input->post('keterangan')
							);

			$this->m_admin->insert_data('user', $record);
			redirect('user/tambah_sukses','refresh');
		}
	}

	public function user_add_success()
	{
		$data = array("title"=>"Tambah Sukses", "pesan"=>"Tambah User Berhasil !!!");
		$this->admin_template->notif_display('backend/user/sukses', $data);
	}

	public function hapus_user()
	{
		$id  = $this->input->post('id');
		$this->m_admin->delete_data('user', 'id_user', $id);
		$this->session->set_flashdata('hapus_sukses', '<div class="alert alert-info">Hapus Data Berhasil !!!</div>');
	}

	public function edit_profil_user()
	{
		$id = $this->session->userdata('profil');

		$data = array(
						"title" => "Profil User",
						"data" => $this->m_admin->get_id('user', 'id_user', $id)->row()
					);
		$this->admin_template->display('backend/user/profil_user', $data);

		if (isset($_POST['edit_user'])) 
		{

			$record = array(
								"email" => $this->input->post('email'),
								"username" => $this->input->post('username')
							);
			$this->m_admin->update_data("user", $record, 'id_user', $id);
			redirect('profil_user/edit_sukses','refresh');
		}
		else if (isset($_POST['edit_password'])) 
		{
			$record = array("password" => md5($this->input->post('password')));
			$this->m_admin->update_data('user', $record, 'id_user', $id);
			redirect('profil_user/edit_password_sukses','refresh');
		}
	}

	public function profil_user_edit_success()
	{
		$data = array('title' => "Edit User Sukses", "pesan"=>"Edit User berhasil");
		$this->admin_template->notif_display('backend/user/sukses_edit', $data);
	}

	public function profil_user_password_success()
	{
		$data = array(
						"title" => "Ganti Password berhasil",
						"pesan" => "Ganti Password Berhasil"
					);
		$this->admin_template->notif_display('backend/user/sukses_edit', $data);
	}
	// End User

	/**
	 * 	Konsumen 
	 */

	public function konsumen()
	{
		$data = array(
						"title" => "Data Konsumen",
						"konsumen" => $this->m_admin->get_all('konsumen', null, null)->result()
					);

		$this->admin_template->display('backend/konsumen/index', $data);
	}

	public function hapus_konsumen()
	{
		$id = $this->input->post('id');

		$get_data = $this->m_admin->get_id('konsumen', 'id_konsumen', $id)->row();

		$this->m_admin->delete_data('user', 'id_user', $get_data->id_user);
		$this->m_admin->delete_data('konsumen', 'id_konsumen', $id);
		$this->session->set_flashdata('delete_sukses', '<div class="alert alert-info"><i class="fa fa-info"></i> Delete Data Berhasil !!!</div>');
	}

	//End Konsumena

	/**
	 * Pemesanan
	 */

	public function pemesanan()
	{
		$data = array(
						"title" => "Data Pemesanan",
						"pemesanan" => $this->m_admin->get_all('pemesanan', null, null)->result()

					);

		$this->admin_template->display('backend/pemesanan/index', $data);
	}

	public function detail_konsumen()
	{
		$id = $this->uri->segment(3);
		$data = array(
						"title" => "Detail Konsumen",
						"konsumen" => $this->m_admin->join_konsumen($id)->row()
					);
	
		$this->load->view('backend/pemesanan/detail_konsumen', $data);

	}

	public function detail_rumah()
	{
		$id = $this->uri->segment(3);

		$get = $this->m_admin->get_id('rumah', 'kd_rumah', $id)->row_array();
		$blok = $this->m_admin->get_id('blok_rumah', 'kd_blok', $get['kd_blok'])->row_array();

		$data = array(
						"title" => "Detail Rumah-".$id,
						"rumah" => $get,
						"blok" => $blok,
						"booking_fee" => $this->m_admin->get_id('booking_fee', 'kd_booking', $blok['kd_booking'])->row_array()
					);

		$this->load->view('backend/pemesanan/detail_rumah', $data);
	}

	public function hapus_pemesanan()
	{
		$id = $this->input->post('id');

		$this->m_admin->delete_data('pembayaran', 'id_pemesanan', $id);
		$this->m_admin->delete_data('pemesanan', 'id_pemesanan', $id);
		$this->session->set_flashdata('delete_sukses', '<div class="alert alert-info"><i class="fa fa-info"></i> Data Berhasil di hapus</div>');
	
	}

	// End Pemesanan

	public function pembayaran()
	{
		$data = array(
						"title" => "Data Pembayaran",
						"data" => $this->m_admin->get_all('pembayaran', null, null)
					);
		
		
		$this->admin_template->display('backend/pembayaran/index', $data);
	}

	public function konfirmasi_pembayaran()
	{
		$id  = $this->input->post('id');
		
		$this->m_admin->update_data('pembayaran', array('status' => 'y'), 'id_pembayaran', $id);
		$this->session->set_flashdata('konfirmasi_sukses', '<div class="alert alert-info"><i class="fa fa-info"></i> Konfirmasi pembayaran Sukses !!</div>');
	}

	public function lihat_spr()
	{

	}

	// End

	/**
	 * Feature option
	 */
	 

	// end feature option

}

/* End of file  */
/* Location: ./application/controllers/ */