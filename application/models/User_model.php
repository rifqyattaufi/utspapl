<?php

class User_model extends CI_Model
{

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
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 1,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }
}
