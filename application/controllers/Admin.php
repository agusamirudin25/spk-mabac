<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');

        //cek session
        if (!$this->session->userdata('username')) {
            redirect('auth');
        } elseif ($this->session->userdata('role_id') != 1) {
            redirect('auth/blocked');
        }
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    //Menu Kelola Karyawan

    public function karyawan()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData($table = 'karyawan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_karyawan', $data);
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
            $this->load->view('admin/tambah_karyawan', $data);
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
            redirect('admin/karyawan');
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
            $this->load->view('admin/ubah_karyawan', $data);
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
            redirect('admin/karyawan');
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
        redirect('admin/karyawan');
    }

    public function cari_karyawan()
    {
        $data['judul'] = 'User Page';
        $data['karyawan'] = $this->Admin_model->cari_dataKaryawan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_karyawan', $data);
        $this->load->view('templates/footer');
    }

    //     Menu Kelola Pengguna     //

    public function pengguna()
    {
        $data['users'] = $this->Admin_model->lihat_user();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_user', $data);
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
            $this->load->view('admin/tambah_user', $data);
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
            redirect('admin/pengguna'); //pindah ke controller 'Admin', method 'pengguna'
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
            $this->load->view('admin/ubah_user', $data);
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
            redirect('admin/pengguna');
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

        redirect('admin/pengguna');
    }

    public function cari_user()
    {
        $data['judul'] = 'User Page';
        $data['users'] = $this->Admin_model->cari_userData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_user', $data);
        $this->load->view('templates/footer');
    }

    //Menu Kriteria
    public function kriteria()
    {
        $data['judul'] = 'Kriteria';
        $data['criteria'] = $this->Admin_model->getAllData($table = 'kriteria');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_kriteria', $data);
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
            $this->load->view('admin/tambah_kriteria', $data);
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
            redirect('admin/kriteria');
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
            $this->load->view('admin/ubah_kriteria', $data);
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
            redirect('admin/kriteria');
        }
    }

    public function detail_kriteria()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_detailKriteria');
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
        redirect('admin/kriteria');
    }

    public function cari_kriteria()
    {
        $data['judul'] = 'Criteria List';
        $data['criteria'] = $this->Admin_model->cari_dataKriteria();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_kriteria', $data);
        $this->load->view('templates/footer');
    }

    // Menu Kuesioner

    public function kuesioner()
    {
        $data['judul'] = 'Kuesioner';
        $data['kuisioner'] = $this->Admin_model->getAllData($table = 'kuisioner');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_kuesioner', $data);
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
        $this->form_validation->set_rules('nilai1', 'Nilai 1', 'trim|required', [
            'required' => 'Nilai harus diisi',
        ]);
        $this->form_validation->set_rules('nilai2', 'Nilai 2', 'trim|required', [
            'required' => 'Nilai harus diisi',
        ]);
        $this->form_validation->set_rules('nilai3', 'Nilai 3', 'trim|required', [
            'required' => 'Nilai harus diisi',
        ]);
        $this->form_validation->set_rules('nilai4', 'Nilai 4', 'trim|required', [
            'required' => 'Nilai harus diisi',
        ]);
        $this->form_validation->set_rules('nilai5', 'Nilai 5', 'trim|required', [
            'required' => 'Nilai harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->insertData($table = 'kuisioner', $data = [
                'kode' => $this->input->post('kode'),
                'pertanyaan' => $this->input->post('pertanyaan', true),
                'nilai1' => $this->input->post('nilai1', true),
                'nilai2' => $this->input->post('nilai2', true),
                'nilai3' => $this->input->post('nilai3', true),
                'nilai4' => $this->input->post('nilai4', true),
                'nilai5' => $this->input->post('nilai5', true)
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
            redirect('admin/kuesioner');
        }
    }

    public function ubah_pertanyaan($kode)
    {
        $data['judul'] = 'Ubah Pertanyaan';
        $data['kuisioner'] = $this->Admin_model->getDataById($table = 'kuisioner', $where = ['kode' => $kode]);

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required|max_length[100]', [
            'required' => 'Pertanyaan harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/ubah_pertanyaan', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->updateData($table = 'kuisioner', $data = ['pertanyaan' => $this->input->post('pertanyaan', true)], $where = ['kode' => $kode]);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Pertanyaan <strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('admin/kuesioner');
        }
    }

    public function hapus_pertanyaan($kode)
    {
        $this->Admin_model->deleteData($table = 'kuisioner', $where = ['kode' => $kode]);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
						Data pertanyaan <strong>berhasil dihapus</strong>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
        );
        redirect('admin/kuesioner');
    }

    public function keputusan()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData($table = 'karyawan');
        $data['keputusan'] = $this->Admin_model->getAllData($table = 'keputusan');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('admin/lihat_keputusan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi($kode)
    {
        $this->db->update('keputusan', ['status' => 1], ['kode' => $kode]);
        redirect('admin/keputusan');
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
            $this->load->view('admin/tambah_penilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $Nilaic01 = $this->input->post('c01');
            if (($Nilaic01 >= 280) && ($Nilaic01 <= 290)) {
                $c01 = 5;
            } elseif (($Nilaic01 >= 270) && ($Nilaic01 <= 279)) {
                $c01 = 4;
            } elseif (($Nilaic01 >= 260) && ($Nilaic01 <= 269)) {
                $c01 = 3;
            } elseif (($Nilaic01 >= 250) && ($Nilaic01 <= 259)) {
                $c01 = 2;
            } else {
                $c01 = 1;
            }

            $c02 = $this->input->post('c02');

            $Nilaic03 = $this->input->post('c03');
            if ($Nilaic03 >= 5) {
                $c03 = 5;
            } elseif (($Nilaic03 > 3) && ($Nilaic03 <= 4)) {
                $c03 = 4;
            } elseif (($Nilaic03 > 2) && ($Nilaic03 <= 3)) {
                $c03 = 3;
            } elseif (($Nilaic03 > 1) && ($Nilaic03 <= 2)) {
                $c03 = 2;
            } else {
                $c03 = 1;
            }

            $this->Admin_model->insertData($table = 'keputusan', [
                'kode' => $this->input->post('kode'),
                'nama' => $this->input->post('nama', true),
                'c01' => $c01,
                'c02' => $c02,
                'c03' => $c03,
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
            redirect('admin/keputusan');
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
            $this->load->view('admin/ubah_penilaian', $data);
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
            redirect('admin/keputusan');
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
        redirect('admin/keputusan');
    }
}
