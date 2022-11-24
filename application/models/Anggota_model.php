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
        return $this->db->get_where('user', ['role' => 1, 'is_deleted' => 0])->result_array();
    }
}

?>