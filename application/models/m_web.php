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
		$this->db->where('kd_blok', $id);
		return $this->db->get();
	}

	public function get_detail_rumah($id)
	{
		$this->db->where('kd_blok', $id);
		$this->db->order_by('nama_kavling', 'asc');
		return $this->db->get('rumah');
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
}

/* End of file  */
/* Location: ./application/models/ */