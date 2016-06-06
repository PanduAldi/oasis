<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_web extends CI_Model {

	public function get_all($table, $limit, $offset, $by)
	{
		$this->db->order_by($by, 'desc');
		return $this->db->get($table, $limit, $offset);
	}

	public function get_berita($limit, $offset)
	{
		$this->db->where('label', 'berita');
		$this->db->order_by('id', 'desc');
		return $this->db->get('info', $limit, $offset);
	}

	public function get_count($table)
	{
		return $this->db->count_all($table);
	}

	public function get_home_produk()
	{
		return $this->db->get('blok_rumah', null, null)->result();
	}

	public function get_blok()
	{
		$this->db->select('*');
		$this->db->from('blok_rumah');
		$this->db->join('booking_fee', 'booking_fee.kd_booking = blok_rumah.kd_booking');
		return $this->db->get();
	}

	public function get_detail_blok($id)
	{
		$this->db->select('*');
		$this->db->from('blok_rumah');
		$this->db->join('booking_fee', 'booking_fee.kd_booking = blok_rumah.kd_booking');
		$this->db->join('spesifikasi', 'spesifikasi.kd_spesifikasi = blok_rumah.kd_spesifikasi');
		$this->db->where('blok_rumah.kd_blok', $id);
		return $this->db->get();
	}

	public function get_detail_rumah($id)
	{
		$this->db->where('kd_blok', $id);
		$this->db->order_by('nama_kavling', 'asc');
		return $this->db->get('rumah')->result();
	}

	public function get_home_berita()
	{
		$this->db->where('label', 'berita');
		$this->db->order_by('id', 'desc');
		return $this->db->get('info', 3, null)->result();
	}

	public function get_home_event()
	{
		$this->db->order_by('kd_event', 'desc');
		return $this->db->get('event', 3, null)->result();
	}

	public function get_home_galeri()
	{
		$this->db->order_by('id_galeri', 'desc');
		return $this->db->get('t_galeri', 3, null)->result();
	}

	public function get_id($table, $key, $value)
	{
		$this->db->where($key, $value);
		return $this->db->get($table)->row();
	}

	public function get_detail_gallery($table, $key, $value)
	{
		$this->db->where($key, $value);
		return $this->db->get($table);
	}


	/**
	 * Member Model
	 */

	//Auth model
	public function auth($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get('user');
	}

	// Basic Crud
	public function insert_data($table, $record)
	{
		$this->db->insert($table, $record);
	}

	public function update_data($table, $record, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->update($table, $record);
	}

	public function delete_data($table, $key, $value)
	{
		$this->db->where($key, $value);
		$this->db->delete($table);
	}

	public function auto_number($table, $kolom, $lebar=0, $awalan=null)
	{
		$this->db->select($kolom);
		$this->db->limit(1);
		$this->db->order_by($kolom, 'desc');
		$this->db->from($table);
		$query = $this->db->get();

		$row = $query->result_array();
		$cek = $query->num_rows();

		if ($cek == 0)
			$nomor = 1;
		else
		{
			$nomor = intval(substr($row[0][$kolom], strlen($awalan)))+1;
		}

			if ($lebar > 0)
			{
				$result = $awalan.str_pad($nomor, $lebar, "0", STR_PAD_LEFT);
			}
			else
			{
				$result = $awalan.$nomor;
			}

			return $result;
	}

	public function join_pesan($id)
	{
		$this->db->select("*");
		$this->db->from("pesan");
		$this->db->join("user", "user.id_user = pesan.id_user");
		$this->db->where('pesan.kd_pesan', $id);
		return $this->db->get()->row();
	}

	public function join_keluhan($id)
	{
		$this->db->select("*");
		$this->db->from("keluhan");
		$this->db->join("user", "user.id_user = keluhan.id_user");
		$this->db->where('keluhan.kd_keluhan', $id);
		return $this->db->get()->row();
	}

	public function get_by_parent($table, $id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join("user", "user.id_user = ".$table.".id_user");
		$this->db->where($table.".parent", $id);
		return $this->db->get()->result();
	}

	public function notif_pesan()
	{
		$this->db->where('read', 'n');
		return $this->db->get('pesan')->num_rows();
	}

	public function notif_keluhan()
	{
		$this->db->where('read', 'n');
		return $this->db->get('keluhan')->num_rows();
	}

	public function notif_balas_pesan($table, $id)
	{
		$this->db->where('read', 'n');
		$this->db->where('parent', $id);
		return $this->db->get($table)->num_rows();
	}

	public function tampil_pemesanan($id)
	{
		$this->db->select('pemesanan.*, rumah.kd_blok, blok_rumah.nama_blok');
		$this->db->from('pemesanan');
		$this->db->join('rumah', 'rumah.kd_rumah = pemesanan.kd_rumah');
		$this->db->join('blok_rumah', 'blok_rumah.kd_blok = rumah.kd_blok');
		$this->db->where('id_user', $id);
		return $this->db->get()->result();
	}

	public function get_pembayaran($id)
	{
		$this->db->select("pembayaran.*");
		$this->db->from('pembayaran');
		$this->db->join('pemesanan', "pemesanan.id_pemesanan = pembayaran.id_pemesanan");
		$this->db->where('pemesanan.id_user', $id);
		return $this->db->get();
	}

	public function get_periode($id)
	{
		$this->db->select('periode.*');
		$this->db->from('pemesanan');
		$this->db->join('rumah', 'rumah.kd_rumah = pemesanan.kd_rumah');
		$this->db->join('blok_rumah', 'blok_rumah.kd_blok = rumah.kd_blok');
		$this->db->join('booking_fee', 'booking_fee.kd_booking = blok_rumah.kd_booking');
		$this->db->join('periode', 'periode.kd_periode = booking_fee.kd_periode');
		$this->db->where('pemesanan.id_pemesanan', $id);
		return $this->db->get();
	}

	public function get_nama($id)
	{
		$this->db->select('konsumen.nama');
		$this->db->from('pemesanan');
		$this->db->join('user', "user.id_user = pemesanan.id_user");
		$this->db->join('konsumen', 'konsumen.id_user = user.id_user');
		$this->db->where('pemesanan.id_pemesanan', $id);
		return $this->db->get();
	}

	public function lihat_spr($id)
	{
		$this->db->select('konsumen.nama, konsumen.no_ktp, konsumen.alamat, konsumen.telp, blok_rumah.harga, pembayaran.jml_pembayaran, pemesanan.cara_bayar, pembayaran.tgl_pembayaran, rumah.nama_kavling, blok_rumah.luas_bangun, blok_rumah.luas_tanah, pembayaran.keterangan');
		$this->db->from('pembayaran');
		$this->db->join('pemesanan', 'pemesanan.id_pemesanan = pembayaran.id_pemesanan');
		$this->db->join('user', 'user.id_user = pemesanan.id_user');
		$this->db->join('konsumen', 'konsumen.id_user = user.id_user');
		$this->db->join('rumah', 'rumah.kd_rumah = pemesanan.kd_rumah');
		$this->db->join('blok_rumah', 'blok_rumah.kd_blok = rumah.kd_blok');
		$this->db->where('pembayaran.id_pembayaran', $id);
		return $this->db->get();
	}

	public function get_pesan($id)
	{
		$this->db->where('parent', '0');
		$this->db->where('id_user', $id);
		return $this->db->get('pesan');
	}

	public function get_keluhan($id)
	{
		$this->db->where('parent', '0');
		$this->db->where('id_user', $id);
		return $this->db->get('keluhan');
	}

	public function get_detail_pesan($id)
	{
		$this->db->join('user', 'user.id_user = pesan.id_user');
		$this->db->where('pesan.parent', $id);
		return $this->db->get('pesan');
	}

	public function get_detail_keluhan($id)
	{
		$this->db->join('user', 'user.id_user = keluhan.id_user');
		$this->db->where('parent', $id);
		return $this->db->get('keluhan');
	}

	public function get_parent($table, $key, $value)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->join('user', 'user.id_user ='.$table.'.id_user');
		$this->db->where($key, $value);
		return $this->db->get();
	}

	

}

/* End of file  */
/* Location: ./application/models/ */
