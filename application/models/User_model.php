<?php

class User_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getUserByEmail($email)
    {
        return $this->db->get_where('user', ['email' => $email])->row_array();
    }

    public function register()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function countUser()
    {
        return $this->db->get('user')->num_rows();
    }
}
