<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function insertLaporan($data)
    {
        return $this->db->insert('tb_reports', $data);
    }
    public function getUserByEmail($email)
    {
        return $this->db->select('id')->from('tb_users')->where('email', $email)->row_array();
    }
}

/* End of file ModelUser.php */
