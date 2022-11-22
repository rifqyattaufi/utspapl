<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buku extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Buku_model');
        $this->load->model('Kategori_model');
        $this->load->library('form_validation');
	}
    
    //halaman buku
    public function index()
    {
        $data['buku'] = $this->Buku_model->getAllBuku();

        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/buku/buku', $data);
        $this->load->view('panel/dash_footer');
    }

    public function add_buku()
    {

        $data['kategori'] = $this->Kategori_model->getKategori();
        $data['buku'] = $this->Buku_model->getAllBuku();

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim', [
            'required' => 'Kategori tidak boleh kosong!'
        ]);
        
        $this->form_validation->set_rules('isbn', 'ISBN', 'required|trim|numeric|is_unique[buku.isbn]|min_length[13]|max_length[13]', [
            'required' => 'ISBN tidak boleh kosong!',
            'is_unique' => 'ISBN sudah terdaftar!',
            'numeric' => 'ISBN harus berupa angka!',
            'min_length' => 'ISBN harus 13 digit!',
            'max_length' => 'ISBN harus 13 digit!',
        ]);
        
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim', [
            'required' => 'Judul tidak boleh kosong!',
        ]);
        
        $this->form_validation->set_rules('penulis', 'Penulis', 'required|trim', [
            'required' => 'Penulis tidak boleh kosong!',
        ]);
        
        $this->form_validation->set_rules('penerbit', 'Penerbit', 'required|trim', [
            'required' => 'Penerbit tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim', [
            'required' => 'Tahun tidak boleh kosong!',
        ]);

        $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');

        // $this->load->library('upload');
        // if(!empty($_FILES['gambar']['name']))
        // {
        //     $config['upload_path'] = './assets/buku/';
        //     $config['allowed_types'] = 'gif|jpg|jpeg|png'; 
        //     $config['encrypt_name'] = TRUE;

        //     $this->load->library('upload',$config);
        //     $this->upload->initialize($config);

        //     if ($this->upload->do_upload('gambar')) {
        //         $this->upload->data();
        //         $file1 = array('upload_data' => $this->upload->data());
        //         $this->db->set('sampul', $file1['upload_data']['file_name']);
        //     }else{
        //         $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
        //                 <p> Edit Buku Gagal !</p>
        //             </div></div>');
        //         redirect(base_url('data')); 
        //     }
        // }

        // if(!empty($_FILES['lampiran']['name']))
        // {
        //     $config['upload_path'] = './assets/buku/';
        //     $config['allowed_types'] = 'pdf'; 
        //     $config['encrypt_name'] = TRUE; 
        
        //     $this->load->library('upload',$config);
        //     $this->upload->initialize($config);
        //     // script uplaod file kedua
        //     if ($this->upload->do_upload('lampiran')) {
        //         $this->upload->data();
        //         $file2 = array('upload_data' => $this->upload->data());
        //         $this->db->set('lampiran', $file2['upload_data']['file_name']);
        //     }else{

        //         $this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
        //                 <p> Edit Buku Gagal !</p>
        //             </div></div>');
        //         redirect(base_url('data')); 
        //     }
        // }

        if($this->form_validation->run() == false) {
            $this->load->view('panel/dash_header');
            $this->load->view('panel/dash_sidebar');
            $this->load->view('page/buku/add_buku', $data);
            $this->load->view('panel/dash_footer');
        } else {
            $this->Buku_model->addBuku();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Sukses!</strong> Buku berhasil ditambahkan!.
            </div>');
            redirect('buku');
        }
    }

    public function edit_buku($id)
    {
        $this->load->view('panel/dash_header');
        $this->load->view('panel/dash_sidebar');
        $this->load->view('page/buku/edit_buku');
        $this->load->view('panel/dash_footer');
    }

    public function delete_buku($id)
    {
        $data['getBuku'] = $this->Buku_model->getBuku($id);
       
        $this->Buku_model->deleteBuku($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sukses!</strong> Data Buku berhasil dihapus!.
        </div>');
        redirect('buku');
    }
}
?>