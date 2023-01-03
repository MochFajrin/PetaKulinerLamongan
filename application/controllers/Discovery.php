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
    public function user_profile($id)
    {
        $data = array(
            'title' => 'Data User',
            'profile' => $this->UsersModel->getUserProfileById($id),
            'content' => "Discovery/user_profile",
            'activity' => $this->UsersModel->getReportsByIdUser($id),
            'reportCount' => $this->UsersModel->countReportDataByIdUser($id)
        );
        $this->load->view('Discovery/templates/wrapper', $data);
    }
}

/* End of file Discovery.php */
