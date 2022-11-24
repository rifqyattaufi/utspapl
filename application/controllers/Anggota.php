<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Anggota_model');
        $this->load->library('form_validation');
	}
    
    //halaman anggota
    public function index()
    {
        $data['anggota'] = $this->Anggota_model->getAnggota();

        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/anggota/anggota', $data);
        $this->load->view('panel/dash_footer');
    }
}
?>