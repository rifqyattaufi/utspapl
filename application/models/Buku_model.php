<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Buku_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllBuku()
    {
        return $this->db->get_where('buku', ['is_deleted' => 0])->result_array();
    }

    public function addBuku()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'isbn' => $this->input->post('isbn'),
            'judul_buku' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_buku' => $this->input->post('tahun'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('buku', $data);
    }

    public function addImage()
    {
        $last_row = $this->db->select('id_buku')->order_by('id_buku', "desc")->limit(1)->get('buku')->row();

        $this->db->set('sampul', $this->upload->data('file_name'))->where('id_buku', $last_row->id_buku)->update('buku');
    }

    public function addPdf()
    {
        $last_row = $this->db->select('id_buku')->order_by('id_buku', "desc")->limit(1)->get('buku')->row();

        $this->db->set('lampiran', $this->upload->data('file_name'))->where('id_buku', $last_row->id_buku)->update('buku');
    }

    public function updateImage($id)
    {
        $this->db->set('sampul', $this->upload->data('file_name'))->where('id_buku', $id)->update('buku');
    }

    public function updatePdf($id)
    {
        $this->db->set('lampiran', $this->upload->data('file_name'))->where('id_buku', $id)->update('buku');
    }

    public function getBuku($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row_array();
    }

    public function countBuku()
    {
        return $this->db->get_where('buku', ['is_deleted' => 0])->num_rows();
    }

    public function deleteBuku($id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }

    public function editBuku()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori'),
            'isbn' => $this->input->post('isbn'),
            'judul_buku' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_buku' => $this->input->post('tahun'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->where('id_buku', $this->input->post('id_buku'))->update('buku', $data);
    }



    //belum dipake
    public function setTersedia($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }

    //belum dipake
    public function setDipinjam($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id_buku', $id);
        $this->db->update('buku');
    }
}
