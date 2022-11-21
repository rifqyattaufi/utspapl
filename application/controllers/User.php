<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('panel/dash_header');
		$this->load->view('panel/dash_sidebar');
		$this->load->view('page/dashboard');
		$this->load->view('panel/dash_footer');
	}
}
