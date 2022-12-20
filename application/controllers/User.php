<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function dashboard()
    {
        $data = array(
            'title' => 'Dashboard User',
            'content' => 'User/dashboard'
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function riwayat_laporan()
    {
        $data = array(
            'title' => 'Riwayat Laporan Pengguna',
            'content' => 'User/riwayat_laporan',
            'reports' => $this->MappingModel->getMappingData()
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function profil()
    {
        $data = array(
            'title' => 'Profil',
            'content' => 'User/profil',
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function form_input_laporan()
    {
        $url = 'http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3524';
        $get_url = file_get_contents($url);
        $kecamatan = json_decode($get_url);
        // print_r($kecamatan);

        $data = array(
            'title' => 'Form Laporan',
            'content' => 'User/input_laporan',
            'mapping' => $this->MappingModel->getMappingData(),
            'culinaries' => $this->CulinariesModel->getCulinaries(),
            'list_kecamatan' => $kecamatan->kecamatan
        );
        $this->load->view('User/templates/wrapper', $data);
    }
    public function input_laporan()
    {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('nama_kuliner', 'nama_kuliner', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
        $this->form_validation->set_rules('latitude', 'latitude', 'required');
        $this->form_validation->set_rules('longitude', 'longitude', 'required');

        if ($this->form_validation->run() == false) {
            echo 'error';
        } else {
            $data = array(
                'nama_pemilik' => $this->input->post('nama_pemilik'),
                'nama_kuliner' => $this->input->post('nama_kuliner'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'deskripsi' => $this->input->post('deskripsi'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
            );
            $this->UsersModel->insertLaporan($this->input->post());
            var_dump($data);
        }
    }
}
