<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Discovery extends CI_Controller
{

    public function index()
    {
        $data = array(
            'title' => 'Landing page',
            'content' => 'dashboard'
        );
        $this->load->view('User/wrapper', $data);
    }
}

/* End of file Discovery.php */
