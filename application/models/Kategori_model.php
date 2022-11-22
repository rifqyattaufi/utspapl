<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Kategori_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getKategori()
    {
        return $this->db->get_where('kategori', ['is_deleted' => 0])->result_array();
    }

    public function addKategori()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->db->insert('kategori', $data);
    }

    public function deleteKategori($id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori');
    }
}