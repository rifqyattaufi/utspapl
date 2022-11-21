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
            'kategori_buku' => $this->input->post('kategori'),
            'isbn' => $this->input->post('isbn'),
            'judul_buku' => $this->input->post('judul'),
            'penulis' => $this->input->post('penulis'),
            'penerbit' => $this->input->post('penerbit'),
            'tahun_buku' => $this->input->post('tahun'),
            'keterangan' => $this->input->post('keterangan')
        ];

        $this->db->insert('buku', $data);
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