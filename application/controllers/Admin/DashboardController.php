<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('email') == '' || $this->session->userdata('app-key') != 'silapors123') {
			$this->session->set_flashdata('error', 'Anda tidak memiliki akses.');
			redirect('login', 'refresh');
		}

		$this->load->model('Admin');
	}

	public function index()
	{
		$data = [
			'title'				=>	'Dashboard',
			'menu'				=>	'Dashboard',
			'submenu'			=>	'',
			'breadcrumbTitle'	=>	'Dashboard',
			'breadcrumb'		=>	'<li class="breadcrumb-item">
										<a href="' . base_url('admin/dashboard') . '">
											<i class="fas fa-home"></i>
										</a>
									</li>',
			'content'			=>	'admin/dashboard/index',
			'js'				=>	'',
		];
		$this->load->view('main', $data);
	}
}
