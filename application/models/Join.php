<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Join extends CI_Model
{

	protected $dokter;
	protected $jadwal;

	public function __construct()
	{
		$this->dokter = 'dokter';
		$this->jadwal = 'jadwal';
	}

	public function dokter_jadwal()
	{
		$this->db->select('*');
		$this->db->from($this->dokter);
		$this->db->join($this->jadwal, $this->jadwal . ".id_dokter = " . $this->dokter . ".id");
		return $this->db->get();
	}

	public function get_where_dokter_jadwal($where)
	{
		$this->db->select('*');
		$this->db->from($this->dokter);
		$this->db->join($this->jadwal, $this->jadwal . ".id_dokter = " . $this->dokter . ".id");
		$this->db->where($where);
		return $this->db->get();
	}
}
