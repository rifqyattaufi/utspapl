<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __controler()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('role') == 1) {
            redirect('user');
        } else if ($this->session->userdata('role') == 2) {
            redirect('admin');
        }

        $data['title'] = 'Login Page';

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $this->load->model('User_model');

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->getUserByEmail($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'name' => $user['name'],
                    'role' => $user['role']
                ];
                $this->session->set_userdata($data);
                redirect('user');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email not found</div>');
            redirect('auth');
        }
    }


    public function register()
    {
        if ($this->session->userdata('role') == 1) {
            redirect('user');
        } else if ($this->session->userdata('role') == 2) {
            redirect('admin');
        }
        $this->load->model('User_model');

        $data['title'] = 'User Registration';


        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[repeat]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('repeat', 'Repeat Password', 'required|trim|matches[password]', [
            'matches' => 'Repeat Password dont match!'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $this->User_model->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
            redirect('auth');
        }
    }

    function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role'); 

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}
