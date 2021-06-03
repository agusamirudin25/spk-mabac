<?php

class Karyawan extends CI_Controller
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
        $this->load->view('karyawan/index');
        $this->load->view('templates/footer');
    }

    //Menu Kelola Karyawan

    public function karyawan()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData($table = 'karyawan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/lihat_karyawan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_karyawan()
    {
        $data['judul'] = 'Tambah Karyawan';
        $data['nik'] = $this->Admin_model->getCriteriaCode();

        $this->form_validation->set_rules('nik', 'Nik', 'required', [
            'required' => 'Nik Harus Diisi'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[20]', [
            'required' => 'Nama harus diisi',
            'max_length' => 'Maksimal 20 karakter'
        ]);
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required|max_length[10]', [
            'required' => 'Nama Alias harus diisi',
            'max_length' => 'Maksimal 10 karakter'
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', [
            'required' => 'Pendidikan Harus diisi'
        ]);

        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', [
            'required' => 'Jabatan harus diiisi'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', [
            'required' => 'Tanggal masuk harus diisi'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('karyawan/tambah_karyawan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->insertData($table = 'karyawan', [
                'nik' => $this->input->post('nik'),
                'nama' => $this->input->post('nama', true),
                'alias' => $this->input->post('alias'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'tgl_masuk' => $this->input->post('tgl_masuk')
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Kriteria baru <strong>berhasil dibuat</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('karyawan/karyawan');
        }
    }

    public function ubah_karyawan($nik)
    {
        $data['judul'] = 'Ubah Karyawan';
        $data['karyawan'] = $this->Admin_model->getDataById($table = 'karyawan', $where = ['nik' => $nik]);

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Depan harus diisi',
        ]);
        $this->form_validation->set_rules('alias', 'Nama Alias', 'required|trim|max_length[10]', [
            'required' => 'Nama Alias harus diisi',
            'max_length' => 'Maksimal 10 karakter'
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required', [
            'required' => 'Pendidikan harus diisi'
        ]);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required', [
            'required' => 'Jabatan harus diisi'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'trim|required', [
            'required' => 'Tanggal masuk harus diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('karyawan/ubah_karyawan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'karyawan', $data = [
                'nama' => $this->input->post('nama', true),
                'alias' => $this->input->post('alias'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'tgl_masuk' => $this->input->post('tgl_masuk')
            ], $where = ['nik' => $nik]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data kriteria <strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('karyawan/karyawan');
        }
    }

    public function hapus_karyawan($nik)
    {
        $this->Admin_model->deleteData($table = 'karyawan', $where = ['nik' => $nik]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data kriteria <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
        );
        redirect('karyawan/karyawan');
    }

    public function cari_karyawan()
    {
        $data['judul'] = 'User Page';
        $data['karyawan'] = $this->Admin_model->cari_dataKaryawan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('karyawan/lihat_karyawan', $data);
        $this->load->view('templates/footer');
    }
}
