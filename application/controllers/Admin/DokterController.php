<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DokterController extends CI_Controller
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
	}

	public function index()
	{
		if (isset($_POST['add'])) {
			$nama = $this->input->post('nama');
			$poli = $this->input->post('poli');

			$this->form_validation->set_rules('nama', 'Nama', 'required', [
				'required'	=>	'%s harus terisi'
			]);
			$this->form_validation->set_rules('poli', 'Poli', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			if ($this->form_validation->run() == TRUE) {
				$add = [
					'nama'	=>	$nama,
					'poli'	=>	$poli
				];
				$this->Dokter->add($add);
				$this->session->set_flashdata('success', 'Anda berhasil menambah data dokter');
				redirect('admin/dokter');
			}
		} elseif (isset($_POST['edit'])) {
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$poli = $this->input->post('poli');

			$this->form_validation->set_rules('nama', 'Nama', 'required', [
				'required'	=>	'%s harus terisi'
			]);
			$this->form_validation->set_rules('poli', 'Poli', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			if ($this->form_validation->run() == TRUE) {
				$add = [
					'nama'	=>	$nama,
					'poli'	=>	$poli
				];
				$this->Dokter->edit(['id' => $id], $add);
				$this->session->set_flashdata('success', 'Anda berhasil mengubah data dokter');
				redirect('admin/dokter');
			}
		} elseif (isset($_POST['delete'])) {
			$id = $this->input->post('id');

			$checkJadwal = $this->Jadwal->get_where(['id_dokter' => $id])->row_array();
			if (empty($checkJadwal)) {
				$this->Dokter->delete(['id' => $id]);
				$this->session->set_flashdata('success', 'Anda berhasil menghapus data dokter');
			} else {
				$this->session->set_flashdata('error', 'Anda tidak bisa menghapus dokter yang mempunyai jadwal');
			}
			redirect('admin/dokter');
		}
		$dokter = $this->Dokter->get()->result_array();
		$data = [
			'dokter'			=>	$dokter,
			'title'				=>	'Dokter',
			'menu'				=>	'Dokter',
			'submenu'			=>	'',
			'breadcrumbTitle'	=>	'Dokter',
			'breadcrumb'		=>	'<li class="breadcrumb-item">
										<a href="' . base_url('admin/dokter') . '">
											<i class="fas fa-home"></i>
										</a>
									</li>
									<li class="breadcrumb-item active">
									Dokter
									</li>',
			'content'			=>	'admin/dokter/index',
			'js'				=>	'admin/dokter/js/index-js',
		];
		$this->load->view('main', $data);
	}
}
