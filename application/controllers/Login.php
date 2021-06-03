<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['judul'] = 'Login page';
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password minimal berisikan 6 karakter'
        ]);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header-login', $data);
            $this->load->view('login/login');
            $this->load->view('templates/footer-login');
        } else {
            if ($this->Admin_model->login() > 0) {
                if ($this->session->userdata('role_id') == 2) {
                    redirect('user');
                } else {
                    redirect('beranda');
                }
            } else {
                redirect('login');
            }
        }
    }

    public function blocked()
    {
        $data['judul'] = "Error Page";
        $this->load->view('templates/error-page', $data);
    }

    public function logout()
    {

        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Anda <strong>telah berhasil</strong> keluar
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
        );
        redirect('login');
    }
}
