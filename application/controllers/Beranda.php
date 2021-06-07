<?php

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

        //cek session
        if (!$this->session->userdata('username')) {
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        if ($this->session->role_id == 1) {
            $this->load->view('templates/sidebar');
        } else {
            $this->load->view('templates/sidebar-user');
        }
        $this->load->view('beranda/index');
        $this->load->view('templates/footer');
    }
}
