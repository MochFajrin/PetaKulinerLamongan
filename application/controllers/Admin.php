<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>you are not logged in! </strong>Please login first
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Auth/login_admin');
        }
    }
    public function data_pemetaan()
    {
        $data = array(
            'title' => 'Data Pemetaan Kuliner di Lamongan',
            'content' => 'Admin/data_pemetaan',
            'mapping' => $this->MappingModel->viewMap()
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function data_pengguna()
    {
        $data = array(
            'title' => 'Data Pemetaan Kuliner di Lamongan',
            'content' => 'Admin/data_pengguna',
            'users' => $this->UsersModel->getAllUserData(),

        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function data_laporan()
    {
        $data = array(
            'title' => 'Data Laporan di Lamongan',
            'content' => 'Admin/data_laporan',
            'mapping' => $this->MappingModel->getMappingData('')
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function detail_laporan($id)
    {
        $data = array(
            'title' => 'Detail laporan',
            'content' => 'Admin/detail_laporan',
            'map' => $this->MappingModel->getMappingDataByIdReports($id)
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function terima_laporan($id)
    {
        $this->MappingModel->acceptReport($id);
        redirect('Admin/data_laporan');
    }
    public function tolak_laporan($id)
    {
        $this->MappingModel->declineReport($id);
        redirect('Admin/data_laporan');
    }
}
