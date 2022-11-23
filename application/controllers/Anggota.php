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

    public function block($id)
    {
        $this->Anggota_model->block($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota berhasil diblokir!</div>');
        redirect('anggota');
    }

    public function activate($id)
    {
        $this->Anggota_model->activate($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota berhasil diaktifkan!</div>');
        redirect('anggota');
    }
    
    public function detail($id)
    {
        $data['anggota'] = $this->Anggota_model->getAnggotaById($id);

        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/anggota/detail_anggota', $data);
        $this->load->view('panel/dash_footer');
    }

    public function delete($id)
    {
        $this->Anggota_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anggota berhasil dihapus!</div>');
        redirect('anggota');
    }
    
}
?>