<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('email') == '' || $this->session->userdata('app-key') != 'silapors123') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki akses.');
			redirect('login', 'refresh');
		}

		$this->load->model('Dokter');
		$this->load->model('Jadwal');
		$this->load->model('Join');
	}

	public function index()
	{
		if (isset($_POST['add'])) {
			$id_dokter = $this->input->post('dokter');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');

			$this->form_validation->set_rules('dokter', 'Dokter', 'required', [
				'required'	=>	'%s harus terisi'
			]);
			$this->form_validation->set_rules('hari', 'Hari', 'required', [
				'required'		=>	'%s harus terisi',
			]);
			$this->form_validation->set_rules('jam', 'Jam', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			if ($this->form_validation->run() == TRUE) {
				$where = [
					'id_dokter'	=>	$id_dokter,
					'hari'		=>	$hari,
					'jam'		=>	$jam
				];
				$check = $this->Jadwal->get_where($where)->row_array();
				if (empty($check)) {
					$this->Jadwal->add($where);
					$this->session->set_flashdata('success', 'Anda berhasil menambahkan jadwal');
				} else {
					$this->session->set_flashdata('error', 'Data sudah ada');
				}
				redirect('admin/jadwal');
			}
		} elseif (isset($_POST['edit'])) {
			$id_jadwal = $this->input->post('id');
			$id_dokter = $this->input->post('dokter');
			$hari = $this->input->post('hari');
			$jam = $this->input->post('jam');

			$this->form_validation->set_rules('dokter', 'Dokter', 'required', [
				'required'	=>	'%s harus terisi'
			]);
			$this->form_validation->set_rules('hari', 'Hari', 'required', [
				'required'		=>	'%s harus terisi',
			]);
			$this->form_validation->set_rules('jam', 'Jam', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			if ($this->form_validation->run() == TRUE) {
				$where = [
					'id_dokter'	=>	$id_dokter,
					'hari'		=>	$hari,
					'jam'		=>	$jam
				];
				$check = $this->Jadwal->get_where($where)->row_array();
				if (empty($check)) {
					$this->Jadwal->edit(['id_jadwal' => $id_jadwal], $where);
					$this->session->set_flashdata('success', 'Anda berhasil mengubah jadwal');
				} else {
					$this->session->set_flashdata('error', 'Data sudah ada');
				}
				redirect('admin/jadwal');
			}
		} elseif (isset($_POST['delete'])) {
			$id_jadwal = $this->input->post('id');
			$this->Jadwal->delete(['id_jadwal' => $id_jadwal]);
		}
		$dokter = $this->Dokter->get()->result_array();
		$jadwal = $this->Join->dokter_jadwal()->result_array();
		$data = [
			'jadwal'			=>	$jadwal,
			'days'				=>	$this->days(),
			'dokter'			=>	$dokter,
			'title'				=>	'Jadwal',
			'menu'				=>	'Jadwal',
			'submenu'			=>	'',
			'breadcrumbTitle'	=>	'Jadwal',
			'breadcrumb'		=>	'<li class="breadcrumb-item">
										<a href="' . base_url('admin/dashboard') . '">
											<i class="fas fa-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item active">
										Jadwal
									</li>',
			'content'			=>	'admin/jadwal/index',
			'js'				=>	'admin/jadwal/js/index-js',
		];
		$this->load->view('main', $data);
	}

	public function days()
	{
		$days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
		return $days;
	}
}
