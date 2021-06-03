<?php

class Keputusan extends CI_Controller
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
        $this->load->view('keputusan/index');
        $this->load->view('templates/footer');
    }
    public function keputusan()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData($table = 'karyawan');
        $data['keputusan'] = $this->Admin_model->getAllData($table = 'keputusan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('keputusan/lihat_keputusan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi($kode)
    {
        $this->db->update('keputusan', ['status' => 1], ['kode' => $kode]);
        redirect('keputusan/keputusan');
    }

    public function tambah_penilaian($nik)
    {
        $data['judul'] = 'Tambah Karyawan';
        $data['karyawan'] = $this->Admin_model->getDataById($table = 'karyawan', $where = ['nik' => $nik]);
        $data['kode'] = $this->Admin_model->getAlternatifCode();

        // hitung kuesioner
        $dataSum = $this->db->select_sum('nilai')->get_where('isi_kuisioner', ['nik' => $nik])->row_array();
        $jumlahPertanyaan = $this->db->get('kuisioner')->num_rows();
        // var_dump($jumlahPertanyaan);
        $avg = (int)$dataSum / $jumlahPertanyaan;
        // var_dump($avg);
        if ($avg > 35) {
            $data['nilaic02'] = 5;
        } elseif (($avg >= 30) && ($avg <= 34)) {
            $data['nilaic02'] = 4;
        } elseif (($avg >= 25) && ($avg <= 29)) {
            $data['nilaic02'] = 3;
        } elseif (($avg >= 20) && ($avg <= 24)) {
            $data['nilaic02'] = 2;
        } elseif ($avg <= 34) {
            $data['nilaic02'] = 1;
        }

        $this->form_validation->set_rules('kode', 'Kode', 'trim|required', [
            'required' => 'Kriteria Absensi harus diisi',
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Kriteria Absensi harus diisi',
        ]);
        $this->form_validation->set_rules('c01', 'C01', 'trim|required', [
            'required' => 'Kriteria Absensi harus diisi',
        ]);
        $this->form_validation->set_rules('c02', 'C02', 'trim|required', [
            'required' => 'Kriteria Disiplin Kerja harus diisi',
        ]);
        $this->form_validation->set_rules('c03', 'C03', 'trim|required', [
            'required' => 'Kriteria Lama Bekerja harus diisi',
        ]);
        $this->form_validation->set_rules('c04', 'C04', 'trim|required', [
            'required' => 'Kriteria Kreatifitas harus diisi',
        ]);
        $this->form_validation->set_rules('c05', 'C05', 'trim|required', [
            'required' => 'Kriteria Pendidikan harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('keputusan/tambah_penilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $c02 = $this->input->post('c02');

            $this->Admin_model->insertData($table = 'keputusan', [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama', true),
                'c01' => $this->input->post('c01'),
                'c02' => $c02,
                'c03' => $this->input->post('c03'),
                'c04' => $this->input->post('c04'),
                'c05' => $this->input->post('c05')
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
            redirect('keputusan/keputusan');
        }
    }

    public function ubah_penilaian($kode)
    {
        $data['judul'] = 'Ubah Keputusan';
        $data['keputusan'] = $this->Admin_model->getDataById($table = 'keputusan', $where = ['kode' => $kode]);

        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi',
        ]);
        $this->form_validation->set_rules('c01', 'C01', 'required|trim|max_length[10]', [
            'required' => 'Kriteria Absensi harus diisi',
        ]);
        $this->form_validation->set_rules('c02', 'C02', 'required|trim|max_length[10]', [
            'required' => 'Kriteria Disiplin Kerja harus diisi',
        ]);
        $this->form_validation->set_rules('c03', 'C03', 'required|trim|max_length[10]', [
            'required' => 'Kriteria Lama Bekerja harus diisi',
        ]);
        $this->form_validation->set_rules('c04', 'C04', 'required|trim|max_length[10]', [
            'required' => 'Kriteria Kreatifitas harus diisi',
        ]);
        $this->form_validation->set_rules('c05', 'C05', 'required|trim|max_length[10]', [
            'required' => 'Kriteria Pendidikan harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('keputusan/ubah_penilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'keputusan', $data = [
                'nama' => $this->input->post('nama', true),
                'c01' => $this->input->post('c01'),
                'c02' => $this->input->post('c02'),
                'c03' => $this->input->post('c03'),
                'c04' => $this->input->post('c04'),
                'c05' => $this->input->post('c05')
            ], $where = ['kode' => $kode]);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Nilai<strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('keputusan/keputusan');
        }
    }

    public function hapus_penilaian($kode)
    {
        $this->Admin_model->deleteData($table = 'keputusan', $where = ['kode' => $kode]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Nilai <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
        );
        redirect('keputusan/keputusan');
    }
}
