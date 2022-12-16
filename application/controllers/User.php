<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function inputLaporan()
    {
        $data = array(
            'title' => 'Halaman Laporan Pengguna',
            'content' => 'User/v_input_laporan'
        );
        $this->load->view('templates/wrapper', $data);
    }
}
