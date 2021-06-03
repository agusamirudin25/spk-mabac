<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        //cek session
        if (!$this->session->userdata('username')) {
            redirect('login');
        } elseif ($this->session->userdata('role_id') != 2) {
            redirect('login/blocked');
        }

        $this->load->model('User_model', 'user_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/index');
        $this->load->view('templates/footer-user');
    }

    public function karyawan()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->user_model->getAllData($table = 'karyawan');
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/lihat_karyawan', $data);
        $this->load->view('templates/footer-user');
    }

    public function cari_karyawan()
    {
        $data['karyawan'] = $this->user_model->cari_dataKaryawan();
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/lihat_karyawan', $data);
        $this->load->view('templates/footer-user');
    }

    public function kuesioner()
    {
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->user_model->getAllData($table = 'karyawan');
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/lihat_kuesioner', $data);
        $this->load->view('templates/footer-user');
    }

    public function cari_kuesioner()
    {
        $data['karyawan'] = $this->user_model->cari_dataKaryawan();
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/lihat_kuesioner', $data);
        $this->load->view('templates/footer-user');
    }

    public function isi_kuesioner($nik)
    {
        $data['karyawan'] = $this->user_model->getDataById($table = 'karyawan', $where = ['nik' => $nik]);
        $data['kuisioner'] = $this->user_model->getPertanyaan();

        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('user/isi_kuesioner', $data);
        $this->load->view('templates/footer-user');
    }

    public function simpan_kuisioner()
    {
        $pertanyaan = $this->user_model->getPertanyaan();
        $nik = $this->input->post('nik');

        foreach ($pertanyaan as $p) {
            $data = [
                'id' => '',
                'nik' => $nik,
                'kode_pertanyaan' => $this->input->post('kode_' . $p['kode']),
                'nilai' => $this->input->post('jawab_' . $p['kode']),
            ];
            // var_dump($data);
            // die;
            $this->db->insert('isi_kuisioner', $data);
            //
        }
        redirect('user/kuesioner');
    }

    public function hitung_kuesioner($nik)
    {
        $dataSum = $this->db->select_sum('nilai')->get('isi_kuisioner')->result_array();
        $jumlahPertanyaan = $this->db->get('kuisioner')->num_rows();
        $avg = (int)$dataSum / $jumlahPertanyaan;
        if ($avg > 35) {
            $nilai = 5;
        } elseif (($avg >= 30) && ($avg <= 34)) {
            $nilai = 4;
        } elseif (($avg >= 25) && ($avg <= 29)) {
            $nilai = 3;
        } elseif (($avg >= 20) && ($avg <= 24)) {
            $nilai = 2;
        } elseif ($avg <= 34) {
            $nilai = 1;
        }
    }
}
