<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Anggota_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAnggota()
    {
        return $this->db->get_where('user', ['role' => 0, 'is_deleted' => 0])->result_array();
    }

    public function block($id)
    {
        $this->db->set('is_active', 0);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function activate($id)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $id);
        $this->db->update('user');
    }

    public function delete($id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
}