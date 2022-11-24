<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->model('Buku_model');
	}

	public function index()
	{
		$data['buku'] = $this->Buku_model->countBuku();
		$data['user'] = $this->User_model->countUser();
		$data['dipinjam'] = $this->Buku_model->countDipinjam();

		$this->load->view('panel/dash_header');
		$this->load->view('panel/dash_sidebar', $data);
		$this->load->view('page/dashboard', $data);
		$this->load->view('panel/dash_footer');
	}
}
