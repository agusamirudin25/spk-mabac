<?php

class Keputusan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //cek session
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->model('Admin_model');
    }


    public function index()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData($table = 'karyawan')->result();
        $data['keputusan'] = $this->Admin_model->getAllData($table = 'keputusan');
        $penilaian = $this->Admin_model->getAllData('v_penilaian')->result();
        $_data = [];
        foreach ($penilaian as $br) :
            if ($br->C2 == NULL || $br->C1 == NULL) {
                $_data[] = [
                    'kode' => $br->kode_alternatif,
                    'nama' => $br->nama_alternatif,
                    'alias' => $br->alias,
                    'C1' => (int)$br->C1,
                    'C2' => (float)$br->C2,
                    'C3' => (int)$br->C3,
                    'C4' => (int)$br->C4,
                    'C5' => (int)$br->C5,
                    'status' => 0
                ];
            } else {
                $_data[] = [
                    'kode' => $br->kode_alternatif,
                    'nama' => $br->nama_alternatif,
                    'alias' => $br->alias,
                    'C1' => (int)$br->C1,
                    'C2' => (float)$br->C2,
                    'C3' => (int)$br->C3,
                    'C4' => (int)$br->C4,
                    'C5' => (int)$br->C5,
                    'status' => 1
                ];
            }

        endforeach;
        $data['penilaian'] = $_data;
        $this->load->view('templates/header', $data);
        if ($this->session->role_id == 1) {
            $this->load->view('templates/sidebar');
        } else {
            $this->load->view('templates/sidebar-user');
        }
        $this->load->view('keputusan/lihat_keputusan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function konfirmasi($kode)
    {
        $this->db->update('keputusan', ['status' => 1], ['kode' => $kode]);
        redirect('keputusan');
    }

    public function tambah_penilaian($kode)
    {
        $data['judul'] = 'Tambah Karyawan';
        $data['karyawan'] = $this->Admin_model->getAllData('karyawan', ['kode' => $kode])->row();
        $data['kriteria'] = $this->Admin_model->getAllData('kriteria')->result();
        $nilai_c2 = $this->Admin_model->getAllData('penilaian', ['kd_alternatif' => $kode, 'kd_kriteria' => 'C2'])->row();
        if ($nilai_c2) {
            $data['nilai_c2'] = (float) $nilai_c2->nilai;
        } else {
            $data['nilai_c2'] = 0;
        }
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Kriteria Absensi harus diisi',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('keputusan/tambah_penilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, true);
            $_data = [];
            $nilai = $input['nilai'];
            $kd_kriteria = $input['kd_kriteria'];
            $i = 0;
            foreach ($nilai as $n) :
                $_data[] = [
                    'kd_alternatif' => $kode,
                    'kd_kriteria' => $kd_kriteria[$i++],
                    'nilai' => $n,
                    'status' => 1
                ];
            endforeach;

            $insert = $this->Admin_model->insertBatch('penilaian', $_data);
            if ($insert) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Kriteria baru <strong>berhasil dibuat</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
					</button>
                    </div>'
                );
                redirect('keputusan');
            }
        }
    }

    public function ubah_penilaian($kode)
    {
        $data['judul'] = 'Ubah Keputusan';
        $data['keputusan'] = $this->Admin_model->getDataById($table = 'v_penilaian', $where = ['kode_alternatif' => $kode]);
        $data['kriteria'] = $this->Admin_model->getAllData('kriteria')->result();
        $this->form_validation->set_rules('kode', 'Kode', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi',
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            if ($this->session->role_id == 1) {
                $this->load->view('templates/sidebar');
            } else {
                $this->load->view('templates/sidebar-user');
            }
            $this->load->view('keputusan/ubah_penilaian', $data);
            $this->load->view('templates/footer');
        } else {
            $input = $this->input->post(null, TRUE);
            $kd_kriteria = $input['kd_kriteria'];
            $i = 0;
            foreach ($input['nilai'] as $nilai) :
                $dataUpdate = [
                    'kd_kriteria' => $kd_kriteria[$i],
                    'nilai' => $nilai,
                ];
                $where = [
                    'kd_alternatif' => $kode,
                    'kd_kriteria' => $kd_kriteria[$i++]
                ];

                $this->Admin_model->updateData('penilaian', $dataUpdate, $where);
            endforeach;

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					Nilai<strong>berhasil diperbarui</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('keputusan');
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
        redirect('keputusan');
    }

    function buat_keputusan()
    {
        $waktuAwal = microtime(true);
        $penilaian = $this->Admin_model->getAllData('v_penilaian')->result();
        $kriteria = $this->Admin_model->getAllData('kriteria')->result();
        $karyawan = $this->Admin_model->getAllData('v_penilaian')->result();

        // NORMALISASI
        $nilai_max['C1'] = $this->Admin_model->getMax('v_penilaian', 'C1')->C1;
        $nilai_max['C2'] = $this->Admin_model->getMax('v_penilaian', 'C2')->C2;
        $nilai_max['C3'] = $this->Admin_model->getMax('v_penilaian', 'C3')->C3;
        $nilai_max['C4'] = $this->Admin_model->getMax('v_penilaian', 'C4')->C4;
        $nilai_max['C5'] = $this->Admin_model->getMax('v_penilaian', 'C5')->C5;

        $nilai_min['C1'] = $this->Admin_model->getMin('v_penilaian', 'C1')->C1;
        $nilai_min['C2'] = $this->Admin_model->getMin('v_penilaian', 'C2')->C2;
        $nilai_min['C3'] = $this->Admin_model->getMin('v_penilaian', 'C3')->C3;
        $nilai_min['C4'] = $this->Admin_model->getMin('v_penilaian', 'C4')->C4;
        $nilai_min['C5'] = $this->Admin_model->getMin('v_penilaian', 'C5')->C5;
        $normalisasi = [];

        foreach ($penilaian as $br) {
            $normalisasi[$br->kode_alternatif]['C1'] = round((float) ($br->C1 - $nilai_min['C1']) / ($nilai_max['C1'] - $nilai_min['C1']), 2, PHP_ROUND_HALF_ODD);
            $normalisasi[$br->kode_alternatif]['C2'] = round((float) ($br->C2 - $nilai_min['C2']) / ($nilai_max['C2'] - $nilai_min['C2']), 2, PHP_ROUND_HALF_ODD);
            $normalisasi[$br->kode_alternatif]['C3'] = round((float) ($br->C3 - $nilai_min['C3']) / ($nilai_max['C3'] - $nilai_min['C3']), 2, PHP_ROUND_HALF_ODD);
            $normalisasi[$br->kode_alternatif]['C4'] = round((float) ($br->C4 - $nilai_min['C4']) / ($nilai_max['C4'] - $nilai_min['C4']), 2, PHP_ROUND_HALF_ODD);
            $normalisasi[$br->kode_alternatif]['C5'] = round((float) ($br->C5 - $nilai_min['C5']) / ($nilai_max['C5'] - $nilai_min['C5']), 2, PHP_ROUND_HALF_ODD);
        }

        // MATRIKS BOBOT KEPUTUSAN
        $_matriks = [];
        foreach ($karyawan as $alternatif) {
            // $bobot = $krt->bobot;
            $_matriks[$alternatif->kode_alternatif]['kode'] = $alternatif->kode_alternatif;
            foreach ($kriteria as $krt) {
                $_temp = ($krt->bobot * $normalisasi[$alternatif->kode_alternatif][$krt->kode]) + $krt->bobot;
                array_push($_matriks[$alternatif->kode_alternatif], $_temp);
            }
        }

        // MATRIKS BATAS (G)
        $_g = [];
        $_count = count($_matriks);
        $wadah = [];
        $init = 1;
        $c1 = 1;
        $c2 = 1;
        $c3 = 1;
        $c4 = 1;
        $c5 = 1;
        foreach ($_matriks as $m) {
            $c1 *= $m[0];
            $c2 *= $m[1];
            $c3 *= $m[2];
            $c4 *= $m[3];
            $c5 *= $m[4];
        }
        $_g = [
            'C1' => pow($c1, 1 / $_count),
            'C2' => pow($c2, 1 / $_count),
            'C3' => pow($c3, 1 / $_count),
            'C4' => pow($c4, 1 / $_count),
            'C5' => pow($c5, 1 / $_count),
        ];

        // Perhitungan elemen matriks jarak alternatif dari daerah perkiraan perbatasn (Q)
        $_q = [];
        foreach ($_matriks as $m) {
            $_q[] = [
                'kode' => $m['kode'],
                'Q1' => $m[0] - $_g['C1'],
                'Q2' => $m[1] - $_g['C2'],
                'Q3' => $m[2] - $_g['C3'],
                'Q4' => $m[3] - $_g['C4'],
                'Q5' => $m[4] - $_g['C5']
            ];
        }

        // Perangkingan Alternatif (S)
        $_s = [];
        foreach ($_q as $perbatasan) {
            $getKaryawan = $this->Admin_model->getAllData('v_penilaian', ['kode_alternatif' => $perbatasan['kode']])->row();
            $_s[$getKaryawan->kode_alternatif] = [
                'nilai' => $perbatasan['Q1'] + $perbatasan['Q2'] + $perbatasan['Q3'] + $perbatasan['Q4'] + $perbatasan['Q5']
            ];
        }
        //inisialisasi waktu akhir
        $waktuAkhir = microtime(true);

        //sort berdasarkan nilai tertinggi
        arsort($_s);
        $mabac = [];
        foreach ($_s as $key => $hasilAkhir) {
            $alias = $this->Admin_model->getAllData('v_penilaian', ['kode_alternatif' => $key])->row()->alias;
            $mabac[] = [
                'kode' => $key,
                'alias' => $alias,
                'nilai' => $hasilAkhir['nilai']
            ];
        }
        //waktu eksekusi mabac
        $waktuTempuh = $waktuAkhir - $waktuAwal;
        $data['mabac'] = $mabac;
        $data['waktu'] = $waktuTempuh;
        $data['penilaian'] = $this->Admin_model->getAllData('v_penilaian');
        $this->load->view('templates/header', $data);
        if ($this->session->role_id == 1) {
            $this->load->view('templates/sidebar');
        } else {
            $this->load->view('templates/sidebar-user');
        }
        $this->load->view('keputusan/buat_keputusan', $data);
        $this->load->view('templates/footer', $data);
    }
}
