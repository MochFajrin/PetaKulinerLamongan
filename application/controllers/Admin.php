<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function data_pemetaan()
    {
        $data = array(
            'title' => 'Data Pemetaan Kuliner di Lamongan',
            'content' => 'Admin/v_data_pemetaan'
        );
        $this->load->view('templates/wrapper', $data);
    }
    public function data_pengguna()
    {
        $data = array(
            'title' => 'Data Pemetaan Kuliner di Lamongan',
            'content' => 'Admin/v_data_pengguna'
        );
        $this->load->view('templates/wrapper', $data);
    }
    public function input_peta()
    {
        $data = array(
            'title' => 'Input Peta',
            'content' => 'Admin/v_input_peta'
        );
        $this->load->view('templates/wrapper', $data);
    }
}
