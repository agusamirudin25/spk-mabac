<?php

class Kriteria extends CI_Controller
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
        $this->load->view('kriteria/index');
        $this->load->view('templates/footer');
    }

    //Menu Kriteria
    public function kriteria()
    {
        $data['judul'] = 'Kriteria';
        $data['criteria'] = $this->Admin_model->getAllData($table = 'kriteria');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/lihat_kriteria', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_kriteria()
    {
        $data['judul'] = 'Tambah Kriteria';
        $data['kode'] = $this->Admin_model->getCriteriaCode();

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[20]', [
            'required' => 'Nama kriteria harus diisi',
            'max_length' => 'Maksimal 20 karakter'
        ]);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required', [
            'required' => 'Pilih skala kepentingan'
        ]);

        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required', [
            'required' => 'Pilih tipe kriteria'
        ]);



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('kriteria/tambah_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->insertData($table = 'kriteria', [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama', true),
                'tipe' => $this->input->post('tipe'),
                'bobot' => $this->input->post('bobot')
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
            redirect('kriteria/kriteria');
        }
    }

    public function ubah_kriteria($kode)
    {
        $data['judul'] = 'Ubah Kriteria';
        $data['criteria'] = $this->Admin_model->getDataById($table = 'kriteria', $where = ['kode' => $kode]);

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[20]', [
            'required' => 'Nama kriteria harus diisi',
            'max_length' => 'Maksimal 20 karakter'
        ]);
        $this->form_validation->set_rules('bobot', 'Bobot', 'trim|required', [
            'required' => 'Pilih skala kepentingan'
        ]);
        $this->form_validation->set_rules('tipe', 'Tipe', 'trim|required', [
            'required' => 'Pilih tipe kriteria'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('kriteria/ubah_kriteria', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'kriteria', $data = [
                'nama' => $this->input->post('nama', true),
                'tipe' => $this->input->post('tipe'),
                'bobot' => $this->input->post('bobot')
            ], $where = ['kode' => $kode]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data kriteria <strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('kriteria/kriteria');
        }
    }

    public function detail_kriteria()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/lihat_detailKriteria');
        $this->load->view('templates/footer');
    }

    public function hapus_kriteria($kode)
    {
        $this->Admin_model->deleteData($table = 'kriteria', $where = ['kode' => $kode]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data kriteria <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
        );
        redirect('kriteria/kriteria');
    }

    public function cari_kriteria()
    {
        $data['judul'] = 'Criteria List';
        $data['criteria'] = $this->Admin_model->cari_dataKriteria();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('kriteria/lihat_kriteria', $data);
        $this->load->view('templates/footer');
    }
}
