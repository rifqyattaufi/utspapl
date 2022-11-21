<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
    
    //halaman buku
    public function index()
    {
        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/buku/buku');
        $this->load->view('panel/dash_footer');
    }

    public function add_buku()
    {
        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/buku/add_buku');
        $this->load->view('panel/dash_footer');
    }

    public function edit_buku()
    {
        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/buku/edit_buku');
        $this->load->view('panel/dash_footer');
    }
}
?>