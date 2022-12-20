<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UsersModel extends CI_Model
{
    public function insertLaporan($data)
    {
        return $this->db->insert('tb_reports', $data);
    }
}

/* End of file ModelUser.php */
