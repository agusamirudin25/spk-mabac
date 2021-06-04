<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuesioner extends CI_Controller
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
        $this->load->model('Admin_model', 'admin_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['judul'] = 'Kuesioner';
        $data['karyawan'] = $this->admin_model->getAllData('v_kuesioner');
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('kuesioner/lihat_kuesioner', $data);
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

    public function isi_kuesioner($kode)
    {
        $data['karyawan'] = $this->admin_model->getAllData('karyawan', ['kode' => $kode])->row_array();
        $data['kuesioner'] = $this->admin_model->getAllData('pertanyaan')->result_array();
        $data['opsi'] = $this->admin_model->getAllData('opsi')->result();
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('kuesioner/isi_kuesioner', $data);
        $this->load->view('templates/footer-user');
    }

    public function simpan_kuesioner()
    {
        $input = $this->input->post(null, TRUE);
        $data = [];
        $kode_pertanyaan = $input['kode_pertanyaan'];
        $_count = count($kode_pertanyaan);
        $_temp = 0;
        $_i = 1;
        foreach ($kode_pertanyaan as $br) :
            $data[] = [
                'kode_alternatif' => $input['kode_alternatif'],
                'kode_pertanyaan' => $br,
                'nilai' => $input['jawaban_' . $_i]
            ];
            $_temp += $input['jawaban_' . $_i++];
        endforeach;
        $insert = $this->admin_model->insertBatch('kuesioner', $data);
        if ($insert) {
            $kondisi = ['kd_alternatif' => $input['kode_alternatif'], 'kd_kriteria' => 'C2'];
            $_cek = $this->admin_model->getAllData('penilaian', $kondisi);
            $avg = round((float) $_temp / $_count, 2);
            $data_penilaian = [
                'kd_alternatif' => $input['kode_alternatif'],
                'kd_kriteria' => 'C2',
                'nilai' => $avg,
                'status' => 1
            ];
            if ($_cek->num_rows() > 0) :
                $this->admin_model->updateData('penilaian', $data_penilaian, $kondisi);
            else :
                $this->admin_model->insertData('penilaian', $data_penilaian);
            endif;
            redirect('kuesioner');
        }
    }

    function ubah_kuesioner($kode)
    {
        $data['karyawan'] = $this->admin_model->getAllData('karyawan', ['kode' => $kode])->row_array();
        $data['pertanyaan'] = $this->admin_model->getAllData('v_pertanyaan', ['kode_alternatif' => $kode])->result_array();
        $data['opsi'] = $this->admin_model->getAllData('opsi')->result();
        $this->load->view('templates/header-user');
        $this->load->view('templates/sidebar-user');
        $this->load->view('kuesioner/ubah_kuesioner', $data);
        $this->load->view('templates/footer-user');
    }

    function proses_ubah_kuesioner()
    {
        $input = $this->input->post(null, TRUE);
        $kode_pertanyaan = $input['kode_pertanyaan'];
        $_count = count($kode_pertanyaan);
        $_temp = 0;
        $_i = 1;
        foreach ($kode_pertanyaan as $br) :
            $_kondisi = [
                'kode_alternatif' => $input['kode_alternatif'],
                'kode_pertanyaan' => $br
            ];
            $data = [
                'nilai' => $input['jawaban_' . $_i]
            ];
            $this->admin_model->updateData('kuesioner', $data, $_kondisi);
            $_temp += $input['jawaban_' . $_i++];
        endforeach;
        $kondisi = ['kd_alternatif' => $input['kode_alternatif'], 'kd_kriteria' => 'C2'];
        $_cek = $this->admin_model->getAllData('penilaian', $kondisi);
        $avg = round((float) $_temp / $_count, 2);
        $data_penilaian = [
            'kd_alternatif' => $input['kode_alternatif'],
            'kd_kriteria' => 'C2',
            'nilai' => $avg,
            'status' => 1
        ];
        if ($_cek->num_rows() > 0) :
            $this->admin_model->updateData('penilaian', $data_penilaian, $kondisi);
        else :
            $this->admin_model->insertData('penilaian', $data_penilaian);
        endif;
        redirect('kuesioner');
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
