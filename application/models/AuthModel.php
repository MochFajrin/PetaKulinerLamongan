<?php
class AuthModel extends CI_Model
{
    public function insert_user($data)
    {
        $this->db->insert('tb_users', $data);
    }
}
