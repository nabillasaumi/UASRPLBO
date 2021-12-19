<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin');
	}
	public function login()
	{
		if (isset($_POST['login'])) {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->form_validation->set_rules('email', 'Email', 'required', [
				'required'	=>	'%s harus terisi'
			]);
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]', [
				'required'		=>	'%s harus terisi',
				'min_length'	=>	'Panjang %s minimal %s karakter'
			]);

			if ($this->form_validation->run() == TRUE) {
				$check = $this->Admin->get_where(['email' => $email])->row_array();
				if ($check) {
					if (password_verify($password, $check['password'])) {

						$this->session->set_userdata('nama', $check['nama']);
						$this->session->set_userdata('email', $check['email']);
						$this->session->set_userdata('app-key', 'silapors123');

						redirect('admin/dashboard', 'refresh');
					}
				}
				$this->session->set_flashdata('error', 'Email dan password tidak cocok');
				redirect('login', 'refresh');
			}
		}
		$this->create_admin();
		$data = [
			'title'	=>	'Login'
		];
		$this->load->view('auth/login', $data);
	}

	public function logout()
	{
		$this->session->unset_userdata(['nama', 'email', 'app-key']);
		$this->session->set_flashdata('success', 'Anda berhasil logout');
		redirect('login', 'refresh');
	}

	public function create_admin()
	{
		$data = [
			'nama'		=>	'Admin',
			'email'		=>	'admin@gmail.com',
			'password'	=>	password_hash('12345678', PASSWORD_DEFAULT),
			'date_created'	=>	date('Y-m-d')
		];

		$check = $this->Admin->get_where(['email' => 'admin@gmail.com'])->row_array();
		if (empty($check)) {
			$this->Admin->add($data);
		}
	}
}
