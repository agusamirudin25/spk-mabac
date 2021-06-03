<?php

class Pertanyaan extends CI_Controller
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
        $this->load->view('login/index');
        $this->load->view('templates/footer');
    }

    // Menu Kuesioner

    public function kuesioner()
    {
        $data['judul'] = 'Kuesioner';
        $data['pertanyaan'] = $this->Admin_model->getAllData($table = 'pertanyaan');
        $data['isi_kuisioner'] = $this->Admin_model->getAllData($table = 'isi_kuisioner');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('pertanyaan/lihat_kuesioner', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambah_pertanyaan()
    {
        $data['judul'] = 'Tambah Pertanyaan';
        $data['kode'] = $this->Admin_model->getKuisCode();

        $this->form_validation->set_rules('kode', 'Kode', 'trim|required');
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required|max_length[100]', [
            'required' => 'Pertanyaan harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pertanyaan/tambah_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->insertData($table = 'pertanyaan', $data = [
                'kode' => $this->input->post('kode'),
                'pertanyaan' => $this->input->post('pertanyaan', true)
            ]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pertanyaan baru <strong>berhasil dibuat</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('pertanyaan/kuesioner');
        }
    }

    public function ubah_pertanyaan($kode)
    {
        $data['judul'] = 'Ubah Pertanyaan';
        $data['pertanyaan'] = $this->Admin_model->getDataById($table = 'pertanyaan', $where = ['kode' => $kode]);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required|max_length[100]', [
            'required' => 'Pertanyaan harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('pertanyaan/ubah_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'pertanyaan', $data = ['pertanyaan' => $this->input->post('pertanyaan', true)], $where = ['kode' => $kode]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pertanyaan <strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('pertanyaan/kuesioner');
        }
    }

    public function hapus_pertanyaan($kode)
    {
        $this->Admin_model->deleteData($table = 'pertanyaan', $where = ['kode' => $kode]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data pertanyaan <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
        );
        redirect('pertanyaan/kuesioner');
    }
}
