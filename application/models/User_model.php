<?php

class User_model extends CI_model
{
    public function getAllData($table)
    {
        return $this->db->get($table);
    }

    public function getDataById($table, $where)
    {
        return $this->db->get_where($table, $where)->row_array();
    }

    //Karyawan//

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

    //kuesioner

    public function getPertanyaan()
    {
        return $this->db->get('kuisioner')->result_array();
    }
}
