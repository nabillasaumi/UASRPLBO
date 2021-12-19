<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftaranPasienController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Join');
		$this->load->model('Antri');
	}
	public function index()
	{
		$data = [
			'title'	=>	'Pendaftaran Pasien'
		];
		$this->load->view('pendaftaran-pasien/index', $data);
	}
	public function daftar()
	{
		$data = [
			'title'	=>	'Pendaftaran Pasien'
		];
		$this->load->view('pendaftaran-pasien/daftar', $data);
	}

	public function checkJadwal()
	{
		if (isset($_POST['daftar'])) {
			$id_jadwal 		= $this->input->post('id');
			$bpjs 			= $this->input->post('bpjs');
			$nama 			= $this->input->post('nama');
			$tempat_lahir 	= $this->input->post('tempat_lahir');
			$tanggal_lahir	= $this->input->post('tanggal_lahir');
			$alamat 		= $this->input->post('alamat');

			$this->form_validation->set_rules('bpjs', 'No BPJS', 'required|numeric', [
				'required'	=>	'%s harus terisi',
				'numeric'	=>	'%s harus angka'
			]);
			$this->form_validation->set_rules('nama', 'Nama Pasien', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			$this->form_validation->set_rules('alamat', 'Alamat KTP', 'required', [
				'required'		=>	'%s harus terisi',
			]);

			if ($this->form_validation->run() == TRUE) {
				$waktu_daftar = date('Y-m-d');
				$where = [
					'id_jadwal'			=>	$id_jadwal,
					'waktu_daftar'		=>	$waktu_daftar
				];
				$no_antri = $this->Antri->get_where($where)->num_rows();
				$data = [
					'id_jadwal'		=>	$id_jadwal,
					'no_bpjs'		=>	$bpjs,
					'nama_pasien'	=>	$nama,
					'tempat_lahir'	=>	$tempat_lahir,
					'tanggal_lahir'	=> 	date('Y-m-d', strtotime($tanggal_lahir)),
					'alamat'		=>	$alamat,
					'no_antri'		=>	$no_antri + 1,
					'waktu_daftar'	=>	$waktu_daftar,
				];

				$where = [
					'id_jadwal'		=>	$id_jadwal,
					'no_bpjs'		=>	$bpjs,
					'nama_pasien'	=>	$nama,
					'tempat_lahir'	=>	$tempat_lahir,
					'tanggal_lahir'	=>	date('Y-m-d', strtotime($tanggal_lahir)),
					'alamat'		=>	$alamat,
					'waktu_daftar'	=>	$waktu_daftar,
				];

				$checkDuplikat = $this->Antri->get_where($where)->row_array();

				$dokter = $this->Join->get_where_dokter_jadwal(['id_jadwal' => $id_jadwal])->row_array();
				if (empty($checkDuplikat)) {
					$this->Antri->add($data);
					$html = '
						<div>
							No Antri: ' . ($no_antri + 1) . '<br>
							Dokter: ' . $dokter['nama'] . '<br>
							Poli: ' . $dokter['poli'] . '<br>
							Hari: ' . $dokter['hari'] . '<br>
							Jam: ' . $dokter['jam'] . '<br><hr>
							No BPJS: ' . $bpjs . '<br>
							Nama Pasien: ' . $nama . '<br>
							Tempat Lahir: ' . $tempat_lahir . '<br>
							Tanggal Lahir: ' . $tanggal_lahir . '<br>
							Alamat KTP: ' . $alamat . '<br>
						</div>
					';
					$this->session->set_flashdata('success', $html);
				} else {
					$html = '
						<div>
							<h5>Anda sudah mendaftar</h5>
							No Antri: ' . ($no_antri + 1) . '<br>
							Dokter: ' . $dokter['nama'] . '<br>
							Poli: ' . $dokter['poli'] . '<br>
							Hari: ' . $dokter['hari'] . '<br>
							Jam: ' . $dokter['jam'] . '<br><hr>
							No BPJS: ' . $bpjs . '<br>
							Nama Pasien: ' . $nama . '<br>
							Tempat Lahir: ' . $tempat_lahir . '<br>
							Tanggal Lahir: ' . $tanggal_lahir . '<br>
							Alamat KTP: ' . $alamat . '<br>
						</div>
					';
					$this->session->set_flashdata('error', $html);
					redirect('cek-jadwal');
				}
			}
			$this->session->set_flashdata('errors', validation_errors());
			redirect('cek-jadwal');
		}
		$jadwal = $this->Join->dokter_jadwal()->result_array();
		$data = [
			'jadwal'	=>	$jadwal,
			'title'	=>	'Pendaftaran Pasien'
		];
		$this->load->view('pendaftaran-pasien/check-jadwal', $data);
	}
}
