<?php
class Admin_model extends CI_Model
{

    // ./LOGIN //
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //mengambil satu baris data yang username-nya sesuai dengan username yang diinput
        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        //jika ada usernya
        if ($user) {
            //jika passwordnya sama
            if ($user['password'] == $password) {
                //pemberian session
                $data = [
                    'username' => $user['username'],
                    'nama' => $user['nama'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                return $this->db->get_where('user', ['username' => $username])->num_rows();
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Password <strong>salah!</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
                );
                return $data = 0;
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					Pengguna <strong>tidak</strong> ditemukan
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
        }
    }
    // ./END LOGIN //

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function deleteData($table, $where)
    {
        $this->db->delete($table, $where);
    }

    public function getAllData($table, $where = [])
    {
        return $this->db->get_where($table, $where);
    }

    public function getDataById($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    function insertBatch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        return $this->db->affected_rows();
    }


    // Menampilkan data karyawan
    public function lihat_karyawan()
    {
        return $this->db->get('karyawan')->result_array();
    }

    public function cari_dataKaryawan()
    {
        $nama = $this->input->post('keyword', true);
        $this->db->like('alias', $nama);
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
        return $this->db->get('pertanyaan')->result_array();
    }

    public function getKuisCode()
    {
        $kode = $this->db->select_max('kode')->get('pertanyaan')->row_array();
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

    public function getLastId($table, $field, $abjad)
    {
        $kode = $this->db->select_max($field)->get($table)->row_array();
        if (is_null($kode['kode'])) {
            $kode_terakhir = $abjad . "01";
        } else {
            $id = substr($kode['kode'], 1);
            $nilai = (int) $id;
            $nilai += 1;
            $kode_terakhir = $abjad . str_pad($nilai, 2, "0", STR_PAD_LEFT);
        }
        return $kode_terakhir;
    }
    function getMax($table, $field)
    {
        return $this->db->select_max($field)->get($table)->row();
    }
    function getMin($table, $field)
    {
        return $this->db->select_min($field)->get($table)->row();
    }
}
