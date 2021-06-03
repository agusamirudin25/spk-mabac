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
        } elseif ($this->session->userdata('role_id') != 1) {
            redirect('login/blocked');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('beranda/index');
        $this->load->view('templates/footer');
    }
}
