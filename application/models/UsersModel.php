<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function getAllUserData()
    {
        return $this->db->get('tb_users')->result();
    }

    public function insertLaporan($data)
    {
        return $this->db->insert('tb_reports', $data);
    }
    public function updateLaporan($data, $id)
    {
        return $this->db->where('id', $id)->update('tb_reports', $data);
    }
    public function getUserByEmail($email)
    {
        $this->db->select('id')
            ->from('tb_users')
            ->where('email', $email);
        return $this->db->get()->row_array();
    }
    public function getUserProfileById($id)
    {
        $this->db->select('*')
            ->select("date_format(birth_date, '%Y-%m-%d') as birth_date")
            ->from('tb_users')
            ->where('id', $id);
        return $this->db->get()->row_array();
    }
    public function getReportsByIdUser($id)
    {
        return $this->db->where('id_user', $id)->get('tb_reports')->result();
    }
    public function updateUserProfile($id, $data)
    {
        $this->db->where('id', $id)->update('tb_users', $data);
    }
    public function countReportDataByIdUser($id)
    {
        $this->db->select('count(id_user) as count')
            ->from('tb_reports')
            ->where('id_user', $id);
        return $this->db->get()->row_array();
    }
}

/* End of file ModelUser.php */
