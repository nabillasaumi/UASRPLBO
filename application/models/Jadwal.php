<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Model
{

	protected $table;

	public function __construct()
	{
		$this->table = 'jadwal';
	}
	// function untuk get semua data
	public function get()
	{
		return $this->db->get($this->table);
	}

	// function untuk get berdasarkan kondisi where
	public function get_where($where)
	{
		return $this->db->get_where($this->table, $where);
	}

	// function untuk menambahkan data
	public function add($data)
	{
		$this->db->query("ALTER TABLE " . $this->table . " AUTO_INCREMENT=0");
		return $this->db->insert($this->table, $data);
	}

	// function untuk mengedit data
	// function untuk mengedit data
	public function edit($where, $data)
	{
		$this->db->where($where);
		return $this->db->update($this->table, $data);
	}

	// function untuk menghapus data
	public function delete($where)
	{
		$this->db->where($where);
		return $this->db->delete($this->table);
	}
}
