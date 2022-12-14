<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">You are not logged in!</div>');
            redirect('auth');
        }
        if($this->session->userdata('role') == 1){
            redirect('user');
        }
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
	}
    
    //halaman kategori
    public function index()
    {

        $data['kategori'] = $this->Kategori_model->getKategori();

        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/kategori/kategori', $data);
        $this->load->view('panel/dash_footer');
    }

    public function add_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim', [
            'required' => 'Nama Kategori tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('panel/dash_header');
            $this->load->view('panel/dash_sidebar');
            $this->load->view('page/kategori/kategori');
            $this->load->view('panel/dash_footer');
        } else {
            $this->Kategori_model->addKategori();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil ditambahkan!</div>');
            redirect('kategori');
        }
    }

    public function edit($id)
    {
        $data['kategori'] = $this->Kategori_model->getKategoriById($id);
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim', [
            'required' => 'Nama Kategori tidak boleh kosong!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('panel/dash_header');
            $this->load->view('panel/dash_sidebar');
            $this->load->view('page/kategori/edit', $data);
            $this->load->view('panel/dash_footer');
        } else {
            $this->Kategori_model->editKategori($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil diubah!</div>');
            redirect('kategori');
        }
    }

    public function delete($id)
    {
        $this->Kategori_model->deleteKategori($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kategori berhasil dihapus!</div>');
        redirect('kategori');
    }
}
?>