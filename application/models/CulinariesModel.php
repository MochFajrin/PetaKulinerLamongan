<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CulinariesModel extends CI_Model
{
    public function getCulinaries()
    {
        return $this->db->get('tb_culinaries')->result();
    }
}

/* End of file CulinariesModel.php */
