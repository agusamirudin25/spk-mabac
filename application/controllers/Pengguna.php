<?php

class Pengguna extends CI_Controller
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
        $this->load->view('pengguna/index');
        $this->load->view('templates/footer');
    }

    //     Menu Kelola Pengguna     //

    public function pengguna()
    {
        $data['users'] = $this->Admin_model->lihat_user();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/lihat_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_user()
    {
        // var_dump($data); die;
        $data['role'] = $this->Admin_model->getAllData($table = 'user_role');
        // var_dump($data['role']); die;
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required', [
            'required' => 'Nik harus diisi'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[user.username]', [
            'required' => 'Username harus diisi',
            'is_unique' => 'Username tersebut telah digunakan'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password minimal berisikan 6 karakter'
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'required', [
            'required' => 'Role harus dipilih'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('pengguna/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->insertData($table = 'user', $data = [
                'nik' => $this->input->post('nik', true),
                'username' => strtolower($this->input->post('username', true)),
                'nama' => $this->input->post('nama', true),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role_id')
            ]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pengguna baru <strong>berhasil dibuat</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('pengguna/pengguna'); //pindah ke controller 'Admin', method 'pengguna'
        }
    }

    public function ubah_user($nik)
    {
        $data['judul'] = 'Ubah Profil';
        $data['role'] = $this->Admin_model->getAllData($table = 'user_role');
        $data['user'] = $this->Admin_model->getDataById($table = 'user', $where = ['nik' => $nik]);

        //set rules buat form validation
        $this->form_validation->set_rules('nik', 'Nik', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username harus diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]', [
            'required' => 'Password harus diisi',
            'min_length' => 'Password berisikan minimal 6 karakter',
        ]);
        $this->form_validation->set_rules('role_id', 'Role', 'trim|required', [
            'required' => 'Role harus dipilih'
        ]);


        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pengguna/ubah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'user', $data = [
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role_id')
            ], $where = ['nik' => $nik]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data pengguna <strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('pengguna/pengguna');
        }
    }

    public function hapus_user($username)
    {
        if ($this->Admin_model->delUserByUname($username) > 0) {
            //data gagal dihapus
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						Data <strong>tidak dapat dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
            );
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data pengguna <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
            );
        }

        redirect('pengguna/pengguna');
    }

    public function cari_user()
    {
        $data['judul'] = 'User Page';
        $data['users'] = $this->Admin_model->cari_userData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pengguna/lihat_user', $data);
        $this->load->view('templates/footer');
    }
}
