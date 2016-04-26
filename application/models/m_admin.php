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
}

/* End of file m_admin.php */
/* Location: ./application/models/m_admin.php */