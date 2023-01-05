<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Discovery extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Landing page',
            'mapping' => $this->MappingModel->viewMap()
        );
        $this->load->view('Discovery/landing_page', $data);
    }
    public function search()
    {
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>you are not logged in! </strong>Please login first
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Auth/login_user');
        } else {
            $keyword = $this->input->get('q');
            $map = $this->MappingModel->viewMapByCulinaryName($keyword);
            $data = array(
                'title' => 'Cari Kuliner',
                'q' => $keyword,
                'mapping' => $map
            );
            $this->load->view('Discovery/search_page', $data);
        }
    }
    public function user_profile($id)
    {
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>you are not logged in! </strong>Please login first
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Auth/login_user');
        } else {
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
    public function about_us()
    {
        $this->load->view('Discovery/about_us');
    }
    public function detail_kuliner($id)
    {
        if ($this->session->userdata('email') == null) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>you are not logged in! </strong>Please login first
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
            redirect('Auth/login_user');
        } else {
            $data = array(
                'title' => 'Detail Kuliner',
                'map' => $this->MappingModel->getMappingDataByIdReports($id)
            );
            $this->load->view('Discovery/detail_kuliner', $data);
        }
    }
}

/* End of file Discovery.php */
