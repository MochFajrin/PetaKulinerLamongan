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
            'content' => 'Admin/v_data_pemetaan',
            'mapping' => $this->MappingModel->getMappingData()
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function data_pengguna()
    {
        $data = array(
            'title' => 'Data Pemetaan Kuliner di Lamongan',
            'content' => 'Admin/v_data_pengguna'
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
    public function input_peta()
    {
        $data = array(
            'title' => 'Input Peta',
            'content' => 'Admin/v_input_peta',
            'culinaries' => $this->CulinariesModel->getCulinaries()
        );
        $this->load->view('Admin/templates/wrapper', $data);
    }
}
