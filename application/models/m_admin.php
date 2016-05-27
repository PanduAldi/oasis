<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {

	public function get_all($table, $limit, $offset)
	{
		return $this->db->get($table, $limit, $offset);
	}

	public function get_id($table, $key, $value)
	{
		$this->db->where($key, $value);
		return $this->db->get($table);
	}

	public function count_all($table)
	{
		return $this->db->count_all($table);
	}

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


	public function auth($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('password', $password);

		return $this->db->get('user');
	}

	public function booking_periode()
	{
		$this->db->select("booking_fee.*, periode.*");
		$this->db->from('booking_fee');
		$this->db->join('periode', 'periode.kd_periode = booking_fee.kd_periode');
		return $this->db->get();
	}

	public function event_periode()
	{
		$this->db->select("*");
		$this->db->from('event');
		$this->db->join('periode', 'periode.kd_periode = event.kd_periode');
		return $this->db->get();
	}

	public function  get_berita()
	{
		$this->db->where('label', 'berita');
		return $this->db->get('info');
	}

	public function join_blok($id)
	{
		$this->db->select("*");
		$this->db->from("blok_rumah");
		$this->db->join('spesifikasi', 'spesifikasi.kd_spesifikasi = blok_rumah.kd_spesifikasi');
		$this->db->join('booking_fee', 'booking_fee.kd_booking = blok_rumah.kd_booking');
		$this->db->where('kd_blok', $id);
		return $this->db->get('blok_rumah');
	}

	public function join_konsumen($id)
	{
		$this->db->select("*");
		$this->db->from('konsumen');
		$this->db->join('user', 'user.id_user = konsumen.id_user');
		$this->db->where('konsumen.id_user', $id);
		return $this->db->get();
	}

	public function join_rumah()
	{
		$this->db->select("*");
		$this->db->from("rumah");
		$this->db->join('blok_rumah', 'blok_rumah.kd_blok = rumah.kd_blok');
		$this->db->where('rumah.kd_rumah', $id);
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
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */