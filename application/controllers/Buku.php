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

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim', [
            'required' => 'Kategori tidak boleh kosong!'
        ]);

        $this->form_validation->set_rules('isbn', 'ISBN', 'required|trim|numeric|min_length[13]|max_length[13]|is_unique[buku.isbn]', [
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

        if ($this->form_validation->run() == false) {
            $this->load->view('panel/dash_header');
            $this->load->view('panel/dash_sidebar');
            $this->load->view('page/buku/add_buku', $data);
            $this->load->view('panel/dash_footer');
        } else {
            $this->Buku_model->addBuku();

            $image = $_FILES['gambar']['name'];
            if ($image) {
                $config['upload_path'] = './assets/buku/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $this->Buku_model->addImage();
                } else {
                    $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
                        <p> Edit Buku Gagal !</p>
                    </div></div>');
                    redirect('buku');
                }
            }

            $pdf = $_FILES['lampiran']['name'];
            if ($pdf) {
                $config['upload_path'] = './assets/buku/pdf/';
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('lampiran')) {
                    $this->Buku_model->addPdf();
                } else {
                    $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
                        <p> Edit Buku Gagal !</p>
                    </div></div>');
                    redirect('buku');
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukses!</strong> Buku berhasil ditambahkan!.
                </div>');
            redirect('buku');
        }
    }

    public function edit_buku($id)
    {
        $data['kategori'] = $this->Kategori_model->getKategori();
        $data['buku'] = $this->db->get_where('buku', ['id_buku' => $id])->row_array();
        $check = $this->db->get_where('buku', ['id_buku' => $id])->row_array();

        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required|trim', [
            'required' => 'Kategori tidak boleh kosong!'
        ]);

        if ($check['isbn'] != $this->input->post('isbn')) {
            $this->form_validation->set_rules('isbn', 'ISBN', 'required|trim|numeric|min_length[13]|max_length[13]|is_unique[buku.isbn]', [
                'required' => 'ISBN tidak boleh kosong!',
                'is_unique' => 'ISBN sudah terdaftar!',
                'numeric' => 'ISBN harus berupa angka!',
                'min_length' => 'ISBN harus 13 digit!',
                'max_length' => 'ISBN harus 13 digit!',
            ]);
        } else {
            $this->form_validation->set_rules('isbn', 'ISBN', 'required|trim|numeric|min_length[13]|max_length[13]', [
                'required' => 'ISBN tidak boleh kosong!',
                'numeric' => 'ISBN harus berupa angka!',
                'min_length' => 'ISBN harus 13 digit!',
                'max_length' => 'ISBN harus 13 digit!',
            ]);
        }

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

        if ($this->form_validation->run() == false) {
            $this->load->view('panel/dash_header');
            $this->load->view('panel/dash_sidebar');
            $this->load->view('page/buku/edit_buku', $data);
            $this->load->view('panel/dash_footer');
        } else {
            $this->Buku_model->editBuku();

            $image = $_FILES['gambar']['name'];
            if ($image) {
                $config['upload_path'] = './assets/buku/img/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('gambar')) {
                    $this->Buku_model->updateImage($check['id_buku']);
                } else {
                    $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
                        <p> Edit Buku Gagal !</p>
                    </div></div>');
                    redirect('buku');
                }
            }

            $pdf = $_FILES['lampiran']['name'];
            if ($pdf) {
                $config['upload_path'] = './assets/buku/pdf/';
                $config['allowed_types'] = 'pdf';
                $config['encrypt_name'] = TRUE;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('lampiran')) {
                    $this->Buku_model->updatePdf($check['id_buku']);
                } else {
                    $this->session->set_flashdata('pesan', '<div id="notifikasi"><div class="alert alert-success">
                        <p> Edit Buku Gagal !</p>
                    </div></div>');
                    redirect('buku');
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Sukses!</strong> Buku berhasil diedit!.
                </div>');
            redirect('buku');
        }
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
