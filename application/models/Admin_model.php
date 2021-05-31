<?php
class Admin_model extends CI_Model
{

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteData($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function getAllData($table)
    {
        return $this->db->get($table);
    }

    public function getDataById($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }


    // Menampilkan data karyawan
    public function lihat_karyawan()
    {
        return $this->db->get('karyawan')->result_array();
    }

    public function cari_dataKaryawan()
    {
        $nama = $this->input->post('keyword', true);
        $this->db->like('nama', $nama);
        return $this->db->get('karyawan');
    }

    //Menampilkan Data Pengguna

    public function lihat_user()
    {
        return $this->db->query('SELECT us.nik, us.username, us.nama, ur.deskripsi FROM user us, user_role ur WHERE us.role_id = ur.role_id ORDER BY us.nik DESC');
    }

    public function delUserByUname($username)
    {
        if ($username == 'SuperAdmin') {
            return 1;  //superAdmin tidak dapat dihapus
        } elseif ($username == $this->session->userdata('username')) {
            return 1;
        } else {
            $this->db->delete('user', ['username' => $username]); //DELETE FROM user WHERE username = username
            return $this->db->get_where('user', ['username' => $username])->num_rows();
        }
    }

    public function cari_userData()
    {
        $nama = $this->input->post('keyword', true);
        $this->db->select('us.nik, us.username, us.nama, ur.deskripsi');
        $this->db->from('user us, user_role ur');
        $this->db->like('us.nama', $nama);
        $this->db->where('us.role_id = ur.role_id');
        return $this->db->get();
        //SELECT us.username, us.nama, ur.deskripsi FROM user us, user_role ur WHERE us.nama LIKE '%nama%' AND us.role_id = ur.role_id
        //return $this->db->select('us.username, us.nama, ur.deskripsi')->from('user us')->join('user_role ur', 'us.role_id = ur.role_id')->like('us.nama', $nama)->get();
    }

    //Menampilkan Data Kriteria

    public function lihat_kriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }

    public function getCriteriaCode()
    {
        $kode = $this->db->select_max('kode')->get('kriteria')->row_array();
        if (is_null($kode['kode'])) {
            $kdKriteria = "C" . "01";
        } else {
            $id = substr($kode['kode'], 1);
            $nilai = (int) $id;
            $nilai += 1;
            $kdKriteria = "C" . str_pad($nilai, 2, "0", STR_PAD_LEFT);
        }
        return $kdKriteria;
    }

    public function cari_dataKriteria()
    {
        $nama = $this->input->post('keyword', true);
        $this->db->like('nama', $nama);
        return $this->db->get('kriteria');
        //SELECT * FROM kriteria WHERE nama LIKE %nama%
    }

    //Menampilkan Data Kuesioner
    public function lihat_kuesioner()
    {
        return $this->db->get('kuisioner')->result_array();
    }

    public function getKuisCode()
    {
        $kode = $this->db->select_max('kode')->get('kuisioner')->row_array();
        if (is_null($kode['kode'])) {
            $kdKuis = "P" . "01";
        } else {
            $id = substr($kode['kode'], 1);
            $nilai = (int) $id;
            $nilai += 1;
            $kdKuis = "P" . str_pad($nilai, 2, "0", STR_PAD_LEFT);
        }
        return $kdKuis;
    }

    //keputusan
    public function getAlternatifCode()
    {
        $kode = $this->db->select_max('kode')->get('keputusan')->row_array();
        if (is_null($kode['kode'])) {
            $kdKeputusan = "A" . "01";
        } else {
            $id = substr($kode['kode'], 1);
            $nilai = (int) $id;
            $nilai += 1;
            $kdKeputusan = "A" . str_pad($nilai, 2, "0", STR_PAD_LEFT);
        }
        return $kdKeputusan;
    }
}
